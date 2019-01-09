<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['description'], $_FILES['image'])) {
    $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $image = $_FILES['image'];

    if ($image['type'] !== 'image/jpeg') {
        $_SESSION['message'] = 'The image file type is not allowed.';
    }
    elseif ($image['size'] >= 3000000) {
        $_SESSION['message'] = 'The uploaded file exceeded the filesize limit.';
    }
    elseif (filter_var($image['name'], FILTER_SANITIZE_STRING)) {
        if (isset($_SESSION['user']['id'])) {
            $id = (int) $_SESSION['user']['id'];
            $extension = pathinfo($image['name'])['extension'];
            $userFolder = $id;
            $filePath = __DIR__."/uploads/$userFolder/";
            $dateAndTime = date('d-M-Y-H:i:s');
            $imageName = $id.'_'.$dateAndTime.'.'.$extension;

            $statement = $pdo->prepare("INSERT INTO posts(image, description, user_id) VALUES(:image, :description, :user_id)");

            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }

            $statement->bindParam(':image', $imageName, PDO::PARAM_STR);
            $statement->bindParam(':description', $description, PDO::PARAM_STR);
            $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

            $statement->execute();

            $images = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (!is_dir(__DIR__."/uploads/$userFolder")) {
                mkdir(__DIR__."/uploads/$userFolder");
            };

            move_uploaded_file($image['tmp_name'], $filePath.$imageName);
            $_SESSION['message'] = 'Your post has been uploaded';

            redirect('/profile.php');
        }

    }
    elseif (!isset($_POST['description'], $_FILES['image'])) {
        redirect('/profile.php');
    }

}

$_SESSION['message'] = 'You need to choose an image to upload.';

redirect('/../posts.php');
