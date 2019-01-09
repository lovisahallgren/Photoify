<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['post-id'])) {
    $postId = $_POST['post-id'];
    $userId = (int) $_SESSION['user']['id'];
    $userFolder = $userId;

    $userPosts = getPostsByUser($userId, $pdo);

    foreach ($userPosts as $userPost) {
        if ($postId == $userPost['id']) {

            $imageName = $userPost['image'];

            $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id AND image = :image');

            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }

            $statement->bindParam(':id', $postId, PDO::PARAM_STR);
            $statement->bindParam(':image', $imageName, PDO::PARAM_STR);

            $statement->execute();

            unlink(__DIR__.'/uploads/'.$userFolder.'/'.$imageName.'');

            $_SESSION['message'] = 'Your post has been deleted';
        }
    }
}
redirect('/profile.php');
