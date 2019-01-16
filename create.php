<?php

require __DIR__.'/views/header.php';

 ?>

<section>
    <h2>Create account</h2>
    <?php if(isset($message)) {
        echo $message;
    } ?>
    <form class="create-account-form" action="app/users/create.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" placeholder="name" required>

            <label for="name">Email</label>
            <input class="form-control" type="email" name="email" placeholder="email" required>

            <label for="user_name">Username</label>
            <input class="form-control" type="username" name="username" placeholder ="username" required>

            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder ="password" required>

            <label for="repeat-password">Repeat password</label>
            <input class="form-control" type="password" name="repeat-password" placeholder ="repeat password" required>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Sign up</button>

    </form> <!-- create-account-form -->

</section>
<a href="/index.php">Already have an account? Click here to sign in!</a>

<?php require __DIR__.'/views/footer.php'; ?>
