<?php

    require_once "base.php";

    if (!isset($_POST["email"]) || empty($_POST["email"]))
    {
        die ("You have incorrectly entered your information");
    }

    if (!isset($_POST["password"]) || empty($_POST["password"]))
    {
        die ("You have incorrectly entered your information");
    }

    $email = $_POST["email"];
    $encrypted_password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $result_existance = $base -> query("SELECT * FROM users WHERE email = '$email'");

    if ($result_existance -> num_rows > 0)
    {
        die("You have already created an account!");
    }


    $writing = $base -> query("INSERT INTO users(email, password) VALUES('$email', '$encrypted_password')");
    header("Location: ../login.php");


