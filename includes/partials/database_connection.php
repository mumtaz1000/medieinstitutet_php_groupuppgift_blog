<?php
$dsn = "mysql:host=localhost;dbname=blogdb";
try {
    $pdo = new PDO($dsn, "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger" role="alert">
    "Connection with the database failed:"
    </div>' . $e->getMessage();
}
