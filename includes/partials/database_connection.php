<?php
$dsn = "mysql:host=localhost;dbname=blogdb";

try {
    $pdo = new PDO($dsn, "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database.";
} catch (PDOException $e) {
    echo "Connection with the database failed:" . $e->getMessage();
}
