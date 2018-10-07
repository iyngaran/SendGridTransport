<?php
/**
 * Message class for email service
 *
 * PHP version 7.1
 *
 * @category  PHP
 * @package   Iyngaran_SendGridTransport
 * @author    Iyathurai Iyngaran <dev@iyngaran.info>
 * @copyright 2005-2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-http/blob/master/LICENSE.md New BSD License
 * @link      https://github.com/iyngaran/SendGridTransport
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
