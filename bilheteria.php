<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/nt.js"></script>
    <title>Bilheteria</title>
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
                    <li><a href="../MACON WEB/bilheteria.php" style="background-color: rgba(89, 143, 243, 0.534);padding-bottom: 18px;padding-top: 18px;">Bilheteria</a></li>
                    <li><a href="../MACON WEB/login.php">Login</a></li>
                </ul>
            </nav>
        </div>

    </header>

<?php

include 'inc/coonnect_test_db.php';

$searchErr = '';
$employee_details='';

if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from reserva where Id='$search'");
        $stmt->execute();
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
    }
    else
    {
        $searchErr = "Digite o ID do Passageiro";
    }
    
}
 
?>

<section class="content-tables">
<h1>Seja Benvindo a Bilheteria</h1>

<div class="container-results">
    <div class="pes">
    <form action="#" method="post">
    <div class="row">
        <div class="form-group">
            <label for="email"><b>Procurar Passageiro por ID:</b></label>
            <div class="input-field1">
              <input type="text" name="search" placeholder="Pesquisar Aqui">
            </div>
            <div class="input-field1">
              <button type="submit" name="save" id="pesquisar" on="ver()">Pesquisar</button>
              <a  href="#" id="pesquisar" onclick="print()" >Imprimir</a>
            </div>
        </div>
        <div class="form-group">
            <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        </div>       
    </div>
    </form>
    </div>
 


    <h3>Informação de Reserva do Passageiro</h3><br/>
    <div class="table-responsive">          
   
                <?php
                 if(!$employee_details)
                 {
                    echo '<tr>Nenhum dados Encontrado</tr>';
                 }
                 else{
                    foreach($employee_details as $key=>$value)
                    {
                ?>
                   
                    <p>ID: <b> <?php echo $value['Id']; ?></b></p>
                    <p>Nome Completo:<b  style="color:red;"> <?php echo $value['Nome'];  ?></b> </p>
                    <p>Idade:<b> <?php echo $value['Idade'];  ?></b> </p>
                    <p>Data da Viagem:<b> <?php echo $value['Data'];  ?></b> </p>
                    <p>Email:<b> <?php echo $value['Email'];  ?></b> </p>
                    <p>Destino:<b> <?php echo $value['Destino'];  ?></b></p>
                    <p>Número do Telefone:<b> <?php echo $value['Telefone'];  ?></b> </p>
                    <p>Preço da Viagem:<b> <?php echo $value['Preco'];  ?></b> </p>
                    <p>Hora da Viagem:<b> <?php echo $value['Hora_Atual'];  ?></b> </p>
                    <p>Hora de Chegada:<b> <?php echo $value['Hora_Chegada'];  ?></b> </p>   
                <?php
                    }
                     
                 }
                ?>    
      </table>
    </div>
</section>
 
<?php include "inc/footer.php"; ?>