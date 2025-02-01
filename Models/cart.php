<?php


require_once "products.php";
require_once "base.php";

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if(!isset($_POST['quantity']) && empty($_POST['quantity']))
{
    die("You have to enter quantity of selected product");
}

if(!isset($_POST['product_id']) && empty($_POST['product_id']))
{
    die("You have to enter quantity of selected product");
}


    $product_id = $_POST['product_id'];
    $consumer_id = $_SESSION['user_id'];
    $price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $total_price = $price * $quantity;  
    $result = $base -> query("INSERT INTO orders(product_id, user_id, price, quantity) VALUES('$product_id', '$consumer_id', '$total_price', '$quantity')");












