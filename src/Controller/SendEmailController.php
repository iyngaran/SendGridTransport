<?php
namespace SendGridTransport\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use SendGridTransport\Mail\Transport\SendGridTransport;

class SendEmailController extends AbstractActionController
{
    private $sendGridTransport;

    public function __construct(SendGridTransport $sendGridTransport)
    {
        $this->sendGridTransport = $sendGridTransport;
    }


    public function indexAction()
    {
        $message = new \SendGridTransport\Mail\Message();
        $body = '<strong>Hello...</strong>';
        $message->setBody($body);
        $message->setFrom(new \Zend\Mail\Address('iyngaran@parkwaylabs.com', 'Demina Martine'));
        $message->addTo(new \Zend\Mail\Address('iyngaran1155@gmail.com', 'Hello Iynga'));
        $message->setSubject('TestSubject -- 7');
        $message->setBodyText('Hello text');
        print('<pre>');
        print_r($this->sendGridTransport->send($message));
        print('<pre/>');
        exit;

        return [];
    }
}
