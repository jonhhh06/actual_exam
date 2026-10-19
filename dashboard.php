<?php
session_start();

// Block direct access without logging in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Logout
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
  body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
  .header { background: #0b3fd1; color: #fff; padding: 15px 20px; display: flex;
            justify-content: space-between; align-items: center; }
  .logout { background: #d6275a; color: #fff; padding: 8px 14px;
            text-decoration: none; border-radius: 4px; }
  .welcome { margin: 40px 30px; color: #1a2fbf; }
  .cards { display: flex; gap: 30px; margin: 0 30px; }
  .card { border-left: 3px solid #1a2fbf; padding: 5px 15px; min-width: 200px; }
  .card h3 { margin: 0 0 8px; color: #1a2fbf; }
</style>
</head>
<body>
  <div class="header">
    <div>ACLC College of Tacloban | Information Assurance &amp; Security 2 : Instructor: Dr. Cesar A. Silay</div>
    <a class="logout" href="dashboard.php?logout=1">Logout</a>
  </div>

  <div class="welcome">
    <h2>Welcome, <?= htmlspecialchars($_SESSION["fullname"]) ?>!</h2>
    <p>You have successfully logged in to the system.</p>
    <p>Username: <b><?= htmlspecialchars($_SESSION["username"]) ?></b></p>
  </div>

  <div class="cards">
    <div class="card"><h3>Users</h3><p>Manage user accounts</p></div>
    <div class="card"><h3>Reports</h3><p>View and generate POS reports</p></div>
    <div class="card"><h3>Settings</h3><p>Configure Point of Sale (POS) system</p></div>
  </div>
</body>
</html>