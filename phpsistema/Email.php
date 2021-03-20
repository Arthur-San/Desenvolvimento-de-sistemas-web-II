<?php

require './phpmail/class.phpmailer.php';

class Email extends PHPMailer
{

    public static
            function enviaNovoEmail($corpo, $assunto, $email, $razao) {
        $mail           = new PHPMailer;
        $mail->IsMail();
        $mail->Host     = "mail.contosdecontos.com.br";
        $mail->SMTPAuth = true;
        $mail->Port     = 587;
        $mail->Username = 'briandirect@contosdecontos.com.br';
        $mail->Password = '1nUrm4DhD';

        // Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->From     = "briandirect@contosdecontos.com.br";
        $mail->Sender   = "briandirect@contosdecontos.com.br";
        $mail->FromName = "Brian";

        // Define os destinatário(s)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        if (!empty($email))
        {
            $mail->AddAddress($email, $razao);
        }
	    $mail->AddCC('brianledze@gmail.com', 'Copias');
        $mail->AddBCC('brianledze@gmail.com', ' Copia Oculta');

        $mail->IsHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = $assunto . "https://www.contosdecontos.com.br";
        $mail->Body    = $corpo;
        $mail->AltBody = $corpo;

        $enviado = $mail->Send();

        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

        // Exibe uma mensagem de resultado
        if ($enviado)
        {
           $msg = "E-mail Enviado";

           echo "<script>
           alert( '$msg!' ); location = 'contato.php';
           </script>";
        }
        else
        {
            echo "Não foi possível enviar o e-mail. <br>";
            echo "Informações do erro: " . $mail->ErrorInfo;
        }
    }
}
