<?php

require __DIR__.'/views/header.php';

if(isset($message)) {
    echo $message;
}

?>
<section class="settings-page">

    <form class="avatar-group" action="/app/users/avatar.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="avatar">Choose an avatar image to upload</label>
            <input class="avatar-input" type="file" accept="image/jpeg, image/png" name="avatar" required>
            <button class="btn-primary" type="submit" name="button">Upload</button>
        </div>
    </form><!-- /form-group -->

    <form class="settings-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="biography">Write something in your biography</label>
            <textarea class="bio-field" name="biography"
            placeholder="<?= $_SESSION['user']['biography'] ?? 'Write something in your biography...'?>"></textarea>

            <label for="name">Change name</label>
            <input class="form-control" type="text" name="name" placeholder="<?= $_SESSION['user']['name']?>">

            <label for="username">Change username</label>
            <input class="form-control" type="text" name="username" placeholder="<?= $_SESSION['user']['username']?>">

            <label for="password-confirm">Confirm with password</label>
            <input class="form-control" type="password" name="confirm-password" placeholder="password">

            <button class="btn-primary" type="submit" name="button">Update</button>
        </div>
    </form><!-- /form-group -->


    <form class="settings-group" action="/app/users/settings-email.php" method="post" enctype="multipart/form-data">

        <label for="email">Change email</label>
        <input class="form-control" type="email" name="current-email" placeholder="<?= $_SESSION['user']['email']?>">
        <input class="form-control" type="email" name="new-email" placeholder="new email">
        <input class="form-control" type="email" name="repeat-new-email" placeholder="repeat new email">

        <button class="btn-primary" type="submit" name="button">Save</button>
        <button class="btn-primary" type="submit" name="button">Cancel</button>
    </form><!-- /form-group -->

    <form class="settings-group" action="/app/users/settings-password.php" method="post" enctype="multipart/form-data">
            <label for="password">Change password</label>
            <input class="form-control" type="password" name="current-password" placeholder="current password">
            <input class="form-control" type="password" name="new-password" placeholder="new password">
            <input class="form-control" type="password" name="repeat-new-password" placeholder="repeat new password">

            <button class="btn-primary" type="submit" name="button">Save</button>
            <button class="btn-primary" type="submit" name="button">Cancel</button>
    </form><!-- /form-group -->

</section> <!-- /settings-page -->

<?php

require __DIR__.'/views/footer.php';
?>
