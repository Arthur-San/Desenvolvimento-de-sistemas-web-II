<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once "../../vendor/autoload.php";
        require_once "acoes/acoesusuario.php";

        $usuario = new Usuario();
        $objfn = new Funcoes();


        session_start();
        if($_SESSION["logado"] == "logar")
        {
            $usuario->verificaLogado($_SESSION["func"]);
        }
        else
        {
            header("Location:http://localhost/phpsistema/sistema/");
        }

    ?>

    <div class="container">
        <?php require_once "includes/menu.php"; ?>

        <h2>Cadastrar Usuários  </h2>

        <form method="post" action="" autocomplete="off">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome do Usuário</label>
                <input type="text" name="nome" class="form-control" value="<?=(isset($func["nome"]) ?  ($func["nome"]) : ("") )   ?>"  placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email do Usuário</label>
                <input type="email" name="email" class="form-control" value="<?=(isset($func["email"]) ?  ($func["email"]) : ("") )   ?>" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Senha do Usuário</label>
                <input type="password" name="senha" class="form-control" value="<?=(isset($func["senha"]) ?  ($func["senha"]) : ("") )   ?>" placeholder="Senha">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Nível</label>
                <select name="nivel" class="form-control" id="exampleFormControlSelect1">
                    <option value="0">Padrão</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Informações</label>
                <textarea name="mensagem" class="form-control" id="exampleFormControlTextarea1" rows="3"> <?=(isset($func["mensagem"]) ?  ($func["mensagem"]) : ("") )   ?> </textarea>
            </div>

            <input type="submit" class="btn btn-primary" name="<?= (isset($_GET["acao"]) == "edit" ? ("btAlterar") : ("btCadastrar") )  ?>" value="<?= (isset($_GET["acao"]) == "edit" ? ("Alterar") : ("Cadastrar") )  ?>">
            <input type="hidden" name="func" value="<?=  (isset($func["id"]) ? $objfn->base64($func["id"], 1) : " " )  ?>">
        </form>

        <table class="table" style="margin-top: 30px;">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nível</th>
                <th scope="col">Mensagem</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contagem = 1;
            foreach($usuario->querySeleciona() as $rst )
            {
                ?>
                <tr>
                    <th scope="row"><?php echo $contagem++; ?></th>
                    <td> <?php echo $rst["nome"];  ?>  </td>
                    <td> <?php echo $rst["email"];  ?>  </td>
                    <td> <?php echo $rst["nivel"];  ?>  </td>
                    <td> <?php echo $rst["mensagem"];  ?>  </td>
                    <td><a class="btn btn-info" href="?acao=edit&func=<?= $objfn->base64($rst["id"], 1) ?>">Editar</a></td>
                    <td><a class="btn btn-danger" href="?acao=delet&func=<?= $objfn->base64($rst["id"], 1) ?>">Deletar</a></td>
                </tr>
            <?php  }    ?>
            </tbody>
        </table>

        <?php require_once "includes/rodape.php"; ?>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
