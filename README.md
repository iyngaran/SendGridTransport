# SendGrid Transport Module for Zend Framework

[![Latest Stable Version](https://poser.pugx.org/iyngaran/send-grid-transport/v/stable)](https://packagist.org/packages/iyngaran/send-grid-transport)
[![Total Downloads](https://poser.pugx.org/iyngaran/send-grid-transport/downloads)](https://packagist.org/packages/iyngaran/send-grid-transport)
[![Latest Unstable Version](https://poser.pugx.org/iyngaran/send-grid-transport/v/unstable)](https://packagist.org/packages/iyngaran/send-grid-transport)
[![License](https://poser.pugx.org/iyngaran/send-grid-transport/license)](https://packagist.org/packages/iyngaran/send-grid-transport)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d8897c5f55de469484a6762d4283cc77)](https://www.codacy.com/app/iyngaran/SendGridTransport?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=iyngaran/SendGridTransport&amp;utm_campaign=Badge_Grade)

This module can be use as a transport to send transactional e-mail using SendGrid API in Zend Framework 2.

## INSTALLING

`composer require iyngaran/send-grid-transport`

After install follow one of these steps:

1) Copy the contents file `vendor/iyngaran/send-grid-transport/mail.global.php.dist` and put it in your `config/autoload/mail.global.php`. 

2) If this file does not exists in your application, just copy the entire file and place into your `config/autoload` removing the .dist extension.

Then add your SendGrid API Key. To get your API Key, [please visit](https://sendgrid.com/docs/Classroom/Send/How_Emails_Are_Sent/api_keys.html)

And also add the test email from-email address, name and to-email address, name.

```php
// config/autoload/mail.global.php

return [
    'mail' => [
        'sendgrid' => [
            'api_key' => 'YOUR_API_KEY',
        ]
    ],
    'test-email' => [
        'from' => [
            'name' => 'Iyngaran Iyathurai',
            'email' => 'test@iyngaran.info'
        ],
        'to' => [
            'name' => 'Your name',
            'email' => 'your email address'
        ]
    ]
];
```

After all, you must register `SendGridTransport` module in your `config/modules.config.php`.

```php
// config/modules.config.php
return [
    'Zend\ServiceManager\Di',
    ....
    'Application',
    'SendGridTransport'
];

```

## TESTING

Go to this Url - /send-grid-email to send a test email. 

## USAGE

### Example in a controller

```php
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
```

> Is strongly recommended to use the already registered service.

## CONTRIBUTING

You can contribute with this module suggesting improvements, making tests and reporting bugs. Use [issues](https://github.com/iyngaran/send-grid-transport/issues) for that.

## ERRORS 

Report errors opening [Issues](https://github.com/iyngaran/SendGridTransport/issues).
