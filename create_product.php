<?php
// create_product.php
require_once "bootstrap.php";
require_once './src/Products.php';



$newProductName = $argv[1];

$product = new Products();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
