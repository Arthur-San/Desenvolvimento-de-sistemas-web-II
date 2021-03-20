<?php

    __DIR__ . "../../../vendor/autoload.php";

    $produto = new Produto();
    $objfn = new Funcoes();

    //Cadastrar
    if(isset($_POST["btCadastrar"]))
    {
        if($produto->inserirProduto($_POST) == "ok")
        {
            header("Location:produto.php");
        }
        else
        {
            echo "Não foi Possível";
        }
    }

    //Editar
    if (isset($_POST["btAlterar"])) {
        if ($produto->queryUpdate($_POST) == "ok") {
            header("Location: ?acao=edit?func" . $objfn->base64($_POST["func"], 1));
            header("Location:produto.php");
        } else {
            echo "erro ao alterar";
        }
    }

    //Deletar
    if (isset($_GET["acao"])) {
        switch ($_GET["acao"]) {
            case "edit" :
                $func = $produto->querySelecionaid($_GET["func"]);
                break;
            case "delet" :
                if ($produto->queryDelete($_GET["func"]) == "ok") {
                    header('Location:produto.php');
                } else {
                    echo "erro ao deletar";
                }
                break;
        }
    }



