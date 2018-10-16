<?php
/**
 * SendEmailControllerFactory class is the factory class for the test controller SendEmailController
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
namespace SendGridTransport\Controller\Factory;

use SendGridTransport\Controller\SendEmailController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class SendEmailControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get("Config");
        return new SendEmailController(
            $container->get(\SendGridTransport\Mail\Transport\SendGridTransport::class),
            $config
        );
    }
}
