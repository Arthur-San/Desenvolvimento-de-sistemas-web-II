<?php

    //Decarar as Variáveis
    $opcao = 2;
    $usuario = "aula";
    $senha = "123a";

    switch ($opcao)
    {
        case 1:
            echo "Digite seu Usuário e Senha Para Castrar Clientes" . "<br>";
            if($usuario == "aula" && $senha == "123a")
            {
                    echo "Bem Vindo ao Cadastro de Clientes";
            }
            else
            {
                echo "Verifique usuário e senha";
            }
            break;
        case 2:
            echo "Digite Usuário e senha Para Castrar os Fornecedores" . "<br>";
            if($usuario == "aula" && $senha == "123a")
            {
                echo "Bem Vindo ao Cadastro de Fornecedores";
            }
            else
            {
                echo "Verifique usuário e senha";
            }
            break;
        case 3:
            echo "Digite Usuário e senha Para Castrar os Produtos" . "<br>";
            if($usuario == "aula" && $senha == "123a")
            {
                echo "Bem Vindo ao Cadastro de Produtos";
            }
            else
            {
                echo "Verifique usuário e senha";
            }
            break;

        default:
            echo "Menu Inválido";

    }