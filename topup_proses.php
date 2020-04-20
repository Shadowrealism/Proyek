<?php
session_start();
$dsn = "mysql:host=localhost;dbname=proyek";
$kunci = new PDO($dsn, "root", "");
try {
    // add to the receiving account
    $sql = 'UPDATE account
                      SET balance = balance + ?
                      WHERE id = ?';
    $stmt = $kunci->prepare($sql);
    $data = [$_POST['Balance'], $_POST['id']];
    $stmt->execute($data);
    // commit the transaction

    echo 'The balance has been transferred successfully';
  } catch (PDOException $e) {
      die($e->getMessage());
}
?>
