<?php

    if(isset($_POST["enviar"]))
    {
        $nome = $_POST["nome"];
        $estado = $_POST["estado"];

        //Imagem
        $foto = $_FILES["foto"]["name"];
        $foto_tamanho = $_FILES["foto"]["size"];
        $foto_tipo = $_FILES["foto"]["type"];
        $md5 = md5( time() );
        $caminho = "imagem/";

        $mensagem = $_POST["mensagem"];

        if(empty($nome))
        {
            echo "nome em branco";
        }
        else if( strpos($foto_tipo, 'png') && $foto_tamanho < 1000000  )
        {
            move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho . $md5 . $foto =  $_FILES["foto"]["name"] );
        }
        else
            {
                echo "Verifique se o arquivo é png e menor que 1MG";
            }

            echo " <img width='100' src='imagem/" . $md5 . $_FILES["foto"]["name"] . " ' /> ";

    }





