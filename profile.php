<?php

require __DIR__.'/views/header.php';

?>

<section class="profile-page">
    <div class="username">
        <?php if (isLoggedIn()) {
            echo $_SESSION['user']['username'];
        }?>
    </div> <!-- username -->

    <div class="edit-div">
        <div class="avatar">
            <?php if (isLoggedIn()): ?>
                <img src="<?= '/app/users/avatar/'.$_SESSION['user']['avatar']?>" alt="">
            <?php endif; ?>
        </div> <!-- avatar -->

        <div class="edit-profile">
            <a href="app/users/settings.php">Edit my profile</a>
        </div> <!-- edit-profile -->
    </div> <!-- edit-div -->

    <div class="info">
        <div class="name">
            <?php if (isLoggedIn()) {
                echo $_SESSION['user']['name'];
            } ?>
        </div> <!-- name -->

        <div class="biography">
            <?php if (isLoggedIn()) {
                echo $_SESSION['user']['biography'];
            } ?>
        </div> <!-- biography -->
    </div> <!-- info -->

    <article class="posts">
        <?php $posts = getPostsByUser($_SESSION['user']['id'], $pdo);?>
        <?php foreach ($posts as $post) : ?>
            <?php $isLikedByUser = isLikedByUser($post['id'], $_SESSION['user']['id'], $pdo);?>
            <?php $likes = countLikes($post['id'], $pdo);?>
            <i class="fas fa-times exit hidden"></i>
        <div class="small-post">
            <img src="<?= 'app/posts/uploads/'.$_SESSION['user']['id'].'/'.$post['image']?>" alt="">
            <div data-id="<?= $post['id']?>" class="like">
                <p class="post-date"><?php if ($post['updated_at']) {
                    $date = explode(" ", $post['updated_at']);
                    echo "Edited: ".$date[0];
                } else {
                    $date = explode(" ", $post['created_at']);
                    echo $date[0];
                }?></p> <!-- post-date -->
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
                <p class="username-post"><?= $_SESSION['user']['username']; ?></p>
                <p><?= $post['description']?></p>
            </div> <!-- description -->

            <form data-id="<?= $post['id']?>" class="edit-form hidden" action="app/posts/update.php" method="post">
                <div class="edit-inputs">
                    <label for="update-description">Edit your description</label>
                    <textarea class="update-description-field" name="update-description"
                    placeholder="<?= $post['description'] ?>" required></textarea>
                </div> <!-- edit-inputs -->
                <div class="confirm-edit">
                    <button class="btn-primary" type="submit" name="post_id" value="<?= $post['id']; ?>">Save</button>
                    <button data-id="<?= $post['id']?>" class="btn-primary cancel-edit-btn" type="button" name="button">Cancel</button>
                </div> <!-- confirm-edit -->
            </form> <!-- edit-form -->

            <form data-id="<?= $post['id']?>" class="delete-form hidden" action="app/posts/delete.php" method="post">
                <div class="confirm-delete">
                    <p>Are you sure you want to delete this post?</p>
                    <div class="confirm-delete-buttons">
                        <button class="btn-primary delete" type="submit" name="post_id" value="<?= $post['id']; ?>">Confirm</button>
                        <button data-id="<?= $post['id']?>" class="btn-primary cancel-delete-btn" type="button" name="button">Cancel</button>
                    </div> <!-- confirm-delete-buttons -->
                </div> <!-- confirm-delete -->
            </form> <!-- delete-form -->

            <div data-id="<?= $post['id']?>" class="post-buttons">
                <button data-id="<?= $post['id']?>" class="btn-primary edit-post-btn" type="button" name="button">Edit post</button>
                <button data-id="<?= $post['id']?>" class="btn-primary delete-post-btn"  type="button" name="button">Delete post</button>
            </div> <!-- post-buttons -->
        </div> <!-- small-post -->
        <?php endforeach; ?>
    </article> <!-- posts -->

</section> <!-- profile-page -->

<?php

    require __DIR__.'/views/footer.php';

?>
