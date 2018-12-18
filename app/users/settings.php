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

    //Checks if email is set
} else if (isset($_POST['current-email'], $_POST['new-email'], $_POST['repeat-new-email'])) {
    $currentEmail = $_POST['current-email'];
    $newEmail = $_POST['new-email'];
    $repeatNewEmail = $_POST['repeat-new-email'];
    $id = (int) $_SESSION['user']['id'];

    $statement = $pdo->query('SELECT email FROM users WHERE id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    $currentEmailDb = $statement->fetch(PDO::FETCH_ASSOC);

// Checks if typed in current email matches email in database
    if ($currentEmail == $currentEmailDb['email']) {

// Checks if twice typed in new email matches
        if ($newEmail == $repeatNewEmail) {

// If yes update email in database
            $statement = $pdo->prepare('UPDATE users SET email = :email WHERE id = :id');

            $statement->bindParam(':email', $newEmail, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $statement->execute();

        // If new emails don't match, die page and echo something
        } else {
            die("New emails don't match!");
        }

        // If old email don't match database email, die page and echo something
    } else {
        echo die("Old email doesn't match!");
    }

    //Checks if password is set
} else if (isset($_POST['current-password'], $_POST['new-password'], $_POST['repeat-new-password'])) {
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $repeatNewPassword = $_POST['repeat-new-password'];
    $id = (int) $_SESSION['user']['id'];

// Get old password from database
    $statement = $pdo->query('SELECT password FROM users WHERE id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    $currentPasswordDb = $statement->fetch(PDO::FETCH_ASSOC);

// Checks if typed in current password matches password in database
    if (password_verify($currentPassword, $currentPasswordDb['password'])) {

// Checks if twice typed in new password matches
        if ($newPassword == $repeatNewPassword) {

// If yes update password in database
            $statement = $pdo->prepare('UPDATE users SET password = :password WHERE id = :id');
// hash password to database
            $statement->bindParam(':password', password_hash($newPassword, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $statement->execute();

        // If new passwords don't match, die page and echo something
        } else {
            die("New passwords don't match!");
        }

        // If old password don't match database password, die page and echo something
    } else {
        echo die("Old password doesn't match!");
    }
}

redirect('/../profile.php');
