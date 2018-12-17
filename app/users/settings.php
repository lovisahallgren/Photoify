<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// die(var_dump(pathinfo($_FILES['avatar']['name'])['extension']));

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $extension = pathinfo($_FILES['avatar']['name'])['extension'];
    $userName = $_SESSION['user']['user_name'];
    $filePath = __DIR__.'/avatar/';
    $id = (int) $_SESSION['user']['id'];

    $avatarName = $userName.'.'.$extension;


    if ($avatar['type']!== 'image/jpeg') {
        echo 'The image file type is not allowed.';
    } elseif ($avatar['size'] >= 3000000) {
        echo 'The uploaded file exceeded the filesize limit.';
    } else {

        $statement = $pdo->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');

        $statement->bindParam(':avatar', $avatarName, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        move_uploaded_file($avatar['tmp_name'], $filePath.$avatarName);
    }


}

redirect('/../profile.php');
