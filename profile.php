<?php

require __DIR__.'/views/header.php';

// $posts = getPostsByUser($_SESSION['user']['id'], $pdo);
?>

<section class="profile-page">

    <?php if(isset($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <div class="username">
        <?php if (isset($_SESSION['user'])) {
            echo $_SESSION['user']['user_name'];
        } ?>
    </div>

<div class="edit-div">

    <div class="avatar">
        <?php if (isset($_SESSION['user'])): ?>
            <img src="<?= '/app/users/avatar/'.$_SESSION['user']['avatar']?>" alt="">
        <?php endif; ?>
    </div>

    <div class="edit-profile">
        <a href="app/users/settings.php">Edit my profile</a>
    </div>
</div>

    <div class="name">
        <?php if (isset($_SESSION['user'])) {
            echo $_SESSION['user']['name'];
        } ?>
    </div>

    <div class="biography">
        <?php if (isset($_SESSION['user'])) {
            echo $_SESSION['user']['biography'];
        } ?>
    </div>

    <div class="posts-header">
        <div class="">
            <a class="logo" href="./index.php">
                <img src="logo.png" alt="Logo">
            </a>
        </div>
        <div class="username">
            <?php if (isset($_SESSION['user'])) {
                echo $_SESSION['user']['user_name'];
            } ?>
        </div>
    </div>

    <article class="posts">
        <?php $posts = getPostsByUser($_SESSION['user']['id'], $pdo);?>
        <?php foreach ($posts as $post) : ?>
            <i class="fas fa-times exit hidden"></i>
        <div class="small-post">
            <img src="<?= 'app/posts/uploads/'.$_SESSION['user']['id'].'/'.$post['image']?>" alt="">
            <div class="like">
                <p class="post-date"><?php if ($post['updated_at']) {
                    echo $post['updated_at'];
                } else {
                    echo $post['created_at'];
                }?></p>
                <i class="far fa-heart not-liked"></i>
                <i class="fas fa-heart liked hidden"></i>
            </div>
            <div class="description">
                <p class="username-post"><?= $_SESSION['user']['user_name']; ?></p>
                <p><?= $post['description']?></p>
            </div>

            <form data-id="<?= $post['id']?>" class="edit-form hidden" action="app/posts/update.php" method="post">
                <div class="edit-inputs">
                    <label for="update-description">Edit your description</label>
                    <textarea class="update-description-field" name="update-description"
                    placeholder="<?= $post['description'] ?>" required></textarea>
                </div>
                <div data-id="<?= $post['id']?>" class="edit-buttons">
                    <button class="btn-primary" type="submit" name="post-id" value="<?= $post['id']; ?>">Update text</button>
                    <button data-id="<?= $post['id']?>" class="cancel-btn" type="button" name="button">Cancel</button>
                </div>
            </form>

            <div data-id="<?= $post['id']?>" class="post-buttons">
                <button data-id="<?= $post['id']?>" class="edit-btn" type="button" name="button">Edit post</button>
                <button class="delete-btn"  type="button" name="button">Delete post</button>
            </div>
        </div> <!-- small post -->
    <?php endforeach; ?>
    </article>

</section>
<?php

require __DIR__.'/views/footer.php';
?>
