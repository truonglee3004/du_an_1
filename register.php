<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body>
    <h3>Đăng ký thành viên</h3>
    <form action="index.php" method="POST">
        <table>                 
            <tr>
                <td>Tên đăng nhập: </td>
                <td><input type="text"name="username"></td>
            </tr>
            <tr>
                <td>Mật khẩu: </td>
                <td><input type="password"name="password"></td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu: </td>
                <td><input type="password"name="repassword"></td>
            </tr>
            <tr>
                <td colspan="2">
                <button type="submit" name="submit">ĐĂNG KÍ</button>
                <button type="reset">Làm mới</button>
</td>
            </tr>

        </table>

</body>
</html>