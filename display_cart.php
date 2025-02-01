<?php

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}


require_once "Models/base.php";
if (isset($_SESSION['user_id']))
{
    $user_id = $_SESSION['user_id'];
    $result = $base -> query("SELECT * FROM orders WHERE user_id = '$user_id'");
    $orders = $result -> fetch_all(MYSQLI_ASSOC);
}

else
{
    die("You are not logged in!");
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

    <?php foreach($orders as $order): ?>
        <p>Quantity: <?= $order['quantity'] ?> Price: <?= $order['price'] ?></p>
        <br>
    <?php endforeach; ?>
    
</body>
</html>