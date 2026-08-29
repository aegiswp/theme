<?php

// Enforces strict type checking for all code in this file, ensuring type safety for data-aware interface.
declare( strict_types=1 );

// Declares the namespace for the data-aware interface.
namespace Aegis\Utilities;

/**
 * Interface for classes that are aware of a Data object.
 *
 * This ensures that a class can have a Data object injected into it and
 * retrieved from it, allowing access to plugin or theme metadata.
 *
 * @since 1.0.0
 */
interface DataAwareInterface {

	/**
	 * Retrieves the Data object.
	 *
	 * @since 1.0.0
	 *
	 * @return Data The Data object instance.
	 */
	public function get_data(): Data;

	/**
	 * Injects a Data object.
	 *
	 * @since 1.0.0
	 *
	 * @param Data $data The Data object instance to set.
	 *
	 * @return void
	 */
	public function set_data( Data $data ): void;

}
