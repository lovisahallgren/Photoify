<?php

require __DIR__.'/views/header.php';
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

    <article class="posts">
        <div class="image">
            <img src="<?= 'app/posts/uploads/'.getPostsByUser($_SESSION['user']['id'], $posts)?>" alt="">
        </div>
    </article>

</section>
<?php

require __DIR__.'/views/footer.php';
?>
