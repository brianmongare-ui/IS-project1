<?php
require "db.php";
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $u = trim($_POST["username"]);
  $e = trim($_POST["email"]);
  $p = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $s = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
  $s->bind_param("sss", $u, $e, $p);
  $msg = $s->execute() ? "Registered successfully. <a href='login.php'>Login</a>" : "Error: " . $conn->error;
}
?>
<!DOCTYPE html><html><body>
<h2>Sign up</h2>
<form method="post">
  <input name="username" placeholder="Username" required><br><br>
  <input type="email" name="email" placeholder="Email" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit">Sign up</button>
</form>
<p><?= $msg ?></p>
</body></html>
