<?php

// Enforces strict type checking for all code in this file, ensuring type safety for data-aware trait.
declare( strict_types=1 );

// Declares the namespace for the data-aware trait.
namespace Aegis\Utilities;

/**
 * Trait that provides a standard implementation for the DataAwareInterface.
 *
 * This allows any class to easily store and retrieve a Data object.
 *
 * @since 1.0.0
 */
trait DataTrait {

	/**
	 * The Data object instance.
	 *
	 * @since 1.0.0
	 *
	 * @var Data|null
	 */
	protected ?Data $data = null;

	/**
	 * Retrieves the Data object.
	 *
	 * @since 1.0.0
	 *
	 * @return Data The Data object instance.
	 */
	public function get_data(): Data {
		return $this->data;
	}

	/**
	 * Injects a Data object.
	 *
	 * @since 1.0.0
	 *
	 * @param Data $data The Data object instance to set.
	 *
	 * @return void
	 */
	public function set_data( Data $data ): void {
		$this->data = $data;
	}

}
