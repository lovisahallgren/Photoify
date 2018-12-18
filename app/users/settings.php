<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Checks if there is an image to upload
if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $extension = pathinfo($_FILES['avatar']['name'])['extension'];
    $userName = $_SESSION['user']['user_name'];
    $filePath = __DIR__.'/avatar/';
    $id = (int) $_SESSION['user']['id'];

    $avatarName = $userName.'.'.$extension;

// Checks if image is of right kind and isn't to big
    if ($avatar['type']!== 'image/jpeg') {
        echo 'The image file type is not allowed.';
    } elseif ($avatar['size'] >= 3000000) {
        echo 'The uploaded file exceeded the filesize limit.';
    } else {

// Updates the database column avatar with the set image
        $statement = $pdo->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');

        $statement->bindParam(':avatar', $avatarName, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

// Moves image to directory
        move_uploaded_file($avatar['tmp_name'], $filePath.$avatarName);
    }

// Updates session variable to use the newly set image as avatar
    $_SESSION['user']['avatar'] = $avatarName;

//Checks if biography is set
} elseif (isset($_POST['biography'])) {
    $biography = $_POST['biography'];
    $id = (int) $_SESSION['user']['id'];

// Updates the database column biography with set text
    $statement = $pdo->prepare('UPDATE users SET biography = :biography WHERE id = :id');

    $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();
}

redirect('/../profile.php');
