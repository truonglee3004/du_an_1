<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="banner1">
<div class="content">
    <div class="boxform">
        <div class="logo">
    <h3 style="font-size: xx-large">Đăng nhập</h3>
</div>
    <form action="index.php" method="POST">
    <table>
    <div class="container">
    
    <div class="user">
        <tr>
            <td></td>
            <td><input type="text" name="username" class="inp-user" placeholder="Nhập vào tên đăng nhập"></td>
        </tr>
</div>
<div class="pass">
        <tr>
            <td></td>
            <td><input type="password" name="password" class="inp-pass" placeholder="Nhập vào mật khẩu"></td>
        </tr>
</div>
        <tr>
            <td colspan="2">
            <a href="https://www.facebook.com/HuyAuthenticc/"><p>FORGOT PASSWORD?</a></p>
                <button type="submit" name="submit" class="btnlogin">Login</button>
                <button type="reset">Reset</button>
                <span>NOT A MEMBER?</span>
                    <span>SIGNUP NOW</span>
            </td>
        </tr>
    </div>
    </div>
    </div>
    </div>
</table>
</body>
</html>