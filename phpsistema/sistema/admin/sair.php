<?php
    require_once "../../vendor/autoload.php";

    $a = new Usuario();
    session_start();

    if($_SESSION["logado"] == "logar")
    {
        $a->deslogarUsuarios();
    }

