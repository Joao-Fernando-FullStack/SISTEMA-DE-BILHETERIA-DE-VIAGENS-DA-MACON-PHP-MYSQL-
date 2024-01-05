<?php

class Reserva{
    private $table = 'reserva';

    private $nome, $idade,$data, $email,$destino,$telefone,$preco,$horaA,$horaC;

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }

    public function setData($data){
        $this->data = $data;
    }


    public function setEmail($email){
        $this->email = $email;
    }

    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function setHoraA($horaA){
        $this->horaA = $horaA;
    }

    public function setHoraC($horaC){
        $this->horaC = $horaC;
    }


    public function insert(){

            $sql = "INSERT INTO $this->table(Nome,Idade,Data,Email,Destino,Telefone,Preco,Hora_Atual,Hora_Chegada) VALUES (:Nome,:Idade,:Data,:Email,:Destino,:Telefone,:Preco,:Hora_Atual,:Hora_Chegada)";
            $stmt = DB::prepared($sql);
            $stmt->bindParam(':Nome', $this->nome);
            $stmt->bindParam(':Idade', $this->idade);
            $stmt->bindParam(':Data', $this->data);
            $stmt->bindParam(':Email', $this->email);
            $stmt->bindParam(':Destino', $this->destino);
            $stmt->bindParam(':Telefone', $this->telefone);
            $stmt->bindParam(':Preco', $this->preco);
            $stmt->bindParam(':Hora_Atual', $this->horaA);
            $stmt->bindParam(':Hora_Chegada', $this->horaC);
            return $stmt->execute();
        }

    
    public function readById($id){
        $sql = "SELECT * FROM $this->table WHERE Id=:id";
        $stmt = DB::prepared($sql);
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
        return $stmt->fetch();
    }

    public function update($id){
        $sql  = "UPDATE $this->table SET Nome=:Nome, Idade=:Idade,Data=:Data,Email=:Email,Destino=:Destino,Telefone=:Telefone,Preco=:Preco,Hora_Atual=:Hora_Atual,Hora_Chegada=:Hora_Chegada WHERE Id=:id";
        $stmt = DB::prepared($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Nome', $this->nome);
        $stmt->bindParam(':Idade', $this->idade);
        $stmt->bindParam(':Data', $this->data);
        $stmt->bindParam(':Email', $this->email);
        $stmt->bindParam(':Destino', $this->destino);
        $stmt->bindParam(':Telefone', $this->telefone);
        $stmt->bindParam(':Preco', $this->preco);
        $stmt->bindParam(':Hora_Atual', $this->horaA);
        $stmt->bindParam(':Hora_Chegada', $this->horaC);
        return $stmt->execute();
    }

    public function readAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepared($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

         if($stmt-> rowCount() > 0){
            // echo $stmt-> rowCount();
            // echo "Yes";
            // var_dump($result);
             return $result;
         }
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE Id=:id";
        $stmt = DB::prepared($sql);
        $stmt -> bindParam(':id', $id);
        return $stmt->execute();
    }


}
