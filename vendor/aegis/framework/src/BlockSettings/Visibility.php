<?php
/**
 * Visibility Block Setting
 *
 * Provides conditional visibility controls for blocks within the Aegis Framework.
 * Free features include: user status, date/time scheduling, and page location conditions.
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare(strict_types=1);

namespace Aegis\Framework\BlockSettings;

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
 * Visibility class for conditional block display.
 *
 * @since 1.0.0
 */
class Visibility implements Renderable
{

	/**
	 * Condition types available in the free version.
	 *
	 * @since 1.0.0
	 *
	 * @var array
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
	 * Renders block with visibility conditions applied.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block content.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block 10
	 *
	 * @return string
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
	 * Checks if the block should be hidden based on visibility conditions.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
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
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
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
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
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
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
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
	 * Check if current page matches the location condition.
	 *
	 * @since 1.0.0
	 *
	 * @param string $location Location value.
	 *
	 * @return bool True if current page matches location.
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
	 * When enabled, the block is hidden from all users on the frontend.
	 *
	 * @since 1.1.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
	 */
	protected function check_lockdown(array $visibility): bool
	{
		return ! empty($visibility['hideFromAll']);
	}

	/**
	 * Check URL query string condition.
	 *
	 * Evaluates rules against current URL query parameters.
	 * Each rule has a param name, operator (is/isNot/exists/notExists), and value.
	 *
	 * @since 1.1.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
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
	 * Shows or hides the block for a comma-separated list of user IDs.
	 *
	 * @since 1.1.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
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
