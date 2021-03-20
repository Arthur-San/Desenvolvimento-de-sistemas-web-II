<?php

    $opcao = 5;

    switch ($opcao)
    {
        case 1 :
            echo "Cadastro de Clientes";
        break; // quebra

        case 2:
            echo "Cadastro de Fornecedores";
         break;

        case 3 :
            echo "Cadastro de Produtos";
        break;

        default:
            echo "Menu Inexistente";
    }