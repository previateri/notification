<?php
require  __DIR__ . '../../lib_ext/autoload.php';

use Notification\Email;

$configs = [
    'debug' => '2',
    'host' => 'endereco_servidor',
    'SMTPAuth' => true,
    'userMail' => 'email_disparador',
    'userPass' => 'senha_email',
    'SMTPSecure' => 'tls',
    'port' => 587,
    'userName' => 'Nome do sistema'
];

$novoEmail = new Email($configs);
$novoEmail->sendMail("Assunto", "Corpo do e-mail", "Email para resposta", "Nome para resposta", "Email Destino", "Nome destino");

 