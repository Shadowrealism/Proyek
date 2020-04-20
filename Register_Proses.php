<?php

$username = $_POST['uname'];
$password = password_hash($_POST['upass'], PASSWORD_BCRYPT);

$dsn = new PDO("mysql:host=localhost;dbname=proyek", "root", "");

$sql = "INSERT INTO account (nama, password) VALUES (?,?)";

$result = $dsn->prepare($sql);
$result->execute([$username, $password]);

header('Location: Login.php');
?>
