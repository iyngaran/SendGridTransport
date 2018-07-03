<?php
namespace SendGridTransport\Mail\Transport\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use SendGridTransport\Mail\Transport\SendGridTransport;
use SendGrid;
use SendGrid\Mail\Mail;

class SendGridFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');
        $sendGrid = new SendGrid($config['mail']['sendgrid']['api_key']);
        $sendGridEmail = new \SendGrid\Mail\Mail();
        return new SendGridTransport($sendGrid, $sendGridEmail, $config);
    }
}
