<?php

    //Declaração de Variáveis
    $email = "teste@gmail.com";
    $senha = "1234a";

    $senha = sha1($senha . $email) ;


    // echo $senha . "<br>";


    //Verificar email e senha Login
    if($email == "teste@gmail.com" && $senha == "6a82f7a98de9fef57daae234649fb4c6ff511484")
    {
        echo "Logado com Sucesso";
    }
    else
    {
        echo "Verifique seu Usuário e Senha";
    }