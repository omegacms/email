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
namespace Omega\Email\Driver;

/**
 * Email driver class.
 * 
 * The EmailDriverInterface is a PHP interface that outlines the methods required 
 * for implementing email functionality within the Omega CMS Email Package. This 
 * interface serves as a standardized contract for email drivers, ensuring a 
 * consistent structure for handling email-related operations.
 *
 * @category    Omega
 * @package     Omega\Email
 * @subpackage  Omega\Email\Driver
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
interface EmailDriverInterface
{
    /**
     * Get the recipient's email address.
     * 
     * @return string Return a string representing the recipient's email address.
     */
    public function getTo() : string;

    /**
     * Set the recioient's email address.
     * 
     * @param  string $to Holds the recipient's email address.
     * @return $this  
     */
    public function setTo( string $to ) : static;

    /**
     * Get the email subject.
     * 
     * @return string Return a string representing the email subject.
     */
    public function getSubject() : string;

    /**
     * Set the email subject.
     * 
     * @param  string $subject Holds the email subject.
     * @return $this
     */
    public function setSubject( string $subject ) : static;

    /**
     * Get the plain text content of the mail.
     * 
     * @return string Return a string representing the plain text content.
     */
    public function getText() : string;

    /**
     * Set the plain text content of the email.
     * 
     * @param  string $text Holds the plain text content.
     * @return $this
     */
    public function setText( string $text ) : static;

    /**
     * Get the HTML content of the mail.
     * 
     * @return string Return a string representing the HTML content.
     */
    public function getHtml() : string;

    /**
     * Set the html text content of the email.
     * 
     * @param  string $text Holds the html text content.
     * @return $this
     */
    public function setHtml( string $html ) : static;

    /**
     * Send the mail.
     * 
     * @return void
     */
    public function send() : void;
}