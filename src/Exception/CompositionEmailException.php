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
use InvalidArgumentException;

/**
 * Composition email exception class.
 * 
 * The `CompositionEmailException`''''' class is part of the Omega CMS Email Package and 
 * extends the standard PHP InvalidArgumentException. This exception is specifically 
 * designed to be thrown when there are issues related to the composition of email 
 * messages. It serves as a way to handle and identify exceptional cases during the 
 * process of creating or setting up email content.
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
class CompositionEmailException extends InvalidArgumentException
{
}