<?php

require __DIR__.'/views/header.php';

if(isset($message)) {
    echo $message;
}

?>
<p>Settings</p>
<section class="settings-page">

    <form class="avatar-group" action="/app/users/avatar.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="avatar">Choose an avatar image to upload</label>
            <input class="avatar-input" type="file" accept="image/jpeg, image/png" name="avatar" required>
            <button class="btn-primary" type="submit" name="button">Upload</button>
        </div> <!-- /form-group -->
    </form> <!-- avatar-group -->

    <form class="settings-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="biography">Write something in your biography</label>
            <textarea class="bio-field" name="biography"
            placeholder="<?= $user['biography'] ?? 'Write something in your biography...'?>"></textarea>

            <label for="name">Change name</label>
            <input class="form-control" type="text" name="name" placeholder="<?= $user['name']?>">

            <label for="username">Change username</label>
            <input class="form-control" type="text" name="username" placeholder="<?= $user['username']?>">

            <label for="password-confirm">Confirm with password</label>
            <input class="form-control" type="password" name="confirm-password" placeholder="password">

            <button class="btn-primary" type="submit" name="button">Update</button>
        </div> <!-- form-group -->
    </form><!-- settings-group -->


    <form class="settings-group" action="/app/users/settings-email.php" method="post" enctype="multipart/form-data">

        <label for="email">Change email</label>
        <input class="form-control" type="email" name="current-email" placeholder="<?= $user['email']?>">
        <input class="form-control" type="email" name="new-email" placeholder="new email">
        <input class="form-control" type="email" name="repeat-new-email" placeholder="repeat new email">

        <button class="btn-primary" type="submit" name="button">Save</button>
        <button class="btn-primary" type="submit" name="button">Cancel</button>
    </form><!-- setttings-group -->

    <form class="settings-group" action="/app/users/settings-password.php" method="post" enctype="multipart/form-data">
            <label for="password">Change password</label>
            <input class="form-control" type="password" name="current-password" placeholder="current password">
            <input class="form-control" type="password" name="new-password" placeholder="new password">
            <input class="form-control" type="password" name="repeat-new-password" placeholder="repeat new password">

            <button class="btn-primary" type="submit" name="button">Save</button>
            <button class="btn-primary" type="submit" name="button">Cancel</button>
    </form><!-- settings-group -->

    <!-- <label>Delete my account</label> -->
    <button class="btn-primary delete-account-btn" type="submit" name="button">Delete account</button>
    <form class="settings-group" action="/app/users/delete.php" method="post" enctype="multipart/form-data">
        <div class="confirm-delete-account hidden">
            <p>Are you sure you want to delete your account with all it's content?</p>
            <div class="delete-account-buttons">
                <button class="btn-primary delete-account" type="submit" name="delete-account" value="<?= isLoggedIn() ?>">Delete my account</button>
                <button class="btn-primary cancel-delete-btn" type="button" name="button">Cancel</button>
            </div> <!-- delete-account-buttons -->
        </div> <!-- confirm-delete-account -->
    </form><!-- settings-group -->

</section> <!-- /settings-page -->

<?php

require __DIR__.'/views/footer.php';
?>
