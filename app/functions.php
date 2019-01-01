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

        $fileName = '/uploads/'.$id;

        $statement = $pdo->prepare('SELECT * FROM posts WHERE user_id = :user_id');

        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);


        // for ($i=0; $i < count($posts); $i++) {
        //     die(var_dump($posts));
        //     if (file_exists($fileName.'/'.$posts[$i]['image'])) {
        //         return $posts[$i]['image'];
        //     }
        // }

        return $posts;
        // die(var_dump($posts));
}

// die(var_dump(getPostsByUser(3, "hej")));
