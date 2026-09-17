<?php

function getListings(): array
{
    return  [
        ["title" => "test1", "price" => 30, "image" => "rocket-league.jpg", "description" => "Description du produit"],
        ["title" => "test2", "price" => 20, "image" => "rocket-league.jpg", "description" => "Description du produit"],
        ["title" => "test3", "price" => 10, "image" => "rocket-league.jpg", "description" => "Description du produit"]
    ];
}

function getListingById(int $id): array
{
    $listings = getListings();
    return $listings[$id];
}
