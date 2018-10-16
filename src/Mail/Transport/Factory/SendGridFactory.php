<?php
/**
 * SendGridFactory class is the factory class for SendGridTransport
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
namespace SendGridTransport\Mail\Transport\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use SendGridTransport\Mail\Transport\SendGridTransport;
use SendGrid;
use SendGrid\Mail\Mail;

class SendGridFactory
{
    public function __invoke(ContainerInterface $container, array $options = null)
    {
        $config = $container->get('Config');
        $sendGrid = new SendGrid($config['mail']['sendgrid']['api_key']);
        $sendGridEmail = new \SendGrid\Mail\Mail();
        return new SendGridTransport($sendGrid, $sendGridEmail, $config);
    }
}
