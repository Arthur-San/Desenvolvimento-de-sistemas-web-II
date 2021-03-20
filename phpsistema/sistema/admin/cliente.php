<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>

    <?php
        require_once "../../vendor/autoload.php";
        require_once "acoes/acoescliente.php";

        $cliente = new Cliente();
        $a =  new Usuario();
        $objfn = new Funcoes();

        session_start();

        if ($_SESSION["logado"] == "logar") {
            $a->verificaLogado($_SESSION["func"]);
        } else {
            header("Location:http://localhost/phpsistema/sistema/");
        }
    ?>


    <div class="container">
        <?php require_once "includes/menu.php"; ?>

        <h2>Cadastrar Clientes  </h2>

        <form method="post" action="" autocomplete="off">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome do Cliente</label>
                <input type="text" name="nome" value="<?=(isset($func["nome"]) ?  ($func["nome"]) : ("") )   ?>" class="form-control"  id="exampleFormControlInput1" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Estado</label>
                <select class="form-control" name="estado"  id="estado">
                    <?php
                        error_reporting(0);
                        foreach ($cliente->selecionaEstado() as $rst) {
                                if($rst["id"] == $func["estado"]):
                            ?>
                            <option  value="<?php echo $rst["id"];  ?>" selected><?php echo $rst["estado"];  ?></option>
                                <?php else : ?>
                                    <option  value="<?php echo $rst["id"];  ?>"><?php echo $rst["estado"];  ?></option>
                        <?php endif; } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Informações</label>
                <textarea class="form-control" name="mensagem"  id="exampleFormControlTextarea1" rows="3"> <?=(isset($func["mensagem"]) ?  ($func["mensagem"]) : ("") )  ?>  </textarea>
            </div>

            <input type="submit" class="btn btn-primary" name="<?= (isset($_GET["acao"]) == "edit" ? ("btAlterar") : ("btCadastrar") )  ?>" value="<?= (isset($_GET["acao"]) == "edit" ? ("Alterar") : ("Cadastrar") )  ?>">
            <input type="hidden" name="func" value="<?=  (isset($func["id"]) ? $objfn->base64($func["id"], 1) : " " )  ?>">

        </form>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
            </div>
        </div>

        <div id="result"></div>


        <?php require_once "includes/rodape.php"; ?>
    </div>
    <script>
        $(document).ready(function(){
            load_data();
            function load_data(query)
            {
                $.ajax({
                    url:"fecth.php",
                    method:"post",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }

            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>
</html>
