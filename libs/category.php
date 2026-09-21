<?php


function getCategories(PDO $pdo)
{
    /* return [
        ["name" => "Jeux Video", "icon" => "controller"],
        ["name" => "Meubles", "icon" => "lamp"],
        ["name" => "Vetements", "icon" => "tag"]
    ];
    */
    $sql = "SELECT * FROM category";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
