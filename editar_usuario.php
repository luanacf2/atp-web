<?php
    //conexão
    include_once "php_action/db_connect.php";
    //verifica se esta logado
    include_once "php_action/autentica.php";

    //dados 
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM usuario WHERE id = '$id'";

    $resultado = mysqli_query($connect, $sql);

    $dados = mysqli_fetch_array($resultado);
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

    <title>Editar</title>
    

</head>
<body>
    
    <section>
    <h1 style="margin-left: 18vh; font: 5vh;">Editar Usuário</h1>
    <form  method="POST" name="form" action="php_action/edit_usuario.php" class="box">

        <input type="hidden" name="id-item" value="<?php echo $dados['id']; ?>">
                 
        <span>Alterar Nome:</span>
        <input type="text" id="name" name="nome" required value="<?php echo $dados['nome'];?>">
        <br>
                             
        <span>Alterar Sobrenome: </span>
        <input type="text" id="sobrenome" name="sobrenome" required value="<?php echo $dados['sobrenome'];?>">
        <br> 

        <span>Alterar Telefone: </span>
        <input type="text" id="telefone" name="telefone" required value="<?php echo $dados['telefone'];?>">
        <br>

        <span>Alterar E-mail: </span>
        <input type="email" id="email" name="email" required value="<?php echo $dados['email'];?>">
        <br>

        <span>Alterar Senha: </span>
        <input type="password" id="senha" name="senha" required value="<?php echo $dados['senha'];?>">              
        <br>

        <span>Repita sua senha: </span>
        <input type="password" id="rep_senha" name="rep_senha" required value="<?php echo $dados['rep_senha'];?>">              
        <br>

        <input type="submit" value="Atualizar Cadastro" id="editar" onclick="return validar()" name="btn-editar" class="bt">
        
        <a href="index.php" style="margin-top: 5px;">Voltar a Página Inicial</a>
    </section>
</body>
</html>