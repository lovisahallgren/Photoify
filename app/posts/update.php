<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['update-description'], $_POST['post_id'])) {
    $postId = $_POST['post_id'];
    $updateDescription = trim(filter_var($_POST['update-description'], FILTER_SANITIZE_STRING));
    $userId = (int) $_SESSION['user']['id'];

    $dateAndTime = date('Y-m-d H:i:s');

    $statement = $pdo->prepare('UPDATE posts SET description = :description, updated_at = :updated_at WHERE id = :id');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':description', $updateDescription, PDO::PARAM_STR);
    $statement->bindParam(':updated_at', $dateAndTime, PDO::PARAM_STR);
    $statement->bindParam(':id', $postId, PDO::PARAM_INT);

    $statement->execute();

}
$_SESSION['message'] = 'Your changes has been updated';
redirect('/profile.php');
        // else {
        //     $_SESSION['message'] = 'Your changes didn\'t update. Please try again.';
        //
        // }
// }
