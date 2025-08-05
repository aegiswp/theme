<?php
/**
 * Registerable Interface
 *
 * Defines the contract for service registration in the dependency injection
 * container of the Aegis Framework.
 *
 * Responsibilities:
 * - Requires implementing classes to provide a register method for
 *   registering themselves with the aegis container
 * - Facilitates modular and explicit service registration
 *
 * @package    Aegis\Container\Interfaces
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Ensures strict type checking for all code in this file.
declare( strict_types=1 );

// Defines the namespace for registerable interfaces within the Aegis Framework.
namespace Aegis\Container\Interfaces;

// Imports the Aegis container class for type hinting in the interface method.
use Aegis\Container\Container;

/**
 * Interface for services that can be registered with the container.
 *
 * This interface provides a contract for classes that need to register themselves
 * or other services with the Aegis dependency injection container. It is typically
 * used by Service Providers to encapsulate service registration logic.
 *
 * @package Aegis\Container\Interfaces
 * @since   1.0.0
 */
// Declares the Registerable interface for service registration.
interface Registerable {

	/**
	 * Registers services with the dependency injection container.
	 *
	 * This method is called by the framework to allow a class (typically a
	 * Service Provider) to register its services, bindings, and configurations
	 * with the Aegis container.
	 *
	 * @since 1.0.0
	 *
	 * @param Container $container The dependency injection container instance.
	 *
	 * @return void
	 */
	public function register( Container $container ): void;
}
