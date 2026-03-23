<?php
/**
 * Conditions Evaluator
 *
 * Evaluates conditional logic stored in `_aegis_conditions` post meta.
 * Used by:
 * - The theme's post-conditions filter (hide/show post content)
 * - The aegis-pro plugin's HookPatternsRenderer (render hook patterns)
 *
 * @package    Aegis
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 */

declare( strict_types=1 );

namespace Aegis;

use function get_post_meta;
use function is_user_logged_in;
use function wp_get_current_user;
use function current_datetime;
use function strtotime;
use function is_front_page;
use function is_home;
use function is_singular;
use function is_archive;
use function is_search;
use function is_404;
use function json_decode;
use function get_post_type;
use function get_the_ID;
use function get_queried_object_id;
use function has_term;
use function is_post_type_archive;
use function is_category;
use function is_tag;
use function is_date;
use function is_author;
use function is_tax;
use function get_current_user_id;
use function get_user_meta;
use function str_contains;
use function str_starts_with;
use function function_exists;
use function wp_parse_url;
use function sanitize_text_field;
use function wp_unslash;
use function is_array;
use Aegis\Utilities\UserAgent;

/**
 * Conditions Evaluator Class
 *
 * Evaluates document-level conditional logic for any post type.
 */
class ConditionsEvaluator {

	/**
	 * Check document-level conditional logic for a pattern.
	 *
	 * Reads the JSON `_aegis_conditions` meta field and evaluates every
	 * active condition. All non-empty conditions must pass (AND logic).
	 *
	 * @since 1.0.0
	 *
	 * @param int $pattern_id Pattern post ID.
	 *
	 * @return bool True if the pattern should render.
	 */
	public function should_render_pattern( int $pattern_id ): bool {
		$raw = get_post_meta( $pattern_id, '_aegis_conditions', true );
		if ( empty( $raw ) ) {
			return true;
		}

		$c = json_decode( $raw, true );
		if ( ! is_array( $c ) || empty( $c ) ) {
			return true;
		}

		// Lockdown — absolute priority.
		if ( ! empty( $c['lockdown'] ) ) {
			return false;
		}

		// User status.
		if ( ! empty( $c['userStatus'] ) ) {
			$logged_in = is_user_logged_in();
			if ( $c['userStatus'] === 'logged-in' && ! $logged_in ) {
				return false;
			}
			if ( $c['userStatus'] === 'logged-out' && $logged_in ) {
				return false;
			}
		}

		// User role rules.
		if ( ! empty( $c['userRoleRules'] ) && is_array( $c['userRoleRules'] ) ) {
			$hide = $this->evaluate_rules(
				$c['userRoleRules'],
				$c['userRoleLogic'] ?? 'show',
				$c['userRoleRelation'] ?? 'all',
				function ( array $rule ): bool {
					$user  = wp_get_current_user();
					$has   = in_array( $rule['role'] ?? '', $user->roles, true );
					return ( $rule['operator'] ?? 'is' ) === 'is' ? $has : ! $has;
				}
			);
			if ( $hide ) {
				return false;
			}
		}

		// Schedule.
		if ( ! empty( $c['scheduleStart'] ) || ! empty( $c['scheduleEnd'] ) ) {
			$now = current_datetime()->getTimestamp();
			if ( ! empty( $c['scheduleStart'] ) ) {
				$start_ts = strtotime( $c['scheduleStart'] );
				if ( $start_ts && $now < $start_ts ) {
					return false;
				}
			}
			if ( ! empty( $c['scheduleEnd'] ) ) {
				$end_ts = strtotime( $c['scheduleEnd'] );
				if ( $end_ts && $now > $end_ts ) {
					return false;
				}
			}
		}

		// Location.
		if ( ! empty( $c['location'] ) ) {
			$match = $this->check_location( $c['location'] );
			$logic = $c['locationLogic'] ?? 'show';
			if ( $logic === 'show' && ! $match ) {
				return false;
			}
			if ( $logic === 'hide' && $match ) {
				return false;
			}
		}

		// Specific users.
		if ( ! empty( $c['specificUserIds'] ) ) {
			$ids   = array_map( 'intval', array_filter( explode( ',', $c['specificUserIds'] ) ) );
			$match = in_array( get_current_user_id(), $ids, true );
			$logic = $c['specificUsersLogic'] ?? 'show';
			if ( $logic === 'show' && ! $match ) {
				return false;
			}
			if ( $logic === 'hide' && $match ) {
				return false;
			}
		}

		// URL query string rules.
		if ( ! empty( $c['queryStringRules'] ) && is_array( $c['queryStringRules'] ) ) {
			$hide = $this->evaluate_rules(
				$c['queryStringRules'],
				$c['queryStringLogic'] ?? 'show',
				$c['queryStringRelation'] ?? 'all',
				function ( array $rule ): bool {
					$param = $rule['param'] ?? '';
					if ( $param === '' ) {
						return false;
					}
					$actual = isset( $_GET[ $param ] ) ? sanitize_text_field( wp_unslash( $_GET[ $param ] ) ) : null; // phpcs:ignore WordPress.Security.NonceVerification
					return $this->compare( $actual, $rule['operator'] ?? 'is', $rule['value'] ?? '' );
				}
			);
			if ( $hide ) {
				return false;
			}
		}

		// Browser & device rules (server-side UA sniffing — best effort).
		if ( ! empty( $c['deviceRules'] ) && is_array( $c['deviceRules'] ) ) {
			$hide = $this->evaluate_rules(
				$c['deviceRules'],
				$c['deviceLogic'] ?? 'show',
				$c['deviceRelation'] ?? 'all',
				function ( array $rule ): bool {
					$ua    = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '';
					$match = UserAgent::matches_device( $ua, $rule['device'] ?? '' );
					return ( $rule['operator'] ?? 'is' ) === 'is' ? $match : ! $match;
				}
			);
			if ( $hide ) {
				return false;
			}
		}

		// Cookie rules (pro).
		if ( ! empty( $c['cookieRules'] ) && is_array( $c['cookieRules'] ) ) {
			$hide = $this->evaluate_rules(
				$c['cookieRules'],
				$c['cookieLogic'] ?? 'show',
				$c['cookieRelation'] ?? 'all',
				function ( array $rule ): bool {
					$name = $rule['name'] ?? '';
					if ( $name === '' ) {
						return false;
					}
						$actual = isset( $_COOKIE[ $name ] ) ? sanitize_text_field( wp_unslash( $_COOKIE[ $name ] ) ) : null; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
					return $this->compare( $actual, $rule['operator'] ?? 'is', $rule['value'] ?? '' );
				}
			);
			if ( $hide ) {
				return false;
			}
		}

		// Referral source rules (pro).
		if ( ! empty( $c['referralRules'] ) && is_array( $c['referralRules'] ) ) {
			$hide = $this->evaluate_rules(
				$c['referralRules'],
				$c['referralLogic'] ?? 'show',
				$c['referralRelation'] ?? 'all',
				function ( array $rule ): bool {
					$referer = isset( $_SERVER['HTTP_REFERER'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_REFERER'] ) ) : '';
					$domain  = $rule['domain'] ?? '';
					if ( $domain === '' ) {
						return false;
					}
					$op = $rule['operator'] ?? 'is';
					if ( $op === 'contains' ) {
						return str_contains( $referer, $domain );
					}
					$ref_host = wp_parse_url( $referer, PHP_URL_HOST ) ?: '';
					return $op === 'is' ? $ref_host === $domain : $ref_host !== $domain;
				}
			);
			if ( $hide ) {
				return false;
			}
		}

		// ACF field rules (pro).
		if ( ! empty( $c['acfRules'] ) && is_array( $c['acfRules'] ) && function_exists( 'get_field' ) ) {
			$hide = $this->evaluate_rules(
				$c['acfRules'],
				$c['acfLogic'] ?? 'show',
				$c['acfRelation'] ?? 'all',
				function ( array $rule ): bool {
					$field = $rule['field'] ?? '';
					if ( $field === '' ) {
						return false;
					}
					$actual = (string) get_field( $field, get_queried_object_id() );
					return $this->compare( $actual, $rule['operator'] ?? 'is', $rule['value'] ?? '' );
				}
			);
			if ( $hide ) {
				return false;
			}
		}

		// MetaBox field rules (pro).
		if ( ! empty( $c['metaboxRules'] ) && is_array( $c['metaboxRules'] ) && function_exists( 'rwmb_meta' ) ) {
			$hide = $this->evaluate_rules(
				$c['metaboxRules'],
				$c['metaboxLogic'] ?? 'show',
				$c['metaboxRelation'] ?? 'all',
				function ( array $rule ): bool {
					$field = $rule['field'] ?? '';
					if ( $field === '' ) {
						return false;
					}
					$actual = (string) rwmb_meta( $field, [], get_queried_object_id() );
					return $this->compare( $actual, $rule['operator'] ?? 'is', $rule['value'] ?? '' );
				}
			);
			if ( $hide ) {
				return false;
			}
		}

		// Post meta rules (pro).
		if ( ! empty( $c['postMetaRules'] ) && is_array( $c['postMetaRules'] ) ) {
			$hide = $this->evaluate_rules(
				$c['postMetaRules'],
				$c['postMetaLogic'] ?? 'show',
				$c['postMetaRelation'] ?? 'all',
				function ( array $rule ): bool {
					$key = $rule['key'] ?? '';
					if ( $key === '' ) {
						return false;
					}
					$post_id = get_the_ID() ?: get_queried_object_id();
					if ( ! $post_id ) {
						return false;
					}
					$actual = (string) get_post_meta( $post_id, $key, true );
					return $this->compare( $actual, $rule['operator'] ?? 'is', $rule['value'] ?? '' );
				}
			);
			if ( $hide ) {
				return false;
			}
		}

		// User meta rules (pro).
		if ( ! empty( $c['userMetaRules'] ) && is_array( $c['userMetaRules'] ) ) {
			$uid = get_current_user_id();
			if ( $uid ) {
				$hide = $this->evaluate_rules(
					$c['userMetaRules'],
					$c['userMetaLogic'] ?? 'show',
					$c['userMetaRelation'] ?? 'all',
					function ( array $rule ) use ( $uid ): bool {
						$key = $rule['key'] ?? '';
						if ( $key === '' ) {
							return false;
						}
						$actual = (string) get_user_meta( $uid, $key, true );
						return $this->compare( $actual, $rule['operator'] ?? 'is', $rule['value'] ?? '' );
					}
				);
				if ( $hide ) {
					return false;
				}
			}
		}

		// Advanced location rules (pro).
		if ( ! empty( $c['advancedLocationRules'] ) && is_array( $c['advancedLocationRules'] ) ) {
			$hide = $this->evaluate_rules(
				$c['advancedLocationRules'],
				$c['advancedLocationLogic'] ?? 'show',
				$c['advancedLocationRelation'] ?? 'all',
				[ $this, 'check_advanced_location_rule' ]
			);
			if ( $hide ) {
				return false;
			}
		}

		return true;
	}

	// -------------------------------------------------------------------------
	// Condition helpers
	// -------------------------------------------------------------------------

	/**
	 * Evaluate a set of rules with show/hide logic and all/any relation.
	 *
	 * @since 1.0.0
	 *
	 * @param array    $rules    Array of rule arrays.
	 * @param string   $logic    'show' or 'hide'.
	 * @param string   $relation 'all' or 'any'.
	 * @param callable $matcher  Receives a single rule, returns bool.
	 *
	 * @return bool True if the block should be hidden.
	 */
	private function evaluate_rules( array $rules, string $logic, string $relation, callable $matcher ): bool {
		$passes = 0;
		$total  = 0;

		foreach ( $rules as $rule ) {
			if ( ! is_array( $rule ) ) {
				continue;
			}
			$total++;
			if ( $matcher( $rule ) ) {
				$passes++;
			}
		}

		if ( $total === 0 ) {
			return false;
		}

		$rules_met = ( $relation === 'any' ) ? ( $passes > 0 ) : ( $passes === $total );

		// 'show' logic: hide when rules are NOT met.
		// 'hide' logic: hide when rules ARE met.
		return $logic === 'show' ? ! $rules_met : $rules_met;
	}

	/**
	 * Basic string comparison with operator.
	 *
	 * @since 1.0.0
	 *
	 * @param ?string $actual   Actual value (null = not set).
	 * @param string  $operator Comparison operator.
	 * @param string  $value    Expected value.
	 *
	 * @return bool
	 */
	private function compare( ?string $actual, string $operator, string $value ): bool {
		switch ( $operator ) {
			case 'is':
				return $actual !== null && $actual === $value;
			case 'isNot':
				return $actual === null || $actual !== $value;
			case 'exists':
				return $actual !== null && $actual !== '';
			case 'notExists':
				return $actual === null || $actual === '';
			case 'contains':
				return $actual !== null && str_contains( $actual, $value );
			case 'greaterThan':
				return is_numeric( $actual ) && is_numeric( $value ) && (float) $actual > (float) $value;
			case 'lessThan':
				return is_numeric( $actual ) && is_numeric( $value ) && (float) $actual < (float) $value;
			case 'greaterThanOrEqual':
				return is_numeric( $actual ) && is_numeric( $value ) && (float) $actual >= (float) $value;
			case 'lessThanOrEqual':
				return is_numeric( $actual ) && is_numeric( $value ) && (float) $actual <= (float) $value;
			default:
				return false;
		}
	}

	/**
	 * Check basic location condition.
	 *
	 * @since 1.0.0
	 *
	 * @param string $location Location key.
	 *
	 * @return bool True if current page matches.
	 */
	private function check_location( string $location ): bool {
		switch ( $location ) {
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
	 * Check a single advanced location rule.
	 *
	 * @since 1.0.0
	 *
	 * @param array $rule Rule with type, operator, value.
	 *
	 * @return bool True if the rule matches.
	 */
	public function check_advanced_location_rule( array $rule ): bool {
		$type  = $rule['type'] ?? '';
		$op    = $rule['operator'] ?? 'is';
		$value = $rule['value'] ?? '';

		switch ( $type ) {
			case 'postType':
				$current = get_post_type() ?: '';
				return $op === 'is' ? $current === $value : $current !== $value;

			case 'postIds':
				$ids   = array_map( 'intval', array_filter( explode( ',', $value ) ) );
				$match = in_array( (int) get_queried_object_id(), $ids, true );
				return $op === 'is' ? $match : ! $match;

			case 'taxonomyTerm':
				$parts = explode( ':', $value, 2 );
				if ( count( $parts ) !== 2 ) {
					return false;
				}
				$match = has_term( $parts[1], $parts[0] );
				return $op === 'is' ? $match : ! $match;

			case 'urlPath':
				$path = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
				switch ( $op ) {
					case 'is':
						return $path === $value;
					case 'isNot':
						return $path !== $value;
					case 'contains':
						return str_contains( $path, $value );
					case 'startsWith':
						return str_starts_with( $path, $value );
					default:
						return false;
				}

			case 'archiveType':
				$match = false;
				switch ( $value ) {
					case 'category':
						$match = is_category();
						break;
					case 'tag':
						$match = is_tag();
						break;
					case 'date':
						$match = is_date();
						break;
					case 'author':
						$match = is_author();
						break;
					case 'taxonomy':
						$match = is_tax();
						break;
					case 'postTypeArchive':
						$match = is_post_type_archive();
						break;
				}
				return $op === 'is' ? $match : ! $match;

			default:
				return false;
		}
	}
}
