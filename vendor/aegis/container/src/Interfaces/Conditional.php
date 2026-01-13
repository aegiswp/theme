<?php
/**
 * Conditional Interface
 *
 * Defines the contract for conditional service registration in the
 * dependency injection container of the Aegis Framework.
 *
 * Responsibilities:
 * - Allows services to specify if they should be registered based on
 *   runtime conditions
 * - Provides a static method for evaluating the condition
 *
 * @package    Aegis\Container\Interfaces
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety.
declare(strict_types=1);

// Defines the namespace for conditional interfaces within the Aegis Framework.
namespace Aegis\Container\Interfaces;

/**
 * Interface for conditionally registered services.
 *
 * Services implementing this interface can control their own registration in the
 * dependency injection container. The container will check the `condition()` method
 * before registering the service, allowing for dynamic service loading based on
 * runtime conditions (e.g., whether a specific plugin is active).
 *
 * @package Aegis\Container\Interfaces
 * @since   1.0.0
 */
// Declares the Conditional interface for conditional service registration.
interface Conditional
{

	/**
	 * Determines if the service should be registered.
	 *
	 * This static method is called by the container before a service is registered.
	 * It should contain the logic to check if the necessary conditions for the
	 * service to be active are met.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True to register the service, false to prevent registration.
	 */
	public static function condition(): bool;
}
