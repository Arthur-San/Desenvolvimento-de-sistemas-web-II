<!DOCTYPE html>
<?php
    require_once "vendor/autoload.php";
    $produto = new Produto();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Compras online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <style>
            .tabcontent
            {
                display: none;
            }
            .tabcontet .ativa
            {
                display: block; display: show;
            }
            .imagem
            {
                padding-left: 30px;
            }
            .botoes
            {
                color: white;
                padding: 12px;
                text-align: center;
                background-color: red;
                border: none;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-2"> <img src="imagens/logo.png" class="img-fluid"> </div>
                <div class="col-md-10">
                    <?php require_once "menu/menu.php";?>
                </div>
            </div>
        </div>


       <div class="banner">
            <img src="imagens/baner.png" class="img-fluid">
       </div>

        <div class="container" style="padding-top: 40px;">
            <h2 style="padding-bottom: 20px; text-align: center; ">PRINCIPAIS PRODUTOS</h2>
            <hr width="80" style="background-color: red;">
            <div class="row">
                <?php
                 foreach($produto->listarProdutos() as $rst )
                 {
                ?>
                <div class="col-md-4">
                    <?php echo "<img width='400' class='img-fluid' src='sistema/admin/controller/imagem/".$rst["foto"]."'/>"?>
                    <p style="padding-top: 10px;">Nome do Produto: <?php echo $rst["nome"];  ?></p>
                    <p>Quantidade do Produto:</p>
                    <p>Preço do Produto:</p>
                    <p>Informações do Produto: <?php echo $rst["mensagem"];  ?></p>
                </div>
                <?php } ?>

            </div>
        </div>

        <div class="container" style="padding-top: 40px;">
            <h2 style="padding-bottom: 20px; text-align: center; ">GALERIA PRODUTOS</h2>
            <hr width="80" style="background-color: red;">
            <div class="row">
                <div class="col-md-12">

                    <div class="tabcontent ativa " id="galeria1" style="display: block" >

                        <img class="imagem" src="imagens/acesa.jpg" >
                        <img class="imagem" src="imagens/apagada.jpg" >
                        <img class="imagem" src="imagens/acesa.jpg" >

                    </div>
                    <div class="tabcontent" id="galeria2"  >

                        <img class="imagem" src="imagens/apagada.jpg" >
                        <img class="imagem" src="imagens/acesa.jpg" >
                        <img class="imagem" src="imagens/acesa.jpg" >

                    </div>
                    <div class="tabcontent " id="galeria3"   >

                        <img class="imagem" src="imagens/acesa.jpg" >
                        <img class="imagem" src="imagens/acesa.jpg" >
                        <img class="imagem" src="imagens/apagada.jpg" >

                    </div>

                    <p align="center">
                        <button class="botoes" onclick="prev();"> < </button>
                        <button class="botoes"  onclick="next();"> > </button>
                    </p>

                </div>
            </div>
        </div>


        <div class="container" style="padding-top: 40px;">
            <hr style="background-color: red; width: 100px; padding: 5px;">
            <div class="row" style="padding-top: 20px">
                <div class="col-md-3">
                    <h4> PROMOÇÃO </h4>
                    <img src="imagens/promo.png" class="img-fluid">
                    <p style="color: #b83767;"> Compras online Promoções </p>
                    <p> Publicação em : 18/11/2020 </p>
                </div>
                <div class="col-md-2">
                    <h4> LINKS RÁPIDOS </h4>
                    <p> HOME </p>
                    <p> EMPRESA </p>
                    <p> PRODUTOS </p>
                    <p> CONTATO </p>
                </div>
                <div class="col-md-2">
                    <h4> DISPOSITIVOS </h4>
                    <p> Mobile </p>
                    <p> Web </p>
                    <p> Desktop </p>
                    <p> Chat </p>
                </div>
                <div class="col-md-2">
                    <h4> CATEGORIAS </h4>
                    <p> Mobile </p>
                    <p> Web </p>
                    <p> Desktop </p>
                    <p> Chat </p>
                </div>
                <div class="col-md-3">
                    <h4>INFORMAÇÕES DE CONTATO</h4>
                    <p> Número: 000 - Bairro: Centro - RUA: Centro   </p>
                    <p>Telefone: 0000 00 0000</p>
                    <p>Email: contato@comprasonline.com.br </p>
                </div>
            </div>
        </div>

        <script>
            var a = 1;
            $("#galeria1").show();

            function next() {
                if (a < 3) {
                    $(".tabcontent").hide();
                    a++;
                    $("#galeria" + (a)).show();
                }
            }

            function prev() {
                if (a > 1) {
                    $(".tabcontent").hide();
                    a--;
                    $("#galeria" + (a)).show();
                }
            }
        </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>