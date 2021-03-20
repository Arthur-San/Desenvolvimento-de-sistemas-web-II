<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    </head>
    <body>
        <div class="container">
            <?php  require_once "includes/menu.php"; ?>

            <h2> Cadastro de Produto </h2>

            <form method="post" action="acoes/cadproduto.php" autocomplete="off" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome do Produto</label>
                    <input type="text" name="nome"  class="form-control" id="exampleFormControlInput1" placeholder="Nome do Produto">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Estado:</label>
                    <select class="form-control" name="estado"  id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
 
                <div class="form-group">
                    <label for="exampleFormControlFile1">Selecione uma Imagem</label>
                    <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mensagem</label>
                    <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <script>
                        CKEDITOR.replace( 'mensagem' );
                    </script>
                </div>

                <button type="submit" name="enviar" class="btn btn-primary">Cadastro de Produto</button>

            </form>


            <?php require_once "includes/rodape.php"; ?>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>