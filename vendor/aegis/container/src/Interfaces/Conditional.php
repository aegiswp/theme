<?php
/**
 * Conditional Interface
 *
 * This file defines an interface for classes that should only be loaded if certain
 * conditions are met. It provides a standardized way for the dependency injection
 * container to check whether a class is eligible for instantiation.
 *
 * Responsibilities:
 * - Defines a static `condition` method that must return a boolean.
 * - Allows for conditional loading of services in the container.
 *
 * @package    Aegis\Container\Interfaces
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for conditional interface.
declare( strict_types=1 );

// Declares the namespace for the conditional interface.
namespace Aegis\Container\Interfaces;

/**
 * Interface for classes that require a condition to be met before being loaded.
 * Implementing this interface allows a class to control its own instantiation
 * based on environmental factors, configurations, or other dependencies.
 *
 * @package Aegis\Container\Interfaces
 * @since 1.0.0
 */
interface Conditional {

	/**
	 * Checks if the class should be loaded.
	 * This static method is called by the container before instantiation.
	 * If it returns false, the class will not be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True if the class should be loaded, false otherwise.
	 */
	public static function condition(): bool;

}
