<?php
/**
 * Conditional Interface
 *
 * Defines the interface for conditional service registration in the dependency injection container.
 *
 * Responsibilities:
 * - Provides a static method to determine if a service should be registered
 *
 * @package    Aegis\Container\Interfaces
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No aegis changes in this doc update.
 */

declare( strict_types=1 );

namespace Aegis\Container\Interfaces;

interface Conditional {

	public static function condition(): bool;

}
