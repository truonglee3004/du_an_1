<?php
    session_start();
    include"config.php";
    if(isset($_POST["submit"]) && $_POST["username"] !='' && $_POST["password"] !='' ){
        $username =$_POST["username"];
        $password =$_POST["password"];
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE username='$username'AND '$password'";
        $user = mysqli_query($conn,$sql);
        if(mysqli_num_rows($user) > 0){
            $_SESSION["user"]=$username;
        }else{
            echo "Bạn đã nhập sai TK hoặc MK";
        }
    }else{
        header("location: login.php");
    }

?>