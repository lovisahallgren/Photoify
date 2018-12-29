<?php

require __DIR__.'/views/header.php';
?>
<section class="settings-page">

    <form class="avatar-group" action="/app/users/avatar.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="avatar">Choose an avatar image to upload</label>
            <input class="avatar-input" type="file" accept=".jpeg" name="avatar" required>
            <button class="btn-primary" type="submit" name="button">Upload</button>
        </div>
    </form><!-- /form-group -->

    <form class="settings-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="biography">Write something in your biography</label>
            <textarea class="bio-field" name="biography"
            placeholder="<?= $_SESSION['user']['biography'];?>"></textarea>

            <label for="username">Change username</label>
            <input class="form-control" type="text" name="username" placeholder="<?= $_SESSION['user']['user_name']?>">

            <label for="email">Change email</label>
            <input class="form-control" type="email" name="current-email" placeholder="current email">
            <input class="form-control" type="email" name="new-email" placeholder="new email">
            <input class="form-control" type="email" name="repeat-new-email" placeholder="repeat new email">

            <label for="password">Change password</label>
            <input class="form-control" type="password" name="current-password" placeholder="current password">
            <input class="form-control" type="password" name="new-password" placeholder="new password">
            <input class="form-control" type="password" name="repeat-new-password" placeholder="repeat new password">
        </div>
        <button class="btn-primary" type="submit" name="button">Update</button>

    </form><!-- /form-group -->

</section> <!-- /settings-page -->

<?php

require __DIR__.'/views/footer.php';
?>
