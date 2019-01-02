<?php

require __DIR__.'/views/header.php';

?>


<article>
    <h1><?php echo $config['title']; ?></h1>
    <?php if (isset($_SESSION['user'])) : ?>
        <p><?= "Welcome, " . $_SESSION['user']['name'] ?></p>
    <?php else : ?>
        <p>This is the home page.</p>
    <?php endif; ?>
</article>

<section>
    <?php $posts = getAllPosts($_SESSION['user'], $pdo);?>
    <?php foreach ($posts as $post): ?>
        <img src="<?= 'app/posts/uploads/'.$_SESSION['user']['id'].'/'.$post['image']?>" alt="">
    <?php endforeach; ?>
</section>



<?php

require __DIR__.'/views/footer.php';
?>
