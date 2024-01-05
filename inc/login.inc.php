<?php>
if(isset($_POST['login'])){



    $username=$_POST['nome'];
    $password=$_POST['palavra_passe'];

    if(empty($username) || empty($password)){
        echo "Location: ..login.php?error=emptyfields";
        exit();

    }else{
        $sql="SELECT * FROM users WHERE uidUsers=? OR emailUsers=?";
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ..login.php?error=sqlError");
            exit(); 

        }else{

            mysqli_stmt_bind_param($stmt,"ss",$username,$username);
            mysqli_stmt_execute($stmt);

            $resul = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($resul)){
                $pwdCheck = password_verify($password,$row['palavra_passe']);

               
                if($password != $row['palavra_passe']){

                    header("Location: ../login.php?error=wrongpwd1");
                    exit();

                }else if($password == $row['palavra_passe']){
                    session_start();
                    $_SESSION['nome']=$row['nome'];
                    $_SESSION['senha']=$row['palavra_passe'];

                    header("Location: ../login.php?login=sucess");
                    exit();

                }else{
                    header("Location: ../login.php?error=wrongpwd2");
                    exit();
                }

            }else{
                header("Location: ../login.php?error=nouser");
                exit();
            }

        }
    }

}else{
    header("Location: ../login.php");
    exit();
}
<?>