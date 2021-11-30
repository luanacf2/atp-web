<?php
    //conexão banco
    require_once "db_connect.php";

    if(isset($_POST['btn-emprestar'])):
        $id_item = mysqli_escape_string($connect, $_POST['id-item']);
        $data_emp = mysqli_escape_string($connect, $_POST['emprestimo']);
        $data_dev = mysqli_escape_string($connect, $_POST['devolucao']);
        $id_usua = mysqli_escape_string($connect, $_POST['id-usua']);
        $email_usua = mysqli_escape_string($connect, $_POST['email']);

       

        $sql = "INSERT INTO emprestimo (id_item, data_emp, data_dev, id_usuario, email_usuario) VALUES ('$id_item', '$data_emp', '$data_dev', '$id_usua', '$email_usua')";

        if(mysqli_query($connect, $sql)):
            echo"<script language='javascript' type='text/javascript'>alert('Item emprestado com sucesso!');window.location.href='
            index.php'</script>";
            header('Location: ../index.php');
        else: 
            echo"<script language='javascript' type='text/javascript'>alert('Erro ao emprestar item!');window.location.href='
            emprestimo.php'</script>";
            header('Location: ../item.php');
        endif;
    endif;

?>