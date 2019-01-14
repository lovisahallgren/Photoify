<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Checks if there is an image to upload
if (isLoggedIn() && isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $extension = pathinfo($_FILES['avatar']['name'])['extension'];
    $userName = $_SESSION['user']['username'];
    $filePath = __DIR__.'/avatar/';
    $id = (int) $_SESSION['user']['id'];

    $avatarName = $userName.'.'.$extension;

// Checks if image is of right kind and isn't to big
    if ($avatar['type'] !== 'image/jpeg' && $avatar['type'] !== 'image/png') {
        $_SESSION['message'] = 'The image file type is not allowed.';
    } elseif ($avatar['size'] >= 3000000) {
        $_SESSION['message'] = 'The uploaded file exceeded the filesize limit.';
    } else {

        filter_var($avatar['name'], FILTER_SANITIZE_STRING);
// Updates the database column avatar with the set image
        $statement = $pdo->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');

        $statement->bindParam(':avatar', $avatarName, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

// Moves image to directory
        move_uploaded_file($avatar['tmp_name'], $filePath.$avatarName);

    }
// Updates session variable to use the newly set image as avatar
    $_SESSION['message'] = 'Your new avatar has been uploaded!';
    $_SESSION['user']['avatar'] = $avatarName;
    redirect('/../profile.php');
} else {
    redirect('/');
}
