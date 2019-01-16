<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Checks if both email and password is set

if (isset($_POST['username'], $_POST['password'])) {
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));

    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');

    if (!$statement) {
        die(var_dump($pdo->errorinfo()));
    }

    $statement->bindParam(':username', $username, PDO::PARAM_STR);

    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

// Checks if user exists in database
    if (!$user) {
        $_SESSION['message'] = 'This username does not exist';
        redirect('/index.php');
    }

// Checks if password is the same as in database
    if (password_verify($_POST['password'], $user['password'])) {
        unset($user['password']);

        $_SESSION['user'] = $user;
    } else {

        $_SESSION['message'] = 'Incorrect password';
    }
}

redirect('/index.php');
