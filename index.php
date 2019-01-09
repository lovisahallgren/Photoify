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
                        <!-- <form class="like-form" action="app/posts/likes.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="post-id" value="<?= $post['id']; ?>">
                            <button class="like-button" type="submit" name="like"> -->
                            <i data-id="<?= $post['id']?>"class="far fa-heart unliked"></i>
                            <i data-id="<?= $post['id']?>" class="fas fa-heart liked hidden"></i>
                            <!-- </button> -->
                        <!-- </form> -->
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
