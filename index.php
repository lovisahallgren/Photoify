<?php

require __DIR__.'/views/header.php';
// die(var_dump($_SESSION['user']['user_name']));
die(var_dump(__DIR__.'/app/users/avatar/'.$_SESSION['user']['avatar']));
?>


<article>
    <h1><?php echo $config['title']; ?></h1>
    <?php if (isset($_SESSION['user'])) : ?>
        <p><?= "Welcome, " . $_SESSION['user']['name'] ?></p>
    <?php else : ?>
        <p>This is the home page.</p>
    <?php endif; ?>
</article>



<?php

require __DIR__.'/views/footer.php';
?>
