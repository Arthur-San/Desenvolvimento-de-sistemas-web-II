<!DOCTYPE html>
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

        <div class="container" style="padding-top: 40px;">
            <h2 style="padding-bottom: 20px; text-align: center; ">MAPA</h2>
            <hr width="80" style="background-color: red;">
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3483.8336275071015!2d-51.1861465491063!3d-29.169574582121673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951ea32c31f99fef%3A0x9ebc3708a92fba38!2sQI%20Faculdade%20%26%20Escola%20T%C3%A9cnica%20%7C%20Caxias%20do%20Sul!5e0!3m2!1spt-BR!2sbr!4v1612826578362!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>

        <div class="container" style="padding-top: 40px;">
            <h2 style="padding-bottom: 20px; text-align: center; "> CONTATO POR EMAIL</h2>
            <hr width="80" style="background-color: red;">
            <div class="row">
                <div class="col-md-12">
                   <form action="esqueci.php" method="post" autocomplete="off">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Nome</label>
                           <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu Nome">
                       </div>

                       <div class="form-group">
                           <label for="exampleInputEmail1">Endereço de email</label>
                           <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
                       </div>

                       <div class="form-group">
                           <label for="exampleFormControlSelect1">Selecione uma Categoria</label>
                           <select name="assunto" class="form-control" id="exampleFormControlSelect1">
                               <option>Comercial</option>
                               <option>Financeiro</option>
                               <option>RH</option>
                           </select>
                       </div>

                       <div class="form-group">
                           <label for="exampleFormControlTextarea1">Exemplo de textarea</label>
                           <textarea name="mensagem" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                       </div>
                       <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                   </form>
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