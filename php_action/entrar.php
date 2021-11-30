<?php
    //conexão com o banco
    require_once "db_connect.php";

    //sessão
    session_start();

    //botão enviar
    if(isset($_POST['btn-entrar'])):
        $erro = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);

        if(empty($login) or empty($senha)):
            $erro[] = "<script language='javascript' type='text/javascript'>alert('O campo usuário/senha devem ser preenchidos!');window.location.href='
            emprestimo.php'</script>";
        else:
            $sql = "SELECT email FROM usuario WHERE email = '$login'";
            $resultado = mysqli_query($connect, $sql);
            
            if(mysqli_num_rows($resultado) > 0):
                $senha = md5($senha);
                $sql = "SELECT * FROM usuario WHERE email = '$login' and senha = '$senha'";
                $resultado = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    $_SESSION['logado'] = true;
                    $_SESSION['id'] = $dados['id'];
                    header('Location: ../index.php');
                else:
                    $erro[] = "<script language='javascript' type='text/javascript'>alert('Usuário e senha não conferem');window.location.href='
                    login.php'</script>";
                    header('Location: ../login.php');
                endif;
            else:
                $erro[] = "<script language='javascript' type='text/javascript'>alert('Usuário inexistente!');</script>";
            endif;
        endif;
    endif;

?>