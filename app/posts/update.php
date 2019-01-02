<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['update-description'], $_POST['post-id'])) {
    $postId = $_POST['post-id'];
    $updateDescription = trim(filter_var($_POST['update-description'], FILTER_SANITIZE_STRING));
    $userId = (int) $_SESSION['user']['id'];

        // if (filter_var($updateDescription, FILTER_SANITIZE_STRING)) {

            $dateAndTime = date('d F Y');

            $statement = $pdo->prepare('UPDATE posts SET description = :description, updated_at = :updated_at WHERE id = :id');

            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }

            $statement->bindParam(':description', $updateDescription, PDO::PARAM_STR);
            $statement->bindParam(':updated_at', $dateAndTime, PDO::PARAM_STR);
            $statement->bindParam(':id', $postId, PDO::PARAM_INT);

            $statement->execute();

            // $desc = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION['message'] = 'Your changes has been updated';
            redirect('/profile.php');
        }
        // else {
        //     $_SESSION['message'] = 'Your changes didn\'t update. Please try again.';
        //
        // }
// }
