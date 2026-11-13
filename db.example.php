<?php
$conn = new mysqli("localhost", "brian", "YOUR_PASSWORD_HERE", "CAT2");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
