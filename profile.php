<?php

require __DIR__.'/views/header.php';
?>
<section class="profile-page">

    <form class="avatar-group" action="/app/users/avatar.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="avatar">Choose an avatar image to upload</label>
            <input type="file" accept=".jpeg" name="avatar" required>
            <button class="confirm-btn" type="submit" name="button">Upload</button>
        </div>

        <?php if (isset($_SESSION['user'])): ?>
            <img src="<?= '/app/users/avatar/'.$_SESSION['user']['avatar']?>" alt="">
        <?php endif; ?>
    </form><!-- /form-group -->

    <form class="settings-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="biography">Write something in your biography</label>
            <textarea class="bio-field" name="biography"></textarea>

            <?php if (isset($_SESSION['user'])): ?>
                <p> <?= $_SESSION['user']['biography']; ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
            <label for="email">Change email</label>
            <input class="form-control" type="email" name="current-email" placeholder="current email">
            <input class="form-control" type="email" name="new-email" placeholder="new email">
            <input class="form-control" type="email" name="repeat-new-email" placeholder="repeat new email">
        </div>

        <div class="form-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
            <label for="password">Change password</label>
            <input class="form-control" type="password" name="current-password" placeholder="current password">
            <input class="form-control" type="password" name="new-password" placeholder="new password">
            <input class="form-control" type="password" name="repeat-new-password" placeholder="repeat new password">
            <button class="update-btn" type="submit" name="button">Update</button>
        </div>

    </form><!-- /form-group -->

</section> <!-- /profile-page -->

<?php

require __DIR__.'/views/footer.php';
?>
