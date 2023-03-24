<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng Nhập</title>
</head>
<body>
    <h3>Đăng nhập</h3>
    <form action="login_submit.php" method="POST">
    <table>
        <tr>
            <td>User name</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="submit">Login</button>
                <button type="reset">Reset</button>
            </td>
        </tr>
    </table>
</body>
</html>