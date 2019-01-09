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

        // $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

        $statement->execute();

        $allPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $allPosts;
}
