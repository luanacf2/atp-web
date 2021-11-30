<?php
    include_once "php_action/db_connect.php";
    //verifica se está logado
    include_once "php_action/autentica.php";

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="shortcut icon" type="imagex/png" href="icone.ico">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Special+Elite&display=swap');

    *{
        margin: 0;
        padding: 0;
    }
    body{
        background-image: url('css/background.jpg');
    }
    h3{
        font-family: 'Special Elite', cursive;
    }
    </style>
    <title>Itens</title>
</head>
<body>
<div class="row">
    <div class="container">
        <h3 class="light" style="color: #4B0082;">Itens</h3>
        <table class="item">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Descrição:</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM item";
                    $resultado = mysqli_query($connect, $sql);
                    while($dados = mysqli_fetch_array($resultado)):

                ?>
                <tr>
                    <td><?php echo $dados['nome_item']; ?></td>
                    <td><?php echo $dados['descricao']; ?></td>
                

                    <td><a href="emprestimo.php?id=<?php echo $dados['id']; ?>" class="btn purple"> Emprestar </a></td>
                  
                </tr>
                <?php endwhile; ?>
            </tbody>
    
        </table>
        <br>
        <a href="cadastro_item.php" class="btn purple">Adicionar Item</a>
        <a href="index.php" class="btn purple">Voltar a página inicial</a>
    </div>
    
</body>
</html>