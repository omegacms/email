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
 * @use
 */
use Omega\Email\Exception\CompositionEmailException;
use Swift_Mailer;
use Swift_Message;

/**
 * Postmark driver class.
 * 
 * The `PostmarkDriver` class is a concrete implementation of the AbstractEmailDriver class 
 * within the Omega CMS Email Package. This class specifically integrates with the Postmark 
 * email service to send emails.
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
class PostmarkDriver extends AbstractEmailDriver
{
    /**
     * PPostmarkDriver class constructor.
     * 
     * @param  array $config Holds an array of configuration params.
     * @return void
     */
    public function __construct( array $config )
    {
        parent::__construct( $config );
    }

    /**
     * @inheritdoc
     * 
     * @return void 
     */
    public function send() : void
    {
        if ( ! isset( $this->getTo() ) ) {
            throw new CompositionEmailException(
                "Params 'to' required."
            );
        }

        if ( ! isset( $this->getText() ) && ! isset( $this->getHtml() )  ) {
            throw new CompositionEmailException(
                "Params 'text' or 'email' required."
            );
        }

        $fromName  = $this->getConfig( [ 'from' ][ 'name'  ] );
        $fromEmail = $this->getConfig( [ 'from' ][ 'email' ] );
        $subject   = $this->getSubject() ?? "Message from {$fromName}";
        $message   = ( new Swift_Message( $subject ) )
            ->setFrom( [ $fromEmail => $fromName ] )
            ->setTo( [ $this->getTo() ] );

        if ( isset( $this->getText() ) && ! isset( $this->getHtml() ) ) {
            $message->setBody( $this->getText(), 'text/plain' );
        }
        
        if ( ! isset( $this->getText() ) && isset( $this->getHtml() ) ) {
            $message->setBody( $this->getHtml(), 'text/html' );
        }

        if ( isset( $this->getText(), $this->getHtml() ) ) {
            $message
                ->setBody( $this->getHtml(), 'text/html' )
                ->setPart( $this->getText(), 'text/plain' );
        }

        $this->mailer()->send( $message );
    }

    /**
     * Initializes ans returns a Swift Mailer instrance configured for
     * the Postmark service.
     * 
     * @return Swift_Mailer Return an instance of Swift_Mailer.
     */
    private function mailer() : Swift_Mailer
    {
        if ( ! isset( $this->mailer ) ) {
            $transport    = new Transport( $this->getConfig( ['token' ] ) );
            $this->mailer = new Swift_Mailer( $transport);
        }

        return $this->mailer;
    }
}