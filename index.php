<?php 
    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Homepage</a>
    <?php if(isset($_SESSION['user_id'])): ?>
        <a href="Models/logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>
    <a href="display_cart.php">Cart</a>
    <a href="registration_form.php">Register</a>
    <div>
    <?php require_once "Models/products.php";
    
        foreach ($products as $product): ?>
            <h1><?php echo $product["name"] ?></h1>
            <p><?php echo $product["description"] ?></p>
            <p><?php echo "Cena proizvoda:" .$product["price"] ?></p>
            <p><?php echo "Na stanju:" .$product["quantity"] ?></p>
            <a href="selected_product.php?id=<?= $product['id'] ?>">Pogledaj proizvod</a>
            
            
            


        <?php endforeach; ?>
    </div>
</body>
</html>