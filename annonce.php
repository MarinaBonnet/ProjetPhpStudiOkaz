<?php
require_once 'templates/header.php';
require_once 'libs/pdo.php';
require_once 'libs/listing.php';

//Erreur 404 
$error404 = false;


//Test et recuperation URL

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $listing = getListingById($pdo, $id);
    if (!$listing) {
        $error404 = true;
    } else {
        $error404 = true;
    }
}

?>

<div class="container col-xxl-12 px-4 py-5">
    <?php if (isset($listing) && $listing): ?>
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-4">
                <img src="uploads/listing/rocket-league.jpg" class="d-block mx-lg-auto img-fluid" alt="Rocket-league" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $listing["title"] ?></h1>
                <h2><?= $listing["price"] ?></h2>
                <p class="lead"><?= $listing["description"] ?></p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        <?php else: ?>
            <h1>L'annonce est introuvable</h1>
        <?php endif; ?>
        </div>
</div>

<?php
require_once 'templates/footer.php';
?>