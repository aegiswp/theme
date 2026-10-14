<?php
/**
 * Container Factory
 *
 * This file provides a factory for creating and managing singleton instances of the
 * dependency injection container. It ensures that only one instance of a container
 * exists for each unique identifier, which is useful for maintaining separate
 * container scopes within an application.
 *
 * Responsibilities:
 * - Provides a static `create` method to get a container instance.
 * - Manages a static registry of container instances to ensure singletons.
 *
 * @package    Aegis\Container
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for container factory.
declare( strict_types=1 );

// Declares the namespace for the container factory.
namespace Aegis\Container;

/**
 * Factory for creating and retrieving container instances.
 * This class ensures that only one instance of the Container is created for each unique ID.
 *
 * @package Aegis\Container
 * @since 1.0.0
 */
class ContainerFactory {

	/**
	 * Creates a new container instance or returns an existing one based on the ID.
	 * This method implements a singleton pattern, ensuring that for each unique `$id`,
	 * the same container instance is returned.
	 *
	 * @since 1.0.0
	 *
	 * @param string $id The unique identifier for the container.
	 *
	 * @return Container The singleton container instance.
	 */
	public static function create( string $id ): Container {
		// Static cache to hold container instances.
		static $containers = [];

		// If a container for the given ID does not exist, create and store it.
		if ( ! isset( $containers[ $id ] ) ) {
			$containers[ $id ] = new Container();
		}

		// Return the existing or newly created container.
		return $containers[ $id ];
	}

}
