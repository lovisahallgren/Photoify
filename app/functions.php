<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

function getPostsByUser(int $id, $pdo) {

        $statement = $pdo->prepare('SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC');

        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);


        return $posts;
}

function getAllPosts($pdo) {

        $statement = $pdo->prepare('SELECT posts.id, posts.image, users.id as user_id, users.username, posts.description, posts.created_at, posts.updated_at FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC');

        $statement->execute();

        $allPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $allPosts;
}

function countLikes($postId, $pdo) {
    $statement = $pdo->prepare('SELECT COUNT(*) FROM likes WHERE post_id = :post_id');

    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

    $statement->execute();

    $likes = $statement->fetch(PDO::FETCH_ASSOC);

    return $likes["COUNT(*)"];
}

function isLikedByUser($postId, $userId, $pdo) {
    $statement = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');

    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

    $statement->execute();

    $isLikedByUser = $statement->fetch(PDO::FETCH_ASSOC);

    return $isLikedByUser ? true : false;
}
