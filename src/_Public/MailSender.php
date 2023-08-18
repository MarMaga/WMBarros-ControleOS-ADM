<?php

namespace Src\_Public;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailSender
{
    public static function EnviarEmail($msg)
    {
        try {

            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';

            $body = $msg;

            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';

            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPDebug = 0; // não envia echo
            $mail->SMTPAuth = true;

            $mail->Username = 'celomaga@gmail.com';
            $mail->Password = 'ccnesbxeofrhcbia';

            $mail->SetFrom('celomaga@gmail.com', 'ControleOS');
            //$mail->AddReplyTo('no-reply@mycomp.com', 'no-reply');
            $mail->Subject = 'ERRO do ControleOS';
            $mail->MsgHTML($body);

            $mail->AddAddress('celomaga@gmail.com', 'Marcelo Magalhães');

            //$mail->AddAttachment($fileName);
            $mail->send();

        } catch (Exception $ex) {
           // echo "Mensagem não enviada. Erro: " . $ex->getMessage();
        }
    }
}
?>