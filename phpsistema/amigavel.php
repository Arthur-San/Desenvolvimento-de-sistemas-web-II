<?php
    $url = (isset ($_GET['url'])) ? $_GET['url'] : 'home';

    $file = "$url.php";

    if (file_exists($file)) {
        include($file);
    } else {
        echo "Desculpe... Esta página não existe.";
        header("http://localhost/phpsistema/home");
    }