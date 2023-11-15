<?php

require_once 'user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $user->createUser($first_name, $last_name, $username, $password, $email, $phone_number);

    header('Location: login.html');
}
?>
