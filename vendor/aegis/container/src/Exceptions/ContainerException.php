<?php
/**
 * Container Exception
 *
 * Defines the exception for general errors in the dependency injection
 * container of the Aegis Framework.
 *
 * Responsibilities:
 * - Represents errors encountered within the aegis framework container
 * - Ensures interoperability with other PSR-11 compatible containers
 *   and libraries by implementing ContainerExceptionInterface
 *
 * @package    Aegis\Container\Exceptions
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Ensures strict type checking for all code in this file.
declare( strict_types=1 );

// Defines the namespace for the container exception functionality within the Aegis Framework.
namespace Aegis\Container\Exceptions;

// Imports the base Exception class and the PSR-11 ContainerExceptionInterface for use in the custom exception.
use Exception;
use Psr\Container\ContainerExceptionInterface;

/**
 * Container Exception for the Aegis Dependency Injection Container.
 *
 * This exception is thrown when an error occurs within the aegis container. It implements the
 * {@link https://www.php-fig.org/psr/psr-11/ PSR-11 ContainerExceptionInterface}, allowing interoperability with
 * other PSR-11 compatible containers and libraries.
 *
 * @see Exception
 * @see Psr\Container\ContainerExceptionInterface
 *
 * @since 1.0.0
 *
 * @package Aegis\Container\Exceptions
 */
// Declares the ContainerException class, which extends the base Exception and implements the PSR-11 ContainerExceptionInterface.
class ContainerException extends Exception implements ContainerExceptionInterface {

	/**
	 * Constructor for the ContainerException.
	 *
	 * Sets up the exception with a message, code, and previous exception, passing
	 * them to the parent Exception class.
	 *
	 * @param string     $message  The human-readable error message that describes the exception.
	 * @param ?int       $code     The optional, user-defined exception code. Defaults to 0.
	 * @param ?Exception $previous The previous exception used for chaining. Defaults to null.
	 *
	 * @return void
	 */
	public function __construct( string $message, ?int $code = 0, ?Exception $previous = null ) {
		parent::__construct( $message, $code, $previous );
	}
}
