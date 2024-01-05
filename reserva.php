<?php include "inc/header.php"; ?>
<section class="content-tables">
 <h1>Seja Benvindo ao Formulário de Reserva</h1>
 
 <?php
 spl_autoload_register(function($className){
  include 'classes/'.$className.'.php';
 });
 ?>

 <?php $user = new Reserva(); ?>

  <?php
  //for inserting...
  if(isset($_POST['reservar'])){
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $data = $_POST['data'];
    $email  = $_POST['email'];
    $destino  = $_POST['destino'];
    $telefone  = $_POST['telefone'];
    $preco  = $_POST['preco'];
    $horaA  = $_POST['horaA'];
    $horaC  = $_POST['horaC'];

    $user->setNome($nome);
    $user->setIdade($idade);
    $user->setData($data);
    $user->setEmail($email);
    $user->setDestino($destino);
    $user->setTelefone($telefone);
    $user->setPreco($preco);
    $user->setHoraA($horaA);
    $user->setHoraC($horaC);
    echo "<h3></h3>";
    if($user->insert()){
      echo "<h3 class='sucess'>.... Dados Inseridos com Successo ....</h3>";
    }else{
      echo "<h3 class='sucess'>.... Erro ....</h3>";
    }
  }
  ?>


  <?php
  
  // for data update
  if(isset($_POST['update'])){
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $data = $_POST['data'];
    $email = $_POST['email'];
    $destino = $_POST['destino'];
    $telefone = $_POST['telefone'];
    $preco = $_POST['preco'];
    $horaA = $_POST['horaA'];
    $horaC = $_POST['horaC'];
    $id  = $_POST['id'];

    $user->setNome($nome);
    $user->setIdade($idade);
    $user->setData($data);
    $user->setEmail($email);
    $user->setDestino($destino);
    $user->setTelefone($telefone);
    $user->setPreco($preco);
    $user->setHoraA($horaA);
    $user->setHoraC($horaC);
    echo "<h3></h3>";

    if($user->update($id)){
      echo "<h3 class='edit'>.... Dados Editados com Successo ....</h3>";
    }

  }

  ?>

  <?php
  //for data edit
  if(isset($_GET['action']) && $_GET['action']=='update') {
    $id = (int)$_GET['id'];
    $result = $user->readById($id);
    echo "<h3></h3>";
    
    ?>
 <div class="table">
    <form action="#" id="formulario" method="post">
    <h3>Por favor preencha este formulário para a Reservas</h3>
                <div class="input-field1">
                    <input type="hidden" name="id" value="<?php echo $result['Id']; ?>" />
                </div>
                <div class="input-field1">
                    <input type="text" name="nome" placeholder="Digite o Nome" value="<?php echo $result['Nome']; ?>" required="1" />
                </div>
                <div class="input-field1">
               
                    <input type="number" name="Data" id="data" oninput="datas()" min="1900" placeholder="Digite o Ano de Nascimento"/>
                </div>
                <div class="input-field1">
                    <input type="text" name="idade" id="resData" placeholder="Idade" value="<?php echo $result['Idade']; ?>" required="1" />
                </div>
                <div class="input-field1">
                    <input type="date" name="data" value="<?php echo $result['Data']; ?>" required="1" />
                </div>
                <div class="input-field1">
                    <input type="email" name="email" placeholder="Digite o Email" value="<?php echo $result['Email']; ?>" required="1" />
                </div>
                <div class="input-field1">
                    <label for="txtDestino">Seleccione o Destino:</label><br>
                    <select id="ddlViewBy" oninput="des()" name="destino" value="<?php echo $result['Destino']; ?>" required="1">
                    <option value="Luanda">Luanda</option>
                    <option value="Huamo">Huambo</option>
                    <option value="Benguela">Benguela</option>
                    <option value="Moxico">Moxico</option>
                    <option value="Huíla">Huíla</option>
                    <option value="Uíge">Uíge</option>
                    <option value="Bengo">Bengo</option>
                    <option value="Namibe">Namibe</option>
                    </select>
                </div>
                <div class="input-field1">
                    <input type="text" name="telefone" placeholder="Digite o Número do Telefone" value="<?php echo $result['Telefone']; ?>" required="1" />
                </div>

                <div class="input-field1">
                    <input type="text" name="preco" placeholder="Digite o Preço da Viagem" value="<?php echo $result['Preco']; ?>" required="1" />
                </div>
                <div class="input-field1">
                    <label for="HoraA">Hora Atual:</label><br>
                    <input type="text" name="horaA" placeholder="Hora_Atual" value="<?php echo $result['Hora_Atual']; ?>"/>
                </div>

                <div class="input-field1">
                   <label for="HoraC">Hora de Chegada:</label><br>
                    <input type="time" name="horaC" placeholder="Hora de Chegada" value="<?php echo $result['Hora_Chegada']; ?>"/>
                </div><br>
                <input type="submit" name="update" id="bt-sumit" value="Atualizar"/>
                
        </tr>
      </table>
    </form>
    </div>
  <?php


 } else{
  ?>

        <div class="table">

            <form action="#" id="formulario" method="post">
                <h3>Por favor preencha este formulário para a Reservas</h3>
                <div class="input-field1">
                    <input type="hidden" name="Id" />
                </div>
                <div class="input-field1">
                    <input type="text" name="nome" placeholder="Digite o Nome" required="1" />
                </div>
                <div class="input-field1">
                    <input type="number" name="Data" id="data" oninput="datas()" min="1900" placeholder="Digite o Ano de Nascimento" />
                </div>
                <div class="input-field1">
                    <input type="text" name="idade" id="resData" placeholder="Idade" required="1" />
                </div>
                <div class="input-field1">
                    <label for="data">Data da Viagem:</label><br>
                    <input type="date" name="data" required="1" />
                </div>
                <div class="input-field1">
                    <input type="email" name="email" placeholder="Digite o Email" />
                </div>
                <div class="input-field1">
                    <label for="txtDestino">Seleccione o Destino:</label><br>
                    <select id="ddlViewBy" name="destino">
                    <option value="Luanda">Luanda</option>
                    <option value="Huambo">Huambo</option>
                    <option value="Benguela">Benguela</option>
                    <option value="Moxico">Moxico</option>
                    <option value="Huíla">Huíla</option>
                    <option value="Uíge">Uíge</option>
                    <option value="Bengo">Bengo</option>
                    <option value="Namibe">Namibe</option>
                    </select>
                </div>
                <div class="input-field1">
                    <input type="text" name="telefone" placeholder="Digite o Número do Telefone" required="1" />
                </div>

                <div class="input-field1">
                    <input type="text" name="preco" placeholder="Digite o Preço da Viagem" required="1" />
                </div>
                <div class="input-field1">
                    <label for="HoraA">Hora Atual:</label><br>
                    <input type="text" name="horaA" id="HH" onload="horas()" placeholder="Hora Atual" required="1" />
                </div>

                <div class="input-field1">
                <label for="HoraC">Hora de Chegada:</label><br>
                    <input type="time" name="horaC" placeholder="Hora de Chegada" required="1" />
                </div><br>
                <input type="submit" name="reservar" value="Reservar" id="bt-sumit">
                
            </form>
        </div>
 <?php
 }

 ?>

  <?php
  // for delete data
  if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $id = (int)$_GET['id'];

    if($user->delete($id)){
      echo "<h3 class='delete'>.... Dados Elimnado com Successo ....</h3>";
    }
  }

  ?>
  <div class="result-table">
  <table class="tblone">
    <tr>
      <th>Id</th>
      <th>Nome</th>
      <th>Idade</th>
      <th>Data</th>
      <th>Email</th>    
      <th>Destino</th>
      <th>Telefone</th>
      <th>Preco</th>
      <th>HoraA</th>
      <th>HoraC</th> 
      <th>Eliminar</th>
      <th>Editar</th>
    </tr>

    <?php
    $i= 0;
    if(is_array($user->readAll()) || is_object($user->readAll())){
      foreach($user->readAll() as $value){
        $i++;
        ?>
        <tr>
          <td><?php echo $value['Id'];  ?></td>
          <td><?php echo $value['Nome'];  ?></td>
          <td><?php echo $value['Idade'];  ?></td>
          <td><?php echo $value['Data'];  ?></td>
          <td><?php echo $value['Email'];  ?></td>
          <td><?php echo $value['Destino'];  ?></td>
          <td><?php echo $value['Telefone'];  ?></td>
          <td><?php echo $value['Preco'];  ?></td>
          <td><?php echo $value['Hora_Atual'];  ?></td>
          <td><?php echo $value['Hora_Chegada'];  ?></td>
          <td>
            <?php
            echo "<h3></h3>";
            ?>
          
          <a href="reserva.php?action=delete&id=<?php echo $value['Id']; ?>"><img src="icon/icons8_delete_bin_50px.png" alt=""></a>
         
          </td>
          <td>
          <a href="reserva.php?action=update&id=<?php echo $value['Id']; ?>"><img src="icon/icons8_edit_50px_1.png" alt=""></a>
          </td>
      </div>
        <?php
      }
    } else {
      echo "Não há DADOS na Tabela!!!";
    }
    ?>
<br>
<br><br>


  </table>
  <section><table></table></section>
  </section>


<?php include "inc/footer.php"; ?>
