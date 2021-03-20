<?php

    if(isset($_POST["enviar"])  )
    {
        $nome = strip_tags(trim( $_POST["nome"]) ); //rtrim e ltrim
        $estado = $_POST["estado"];
        $mensagem = strip_tags( trim($_POST["mensagem"]));

        if(empty($nome))
        {
            echo "<script> alert('Campo Nome em Branco');top.location.href='../cliente.php';</script>";
        }
        else if(empty($mensagem))
        {
            echo "<script> alert('Campo Mensagem em Branco');top.location.href='../cliente.php';</script>";
        }
        else
        {
            echo "<script> alert('Cadasto com Sucesso');top.location.href='../cliente.php';</script>";
            //  echo $nome . " " . $estado . " " .$mensagem;
        }
    }
    else
    {
        //Direciona Usuário caso não tenha clicado no Botão enviar
        header("Location:../cliente.php");
    }




