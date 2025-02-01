<?php

require_once "base.php";
if (!isset($_POST["email"]) || empty($_POST["email"]))
{
    die ("You have incorrectly entered email");
}

if (!isset($_POST["password"]) || empty($_POST["password"]))
{
    die ("You have incorrectly entered password");
}


$email = $_POST["email"];
$password = $_POST["password"];
$result = $base -> query ("SELECT * FROM users WHERE email = '$email'");

if ($result -> num_rows >= 1)
{
    $user = $result -> fetch_assoc();
    $verified_password = password_verify($password, $user['password']);
    $user_id = $user['id'];
    
}
else
{
    die ("You have incorrectly entered some information");
}


if ($verified_password == true)
{
    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }
    $_SESSION['user_id'] = $user_id;
    header("Location: ../index.php");
}
else
{
    die ("You have incorrectly entered some information");
}