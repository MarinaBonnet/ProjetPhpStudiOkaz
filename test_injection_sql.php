<?php

$pdo = new PDO('mysql:dbname=my_db;host=localhost;charset=utf8mb4', 'root', '');
$id = $_GET['id'];
$query = $pdo->query("SELECT * FROM user WHERE id = $id");
$result = $query->fetch(PDO::FETCH_ASSOC);

// Exemple a ne pas faire : Injection dans url possible !
//Ce code n’est pas sécurisé car un attaquant pourra injecter du code
//dans le paramètre d’url :
//?id=5;DELETE FROM user;
//La requête suivante sera alors exécutée :
//SELECT * FROM user WHERE id =5;DELETE FROM user;