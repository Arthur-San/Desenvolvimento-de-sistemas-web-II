<?php

    __DIR__ . "../../../vendor/autoload.php";

    $estado = new Estado();
    $objfn = new Funcoes();

    //Cadastrar
    if(isset($_POST["btCadastrar"]))
    {
        if($estado->queryInsert($_POST) == "ok")
        {
            header("Location:estado.php");
        }
        else
        {
            echo "Não foi possível cadastrar o Estado";
        }
    }

    //Editar
    if(isset($_POST["btAlterar"]))
    {
        try
        {
            if($estado->queryUpdate($_POST) == "ok")
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
                $func = $estado->querySelecionaid($_GET["func"]);
                break;
            case "delet" :
                if ($estado->queryDelete($_GET["func"]) == "ok") {
                    header('estado.php');
                } else {
                    echo "erro ao deletar";
                }
                break;
        }
    }



