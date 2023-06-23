
<?php
require("../process/config.php");

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password= md5($_POST['password']);

    if($email!="" && $password!=""){
        $query="SELECT *FROM users WHERE email='$email' AND password='$password'";
        $result=mysqli_query($con, $query);
        $cont=mysqli_num_rows($result);

        if($cont==1){
            $row= $result->fetch_assoc();
            session_start();
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];

            header("Refresh:0; url=../home.php");
        }
        else{
            header("Refresh:0; url=../index.php");
        }
    }
    else{
        header("Refresh:0; url=../index.php");
    }
}

?>