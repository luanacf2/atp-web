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
    <link rel="stylesheet" href="css/estilo2.css">

    <script type="text/javascript">
        function validar(){
            var senha = form.senha.value;
            var rep_senha = form.rep_senha.value;

            if(senha == "" || senha.length <= 5){
                alert("Preencha o campo senha com no mínimo 6 caracteres");
                form.senha.focus();
                return false;
            }

            if(rep_senha == "" || rep_senha.length <= 5){
                alert("Preencha o campo repetir senha com no mínimo 6 caracteres idênticos ao do campo senha");
                form.rep_senha.focus();
                return false;
            }

            if(senha != rep_senha){
                alert("Senhas Diferentes!");
                form.rep_senha.focus();
                return false;
            }
        }

    </script>

    <title>Cadastro</title>
    

</head>
<body>
    
    <section>
    <h1>Cadastro</h1>
    <form  method="POST" name="form" action="php_action/create_usuario.php" class="box">
                 
        <span>Nome:</span>
        <input type="text" id="name" name="nome" required placeholder="Nome">
        <br>
                             
        <span>Sobrenome: </span>
        <input type="text" id="sobrenome" name="sobrenome" required placeholder="Sobrenome">
        <br> 

        <span>Telefone: </span>
        <input type="text" id="number" name="telefone" required placeholder="Telefone">
        <br>

        <span>E-mail: </span>
        <input type="email" id="email" name="email" required placeholder="E-mail">
        <br>

        <span>Senha: </span>
        <input type="password" id="senha" name="senha" required placeholder="Senha">              
        <br>

        <span>Repita sua senha: </span>
        <input type="password" id="rep_senha" name="rep_senha" required placeholder="Repita sua Senha">              
        <br>

        <input type="submit" value="Cadastrar" id="cadastrar" onclick="return validar()" name="btn-cadastrar" class="bt">
    
        <a href="login.php" style="margin-top: 5px;">Voltar a Página Inicial</a>
    </section>
</body>
</html>