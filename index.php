<?php

require __DIR__.'/views/header.php';

?>

<!--
<article>
    <?php if (isset($_SESSION['user'])) : ?>
        <p><?= "Welcome, " . $_SESSION['user']['name'] ?></p>

</article> -->
    <section class="feed">
        <h1 class="title"><?php echo $config['title']; ?></h1>
        <?php $allPosts = getAllPosts($pdo);?>
        <?php foreach ($allPosts as $post):?>
            <?php $isLikedByUser = isLikedByUser($post['id'], $_SESSION['user']['id'], $pdo);?>
            <?php $likes = countLikes($post['id'], $pdo);?>
            <article class="feed-post">
                <img src="<?= 'app/posts/uploads/'.$post['user_id'].'/'.$post['image']?>" alt="">
                <div data-id="<?= $post['id']?>" class="like">
                    <p class="post-date"><?php if ($post['updated_at']) {
                        $date = explode(" ", $post['updated_at']);
                        echo $date[0];
                    } else {
                        $date = explode(" ", $post['created_at']);
                        echo $date[0];
                    }?></p>
                    <p class="post-likes likes-post<?= $post['id']; ?>"><?= $likes ?></p>
                    <form class="like-form" method="post">
                        <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                        <input type="hidden" name="action" value="<?= $isLikedByUser ? 'unlike' : 'like'; ?>">
                        <button data-id="<?= $post['id']?>"class="like-button" type="submit" name="like">
                            <i class="far fa-heart like-button-<?= $post['id']?> like-button-heart <?= $isLikedByUser ? 'hidden' : '' ?>" ></i>
                            <i class="fas fa-heart like-button-<?= $post['id']?> like-button-heart liked <?= $isLikedByUser ? '' : 'hidden' ?>"></i>
                        </button>
                    </form>
                </div>
                <div class="description">
                    <p class="username-post"><?= $post['username']; ?></p>
                    <p><?= $post['description']?></p>
                </div>
            </article><!-- </feed-post> -->
        <?php endforeach; ?>
    </section> <!-- </feed> -->


    <?php else : ?>
        <p>This is the home page.</p>
    <?php endif; ?>




<?php

require __DIR__.'/views/footer.php';
?>
