<?php
/**
 * Container Exception
 *
 * Defines the exception class for the dependency injection container.
 *
 * Responsibilities:
 * - Handles errors and exceptions thrown by the container
 *
 * @package    Aegis\Container\Exceptions
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this doc update.
 */

declare( strict_types=1 );

namespace Aegis\Container\Exceptions;

use Exception;
use Psr\Container\ContainerExceptionInterface;

/**
 * Container Exception.
 *
 * @since 1.0.0
 */
class ContainerException extends Exception implements ContainerExceptionInterface {

	/**
	 * ContainerException constructor.
	 *
	 * @param string     $message  Error message.
	 * @param ?int       $code     Optional. Error code. Defaults to 0.
	 * @param ?Exception $previous Optional. Previous exception used for the exception chaining. Defaults to null.
	 *
	 * @return void
	 */
	public function __construct( string $message, ?int $code = 0, ?Exception $previous = null ) {
		parent::__construct( $message, $code, $previous );
	}
}
