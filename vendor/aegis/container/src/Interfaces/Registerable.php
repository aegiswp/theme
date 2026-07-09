<?php
/**
 * Registerable Interface
 *
 * This file defines an interface for classes that need to perform a registration
 * process with the dependency injection container. It provides a standardized
 * `register` method that allows classes to add their own bindings, configurations,
 * or other setup logic to the container.
 *
 * Responsibilities:
 * - Defines a `register` method that accepts a container instance.
 * - Allows for modular and self-contained registration of services.
 *
 * @package    Aegis\Container\Interfaces
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for registerable interface.
declare( strict_types=1 );

// Declares the namespace for the registerable interface.
namespace Aegis\Container\Interfaces;

// Imports classes, interfaces, and functions used by the registerable interface.
use Aegis\Container\Container;

/**
 * Interface for classes that can be registered with the container.
 * Implementing this interface allows a class to define its own bindings
 * and configurations within the dependency injection container.
 *
 * @package Aegis\Container\Interfaces
 * @since 1.0.0
 */
interface Registerable {

	/**
	 * Registers the class with the container.
	 * This method is intended to be called to perform any setup or binding
	 * logic that the class requires.
	 *
	 * @since 1.0.0
	 *
	 * @param Container $container The dependency injection container.
	 *
	 * @return void
	 */
	public function register( Container $container ): void;

}
