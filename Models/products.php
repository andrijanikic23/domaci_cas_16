<?php

require_once "base.php";
$result = $base -> query("SELECT * FROM products");
$products = $result -> fetch_all(MYSQLI_ASSOC);