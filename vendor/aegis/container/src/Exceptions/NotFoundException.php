<?php
/**
 * Not Found Exception
 *
 * Defines the exception for missing dependencies in the dependency injection container.
 *
 * Responsibilities:
 * - Handles errors when requested dependencies are not found in the container
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
use Psr\Container\NotFoundExceptionInterface;
use function __;
use function sprintf;

/**
 * Dependency Not Found Exception.
 *
 * @since 1.0.0
 */
class NotFoundException extends Exception implements NotFoundExceptionInterface {

	/**
	 * DependencyNotFoundException constructor.
	 *
	 * @param string $id Identifier of the entry to look for.
	 *
	 * @return void
	 */
	public function __construct( string $id ) {

		/* translators: %s: Dependency ID */
		$message = __( '%s not found.', 'aegis' );

		parent::__construct( sprintf( $message, $id ) );
	}
}
