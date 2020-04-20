<?php
session_start();
$dsn = "mysql:host=localhost;dbname=proyek";
$kunci = new PDO($dsn, "root", "");

        try {

            // get available balance of the transferer account
            $sql = 'SELECT balance FROM account WHERE id= ?';
            $stmt = $kunci->prepare($sql);
            $data = $_POST['id'];
            $stmt-> execute($data);
            $data = $stmt-> fetch();

            // add to the receiving account
            $sql_update_to = 'UPDATE account
                                SET balance = balance + :balance
                                WHERE id = :to';
            $stmt = $kunci->prepare($sql_update_to);
            $stmt->execute(array(":to" => $_POST['id'], ":balance" => $data['Balance']));
            // commit the transaction

            echo 'The balance has been transferred successfully';
        } catch (PDOException $e) {
            die($e->getMessage());
        }
