<?php
/**
 * Part of Omega CMS - Email Package
 *
 * @link       https://omegacms.github.io
 * @author     Adriano Giovannini <omegacms@outlook.com>
 * @copyright  Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

/**
 * @declare
 */
declare( strict_types = 1 );

/**
 * @namespace
 */
namespace Omega\Email;

/**
 * @use
 */
use Closure;
use Omega\Email\Driver\EmailDriverInterface;
use Omega\Email\Exception\EmailDriverException;
use Omega\Container\ServiceProvider\ServiceProviderInterface;

/**
 * Email factory class.
 * 
 * The `EmailFactory` class is a part of the Omega CMS Email Package and serves 
 * as a factory for creating instances of email drivers based on configuration 
 * parameters. It implements the ServiceProviderInterface to provide a standardized 
 * interface for service factories within the Omega CMS application.
 *
 * @category    Omega
 * @package     Omega\Email
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class EmailFactory implements ServiceProviderInterface
{
    /**
     * Email drivers.
     *
     * @var array $drivers Holds an array of email drivers.
     */
    protected array $drivers;

    /**
     * @inheritdoc
     *
     * @param  string  $alias  Holds the driver alias.
     * @param  Closure $driver Holds an instance of Closure.
     * @return $this
     */
    public function register( string $alias, Closure $driver ) : static
    {
        $this->drivers[ $alias ] = $driver;

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @param  array $config Holds an array of configuration.
     * @return EmailDriverInterface Return an instance of EmailDriverInterface.
     * @throws EmailDriverException if the driver is not defined or unrecognised.
     */
    public function bootstrap( array $config ) : EmailDriverInterface
    {
        if ( ! isset( $config[ 'type' ] ) ) {
            throw new EmailDriverException(
                'Email driver is not defined.'
            );
        }

        $type = $config[ 'type' ];

        if ( isset( $this->drivers[ $type ] ) ) {
            return $this->drivers[ $type ]( $config );
        }

        throw new EmailDriverException(
            'Email driver is unrecognised.'
        );
    }
}