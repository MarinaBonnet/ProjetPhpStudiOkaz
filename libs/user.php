<?php

function addUser(PDO $pdo, string $username, string $email, string $password): bool
{
    $query = $pdo->prepare("INSERT INTO user (username, email, password) VALUE (:username, :email, :password)");

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':username', $password);

    return $query->execute();
}

function verifyUser($user): array|bool
{
    $errors = [];
    if (isset($user["username"]) && $user["username"] === "") {
        $errors["username"] = "Le champs username est obligatoire";
    }

    if (count($errors)) {
        return $errors;
    } else {
        return true;
    }
}
