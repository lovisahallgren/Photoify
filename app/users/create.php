<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


if (isset($_POST['name'], $_POST['email'], $_POST['user_name'], $_POST['password'])) {
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $userName = trim(filter_var($_POST['user_name'], FILTER_SANITIZE_STRING));
    $password = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));

    $query = 'INSERT INTO users(name, email, user_name, password) VALUES(:name, :email, :user_name, :password)';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':user_name', $userName, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    $statement->execute();

    $user = $statement->fetchAll(PDO::FETCH_ASSOC);

    redirect('/login.php');

}
