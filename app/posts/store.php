<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_FILES(['upload-image']))) {
    $uploadImage = $_FILES['upload-image'];
    $extension = pathinfo($_FILES['upload-image']['name'])['extension'];
    $userName = $_SESSION['user']['user_name'];
    $filePath = __DIR__.'/uploads/';
    $id = (int) $_SESSION['user']['id'];
    $dateAndTime = date('d F Y');

    $imageName = $userName.'-'.$dateAndTime.'.'.$extension;

    if ($uploadImage['type']!== 'image/jpeg') {
        echo 'The image file type is not allowed.';
    } elseif ($uploadImage['size'] >= 3000000) {
        echo 'The uploaded file exceeded the filesize limit.';
    } else {
        move_uploaded_file($uploadImage['tmp_name'], $filePath.$imageName);
    }

}






// redirect('/../posts.php');
