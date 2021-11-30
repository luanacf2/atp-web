<?php
    //conexão banco
    require_once "db_connect.php";

    if(isset($_POST['btn-item'])):
        $nome_item = mysqli_escape_string($connect, $_POST['nome_item']);
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);

        $sql = "INSERT INTO item (nome_item, descricao) VALUES ('$nome_item','$descricao')";

        if(mysqli_query($connect, $sql)):
            echo"<script language='javascript' type='text/javascript'>alert('Item Cadastrado com sucesso!');</script>";
            header('Location: ../item.php');
        else: 
            echo"<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar item!');</script>";
            header('Location: ../login.php');
        endif;
    endif;
?>