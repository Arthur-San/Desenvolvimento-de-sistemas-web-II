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

            <h2> Cadastro de Fornecedores </h2>

            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Endereço de email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select de exemplo</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="form-group form-check">

                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">PHP</label>
                    <br>
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Java</label>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Exemplo de textarea</label>
                    <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <script>
                        CKEDITOR.replace( 'mensagem' );
                    </script>
                </div>

                <button type="button" class="btn btn-primary">Cadastro de Fornecedor</button>

            </form>


            <?php require_once "includes/rodape.php"; ?>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>