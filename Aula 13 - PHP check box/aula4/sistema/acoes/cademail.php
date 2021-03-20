<?php

    if( isset($_POST["enviar"]) )
    {
        $email = strip_tags(trim($_POST["email"]));
        $assunto = strip_tags(trim($_POST["assunto"]));
        $mensagem = $_POST["mensagem"];

        if(empty($email))
        {
            echo "<script>  alert('Preecha o email sem espaços');top.location.href='../email.php';  </script>";
        }
        elseif (empty($assunto))
        {
            echo "<script>  alert('Preecha o assunto sem espaços');top.location.href='../email.php';  </script>";
        }
        elseif (empty($mensagem))
        {
            echo "<script>  alert('Preecha a mensagem');top.location.href='../email.php';  </script>";
        }
        else
            {
                mail($email,$assunto,$mensagem);
                unset($_POST);
            }
    }
    else
        {
            unset($_POST);
            header("Location:../email.php");
        }
