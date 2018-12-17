<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Login</h1>

    <form class="create-account-form" action="app/users/create.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" placeholder="Name" required>
            <small class="form-text text-muted">Please provide your full name.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="name">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" required>
            <small class="form-text text-muted">Please provide your email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="username" name="username" required>
            <small class="form-text text-muted">Please provide a username.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Please provide your password (passphrase).</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Sign up</button>

    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
