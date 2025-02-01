<?php

    if(!isset($_GET['id']) || empty($_GET['id']))
    {
        die ("The product ID is missing.");
    }

    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }

    require_once "Models/base.php";
    require_once "Models/products.php";

    $product_id = $_GET ['id'];

    $result = $base -> query("SELECT * FROM products WHERE id = '$product_id'");
    $selected_product = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1><?php echo $selected_product['name'] ?></h1>
        <p><?php echo $selected_product["description"] ?></p>
        <p><?php echo "Cena proizvoda:" .$selected_product["price"] ?></p>
        <p><?php echo "Na stanju:" .$selected_product["quantity"] ?></p>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form method = "POST" action="Models/cart.php">
                <label for="quantity">Please enter the desired quantity of the product</label>
                <input name = "quantity" type="number">
                <input name = "product_id" type="hidden" value =<?= $selected_product['id']?>>
                <input name = "product_price" type="hidden" value =<?= $selected_product['price']?>>
                <button>Dodaj u korpu</button>
            </form>
        <?php else: ?>
            <form action="Models/login.php">
                <button>Kliknite da se ulogujete kako bi dodali proizvod u korpu</button>
            </form>
        <?php endif; ?> 

    </div>
</body>
</html>

