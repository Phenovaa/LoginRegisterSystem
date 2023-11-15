<?php

require_once 'user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->verifyUser($username, $password)) {
        echo 'Login successful!';
    } else {
        echo 'Invalid username or password';
    }
}
?>
