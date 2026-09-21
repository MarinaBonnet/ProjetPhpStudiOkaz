<?php

function addUser(PDO $pdo, string $username, string $email, string $password): bool
{
    $query = $pdo->prepare("INSERT INTO user (username, email, password) VALUE (:username, :email, :password)");

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);

    return $query->execute();
}

function verifyUser(array $user): array|bool
{
    $errors = [];

    // Vérification username
    if (!isset($user["username"])) {
        $errors["username"] = "Le champ username n'a pas été envoyé";
    } elseif ($user["username"] === "") {
        $errors["username"] = "Le champ username est obligatoire";
    }


    // Vérification mot de passe
    if (!isset($user["password"])) {
        $errors["password"] = "Le champ password n'a pas été envoyé";
    } elseif ($user["password"] === "") {
        $errors["password"] = "Le mot de passe est obligatoire";
    } elseif (strlen($user["password"]) < 8) {
        $errors["password"] = "Le mot de passe doit faire au minimum 8 caractères";
    }


    // Vérification email
    if (!isset($user["email"])) {
        $errors["email"] = "Le champ email n'a pas été envoyé";
    } elseif ($user["email"] === "") {
        $errors["email"] = "Le champ email est obligatoire";
    } elseif (!filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Le format de l'email doit être valide";
    }

    return empty($errors) ? true : $errors;
}

function verifyUserLoginPassword(PDO $pdo, string $email, string $password): bool|array
{
    $query = $pdo->prepare("SELECT id, username, email, password FROM user WHERE email = :email ");
    $query->bindValue(":email", $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user["password"])) {
        return $user;
    } else {
        return false;
    }
}
