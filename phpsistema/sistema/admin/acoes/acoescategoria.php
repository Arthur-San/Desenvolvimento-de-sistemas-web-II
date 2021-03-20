<?php

    __DIR__ . "../../../vendor/autoload.php";

    $categoria = new Categoria();
    $objfn = new Funcoes();

    //Cadastrar
    if(isset($_POST["btCadastrar"]))
    {
        if($categoria->queryInsert($_POST) == "ok")
        {
            header("Location:categoria.php");
        }
        else
        {
            echo "Não foi possível cadastrar a Categoria";
        }
    }

    //Editar
    if(isset($_POST["btAlterar"]))
    {
        try
        {
            if($categoria->queryUpdate($_POST) == "ok")
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

    if (isset($_GET["acao"]))
    {
        switch ($_GET["acao"]) {
            case "edit" :
                $func = $categoria->querySelecionaid($_GET["func"]);
                break;
            case "delet" :
                if ($categoria->queryDelete($_GET["func"]) == "ok") {
                    header('categoria.php');
                } else {
                    echo "erro ao deletar";
                }
                break;
        }
    }



