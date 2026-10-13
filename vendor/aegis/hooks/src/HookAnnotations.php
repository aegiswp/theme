<?php

// Enforces strict type checking for all code in this file, ensuring type safety for hook annotations trait.
declare( strict_types=1 );

// Declares the namespace for the hook annotations trait.
namespace Aegis\Hooks;

/**
 * Trait for classes that want to use annotation-based hooks.
 *
 * When this trait is used in a class, it provides a `hook_annotations` method
 * that can be called to automatically register all public methods with `@hook`
 * annotations.
 */
trait HookAnnotations {

	/**
	 * Registers all annotated methods in the class with WordPress hooks.
	 *
	 * This method is a convenient wrapper around `Hook::annotations()` that passes
	 * the current object instance to be scanned for hooks.
	 *
	 * @return void
	 */
	public function hook_annotations(): void {
		Hook::annotations( $this );
	}
}
