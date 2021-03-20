<?php

    session_start();
    if(isset($_SESSION["logar"]))
    {
        unset($_SESSION);
        session_destroy();
        header("Location: ../index.html");

    }
