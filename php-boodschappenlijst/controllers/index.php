<?php
require 'Database.php';

$config = require 'config.php';
$db = new Database($config);


$header = "Boodschappen";

$totalCostAll = 0;


// PDO::FETCH_ASSOC returnt de query als een associative array $groceries = [['name' => 'grocery1', 'quantity' => 1, etc], ['name'=> 'grocery2', etc], [etc]]
//  IN DB CLASS, PDO::FETCH_ASSOC now assumed (check Database.php), 'normaal' in fetchAll/fetch:   fetchAll(PDO::FETCH_ASSOC)
$products = $db->query("select * from groceries")->fetchAll();

/*
    // Dit houden om het makkelijker te maken om de database dezelfde data te geven.
$products = [
    [
        'name' => 'Rijst',
        'price' => 1.00,
        'amount' => 2,
        'totalCost' => 0
    ],
    [
        'name' => 'Broccoli',
        'price' => 0.99,
        'amount' => 2,
        'totalCost' => 0
    ],
    [
        'name' => 'Koekjes',
        'price' => 1.20,
        'amount' => 2,
        'totalCost' => 0
    ],
    [
        'name' => 'Noten',
        'price' => 2.99,
        'amount' => 2,
        'totalCost' => 0
    ]
];
*/

// Als ik dit niet doe als functie, wordt de laatste waarde (Noten) genegeerd (in de HTML), en wordt de een na laatste waarde (Koekjes) 2x getoont (in de HTML).
// De rest van de (PHP en HTML) code ($totalCostAll) negeerd de laatste waarde niet..?
// Kan dit miss netter met array_filter/reduce ofzo?
function getTotals(&$products)
{
    foreach ($products as &$product) {
        $product['totalCost'] = $product['quantity'] * $product['price'];
    }
}
getTotals($products);

// de fn loopt door de array, waarbij de waarde van de current loop $product is, en de total wordt opgeslagen in $carry.
$totalCostAll = array_reduce($products, fn($carry, $product) => $carry + $product['totalCost']);


require "./views/index.view.php";