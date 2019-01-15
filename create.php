<?php

require __DIR__.'/views/header.php';

if(isset($message)) {
    echo $message;
}
 ?>


<article>
    <h2>Create account</h2>

    <form class="create-account-form" action="app/users/create.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" placeholder="Name" required>
            <small class="form-text text-muted">Please provide your full name.</small>

            <label for="name">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" required>
            <small class="form-text text-muted">Please provide your email address.</small>

            <label for="user_name">Username</label>
            <input class="form-control" type="username" name="username" required>
            <small class="form-text text-muted">Please provide a username.</small>

            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Please provide your password (passphrase).</small>

            <label for="repeat-password">Repeat password</label>
            <input class="form-control" type="password" name="repeat-password" required>
            <small class="form-text text-muted">Please repeat your password.</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Sign up</button>

    </form> <!-- create-account-form -->

    <a href="/index.php">Already have an account? Click here to sign in!</a>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
