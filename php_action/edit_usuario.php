<?php
    
    //conexão
    require_once 'db_connect.php';

    //sessao
    session_start();

    session_start();
    //conexão
    require_once 'db_connect.php';

    if (isset($_POST['btn-editar'])):
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $telefone = mysqli_escape_string($connect, $_POST['telefone']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $senha = md5(mysqli_escape_string($connect, $_POST['senha']));
        $repsenha = md5(mysqli_escape_string($connect, $_POST['rep_senha']));

        $id = mysqli_escape_string($connect, $_SESSION['id']);

        $sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', telefone = '$telefone', email = '$email', senha = '$senha', rep_senha = '$repsenha' WHERE id = '$id'";

        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../index.php');
        else: 
            $_SESSION['mensagem'] = "Erro ao atualizar";
            header('Location: ../index.php');
        endif;
    endif;
?>