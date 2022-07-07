<?php
require_once '../vendor/autoload.php';

try {

// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.yandex.ru', 465, 'ssl'))
        ->setUsername('olgawlpeh@yandex.ru')
        ->setPassword('********')
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['olgawlpeh@yandex.ru' => 'olgawlpeh@yandex.ru'])
        ->setTo(['p3shkowao@yandex.ru'])
        ->setBody('Here is the message itself')
        ->attach(Swift_Attachment::fromPath('test.php'))
    ;

// Send the message
    $result = $mailer->send($message);
    var_dump(['res' => $result]);
} catch (Exception $e) {
    var_dump($e->getMessage());
    echo '<pre>' . print_r($e->getTrace(), 1);
}
