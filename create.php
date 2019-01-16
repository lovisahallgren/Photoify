<?php

require __DIR__.'/views/header.php';

 ?>

<article>
    <h2>Create account</h2>
    <?php if(isset($message)) {
        echo $message;
    } ?>
    <form class="create-account-form" action="app/users/create.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" placeholder="Name" required>

            <label for="name">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" required>

            <label for="user_name">Username</label>
            <input class="form-control" type="username" name="username" required>

            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>

            <label for="repeat-password">Repeat password</label>
            <input class="form-control" type="password" name="repeat-password" required>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Sign up</button>

    </form> <!-- create-account-form -->

    <a href="/index.php">Already have an account? Click here to sign in!</a>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
