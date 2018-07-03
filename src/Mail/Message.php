<?php
/**
 * Message class for email service
 *
 * @category   Mail
 * @package    Application
 */
namespace SendGridTransport\Mail;

use Zend\Mail\Message as ZendMessage;

class Message extends ZendMessage
{
    /**
     * Content of the message body in text format
     *
     * @var String
     */
    private $bodyText;

    /**
     * Set the body text
     *
     * @return Message
     */
    public function setBodyText($bodyText)
    {
        $this->bodyText = $bodyText;
        return $this;
    }

    /**
     * Return the currently set message body
     *
     * @return String
     */
    public function getBodyText()
    {
        return $this->bodyText;
    }
}
