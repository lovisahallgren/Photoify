<?php

require __DIR__.'/views/header.php';

?>


<!-- <article> -->
    <h1 class="title"><?php echo $config['title']; ?></h1>
    <?php if (isLoggedIn()) : ?>
        <!-- <p><?= "Welcome, " . $_SESSION['user']['name'] ?></p> -->
<!-- </article> -->

    <section class="feed">
        <?php $allPosts = getAllPosts($pdo);?>
        <?php foreach ($allPosts as $post):?>
            <?php $isLikedByUser = isLikedByUser($post['id'], $_SESSION['user']['id'], $pdo);?>
            <?php $likes = countLikes($post['id'], $pdo);?>
            <article class="feed-post">
                <img src="<?= 'app/posts/uploads/'.$post['user_id'].'/'.$post['image']?>" alt="">
                <div data-id="<?= $post['id']?>" class="like">
                    <p class="post-date"><?php
                        $date = explode(" ", $post['created_at']);
                        echo $date[0];
                    ?></p> <!-- post-date -->
                    <p class="post-likes likes-post<?= $post['id']; ?>"><?= $likes ?></p>
                    <form class="like-form" method="post">
                        <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                        <input type="hidden" name="action" value="<?= $isLikedByUser ? 'unlike' : 'like'; ?>">
                        <button data-id="<?= $post['id']?>"class="like-button" type="submit" name="like">
                            <i class="far fa-heart like-button-<?= $post['id']?> like-button-heart <?= $isLikedByUser ? 'hidden' : '' ?>" ></i>
                            <i class="fas fa-heart like-button-<?= $post['id']?> like-button-heart liked <?= $isLikedByUser ? '' : 'hidden' ?>"></i>
                        </button> <!-- like-button -->
                    </form> <!-- like-form -->
                </div> <!-- like -->
                <div class="description">
                    <p class="username-post"><?= $post['username']; ?></p>
                    <p><?= $post['description']?></p>
                </div> <!-- description -->
            </article><!-- </feed-post> -->
        <?php endforeach; ?>
    </section> <!-- </feed> -->


    <?php else : ?>
    <section class="login-page">

        <form class="login-form" action="app/users/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="username" name="username" required>
                <small class="form-text text-muted">Please provide your username.</small>

                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" required>
                <small class="form-text text-muted">Please provide your password.</small>
            </div><!-- /form-group -->

            <button type="submit" class="btn btn-primary">Login</button>
        </form> <!-- login-form -->

        <a href="/create.php">Don't have an account? Sign up here!</a>

    </section> <!-- login-page -->
    <?php endif; ?>




<?php

require __DIR__.'/views/footer.php';
?>
