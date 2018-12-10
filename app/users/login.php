<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['email'], $_POST['password'])) {
    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
}
