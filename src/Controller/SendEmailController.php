<?php
/**
 * SendEmailController class for testing the email service
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
