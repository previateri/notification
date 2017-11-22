<?php
    namespace Notification;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Email{
        private $mail = \stdClass::class;

        public function __construct(array $Config)
        {
            $this->mail = new PHPMailer(true);

            //Server settings
            $this->mail->SMTPDebug      = $Config['debug'];
            $this->mail->isSMTP();
            $this->mail->Host           = $Config['host'];          //'mx1.hostinger.com.br';
            $this->mail->SMTPAuth       = $Config['SMTPAuth'];      // true;
            $this->mail->Username       = $Config['userMail'];      //'teste-composer@previateri.com';
            $this->mail->Password       = $Config['userPass'];      //'bananaboa12345';
            $this->mail->SMTPSecure     = $Config['SMTPSecure'];    //'tls';
            $this->mail->Port           = $Config['port'];          //587;
            $this->mail->setLanguage('br');
            $this->mail->isHTML(true);
            $this->mail->CharSet = 'utf-8';
            $this->mail->setFrom($Config['userMail'], $Config['userName']);
        }

        public function sendMail($Subject, $Body, $ReplyEmail, $ReplyName, $AdressMail, $AdressName)
        {
            $this->mail->Subject = $Subject;
            $this->mail->Body = $Body;
            $this->mail->addReplyTo($ReplyEmail, $ReplyName);
            $this->mail->addAddress($AdressMail, $AdressName);

           try{
                $this->mail->send();
               //var_dump($this);
           }catch (Exception $e){
                echo "<hr>";
                echo "Erro ao enviar email: {$this->mail->ErrorInfo} -- {$e->getMessage()}";
               echo "<hr>";
           }
        }
    }