<?php
    session_start();
    if( ! isset($_SESSION["user"])){
        header("location: login.php");
    }
?>
<h1>Phải đăng nhập mới vào được</h1>