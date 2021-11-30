<?php
     include_once "php_action/db_connect.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" type="imagex/png" href="icone.ico">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Projeto Coisas Emprestadas</title>
</head>
<body>

<header>
    <div>
        <h1>Projeto Coisas Emprestadas</h1>
        <p class="inicio">Fundamentos de Programação Web</p>
    </div>
</header>
    <section>
        <h2>Faça seu Login!!</h2>
        <form action="php_action/entrar.php" method="POST">

        <label for="name">
            <span>Usuário</span>
            <input type="email" id="login" name="login" required placeholder="Digite seu e-mail">
            <span class="error"></span>
        </label>

        <label for="password">
            <span>Senha</span>
            <input type="password" id="password" name="senha" placeholder="Digite sua senha">
        </label>

        <input type="submit" value="Entrar" id="entrar" name="btn-entrar" >   
        </form>
        <p>Realize seu cadastro!!</p>

         <input type="button" href="cadastro_usuario.php" onclick="window.location.href='cadastro_usuario.php'" name="cadastro"value="Cadastre-se" class="bt">
    </section>
</body>
</html>