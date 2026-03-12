<?php
/**
 * Visibility Block Setting
 *
 * Provides conditional visibility controls for all blocks in the Aegis Framework.
 *
 * Responsibilities:
 * - Evaluates visibility conditions on every block at render time and
 *   suppresses output when conditions dictate the block should be hidden
 * - Supports six condition types: user status, date/time scheduling,
 *   page location, lockdown, URL query string rules, and specific user IDs
 * - Each condition uses show/hide logic so authors can include or exclude
 *   blocks based on the evaluated result
 * - Lockdown takes absolute priority, hiding the block from all users
 *   regardless of other conditions
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports classes, interfaces, and functions used throughout this file.
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function absint;
use function current_time;
use function get_current_user_id;
use function is_404;
use function is_archive;
use function is_front_page;
use function is_home;
use function is_search;
use function is_singular;
use function is_user_logged_in;
use function sanitize_text_field;
use function strtotime;
use function wp_unslash;

/**
 * Conditional block visibility.
 *
 * Implements the {@see Renderable} interface to intercept every block's
 * output and evaluate its `visibility` attribute array. When any
 * condition resolves to "hide", the block content is replaced with an
 * empty string, effectively removing it from the front-end.
 *
 * Evaluation order: lockdown (absolute) → user status → schedule →
 * location → query string → specific users. The first condition that
 * triggers hiding short-circuits the remaining checks.
 *
 * @since 1.0.0
 */
class Visibility implements Renderable
{

	/**
	 * Condition types and their configuration.
	 *
	 * Defines every visibility condition exposed to the editor.
	 * Each key is a condition slug whose value describes the UI
	 * control: either an `options` array for select-style inputs
	 * or a `fields` map for free-form inputs (datetime, boolean,
	 * string, array). This constant is consumed by the editor
	 * script to render inspector panel controls.
	 *
	 * @since 1.0.0
	 *
	 * @var array<string, array{label: string, options?: array, fields?: array}>
	 */
	public const CONDITIONS = [
		'userStatus' => [
			'label' => 'User Status',
			'options' => [
				['label' => 'All Users', 'value' => ''],
				['label' => 'Logged In', 'value' => 'logged-in'],
				['label' => 'Logged Out', 'value' => 'logged-out'],
			],
		],
		'schedule' => [
			'label' => 'Schedule',
			'fields' => [
				'startDate' => ['label' => 'Start Date', 'type' => 'datetime'],
				'endDate' => ['label' => 'End Date', 'type' => 'datetime'],
			],
		],
		'location' => [
			'label' => 'Location',
			'options' => [
				['label' => 'All Pages', 'value' => ''],
				['label' => 'Front Page', 'value' => 'front-page'],
				['label' => 'Blog Page', 'value' => 'blog'],
				['label' => 'All Singular', 'value' => 'singular'],
				['label' => 'All Archives', 'value' => 'archive'],
				['label' => 'Search Results', 'value' => 'search'],
				['label' => '404 Page', 'value' => '404'],
			],
		],
		'lockdown' => [
			'label' => 'Lockdown',
			'fields' => [
				'hideFromAll' => ['label' => 'Hide from all users', 'type' => 'boolean'],
			],
		],
		'queryString' => [
			'label' => 'URL Query String',
			'fields' => [
				'queryStringRules' => ['label' => 'Query String Rules', 'type' => 'array'],
			],
		],
		'specificUsers' => [
			'label' => 'Specific Users',
			'fields' => [
				'userIds' => ['label' => 'User IDs', 'type' => 'string'],
				'userIdsLogic' => ['label' => 'Logic', 'type' => 'string'],
			],
		],
	];

	/**
	 * Render block with visibility conditions applied.
	 *
	 * Returns an empty string when the block should be hidden,
	 * or the original content when all conditions pass. Lockdown
	 * is evaluated first for absolute priority, followed by all
	 * other conditions via {@see is_hidden()}.
	 *
	 * @since 1.0.0
	 *
	 * @hook  render_block 10
	 *
	 * @param string   $block_content The original block HTML.
	 * @param array    $block         The parsed block array.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @return string Block HTML or empty string when hidden.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$visibility = $block['attrs']['visibility'] ?? [];

		if (empty($visibility)) {
			return $block_content;
		}

		// Lockdown takes absolute priority
		if ($this->check_lockdown($visibility)) {
			return '';
		}

		// Check if block should be hidden based on conditions
		if ($this->is_hidden($visibility)) {
			return '';
		}

		return $block_content;
	}

	/**
	 * Check if the block should be hidden based on visibility conditions.
	 *
	 * Evaluates each condition in order: user status → schedule →
	 * location → query string → specific users. Returns true on
	 * the first condition that triggers hiding.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility attribute array from the block.
	 *
	 * @return bool True if the block should be hidden.
	 */
	protected function is_hidden(array $visibility): bool
	{
		// Check user status condition
		if ($this->check_user_status($visibility)) {
			return true;
		}

		// Check schedule condition
		if ($this->check_schedule($visibility)) {
			return true;
		}

		// Check location condition
		if ($this->check_location($visibility)) {
			return true;
		}

		// Check URL query string condition
		if ($this->check_query_string($visibility)) {
			return true;
		}

		// Check specific user IDs condition
		if ($this->check_specific_users($visibility)) {
			return true;
		}

		return false;
	}

	/**
	 * Check user status condition.
	 *
	 * Hides the block when the current user's authentication state
	 * does not match the required value (`logged-in` or `logged-out`).
	 * An empty value means no restriction.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility attribute array.
	 *
	 * @return bool True if the block should be hidden.
	 */
	protected function check_user_status(array $visibility): bool
	{
		$user_status = $visibility['userStatus'] ?? '';

		if (empty($user_status)) {
			return false;
		}

		if ($user_status === 'logged-in' && !is_user_logged_in()) {
			return true;
		}

		if ($user_status === 'logged-out' && is_user_logged_in()) {
			return true;
		}

		return false;
	}

	/**
	 * Check schedule condition.
	 *
	 * Hides the block when the current WordPress local time falls
	 * outside the optional start/end datetime window. Either bound
	 * may be omitted for an open-ended schedule.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility attribute array.
	 *
	 * @return bool True if the block should be hidden.
	 */
	protected function check_schedule(array $visibility): bool
	{
		$start_date = $visibility['scheduleStart'] ?? '';
		$end_date = $visibility['scheduleEnd'] ?? '';

		if (empty($start_date) && empty($end_date)) {
			return false;
		}

		$current_time = current_time('timestamp');

		// Check start date
		if (!empty($start_date)) {
			$start_timestamp = strtotime($start_date);
			if ($start_timestamp && $current_time < $start_timestamp) {
				return true;
			}
		}

		// Check end date
		if (!empty($end_date)) {
			$end_timestamp = strtotime($end_date);
			if ($end_timestamp && $current_time > $end_timestamp) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check location condition.
	 *
	 * Evaluates whether the current page matches the chosen location
	 * slug and applies show/hide logic. With `show` logic the block
	 * is hidden when the location does *not* match; with `hide`
	 * logic the block is hidden when it *does* match.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility attribute array.
	 *
	 * @return bool True if the block should be hidden.
	 */
	protected function check_location(array $visibility): bool
	{
		$location = $visibility['location'] ?? '';
		$location_logic = $visibility['locationLogic'] ?? 'show'; // 'show' or 'hide'

		if (empty($location)) {
			return false;
		}

		$matches_location = $this->matches_location($location);

		// If logic is 'show', hide when NOT matching
		// If logic is 'hide', hide when matching
		if ($location_logic === 'show') {
			return !$matches_location;
		}

		return $matches_location;
	}

	/**
	 * Check if the current page matches the location slug.
	 *
	 * Maps each location value to its corresponding WordPress
	 * conditional tag (`is_front_page()`, `is_home()`, etc.).
	 * Returns false for unrecognised slugs.
	 *
	 * @since 1.0.0
	 *
	 * @param string $location Location slug from the CONDITIONS constant.
	 *
	 * @return bool True if the current page matches.
	 */
	protected function matches_location(string $location): bool
	{
		switch ($location) {
			case 'front-page':
				return is_front_page();

			case 'blog':
				return is_home();

			case 'singular':
				return is_singular();

			case 'archive':
				return is_archive();

			case 'search':
				return is_search();

			case '404':
				return is_404();

			default:
				return false;
		}
	}

	/**
	 * Check lockdown condition.
	 *
	 * When the `hideFromAll` flag is set, the block is unconditionally
	 * hidden from every user on the front end. This takes absolute
	 * priority over all other visibility conditions.
	 *
	 * @since 1.1.0
	 *
	 * @param array $visibility Visibility attribute array.
	 *
	 * @return bool True if the block should be hidden.
	 */
	protected function check_lockdown(array $visibility): bool
	{
		return ! empty($visibility['hideFromAll']);
	}

	/**
	 * Check URL query string condition.
	 *
	 * Evaluates an array of rules against the current `$_GET`
	 * parameters. Each rule specifies a parameter name, an
	 * operator (`is`, `isNot`, `exists`, `notExists`, `contains`),
	 * and an expected value. Rules are combined using either `all`
	 * (AND) or `any` (OR) relation, then show/hide logic is applied.
	 *
	 * @since 1.1.0
	 *
	 * @param array $visibility Visibility attribute array.
	 *
	 * @return bool True if the block should be hidden.
	 */
	protected function check_query_string(array $visibility): bool
	{
		$rules = $visibility['queryStringRules'] ?? [];

		if (empty($rules) || ! is_array($rules)) {
			return false;
		}

		$logic = $visibility['queryStringLogic'] ?? 'show'; // 'show' or 'hide'
		$relation = $visibility['queryStringRelation'] ?? 'all'; // 'all' or 'any'

		$passes = 0;
		$total  = 0;

		foreach ($rules as $rule) {
			$param    = $rule['param'] ?? '';
			$operator = $rule['operator'] ?? 'is';
			$value    = $rule['value'] ?? '';

			if (empty($param)) {
				continue;
			}

			$total++;
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$actual = isset($_GET[$param]) ? sanitize_text_field(wp_unslash($_GET[$param])) : null;

			$match = false;

			switch ($operator) {
				case 'is':
					$match = ($actual !== null && $actual === $value);
					break;

				case 'isNot':
					$match = ($actual === null || $actual !== $value);
					break;

				case 'exists':
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$match = isset($_GET[$param]);
					break;

				case 'notExists':
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$match = ! isset($_GET[$param]);
					break;

				case 'contains':
					$match = ($actual !== null && str_contains($actual, $value));
					break;
			}

			if ($match) {
				$passes++;
			}
		}

		if ($total === 0) {
			return false;
		}

		$rules_met = ($relation === 'any') ? ($passes > 0) : ($passes === $total);

		// 'show' logic: hide when rules are NOT met
		// 'hide' logic: hide when rules ARE met
		if ($logic === 'show') {
			return ! $rules_met;
		}

		return $rules_met;
	}

	/**
	 * Check specific user IDs condition.
	 *
	 * Parses a comma-separated list of WordPress user IDs and
	 * determines whether the current user is in that list.
	 * Show/hide logic controls whether membership means the
	 * block is displayed or suppressed.
	 *
	 * @since 1.1.0
	 *
	 * @param array $visibility Visibility attribute array.
	 *
	 * @return bool True if the block should be hidden.
	 */
	protected function check_specific_users(array $visibility): bool
	{
		$user_ids_raw = $visibility['specificUserIds'] ?? '';

		if (empty($user_ids_raw)) {
			return false;
		}

		$logic = $visibility['specificUsersLogic'] ?? 'show'; // 'show' or 'hide'
		$current_user_id = get_current_user_id();

		// Parse comma-separated IDs
		$user_ids = array_map('absint', array_filter(array_map('trim', explode(',', $user_ids_raw))));

		if (empty($user_ids)) {
			return false;
		}

		$is_in_list = in_array($current_user_id, $user_ids, true);

		// 'show' logic: hide when user is NOT in the list
		// 'hide' logic: hide when user IS in the list
		if ($logic === 'show') {
			return ! $is_in_list;
		}

		return $is_in_list;
	}
}
