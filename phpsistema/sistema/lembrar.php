<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>RECUPERAR SENHA - SISTEMA QI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php
    if (isset($_POST['recuperar']))
    {
        include("conecta.php");
        $email = utf8_decode(addslashes(strip_tags(trim($_POST['email']))));
        $assunto = 'Recuperação de Senha - Admin ';
        // verifica se o e-mail está no cadastrado no sistem
        $select = "SELECT * 
                   FROM   usuario 
                   WHERE  email=:email ";
        try
        {
            $result = $conexao->prepare($select);
            $result->bindValue('email', $email);
            $result->execute();
            $reg=$result->fetch(PDO::FETCH_ASSOC);

            if($reg)
            {
                $idUser=$reg['id'];
                $nomeUser = $reg['nome'];
                $emailUser = $reg['email'];
                $senhaUser = $reg['senha'];
                //echo $token=md5($nomeUser.$emailUser.$usuarioUser.date('dmyHis'));
                //echo "<br/>";
                $token=md5(uniqid(rand(), true));
                $update=<<<update
                    UPDATE usuario 
                    SET    token='{$token}'
                    WHERE id={$idUser}
update;
                $stm = $conexao->prepare($update);
                $stm->bindValue('token', $token);
                $stm->bindValue('id', $idUser);
                $retorno = $stm->execute();

                require_once('envia-email/PHPMailer/class.phpmailer.php');

                $Email = new PHPMailer();
                $Email->SetLanguage("br");
                $Email->IsSMTP(); // Habilita o SMTP
                $Email->SMTPAuth = true; //Ativa e-mail autenticado
                $Email->Host = 'mail.contosdecontos.com.br'; // Servidor de   envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
                $Email->Port = '587'; // Porta de envio - verificar com o servidor
                $Email->Username = 'briandirect@contosdecontos.com.br'; //e-mail que será autenticado
                $Email->Password = '1nUrm4DhD'; // senha do email
                // ativa o envio de e-mails em HTML, se false, desativa.
                $Email->IsHTML(true);
                // email do remetente da mensagem
                $Email->From = 'briandirect@contosdecontos.com.br';
                // nome do remetente do email
                $Email->FromName = utf8_decode($email);
                // Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
                //$Email->AddReplyTo($email, 'Maicon');
                $Email->AddAddress($email,$nomeUser); // para quem será enviada a mensagem
                // informando no email, o assunto da mensagem
                $Email->Subject = utf8_decode($assunto);
                // Define o texto da mensagem (aceita HTML)
                $Email->Body=<<<body
                                Seguem os dados para acesso ao Gerenciador do Sistema   QI:<br /><br />
                                 <strong>Nome:</strong> $nomeUser<br />
                                 <strong>Email:</strong> $emailUser<br />
                                 <strong>Obs:</strong> Voc&ecirc; n&atilde;o precisa responder &agrave; este e-mail
                                 <br/>
                                 <a href="https://www.contosdecontos.com.br/turma/brian/sistemaqi/sistema/altera.php?token={$token}&&cont={$idUser}">Recuperação de Senha</a>

body;

            //.= "";
            // verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
            if (!$Email->Send())
            {
                echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro ao enviar!</strong> Houve um problema ao recuperar sua senha, contate o administrador.
                </div>';
                echo "Erro: " . $Email->ErrorInfo;
            }
            else
            {
                echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Sucesso!</strong> Uma mensagem com as informações de acesso foi enviada p/ o e-mail informado.
                </div>';
            }
        }
        else
        {
            echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro ao recuperar!</strong> O e-mail digitado não consta cadastrado em nosso sistema.
                </div>';
        }
    }
    catch (PDOException $e)
    {
        throw new Exception('Mensagem de Erro:'.$e->getMessage().' Código:'.$e->getCode());
    }
}// se clicar
?>

<div class="container">
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <h1>Recuperar senha</h1>
            <div class="login-fields">
                <p>Digite o e-mail cadastrado no sistema:</p>
                <div class="field">
                    <label for="email">Email Address:</label>
                    <input type="text" id="email" name="email" value="" placeholder="Email" class="form-control" required/>
                </div>
            </div> <br>
            <div class="login-actions">
                <input type="submit" class="button btn btn-primary btn-large" name="recuperar" value="Recuperar Senha">
            </div>
        </form>
</div>

</body>

</html>
