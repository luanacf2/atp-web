<?php
    include_once "php_action/db_connect.php";

    //verifica se esta logado
    include_once "php_action/autentica.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cad_item.css">
    <link rel="shortcut icon" type="imagex/png" href="icone.ico">
    <title>Cadastro Item</title>
</head>
<body>
    <section>
        <h1>Cadastro Item</h1>
            <form action="php_action/create_item.php" method="POST">
            <span>Nome item:</span>
            <input type="text" id="nome_item" name="nome_item" required placeholder="Digite o nome do item">
            <br>
            <span>Descrição:</span>
            <textarea type="text" id="descricao" name="descricao" required placeholder="Faça uma descrição do item"></textarea>
            <br>
            <input type="submit" value="Cadastrar" name="btn-item">
            <a href="index.php" style="margin-top: 5px;">Voltar a Página Inicial</a>
        </form>

    </section>
    
</body>
</html>
