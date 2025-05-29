<?php
/**
 * Registerable Interface
 *
 * Defines the interface for registerable services in the dependency injection container.
 *
 * Responsibilities:
 * - Provides a method for registering services with the container
 *
 * @package    Aegis\Container\Interfaces
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this doc update.
 */

declare( strict_types=1 );

namespace Aegis\Container\Interfaces;

use Aegis\Container\Container;

/**
 * Registerable Interface
 *
 * @since 1.0.0
 */
interface Registerable {

    /**
     * Registers services with the container.
     *
     * @since 1.0.0
     *
     * @param Container $container The container instance.
     */
    public function register( Container $container ): void;

}
