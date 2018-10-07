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
    private $config;

    public function __construct(SendGridTransport $sendGridTransport, array $config)
    {
        $this->sendGridTransport = $sendGridTransport;
        $this->config = $config;
    }


    public function indexAction()
    {
        $message = new \SendGridTransport\Mail\Message();
        $body = '<strong>Hello :),</strong><BR/> The SendGridTransport is working now :)';
        $message->setBody($body);
        $message->setFrom(
            new \Zend\Mail\Address(
                $this->config['test-email']['from']['email'],
                $this->config['test-email']['from']['name']
            )
        );
        $message->addTo(
            new \Zend\Mail\Address(
                $this->config['test-email']['to']['email'],
                $this->config['test-email']['to']['name']
            )
        );
        $message->setSubject('Testing SendGridTransport - Iyngaran');
        $message->setBodyText('Hello, the SendGridTransport is working now :)');
        print('<pre>');
        print_r($this->sendGridTransport->send($message));
        print('<pre/>');

        return [];
    }
}
