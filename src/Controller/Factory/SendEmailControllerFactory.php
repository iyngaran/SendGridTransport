<?php
namespace SendGridTransport\Controller\Factory;

use SendGridTransport\Controller\SendEmailController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class SendEmailControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SendEmailController(
            $container->get(\SendGridTransport\Mail\Transport\SendGridTransport::class)
        );
    }
}
