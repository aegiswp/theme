<?php
/**
 * Aegis Dependency Injection Container
 *
 * Provides a simple auto-wiring dependency injection container for the
 * Aegis Framework.
 *
 * Responsibilities:
 * - Resolves and manages service dependencies automatically
 * - Supports conditional and modular service registration
 * - Implements PSR-11 ContainerInterface for interoperability
 *
 * @package    Aegis\Container
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety throughout the container implementation.
declare(strict_types=1);

// Declares the namespace for the Aegis dependency injection container, organizing related classes and interfaces.
namespace Aegis\Container;

// Imports exception handling, PSR-11 container interface, reflection utilities, and helper functions required for container operations.
use Aegis\Container\Exceptions\ContainerException;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionException;
use ReflectionParameter;
use function is_callable;
use function is_object;
use function uniqid;

// Imports the Debug utility class for enhanced logging and debugging support.
use Aegis\Utilities\Debug;

// Implements the main Aegis dependency injection container, providing auto-wiring and PSR-11 compatibility.
class Container implements ContainerInterface
{

	/**
	 * Holds all resolved service instances, keyed by their identifier.
	 * This acts as a cache to ensure services are only instantiated once.
	 *
	 * @var array<string, object|callable|null>
	 */
	private array $instances = [];

	/**
	 * Maintains a log of errors and exceptions for debugging purposes.
	 * Each entry is keyed by a unique ID.
	 *
	 * @var array<string, array{0: string, 1: mixed}>
	 */
	private array $log = [];

	/**
	 * Finds an entry of the container by its identifier and returns it.
	 *
	 * This method retrieves a previously resolved service instance from the container.
	 * It adheres to the PSR-11 standard by not attempting to resolve the service
	 * if it is not already present.
	 *
	 * @param string $id Identifier of the entry to look for (e.g., a fully qualified class name).
	 *
	 * @return mixed The resolved service instance, or null if the service is not found.
	 */
	public function get(string $id)
	{
		if (!$this->has($id)) {
			$this->log("Class {$id} not found in container.");
		}

		return $this->instances[$id] ?? null;
	}

	/**
	 * Returns true if the container can return an entry for the given identifier.
	 *
	 * This method checks if a service has been resolved and stored in the container.
	 * It does not check if a service is resolvable, only if it has already been resolved.
	 *
	 * @param string $id Identifier of the entry to look for (e.g., a fully qualified class name).
	 *
	 * @return bool True if the service instance exists in the container, false otherwise.
	 */
	public function has(string $id): bool
	{
		return isset($this->instances[$id]);
	}

	/**
	 * Resolves a service by its identifier and returns an instance.
	 *
	 * This is the core auto-wiring method of the container. If the service is not
	 * already resolved, it uses PHP's Reflection API to inspect the class, resolve
	 * its dependencies, and instantiate it.
	 *
	 * @param string $id   Identifier of the service to resolve (e.g., a fully qualified class name).
	 * @param mixed  ...$args Optional. A list of arguments to pass to the class constructor,
	 *                        bypassing auto-wiring for those specific parameters.
	 *
	 * @return mixed The resolved service instance, or null if resolution fails.
	 */
	public function make(string $id, ...$args)
	{
		// If an instance of the service already exists, return it immediately.
		if ($this->has($id) && is_object($this->instances[$id])) {
			return $this->instances[$id];
		}

		// If the identifier is a callable, it is a factory. Resolve it by calling it.
		if (isset($this->instances[$id]) && is_callable($this->instances[$id])) {
			return ($this->instances[$id])();
		}

		// Use Reflection to inspect the class and its dependencies.
		try {
			$reflector = new ReflectionClass($id);
		} catch (ReflectionException $e) {
			$this->log("Class to resolve '{$id}' does not exist.", $e);
			return null;
		}

		// A class must be instantiable to be resolved.
		if (!$reflector->isInstantiable()) {
			$this->log("Class '{$id}' is not instantiable.");
			return null;
		}

		// Check if the class implements the Conditional interface. If so, run the check.
		// This allows a service to control its own registration based on runtime conditions.
		if ($reflector->implementsInterface('Aegis\Container\Interfaces\Conditional')) {
			try {
				if (!$id::condition()) {
					$this->log("Conditional check failed for '{$id}'. Service not registered.");
					return null;
				}
			} catch (ReflectionException $e) {
				$this->log("Cannot invoke condition method for '{$id}'.", $e);
				return null;
			}
		}

		// Get the class constructor to inspect its parameters.
		$constructor = $reflector->getConstructor();

		try {
			// If arguments were passed directly to make(), use them to create the instance.
			if (!empty($args)) {
				$instance = $reflector->newInstanceArgs($args);
				// If there is a constructor, resolve its parameters (dependencies) recursively.
			} elseif ($constructor) {
				$parameters = $constructor->getParameters();
				$dependencies = $this->resolve_parameters($parameters);
				$instance = $reflector->newInstanceArgs($dependencies);
				// If there is no constructor, simply create a new instance without arguments.
			} else {
				$instance = $reflector->newInstance();
			}
		} catch (ReflectionException | ContainerException $e) {
			$this->log("Cannot instantiate class '{$id}'.", $e);
			return null;
		}

		// Ensure the instantiation resulted in a valid object.
		if (!is_object($instance)) {
			$this->log("Instantiation of '{$id}' did not result in an object.");
			return null;
		}

		// Store the newly created instance for future retrievals and return it.
		$this->instances[$id] = $instance;

		return $instance;
	}

	/**
	 * Resolves the dependencies for a given set of constructor parameters.
	 *
	 * This method iterates through the parameters from a class constructor, recursively
	 * calling `make()` to resolve each dependency that is a class. It throws an
	 * exception if it encounters a non-nullable, non-defaulted primitive type.
	 *
	 * @throws ContainerException If a primitive or built-in type dependency cannot be resolved.
	 *
	 * @param ReflectionParameter[] $parameters The array of parameters from a `ReflectionMethod`.
	 *
	 * @return array An array of resolved dependency instances.
	 */
	private function resolve_parameters(array $parameters): array
	{
		$dependencies = [];

		foreach ($parameters as $parameter) {
			// Get the type hint for the parameter.
			$type = $parameter->getType();

			// If the parameter has no type hint or is a built-in type (e.g., string, int),
			// we cannot auto-wire it unless it has a default value.
			if (!$type || $type->isBuiltin()) {
				if ($parameter->isDefaultValueAvailable()) {
					// If a default value is available, use it.
					$dependencies[] = $parameter->getDefaultValue();
				} else {
					// Otherwise, we cannot resolve this primitive type and must throw an exception.
					$type_name = $type ? $type->getName() : 'mixed';
					$class_name = $parameter->getDeclaringClass()->getName();

					// TODO: Add support for autowiring primitive types via configuration.
					throw new ContainerException("Cannot auto-resolve primitive parameter '{$parameter->getName()}' of type '{$type_name}' for class '{$class_name}'. Please provide it manually.");
				}
			} else {
				// If the parameter is a class, recursively resolve it from the container.
				$dependencies[] = $this->make($type->getName());
			}
		}

		return $dependencies;
	}

	/**
	 * Records a message and optional exception in the container's log.
	 *
	 * If the `Aegis\Utilities\Debug` helper is enabled, the log entry will also
	 * be output to the browser console or server logs for immediate visibility.
	 *
	 * @param string $message   The error or informational message to record.
	 * @param mixed  $exception Optional. An exception object or other data to accompany the message.
	 *
	 * @return void
	 */
	private function log(string $message, $exception = null): void
	{
		$id = uniqid(static::class);
		$this->log[$id] = [$message, $exception];

		if (Debug::is_enabled()) {
			Debug::console_log($this->log[$id]);
		}
	}
}
