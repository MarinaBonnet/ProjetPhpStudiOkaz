<?php
require_once 'templates/header.php';
require_once 'libs/pdo.php';
require_once 'libs/user.php';

/*
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $res = addUser($pdo, $_POST["username"], $_POST["email"], $_POST["password"]);
}
*/
//addUser($pdo, "test", "test@test.fr", "abc123");


$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $verif = verifyUser($_POST);
    if ($verif === true) {
        $resAdd = addUser($pdo, $_POST["username"], $_POST["email"], $_POST["password"]);
    } else {
        $errors = $verif;
    }
}



?>

<div class="form-signin w-100 m-auto"></div>
<h1>Inscription</h1>
<form action="" method="post">
    <div class="mb-3">
        <label class="form-label" for="username">Nom d'utilisateur</label>
        <input class="form-control" type="text" name="username" id="username">
    </div>
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email">
    </div>
    <div class="mb-3">
        <label class="form-label" for="password">Mot de passe</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>
    <input class="btn btn-primary" type="submit" value="Enregistrer" name="add_user">
</form>



<?php
require_once 'templates/footer.php';
?>