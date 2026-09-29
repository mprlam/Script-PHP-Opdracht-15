<?php

$header = "Create";

require 'Validator.php';
require 'Database.php';

$config = require 'config.php';
$db = new Database($config);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];

    $productName = Validator::string($_POST['name'], 1, 1000);
    if (! $productName){
        $errors['name'] = "Product naam is verplicht.";
    }

    $productQuantity = Validator::integer($_POST['quantity']);
    if (! $productQuantity){
        $errors['quantity'] = "Voer een geldige hoeveelheid in.";
    }

    $productPrice = Validator::decimal($_POST['price']);
    if (! $productPrice){
        $errors['price'] = "Voer een geldige prijs in.";
    }

    if(empty($errors)){
        $query = "INSERT INTO groceries (NAME, QUANTITY, PRICE) VALUES (:name, :quantity, :price)";
        $queryParams = ['name' => $productName, 'quantity' => $productQuantity, 'price' => $productPrice];
        $db->query($query, $queryParams);

        header("Location: /");  // Redirects to / (http://localhost:8000/)
        die();                  // Block code execution after redirect.
    }

}

require "./views/create.view.php";