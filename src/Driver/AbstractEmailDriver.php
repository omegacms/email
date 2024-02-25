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
 * Abstract email class.
 *
 * The AbstractEmailDriver class is part of the Omega CMS Email Package and serves as
 * an abstract implementation of the EmailDriverInterface. This abstract class provided
 * a foundational structure for creating specific email driver implementations by defining
 * common properties and methods.
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
abstract class AbstractEmailDriver implements EmailDriverInterface
{
    /**
     * Config array
     *
     * @var array $config Holds an array containing configuration settings for the email driver.
     */
    protected array $config;

    /**
     * The recipient's email address.
     *
     * @var string $to Holds the recipient's email address.
     */
    private string $to = '';

    /**
     * The subject of the email.
     *
     * @var string $subject Holds the subject of the email
     */
    private string $subject = '';

    /**
     * The plain text content of the email.
     *
     * @var string $text Holds the plain text content od the email.
     */
    private string $text = '';

    /**
     * The HTML content of the email.
     *
     * @var string $html Holds the HTML content of the email.
     */
    private string $html = '';

    /**
     * AbstractEmailDriver class constructor.
     *
     * @param  array $config Holds an array of configuration params.
     * @return void
     */
    public function __construct( array $config )
    {
        $this->config = $config;
    }

    /**
     * @inheritdoc
     *
     * @return string Return a string representing the recipient's email address.
     */
    public function getTo() : string
    {
        return $this->to;

    }

    /**
     * @inheritdoc
     *
     * @param  string $to Holds the recipient's email address.
     * @return $this
     */
    public function setTo( string $to ) : static
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @return string Return a string representing the email subject.
     */
    public function getSubject() : string
    {
        return $this->subject;
    }

    /**
     * @inheritdoc
     *
     * @param  string $subject Holds the email subject.
     * @return $this
     */
    public function setSubject( string $subject ) : static
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @return string Return a string representing the plain text content.
     */
    public function getText() : string
    {
        return $this->text;
    }

    /**
     * @inheritdoc
     *
     * @param  string $text Holds the plain text content.
     * @return $this
     */
    public function setText( string $text ) : static
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @return string Return a string representing the HTML content.
     */
    public function getHtml() : string
    {
        return $this->html;
    }

    /**
     * @inheritdoc
     *
     * @param  string $text Holds the html text content.
     * @return $this
     */
    public function setHtml( string $html ) : static
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @return void
     */
    abstract public function send() : void;
}
