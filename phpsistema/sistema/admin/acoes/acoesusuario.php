<?php

    __DIR__ . "../../../vendor/autoload.php";

    $usuario = new Usuario();
    $objfn = new Funcoes();

    //Cadastrar
    if(isset($_POST["btCadastrar"])){
        if($usuario->queriInsert($_POST)== "ok"){
            header("Location:usuario.php");
        }else{
            echo "Não foi possivel cadastrar usuario, verifique se o email ja existe no sistema";
        }
    }

    //Editar
    if(isset($_POST["btAlterar"]))
    {
        try
        {
            if($usuario->queryUpdate($_POST) == "ok")
            {
                header("Location: ?acao=edit?func" . $objfn->base64($_POST["func"], 1));
            }
            else
            {
                echo "Não Editou";
            }

        }catch (Exception $exception)
        {
            echo "Erro: " . $exception;
        }

    }

    //Deletar
    if (isset($_GET["acao"]))
    {
        switch ($_GET["acao"]) {
            case "edit" :
                $func = $usuario->querySelecionaid($_GET["func"]);
                break;
            case "delet" :
                if ($usuario->queryDelete($_GET["func"]) == "ok") {
                    header('cliente.php');
                } else {
                    echo "erro ao deletar";
                }
                break;
        }
    }



