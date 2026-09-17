<?php

try {
    $config = parse_ini_file(__DIR__ . "/../.env");
    $pdo = new PDO(
        "mysql:host={$config['db_host']};port={$config['db_port']};dbname={$config['db_name']};charset=utf8mb4",
        $config["db_user"],
        $config["db_password"]
    );
} catch (Exception $e) {
    die("Erreur: {$e->getMessage()}");
}

//$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . "/.env");