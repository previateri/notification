<?php
    require __DIR__ . '/lib_ext/autoload.php';

    use Notification\Email;

    $novoEmail = new Email;
    $novoEmail->enviaEmail();

 