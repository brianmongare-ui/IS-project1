<?php
session_start();
require "db.php";
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $s = $conn->prepare("SELECT password FROM users WHERE username=?");
  $s->bind_param("s", $_POST["username"]);
  $s->execute();
  $r = $s->get_result()->fetch_assoc();
  if ($r && password_verify($_POST["password"], $r["password"])) {
    $_SESSION["user"] = $_POST["username"];
    $msg = "Login successful. Welcome, " . htmlspecialchars($_SESSION["user"]) . "!";
  } else { $msg = "Invalid username or password."; }
}
?>
<!DOCTYPE html><html><body>
<h2>Login</h2>
<form method="post">
  <input name="username" placeholder="Username" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit">Login</button>
</form>
<p><?= $msg ?></p>
</body></html>
