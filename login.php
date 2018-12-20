<?php require __DIR__.'/views/header.php'; ?>


<form class="login-form" action="app/users/login.php" method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" placeholder="e-mail@email.com" required>
        <small class="form-text text-muted">Please provide your email address.</small>

        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" required>
        <small class="form-text text-muted">Please provide your password.</small>
    </div><!-- /form-group -->

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<a href="/create.php">Click here to create an account!</a>
<?php require __DIR__.'/views/footer.php'; ?>
