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
        require_once "acoes/acoesestado.php";

        $estado = new Estado();
        $a = new Usuario();
        $objfn = new Funcoes();

        session_start();
        if($_SESSION["logado"] == "logar")
        {
            $a->verificaLogado($_SESSION["func"]);

            if($_SESSION["nivel"] == 1)
            {
               // echo "Usuário Admin";
            }
                else
                {
                    unset($_SESSION);
                    session_destroy();
                    header("Location:http://localhost/phpsistema/sistema/");
                }
            }
            else
            {
                header("Location:http://localhost/phpsistema/sistema/");
            }

    ?>

    <div class="container">
        <?php require_once "includes/menu.php"; ?>

        <h2>Cadastrar Estado  </h2>

        <form method="post" action="" autocomplete="off">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome do Estado</label>
                <input type="text" name="estado" value="<?=(isset($func["estado"]) ?  ($func["estado"]) : ("") )   ?>" class="form-control" id="exampleFormControlInput1" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Nível</label>
                <select name="ativo" class="form-control" id="exampleFormControlSelect1">
                    <option value="A">Ativado</option>
                    <option value="D">Desativar</option>
                </select>
            </div>

            <input type="submit" class="btn btn-primary" name="<?= (isset($_GET["acao"]) == "edit" ? ("btAlterar") : ("btCadastrar") )  ?>" value="<?= (isset($_GET["acao"]) == "edit" ? ("Alterar") : ("Cadastrar") )  ?>">
            <input type="hidden" name="func" value="<?=  (isset($func["id"]) ? $objfn->base64($func["id"], 1) : " " )  ?>">

        </form>

        <table class="table" style="margin-top: 30px;">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Estado</th>
                <th scope="col">Situação</th>
                <th scope="col">Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contagem = 1;
            foreach($estado->querySeleciona() as $rst )
            {
                ?>
                <tr>
                    <th scope="row"><?php echo $contagem++; ?></th>
                    <td> <?php echo $rst["estado"];  ?>  </td>
                    <td> <?php echo $rst["ativo"];  ?>  </td>
                    <td><a class="btn btn-info" href="?acao=edit&func=<?= $objfn->base64($rst["id"], 1) ?>">Editar</a></td>
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
