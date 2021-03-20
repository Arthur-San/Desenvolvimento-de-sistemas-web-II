<?php

    if( isset($_POST["enviar"])  )
    {
        $nome = $_POST["nome"];
        $estado = $_POST["estado"];
        $linguagens = $_POST["linguagens"];
        $mensagem = $_POST["mensagem"];

        if(empty($nome))
        {
            echo "<script> alert('Nome');top.location.href='../cliente.php';</script>";
        }
        elseif ($linguagens == null)
        {
            echo "<script> alert('Selecione uma Linguagem');top.location.href='../cliente.php';</script>";
        }
        elseif (empty($mensagem))
        {
            echo "<script> alert('Mensagem');top.location.href='../cliente.php';</script>";
        }
        else
            {
               echo $nome . " " . $estado . " " . $mensagem;

                for($i = 0; $i < count($linguagens); $i++ )
                {
                    echo $linguagens[$i];
                }


            }

    }
