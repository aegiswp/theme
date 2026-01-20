<?php
/**
 * Not Found Exception
 *
 * Defines the exception for missing dependencies in the dependency injection
 * container of the Aegis Framework.
 *
 * Responsibilities:
 * - Handles errors when requested dependencies are not found in the Aegis
 *   Framework container
 * - Ensures interoperability with other PSR-11 compatible containers and
 *   libraries by implementing NotFoundExceptionInterface
 *
 * @package    Aegis\Container\Exceptions
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety.
declare(strict_types=1);

// Defines the namespace for the not found exception functionality within the Aegis Framework.
namespace Aegis\Container\Exceptions;

// Imports the base Exception class and the PSR-11 NotFoundExceptionInterface for use in the custom exception.
use Exception;
use Psr\Container\NotFoundExceptionInterface;
use function __;
use function sprintf;
/**
 * Not Found Exception for the Aegis Dependency Injection Container.
 *
 * This exception is thrown when a requested dependency (service or parameter)
 * could not be found in the container. It implements the
 * {@link https://www.php-fig.org/psr/psr-11/ PSR-11 NotFoundExceptionInterface},
 * ensuring compatibility with other PSR-11 compliant containers.
 *
 * @see Exception
 * @see Psr\Container\NotFoundExceptionInterface
 *
 * @since 1.0.0
 *
 * @package Aegis\Container\Exceptions
 */
// Declares the NotFoundException class, which extends the base Exception and implements the PSR-11 NotFoundExceptionInterface.
class NotFoundException extends Exception implements NotFoundExceptionInterface
{

	/**
	 * Constructor for the NotFoundException.
	 *
	 * Initializes the exception with a formatted, translatable message indicating
	 * which dependency was not found. It leverages WordPress's internationalization
	 * functions to make the error message translation-ready.
	 *
	 * @since 1.0.0
	 *
	 * @param string $id The unique identifier of the dependency that could not be found in the container.
	 *
	 * @return void
	 */
	public function __construct(string $id)
	{

		/* translators: %s: Dependency ID */
		$message = __('%s not found.', 'aegis');

		parent::__construct(sprintf($message, $id));
	}
}
