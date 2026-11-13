<?php
require "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $s = $conn->prepare("INSERT INTO feedback (name, message) VALUES (?,?)");
  $s->bind_param("ss", $_POST["name"], $_POST["message"]);
  $s->execute();
}
$rows = $conn->query("SELECT name, message, created_at FROM feedback ORDER BY id DESC");
?>
<!DOCTYPE html><html><body>
<h2>Feedback form</h2>
<form method="post">
  <input name="name" placeholder="Your name" required><br><br>
  <input name="message" placeholder="Message" required><br><br>
  <button type="submit">Submit</button>
</form>
<h3>Stored feedback</h3>
<table border="1" cellpadding="5">
<tr><th>Name</th><th>Message</th><th>Time</th></tr>
<?php while ($r = $rows->fetch_assoc()): ?>
<tr><td><?= htmlspecialchars($r["name"]) ?></td><td><?= htmlspecialchars($r["message"]) ?></td><td><?= $r["created_at"] ?></td></tr>
<?php endwhile; ?>
</table>
</body></html>
