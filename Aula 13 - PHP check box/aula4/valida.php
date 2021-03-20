<?php

    if( isset($_POST["enviar"]) )
    {
        $usuario = strip_tags($_POST["usuario"]);
        $senha = strip_tags($_POST["senha"]);

        if(empty($usuario))
        {
                echo "Campos em Branco";
        }
        elseif(empty($senha))
        {
            echo "Campo senha em Branco";
        }

        else
            {
                if($usuario == "teste@gmail.com" && $senha == 1234)
                {
                    session_start(); //Start da Session

                    $usuario = $_SESSION["logar"] = TRUE;

                    echo "<script> alert('Logado com Sucesso');top.location.href='sistema/index.php';  </script>";

                }
                else
                    {
                        echo "<script> alert('Verique usuário senha');top.location.href='index.html';  </script>";
                    }
            }

    }