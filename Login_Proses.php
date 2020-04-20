<?php
session_start();

$Username = $_POST['uname'];
$password = $_POST['upass'];

$dsn = new PDO("mysql:host=localhost;dbname=proyek", "root", "");
$sql = "SELECT * FROM account WHERE nama = ?";

$result = $dsn->prepare($sql);
$result->execute([$Username]);

if($row = $result->fetch()){
	if(password_verify($password, $row['password'])){
		$_SESSION['Username'] = $row['nama'];
		$_SESSION['Balance'] = $row['balance'];
		$_SESSION['user_id'] = $row['id'];
		header('Location: Cart.php');
	}
	else{
		header('Location: Login.php');
	}
}
?>
