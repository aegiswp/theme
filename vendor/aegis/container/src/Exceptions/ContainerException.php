<?php
/**
 * Container Exception.
 *
 * Exception thrown for general errors in the dependency injection container.
 *
 * @package   Aegis\Container\Exceptions
 * @since     1.0.0
 */

// Ensures strict type checking for all code in this file.
declare( strict_types=1 );

namespace Aegis\Container\Exceptions;

use Exception;
use Psr\Container\ContainerExceptionInterface;

/**
 * Base exception for the container.
 *
 * This exception is thrown when an error occurs within the container. It implements the
 * PSR-11 ContainerExceptionInterface, allowing for interoperability.
 *
 * @since 1.0.0
 */
class ContainerException extends Exception implements ContainerExceptionInterface {

	/**
	 * ContainerException constructor.
	 *
	 * @param string          $message  The error message.
	 * @param int             $code     Optional. The error code. Defaults to 0.
	 * @param Exception|null  $previous Optional. The previous exception used for chaining. Defaults to null.
	 */
	public function __construct( string $message, ?int $code = 0, ?Exception $previous = null ) {
		parent::__construct( $message, $code, $previous );
	}
}
