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
namespace Omega\Email\Exception;

/**
 * @use
 */
use RuntimeException;

/**
 * Email driver exception class.
 * 
 * The `EmailDriverException` class is part of the Omega CMS Email Package and 
 * extends the standard PHP RuntimeException. This exception is specifically 
 * designed to be thrown when there are issues related to the behavior or 
 * functionality of email drivers within the Omega CMS Email Package. It 
 * serves as a means to handle and identify exceptional cases that may 
 * occur during the execution of email driver operations.
 *
 * @category    Omega
 * @package     Omega\Email
 * @subpackage  Omega\Email\Exception
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class EmailDriverException extends RuntimeException
{
}