<?php

require __DIR__.'/views/header.php';
?>
<section class="profile-page">

<form class="form-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
    <label for="avatar">Choose an avatar image to upload</label>
    <input type="file" accept=".jpeg" name="avatar" required>
    <button class="confirm-btn" type="submit" name="button">Upload</button>
</form><!-- /form-group -->

<?php if (isset($_SESSION['user'])): ?>
    <img src="<?= '/app/users/avatar/'.$_SESSION['user']['avatar']?>" alt="">
<?php endif; ?>

<form class="form-group" action="/app/users/settings.php" method="post">
    <label for="biography">Write something in your biography</label>
    <textarea class="bio-field" name="biography"></textarea>
    <button class="confirm-btn" type="submit" name="button">Submit</button>
</form><!-- /form-group -->

<?php if (isset($_SESSION['user'])): ?>
    <p> <?php
        $query = $pdo->query('SELECT * FROM users');
        while($user = $query->fetch(PDO::FETCH_ASSOC)) {
            echo $user['biography'];
        } ?>
    </p>
<?php endif; ?>

<form class="form-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
    <label for="email">Change email</label>
    <input class="form-control" type="email" name="current-email" placeholder="current email">
    <input class="form-control" type="email" name="new-email" placeholder="new email">
    <input class="form-control" type="email" name="repeat-new-email" placeholder="repeat new email">
    <!-- <small class="form-text text-muted">Change email address.</small> -->
    <button class="confirm-btn" type="submit" name="button">Confirm email</button>
</form><!-- /form-group -->

<form class="form-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
    <label for="password">Change password</label>
    <input class="form-control" type="password" name="current-password" placeholder="current password">
    <input class="form-control" type="password" name="new-password" placeholder="new password">
    <input class="form-control" type="password" name="repeat-new-password" placeholder="repeat new password">
    <!-- <small class="form-text text-muted">Change password.</small> -->
    <button class="confirm-btn" type="submit" name="button">Confirm password</button>
</form><!-- /form-group -->

</section>

<?php

require __DIR__.'/views/footer.php';
?>
