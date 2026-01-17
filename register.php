<?php
require 'db_connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $password_hash=password_hash($password, PASSWORD_DEFAULT);
  $sql="INSERT INTO students(email,password) VALUES (?,?)";
  $stml=$conn->prepare($sql);
  $stml->execute([$email,$password_hash]);

  echo"<p style='color:green'>Đăng ký thành công</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Đăng ký tài khoản</h2>
  <form action="" method="post">
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Đăng ký</button>
  </form>
</body>
</html>