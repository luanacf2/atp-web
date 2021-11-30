<?php
    //conexao 
    require_once "php_action/db_connect.php";

    //verifica se esta logado
    include_once "php_action/autentica.php";
    

    //verificação
    if(!isset($_SESSION['logado'])):
        header('Location: ../login.php');
    endif;
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" type="imagex/png" href="icone.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <title>Página Inicial</title>
</head>
<body>
    <header style="margin-top: 0vh;">      
    
        
        <h3 style="margin-top: 0vh; font-size: 6vh; margin-left: 3vh; padding: 5px;"> Seja Bem-vindo(a) <?php echo $dados['nome']," ", $dados['sobrenome']?></h3>
        <div class="menu">
            <a href="item.php">Itens</a>
            <a href="editar_usuario.php">Editar Conta</a>
            <a href="php_action/logout.php">Sair</a>
        </div>
    </header>

    <div class="row">
    <div class="container">
        <h4 class="light" style="color: #4B0082;">Itens Emprestados</h4>
        <table class="item">
            <thead>
                <tr>
                    <th>Nome item</th>
                    <th>Data Empréstimo</th>
                    <th>Data Devolução</th>
                    <th>Destinário</th>
                    <th>E-mail Destinário</th>
                    
                    
                    
                </tr>
            </thead>
            <tbody>
            <?php
                $sql1 = "SELECT nome_item, nome, data_dev, data_emp, email_usuario, id_emp FROM item INNER JOIN emprestimo INNER JOIN usuario WHERE emprestimo.id_usuario = usuario.id and emprestimo.id_item = item.id and emprestimo.email_usuario = usuario.email ORDER BY emprestimo.id_emp DESC";
                
                $sql_query = mysqli_query($connect, $sql1);

                if($sql_query->num_rows == 0) {
                    echo "Nenhum resultado encontrado.";
                } else {
                    while($dd = $sql_query->fetch_assoc()) {
            ?>                   
                
                <tr>
                
                    <td><?php echo $dd['nome_item']; ?></td>
                    <td><?php echo $dd['data_emp']; ?></td>
                   
                    <?php
                    $data_atual = date('Y-m-d');
                    $data_atualT = strtotime($data_atual);
                    $data_devol = $dd['data_dev'];
                    $data_devolT = strtotime($data_devol);
                    if($data_atualT > $data_devolT){
                        echo "<td style='color:red'>",$data_devol,"</td>";
                    }else{
                        echo "<td>",$data_devol,"</td>";
                    }
                    ?>
                    <td><?php echo $dd['nome'];?></td>
                    <td><?php echo $dd['email_usuario']; ?></td>

                    <td><form action="php_action/devolucao.php" method="post">
                            <input type="hidden" name="devolver" value="<?php echo$dd['id_emp'] ?>">
                            <input type="submit" name="btn-devolver" class="btn purple" value="Devolver">
                        </form>
                    </td>
                  
                </tr>
            <?php
                }
            }

            ?>
                
            </tbody>    
        </table>

</body>
</html>