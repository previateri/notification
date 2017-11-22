<?php
    namespace Notification;

    use PHPMailer\PHPMailer\PHPMailer;

    class Email{
        private $mail;

        
        public function __construct()
        {
            $this->mail = new PHPMailer();

        }

        public function enviaEmail()
        {
            echo "Email Enviado";
        }
    }