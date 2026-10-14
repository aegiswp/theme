<?php

// Enforces strict type checking for all code in this file, ensuring type safety for hookable interface.
declare( strict_types=1 );

// Declares the namespace for the hookable interface.
namespace Aegis\Hooks;

/**
 * Interface for classes that can be hooked into WordPress using annotations.
 *
 * Implementing this interface ensures that a class has the `hook_annotations`
 * method, which is responsible for registering the annotated hooks.
 */
interface Hookable {

	/**
	 * Registers all annotated methods in the class with WordPress hooks.
	 *
	 * This method should be implemented by classes that use the `HookAnnotations`
	 * trait to scan the class for `@hook` annotations and register them with
	 * WordPress.
	 *
	 * @return void
	 */
	public function hook_annotations(): void;

}
