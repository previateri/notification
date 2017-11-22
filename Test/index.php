<?php
require  __DIR__ . '../../lib_ext/autoload.php';

use Notification\Email;

$configs = [
    'debug' => '2',
    'host' => 'mx1.hostinger.com.br',
    'SMTPAuth' => true,
    'userMail' => 'teste-composer@previateri.com',
    'userPass' => 'bananaboa12345',
    'SMTPSecure' => 'tls',
    'port' => 587,
    'userName' => 'Nome do sistema'
];

$novoEmail = new Email($configs);

$userName = "Felipe Previateri";
$userMail = "previateri@outlook.com";
$data = date("d/m/Y H:i");

$body = "<h1>Novo teste de envio de e-mail!</h1>";
$body .= "<p>Você esta recebendo este e-mail, pois o usuário {$userName} <small>({$userMail})</small> enviou um teste
    através do app Notification em {$data}.</p>";
$body .= "<p>Você pode responder a {$userName} diretamente clicando em responder este teste. </p><br><strong>OBRIGADO!</strong>";

$novoEmail->sendMail(
    "Novo Teste de envio de e-mail. - NOTIFICATION",
    $body,
    $userMail,
    $userName,
    "tito3762@gmail.com",
    "Thiago Previateri"
);

 