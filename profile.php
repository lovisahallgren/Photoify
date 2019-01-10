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
            echo $_SESSION['user']['username'];
        }?>
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

<!-- <section class="info-box"> -->

    <div class="info">
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
    </div>

<!-- </section> -->

<a class="upload-post">Upload post</a>
<div class="upload">
    <form class="upload-post-group hidden" action="/app/posts/store.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Choose an image to upload</label>
            <input class="image-input" type="file" accept=".jpeg" name="image">
            <label for="description">Description</label>
            <textarea class="description-field" name="description"
            placeholder="Write something here"></textarea>
            <div class="update-post-buttons">
                <button class="btn-primary" type="submit" name="button">Upload</button>
                <button class="btn-primary cancel hidden" type="submit" name="button">Cancel</button>
            </div><!-- /update-post-buttons -->
        </div>
    </form><!-- /form-group -->
</div>

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
                <p class="username-post"><?= $_SESSION['user']['username']; ?></p>
                <p><?= $post['description']?></p>
            </div>

            <form data-id="<?= $post['id']?>" class="edit-form hidden" action="app/posts/update.php" method="post">
                <div class="edit-inputs">
                    <label for="update-description">Edit your description</label>
                    <textarea class="update-description-field" name="update-description"
                    placeholder="<?= $post['description'] ?>" required></textarea>
                </div>
                <div class="confirm-edit">
                    <button class="btn-primary" type="submit" name="post_id" value="<?= $post['id']; ?>">Save</button>
                    <button data-id="<?= $post['id']?>" class="btn-primary cancel-edit-btn" type="button" name="button">Cancel</button>
                </div>
            </form>

            <form data-id="<?= $post['id']?>" class="delete-form hidden" action="app/posts/delete.php" method="post">
                <div class="confirm-delete">
                    <p>Are you sure you want to delete this post?</p>
                    <div class="confirm-delete-buttons">
                        <button class="btn-primary delete" type="submit" name="post_id" value="<?= $post['id']; ?>">Confirm</button>
                        <button data-id="<?= $post['id']?>" class="btn-primary cancel-delete-btn" type="button" name="button">Cancel</button>
                    </div>
                </div>
            </form>

            <div data-id="<?= $post['id']?>" class="post-buttons">
                <button data-id="<?= $post['id']?>" class="btn-primary edit-post-btn" type="button" name="button">Edit post</button>
                <button data-id="<?= $post['id']?>" class="btn-primary delete-post-btn"  type="button" name="button">Delete post</button>
            </div>
        </div> <!-- small post -->
    <?php endforeach; ?>
    </article>

</section>
<?php

require __DIR__.'/views/footer.php';
?>
