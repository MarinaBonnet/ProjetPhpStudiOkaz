<div class="col-md-4 my-2 d-flex">
    <div class="card">
        <img src="uploads/listing/<?= $listing["image"] ?>" class="card-img-top" alt="<?= $listing["title"] ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $listing["title"] ?></h5>
            <p class="card-text"><?= $listing["price"] ?> €</p>
            <a href="annonce.php?id=<?= $key ?>" class="btn btn-primary stretched-link">Voir l'annonce</a>
        </div>
    </div>
</div>