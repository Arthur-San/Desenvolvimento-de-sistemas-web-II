
<?php

    $conexao = mysqli_connect("localhost", "root", "", "phpsistema");
    $saida = '';

    //Se existir o post query
    if(isset($_POST["query"]))
    {
        $pesquisa = mysqli_real_escape_string($conexao, $_POST["query"]);
        $query = "
                SELECT * FROM produto 
                WHERE nome LIKE '%".$pesquisa."%'
                OR preco LIKE '%".$pesquisa."%' 
                OR mensagem LIKE '%".$pesquisa."%' 
                ";
    }
    else
    {
        $query = "
                SELECT * FROM produto ORDER BY id";
    }

    //Resultado da pesquisa em result
    $result = mysqli_query($conexao, $query);


if(mysqli_num_rows($result) > 0)
{
    $saida .= '<div class="table-responsive">
                            <table class="table table bordered">
                                <tr>
                                    <th>Nome</th>
                                    <th>Preco</th>
                                    <th>Mensagem</th>
                                </tr>';
    while($row = mysqli_fetch_array($result))
    {
        $saida .= '
                    <tr>
                        <td>'.$row["nome"].'</td>
                        <td>'.$row["preco"].'</td>
                        <td>'.$row["mensagem"].'</td>
                    </tr>
                ';
    }
        echo $saida;
    }
    else
    {
        echo 'Sem Registro';
    }
?>