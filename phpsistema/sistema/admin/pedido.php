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

        $cliente = new Cliente();
        $usuario = new Usuario();

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

        <h2>Cadastrar Pedidos  </h2>

        <form method="post" action="" autocomplete="off">
            <div class="form-group">
                <label for="exampleFormControlInput1">Pedido</label>
                <input type="text" name="pedido" class="form-control" id="exampleFormControlInput1" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Informações</label>
                <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" name="btCadastar" class="btn btn-primary">Cadastrar Cliente</button>
        </form>

        <table class="table" style="margin-top: 30px;">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Mensagem</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $contagem = 1;
                foreach($cliente->querySeleciona() as $rst )
                {
            ?>
            <tr>
                <th scope="row"><?php echo $contagem++; ?></th>
                <td> <?php echo $rst["nome"];  ?>  </td>
                <td> <?php echo $rst["mensagem"];  ?>  </td>
                <td>  <button type="button" class="btn btn-info">Editar</button>   </td>
                <td>  <button type="button" class="btn btn-danger">Deletar</button>  </td>
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
