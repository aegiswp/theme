<?php
/**
 * Container Exception
 *
 * This file defines the primary exception thrown by the dependency injection
 * container. It serves as a base class for more specific container-related
 * exceptions and implements the PSR-11 `ContainerExceptionInterface`.
 *
 * Responsibilities:
 * - Provides a standard exception type for errors within the container.
 * - Implements `Psr\Container\ContainerExceptionInterface` for interoperability.
 *
 * @package    Aegis\Container\Exceptions
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for container exception.
declare( strict_types=1 );

// Declares the namespace for the container exception.
namespace Aegis\Container\Exceptions;

// Imports classes, interfaces, and functions used by the container exception.
use Exception;
use Psr\Container\ContainerExceptionInterface;

/**
 * Base exception for the dependency injection container.
 * This exception is thrown for general errors that occur during the container's operation.
 *
 * @package Aegis\Container\Exceptions
 * @since 1.0.0
 */
class ContainerException extends Exception implements ContainerExceptionInterface {

	/**
	 * ContainerException constructor.
	 * Overrides the parent constructor to maintain a consistent interface.
	 *
	 * @since 1.0.0
	 *
	 * @param string          $message  The exception message.
	 * @param int|null        $code     Optional. The user-defined exception code. Defaults to 0.
	 * @param Exception|null  $previous Optional. The previous throwable used for exception chaining. Defaults to null.
	 */
	public function __construct( string $message, ?int $code = 0, ?Exception $previous = null ) {
		parent::__construct( $message, $code, $previous );
	}
}
