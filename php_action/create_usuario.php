<?php
    //conexão com o banco
    require_once "db_connect.php";

    if (isset($_POST['btn-cadastrar'])):
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $telefone = mysqli_escape_string($connect, $_POST['telefone']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $senha = md5(mysqli_escape_string($connect, $_POST['senha']));
        $rep_senha = md5(mysqli_escape_string($connect, $_POST['rep_senha']));

        $sql = "INSERT INTO usuario (nome, sobrenome, telefone, email, senha, rep_senha) VALUES ('$nome', '$sobrenome', '$telefone', '$email', '$senha', '$rep_senha')";

        if(mysqli_query($connect, $sql)):
            echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');</script>";
            header('Location: ../login.php');
        else: 
            echo"<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar!');</script>";
            header('Location: ../cadastro_usuario.php');
        endif;
    endif;
?>