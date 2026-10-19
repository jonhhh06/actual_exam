<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($username === "john123" && $password === "john123") {
        session_regenerate_id(true);
        $_SESSION["username"] = $username;
        $_SESSION["fullname"] = "John Emanoel L. Tonido";
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>POS User Login</title>
<style>
  body { font-family: Arial, sans-serif; background: #eef1f7; display: flex;
         justify-content: center; align-items: center; height: 100vh; margin: 0; }
  .box { background: #fff; padding: 30px 40px; width: 340px; border-radius: 8px;
         box-shadow: 0 2px 10px rgba(0,0,0,.15); }
  h2 { text-align: center; color: #1a2fbf; }
  label { display: block; margin-top: 15px; }
  input[type=text], input[type=password] { width: 100%; padding: 10px; margin-top: 5px;
         box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
  button { width: 100%; margin-top: 20px; padding: 10px; background: #0b3fd1;
           color: #fff; border: 0; border-radius: 4px; cursor: pointer; }
  .error { background: #fde2e4; color: #c0152f; padding: 10px; margin-top: 15px;
           border-radius: 4px; text-align: center; }
</style>
</head>
<body>
  <div class="box">
    <h2>POS User Login Form</h2>
    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST" action="login.php">
      <label>Username</label>
      <input type="text" name="username" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>