<?php
session_start();
require 'db_connect.php';
$error="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') { $email = $_POST['email']; $password_input = $_POST['password']; $sql = "SELECT * FROM students WHERE email = ?"; $stmt = $conn->prepare($sql); $stmt->execute([$email]); $student = $stmt->fetch(PDO::FETCH_ASSOC); if ($student && password_verify($password_input, $student['password'])) { $_SESSION['user'] = $email; header("Location: dashboard.php"); exit; } else { $error = "Sai email hoặc mật khẩu"; } }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Đăng nhập</h2>
  <form action="" method="post">
    <label for="">Email:</label>
    <input type="email" name="email" required><br>
    <label for="">Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Đăng nhập</button>
  </form>
  <p style="color:red;"><?php echo $error?></p>
</body>
</html>