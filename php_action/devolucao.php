<?php
    session_start();
    //conexão
    require_once 'db_connect.php';

    if (isset($_POST['btn-devolver'])):
    
        $id_emp = mysqli_escape_string($connect, $_POST['devolver']);

        $sql = "DELETE FROM emprestimo WHERE id_emp ='$id_emp'";

        if(mysqli_query($connect, $sql)):
            header('Location: ../index.php');
        else: 
            header('Location: ../index.php');
        endif;
    endif;
?>