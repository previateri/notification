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
            $this->mail->SMTPDebug      = $Config['debug'];         //VALOR 2 ATIVA O DEBUG, 0 DESATIVA
            $this->mail->isSMTP();
            $this->mail->setLanguage('br');
            $this->mail->isHTML(true);
            $this->mail->CharSet = 'utf-8';

            $this->mail->Host           = $Config['host'];          //ENDERECO OU IP DO SERVIDOR DE E-MAILS
            $this->mail->SMTPAuth       = $Config['SMTPAuth'];      //TRUE
            $this->mail->Username       = $Config['userMail'];      //EMAIL RESPONSAVEL POR DISPARAR OS E-MAILS
            $this->mail->Password       = $Config['userPass'];      //SENHA DO EMAIL
            $this->mail->SMTPSecure     = $Config['SMTPSecure'];    //TIPO DE SEGURANCA, GERALMENTE TLS
            $this->mail->Port           = $Config['port'];          //NUMERO DA PORTA DE ENVIO, GERALMENTE 587
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