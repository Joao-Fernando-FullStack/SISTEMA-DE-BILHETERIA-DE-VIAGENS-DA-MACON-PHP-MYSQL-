<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/nt.js"></script>
    <title>Login</title>
</head>

<body>
    <header>
        <div class="macon">
            <p>Agência de Viagem MACON</p>
        </div>

        <div class="menu-nav">
            <nav>
                <ul>
                    <li><a href="../MACON WEB/index.php">Home</a></li>
                    <li><a href="../MACON WEB/sobre.php">Sobre</a></li>
                    <li><a href="../MACON WEB/bilheteria.php">Bilheteria</a></li>                  
                    <li><a href="../MACON WEB/login.php" style="background-color: rgba(89, 143, 243, 0.534);padding-bottom: 18px;padding-top: 18px;">Login</a></li>
                </ul>
            </nav>
        </div>

    </header>

    <section class="sobre-body">

    <h1>Acesse o Site como Admin Login</h1>
   
<?php
//$nome = '';
//$senha='';
//session_start();
//$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","macon");

if(isset($_POST['login']))
{
    if(!empty($_POST['nome']) && !empty($_POST['senha']))
    {
        $nome = $_POST['nome'];
        $senha=$_POST['senha'];
        $consulta="SELECT*FROM usuario WHERE nome='$nome' AND palavra_passe='$senha'";
        $resultado=mysqli_query($conexion,$consulta);

        $files=mysqli_num_rows($resultado);

        if($files){
            //$_SESSION['nome']=$row['nome'];
           // $_SESSION['senha']=$row['palavra_passe'];

            header("location:reserva.php");
        }else{
            echo "<h2> ERRO ao fazer o Login<h2> ";
        }

        mysqli_free_result($resultado);
        mysqli_close($conexion);    
    }
    else
    {
        echo "<h1>Erro Preenche os campos</h1>";
    }
    
}
?>


    <div class="table">
    <form id="formulario" class="fL" action="#" method="post">
    <div id="bad">
    <div class="input-field1">
    <input type="text" name="nome" placeholder="Nome do Usuário">
    </div>
    </div>
    <div class="input-field1">
    <input type="password" name="senha" placeholder="Palavra-Passe">
    </div><br>
    <input type="submit" name="login" id="bt-sumit" value="Login"/>
    
    </form>
</div>
    </section>


<?php include "inc/footer.php"; ?>