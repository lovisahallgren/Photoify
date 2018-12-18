<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Checks if both email and password is set
if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $statement = $pdo->query('SELECT * FROM users WHERE email = :email');

    if (!$statement) {
        die(var_dump($pdo->errorinfo()));
    }

    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

// Checks if user exists in database
    if (!$user) {
        redirect('/login.php');
    }

// Checks if password is the same as in database
    if (password_verify($_POST['password'], $user['password'])) {
        unset($user['password']);

        $_SESSION['user'] = $user;
    }
}

redirect('/');
