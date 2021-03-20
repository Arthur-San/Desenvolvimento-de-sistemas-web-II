<?php

    __DIR__ . "../../../vendor/autoload.php";

    $cliente = new Cliente();
    $objfn = new Funcoes();

    //Cadastrar
    if (isset($_POST["btCadastrar"])) {
        if ($cliente->queryInsert($_POST) == "ok") {
            header("Location:http://localhost/phpsistema/sistema/admin/cliente.php");
        } else {
            echo "Não foi possível Realizar o cadastro";
        }
    }

    //Editar
    if (isset($_POST["btAlterar"])) {
        if ($cliente->queryUpdate($_POST) == "ok") {
            header("Location: ?acao=edit?func" . $objfn->base64($_POST["func"], 1));

        } else {
            echo "erro ao alterar";
        }
    }//Editar
if (isset($_POST["btAlterar"])) {
    if ($cliente->queryUpdate($_POST) == "ok") {
        header("Location: ?acao=edit?func" . $objfn->base64($_POST["func"], 1));

    } else {
        echo "erro ao alterar";
    }
}

//Deletar
if (isset($_GET["acao"])) {
    switch ($_GET["acao"]) {
        case "edit" :
            $func = $cliente->querySelecionaid($_GET["func"]);
            break;
        case "delet" :
            if ($cliente->queryDelete($_GET["func"]) == "ok") {
                header('Location:http://localhost/phpsistema/sistema/admin/cliente.php');
            } else {
                echo "erro ao deletar";
            }
            break;
    }
}


//Deletar
    if (isset($_GET["acao"])) {
        switch ($_GET["acao"]) {
            case "edit" :
                $func = $cliente->querySelecionaid($_GET["func"]);
                break;
            case "delet" :
                if ($cliente->queryDelete($_GET["func"]) == "ok") {
                    header('Location:http://localhost/phpsistema/sistema/admin/cliente.php');
                } else {
                    echo "erro ao deletar";
                }
                break;
        }
    }



