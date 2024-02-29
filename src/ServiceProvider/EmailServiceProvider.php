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
namespace Omega\Email\ServiceProvider;

/**
 * @use
 */
use Omega\Email\EmailFactory;
use Omega\Email\Driver\PostmarkDriver;
use Omega\Container\ServiceProvider\AbstractServiceProvider;
use Omega\Container\ServiceProvider\ServiceProviderInterface;

/**
 * Email service provider class.
 * 
 * The `EmailServiceProvider` class is a service provider within the Omega 
 * CMS Email Package, responsible for registering and providing email-related 
 * services to the Omega CMS application. It extends the AbstractServiceProvider 
 * class and implements the ServiceProviderInterface.
 *
 * @category    Omega
 * @package     Omega\Email
 * @subpackage  Omega\Email\ServiceProvider
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class EmailServiceProvider extends AbstractServiceProvider
{
    /**
     * @inheritdoc
     *
     * {@inheritdoc}
     *
     * @return string Return the service name as a string.
     */
    protected function name() : string
    {
        return 'email';
    }

    /**
     * @inheritdoc
     *
     * {@inheritdoc}
     *
     * @return mixed Return the service factory or a callback function.
     */
    protected function factory() : ServiceProviderInterface
    {
        return new EmailFactory();
    }

    /**
     * @inheritdoc
     *
     * {@inheritdoc}
     *
     * @return array Return an associative array where keys are driver names and values are factory callbacks.
     */
    protected function drivers() : array
    {
        return [
            'postmark' => function ( $config ) {
                return new PostmarkDriver( $config );
            },
        ];
    }
}
