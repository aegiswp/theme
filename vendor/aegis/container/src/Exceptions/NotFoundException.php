<?php
/**
 * Not Found Exception
 *
 * This file defines an exception that is thrown when a service or dependency
 * cannot be found in the container. It adheres to the PSR-11 standard by
 * implementing the `NotFoundExceptionInterface`.
 *
 * Responsibilities:
 * - Provides a specific exception for "not found" errors in the container.
 * - Implements `Psr\Container\NotFoundExceptionInterface` for interoperability.
 *
 * @package    Aegis\Container\Exceptions
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for not found exception.
declare( strict_types=1 );

// Declares the namespace for the not found exception.
namespace Aegis\Container\Exceptions;

// Imports classes, interfaces, and functions used by the not found exception.
use Exception;
use Psr\Container\NotFoundExceptionInterface;
use function __;
use function sprintf;

/**
 * Exception thrown when no entry was found in the container.
 * This exception complies with the PSR-11 standard for "not found" errors.
 *
 * @package Aegis\Container\Exceptions
 * @since 1.0.0
 */
class NotFoundException extends Exception implements NotFoundExceptionInterface {

	/**
	 * NotFoundException constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param string $id The identifier of the service that was not found.
	 */
	public function __construct( string $id ) {

		if ( function_exists( '__' ) ) {
			/* translators: %s: Dependency ID */
			$message = __( '%s not found.', 'aegis' );
		} else {
			$message = '%s not found.';
		}

		parent::__construct( sprintf( $message, $id ) );
	}

}
