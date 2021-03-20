<?php

    ini_set ( 'default_charset' , 'utf8' ) ;

    if ( isset ( $_POST[ 'enviar' ] ) ) {

           $nome = htmlspecialchars(strip_tags($_POST[ 'nome' ])) ;
           $email = strip_tags(trim($_POST[ 'email' ])) ;
           $assunto = htmlspecialchars(strip_tags($_POST[ 'assunto' ])) ;
           $mensagem = htmlspecialchars(strip_tags($_POST[ 'mensagem' ])) ;

           if ( ( ! empty ( $_POST[ 'email' ] ))) {

                  $email = $_POST[ 'email' ] ;
                  if ( filter_var ( $email , FILTER_VALIDATE_EMAIL ) ) {
                         require 'Email.php';
                         $corpo = 'Seu Site - '  . $nome = $_POST[ 'nome' ] . "<br>" . $email = $_POST[ 'email' ] . " <br>" . $assunto = $_POST[ 'assunto' ] . "<br>" . $mensagem = $_POST[ 'mensagem' ] ;
                         $assunto = 'Site - Brian - ' ;
                         $razao = $_POST[ 'nome' ] ;
                         $email = Email::enviaNovoEmail ( $corpo , $assunto , $email , $razao ) ;
                  }
           }
           else {
                  echo "<script>alert('Email não Enviado!');top.location.href='contato.php';</script>" ;
           }
    }
unset ( $_POST );



