<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Compras online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
            <h2 style="padding-bottom: 20px; text-align: center; ">PRINCIPAIS PRODUTOS</h2>
            <hr width="80" style="background-color: red;">

            <div class="form-group">
                <label for="exampleInputPassword1">Pesquisar</label>
                <input type="text" class="form-control" name="search_text" id="search_text" placeholder="Pesquise um Produto">
            </div>

            <div id="result"></div>

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
            $(document).ready(function(){
                load_data();
                function load_data(query)
                {
                    $.ajax({
                        url:"pesquisa.php",
                        method:"post",
                        data:{query:query},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                    });
                }

                $('#search_text').keyup(function(){
                    var search = $(this).val();
                    if(search != '')
                    {
                        load_data(search);
                    }
                    else
                    {
                        load_data();
                    }
                });
            });
        </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>