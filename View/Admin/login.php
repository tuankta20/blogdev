<?php

session_start();
if ( isset($_SESSION['user'] ) && $_SESSION['user'] === 'tuanadmin16012001') {
    header('location:http://localhost/Blog/admin.php');
}
    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if ($user === 'tuanadmin16012001' && $pass === '16012001') {
            $_SESSION['user'] = 'tuanadmin16012001';
            header('location:http://localhost/Blog/admin.php');
        }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: rgba(245, 245, 245, 0.7);">
<div style="margin-top: 200px;margin-left: 25%;margin-right: 25%">
    <div style="max-width: 100%;padding: 10px">
        <form action="" method="post">
            <input name="user" type="text"
                   style="width: 60%;height: 50px;outline: none;border: 1px solid #2196F3;padding: 0 30px;margin-bottom: 20px"
                   placeholder="User">
            <input name="pass" type="password"
                   style="width: 60%;height: 50px;outline: none;border: 1px solid #2196F3;padding: 0 30px;margin-bottom: 20px"
                   placeholder="Password">
            <br>
            <input type="submit"
                   style="width:30%;height: 50px;outline: none;border: 1px solid #2196F3;padding: 0 30px;margin-bottom: 20px;background-color: #2196F3;color: white"
                   value="Login" name="submit">
        </form>
    </div>
</div>
</body>
</html>
