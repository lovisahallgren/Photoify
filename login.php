<?php
require __DIR__.'/views/header.php';

if(isset($message)) {
    echo $message;
}

?>

<section class="login-page">

<form class="login-form" action="app/users/login.php" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="username" name="username" required>
        <small class="form-text text-muted">Please provide your username.</small>

        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" required>
        <small class="form-text text-muted">Please provide your password.</small>
    </div><!-- /form-group -->

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<a href="/create.php">Click here to create an account!</a>

</section>


<?php require __DIR__.'/views/footer.php'; ?>
