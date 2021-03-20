<?php
    include("conecta.php");
    if($_POST['modificar'])
    {
        if($_POST['senha'] == $_POST['confirma_senha'])
        {
            try
            {
                $senha=sha1($_POST['senha']);
                echo $idUser=(int)$_POST['cont'];
                $update=<<<update
                    UPDATE usuario 
                    SET    token='NULL',
                           senha=:senha
                    WHERE id=:id
update;
                $stm = $conexao->prepare($update);
                $stm->bindValue('senha', $senha);
                $stm->bindValue('id', $idUser);
                $retorno = $stm->execute();
                header('Location:index.php');
                exit;
            }
            catch (PDOException $e)
            {
                throw new Exception('Mensagem de Erro:'.$e->getMessage().' Código:'.$e->getCode());
            }

        }
        else
        {
            echo '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>Senhas Diferentes!</strong> 
                    </div>';
        }
    }
    if(!$_GET['token'] || !$_GET['cont'])
    {
        header('Location:https://www.contosdecontos.com.br');
        exit;
    }
    else
    {
        try
        {
            $sql=<<<consulta
                SELECT  *
                FROM	usuario
                WHERE   id=:id
consulta;
            $result=$conexao->prepare($sql);
            $result->bindValue('id',$_REQUEST['cont']);
            $result->execute();
            $reg=$result->fetch(PDO::FETCH_ASSOC);
            if($reg)
            {
                if($reg['token']!=$_GET['token'])
                {
                    header('Location:https://www.contosdecontos.com.br');
                    exit;
                }
            }
            else
            {
                header('Location:https://www.contosdecontos.com.br');
                exit;
            }

        }
        catch (PDOException $e)
        {
            throw new Exception('Mensagem de Erro:'.$e->getMessage().' Código:'.$e->getCode());
        }

    }
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="gb18030">
        <title>Recuperar senha - Sistema QI</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    </head>
    <body>

    <div class="container">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <h1>Recuperar senha</h1>
                <div class="login-fields">
                    <div class="field">
                        <label for="email">Digite a nova Senha:</label>
                        <input type="password" id="senha" name="senha" value="" placeholder="Digite Nova Senha" class="form-control" /><br>
                        <input type="password" id="confirma_senha" name="confirma_senha" value="" placeholder="Repita Senha digitada" class="form-control"/>
                        <input type="hidden"  name="cont" value="<?php echo $_REQUEST['cont']; ?>" />
                    </div>
                </div> <br>
                <div class="login-actions">
                    <input type="submit" class="button btn btn-primary btn-large" name="modificar" value="Modificar Senha">
                </div>
            </form>
        </div>
</body>

</html>
