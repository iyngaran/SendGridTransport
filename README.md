# SendGrid Transport Module for Zend Framework


[![Latest Stable Version](https://poser.pugx.org/iyngaran/send-grid-transport/v/stable)](https://packagist.org/packages/iyngaran/send-grid-transport)
[![Total Downloads](https://poser.pugx.org/iyngaran/send-grid-transport/downloads)](https://packagist.org/packages/iyngaran/send-grid-transport)
[![Latest Unstable Version](https://poser.pugx.org/iyngaran/send-grid-transport/v/unstable)](https://packagist.org/packages/iyngaran/send-grid-transport)
[![License](https://poser.pugx.org/iyngaran/send-grid-transport/license)](https://packagist.org/packages/iyngaran/send-grid-transport)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d8897c5f55de469484a6762d4283cc77)](https://www.codacy.com/app/iyngaran/SendGridTransport?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=iyngaran/SendGridTransport&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b3aed2e68b4849e9bbb91d776089bd46)](https://www.codacy.com/app/andrecardosodev/send-grid-transport?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=iyngaran/send-grid-transport&amp;utm_campaign=Badge_Grade)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/b3aed2e68b4849e9bbb91d776089bd46)](https://www.codacy.com/app/andrecardosodev/send-grid-transport?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=iyngaran/send-grid-transport&amp;utm_campaign=Badge_Coverage)


This module can be use as a transport to send transactional e-mail using SendGrid API in Zend Framework 2.


## INSTALLING

`composer require iyngaran/send-grid-transport`

After install follow one of these steps:

1) Copy the contents file `vendor/iyngaran/send-grid-transport/mail.global.php.dist` and put it in your `config/autoload/mail.global.php`. 

2) If this file does not exists in your application, just copy the entire file and place into your `config/autoload` removing the .dist extension.

Then put your SendGrid API Key. To get your API Key, please visit https://sendgrid.com/docs/Classroom/Send/How_Emails_Are_Sent/api_keys.html


```php
// config/autoload/mail.global.php

return array(
    'mail' => array(
        'sendgrid' => array(
            'api_key' => 'YOUR_API_KEY',
        )
    )
);
```

After all, you must register `SendGridTransportModule` in your `config/application.config.php`.

```php
// config/application.config.php
return [
    'modules' => [
        'YourPreviousModules',
        'SendGridTransportModule'
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            'config/autoload/{{,*.}global,{,*.}local}.php',
            'module/{*}/config/autoload/{{,*.}global,{,*.}local}.php',
        ],
    ]
];
```

## USAGE

### Via Service

By default, when the **SendGridTransportModule** is loaded a service is registered and ready to use.

```php
// In a Controller
$sendGridTransport = $this->getServiceLocator()->get('SendGridTransport');
```

#### Full example with service

```php
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail;

class SomeController extends AbstractActionController
{
    public function someAction()
    {
        $mail = new Mail\Message();
        $mail->setBody('This is the text of the email.');
        $mail->setFrom(new Mail\Address('test@example.org', 'Sender\'s name'));
        $mail->addTo(new Mail\Address('some@address.com', 'User Name'));
        $mail->setSubject('TestSubject');

        $sendGridTransport = $this->getServiceLocator()->get('SendGridTransport');
        $sendGridTransport->send($mail);

        return new ViewModel();
    }
}
```

### Directly

If you need more control, you can use the library anywhere you want.

```php
use SendGrid;
use SendGridTransportModule\SendGridTransport;

class SomeControllerOrServiceOrHelper 
{
    public function someMethod()
    {
        $mail = new Mail\Message();
        $mail->setBody('This is the text of the email.');
        $mail->setFrom(new Mail\Address('test@example.org', 'Sender\'s name'));
        $mail->addTo(new Mail\Address('some@address.com', 'User Name'));
        $mail->setSubject('TestSubject');

        $sendGrid = new SendGrid('YOUR_API_KEY');
        $sendGridEmail = new SendGrid\Email();
        $sendGridTransport = new SendGridTransport($sendGrid, $sendGridEmail);

        $sendGridTransport->send($mail);
    }
}
```

> Is strongly recommended to use the already registered service.



## CONTRIBUTING

You can contribute with this module suggesting improvements, making tests and reporting bugs. Use [issues](https://github.com/iyngaran/send-grid-transport/issues) for that.


## LICENSE

[MIT](https://github.com/iyngaran/send-grid-transport/blob/master/LICENSE)


## ERRORS 

Report errors opening [Issues](https://github.com/iyngaran/send-grid-transport/issues).
