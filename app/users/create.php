<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


if (isset($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['repeat-password'])) {

    if ($_POST['password'] !== $_POST['repeat-password']) {
        $_SESSION['message'] = "Your passwords don't match!";
        redirect('/create.php');
    } else {
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
        $password = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));

        $statement = $pdo->prepare('SELECT email, username FROM users WHERE email = :email AND username = :username');

        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);

        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user['email'] == $email && $user['username'] == $username) {
            $_SESSION['message'] = 'You already have an account. Please sign in.';
            redirect('/index.php');
        } else {
            $avatar = 'default-avatar.png';
            $statement = $pdo->prepare('INSERT INTO users(name, email, username, password, avatar) VALUES(:name, :email, :username, :password, :avatar)');

            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->bindParam(':avatar', $avatar, PDO::PARAM_STR);

            $statement->execute();

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION['message'] = 'You created an account! Please login in.';
            redirect('/index.php');
        }

        redirect('/create.php');
    }

}
