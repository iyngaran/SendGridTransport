<?php
namespace SendGridTransport\Mail\Transport;

use Zend\Mail\Transport\TransportInterface;
use Zend\Mail\Message;
use SendGrid;

class SendGridTransport implements TransportInterface
{
    private $config;
    /**
   * @var SendGrid
   */
    private $sendGrid;
    /**
     * @var SendGrid\Email
     */
    private $email;

    /**
     * The constructor to allocate an instance and initialize its private variables.
     *
     * @param  \SendGrid $sendGrid
     * @param  \SendGrid\Mail\Mail $sendGridEmail
     *
     * @param  array|\Zend\Config\Config|array $config
     */
    public function __construct(SendGrid $sendGrid, SendGrid\Mail\Mail $sendGridEmail, $config)
    {
        $this->sendGrid = $sendGrid;
        $this->email = $sendGridEmail;
        $this->config = $config;
    }

    /**
     * The function to send email message.
     *
     * @param  \Zend\Mail\Message $message
     * @return  \SendGrid\Response $res
     */
    public function send(Message $message)
    {
        $this->email->addTo($message->getTo()->current()->getEmail());
        $this->email->setFrom($message->getFrom()->current()->getEmail());
        $this->email->setSubject($message->getSubject());
        $this->email->addContent("text/plain", $message->getBodyText());
        $this->email->addContent("text/html", $message->getBody());
        $res = $this->sendGrid->send($this->email);
        return $res;
    }
}
