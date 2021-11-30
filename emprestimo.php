<?php
     include_once 'php_action/db_connect.php';

     include_once "php_action/autentica.php";

     //select item
    if(isset($_GET['id'])):
        $id = mysqli_escape_string($connect, $_GET['id']);

        $sql = "SELECT * FROM item WHERE id = '$id'";

        $resultado = mysqli_query($connect, $sql);

        $dados = mysqli_fetch_array($resultado);
    endif;

    //select usuário
    if(isset($_SESSION['id'])):
        $id_usuario = mysqli_escape_string($connect, $_SESSION['id']);
        $sql1 = "SELECT * FROM usuario WHERE id = '$id_usuario'";
        $res = mysqli_query($connect,$sql1);
        $dd = mysqli_fetch_array($res);
    endif;
?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="icone.ico">
    <title>Meus Emprestimos</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Road+Rage&display=swap');
    *{
        margin: 0;
        padding: 0;
    }
    body{
        background-image: url('css/background.jpg');
    }
    h1{
        margin-left: 18vh;
        color: black;
        font-size: 8vh;
        font-family: 'Road Rage', cursive;
    }
    section{       
        width: 60vh;
        height: 80vh;
        background: linear-gradient(to right,hsl(276, 50%, 79%),#5a5aa5);
        border-radius: 8px;
        margin-left: 35vw;
        margin-right: 40vw;
        margin-top: 3vw;
        box-shadow: 2px 1px 56px 12px #000000;
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    span{
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 10px;
        display: flex;
        font-size: 1rem;
    }
    input{
        margin-top: 2vh;
        background: #cfd4e2;
        width: 40vh;
        height: 5vh;
        padding: 0 0.5rem;   
        outline: none;
        color: black;
        font-size: 1rem;
        border: 1px solid #170752;
        border-radius: 8px;
        font-family: Arial, Helvetica, sans-serif;
    }
    input[type="submit"]{
        cursor: pointer;
        width: 50%;
        margin-top: 2rem;
        border: none;
        border-radius: 32px;
        background: #09099b;
        color: white;
        font-size: 1.1rem;
        transition: all .3s ease-in-out ;   
    }

    section form input[type="submit"]:hover{
        background: #adbfc4;
    }
    </style>
</head>
<body>
<section>
        <h1>Emprestar</h1>
    <form  method="POST" name="form" action="php_action/emprestar.php" class="box">

        <input type="hidden" name="id-item" value="<?php echo $dados['id']; ?>">
                 
        <span>Nome Item:</span>
        <input type="text" id="name" name="nome_item" value="<?php echo $dados['nome_item'];?>">
        <br>
                             
        <span>Data Empréstimo: </span>
        <input type="date" id="emprestimo" name="emprestimo" required>
        <br> 

        <span>Data Devolução: </span>
        <input type="date" id="devolucao" name="devolucao" required >
        <br>
        <input type="hidden" name="id-usua" value="<?php echo $dd['id']; ?>">
        <span>Destinario: </span>
        <input type="text" id="nome_usua" name="nome_usua" value="<?php echo $dd['nome'];?> ">
        <br>

        <span>E-mail Destinario: </span>
        <input type="email" id="email" name="email" value="<?php echo $dd['email'];?>">              
        <br>       

        <input type="submit" value="Emprestar" name="btn-emprestar" class="bt">
        <a href="index.php" style="margin-top: 5px;">Voltar a Página Inicial</a>
    </form>
</section>
</body>
</html>