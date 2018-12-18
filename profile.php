<?php

require __DIR__.'/views/header.php';
?>

<form class="form-group" action="/app/users/settings.php" method="post" enctype="multipart/form-data">
    <label for="avatar">Choose an avatar image to upload</label>
    <input type="file" accept=".jpeg" name="avatar" required>
    <button type="submit" name="button">Upload</button>
</form>

<?php if (isset($_SESSION['user'])): ?>
    <img src="<?= '/app/users/avatar/'.$_SESSION['user']['avatar']?>" alt="">
<?php endif; ?>

<form class="form-group" action="/app/users/settings.php" method="post">
    <label for="biography">Write something in your biography</label>
    <textarea name="biography"></textarea>
    <button type="submit" name="button">Submit</button>
</form>



<?php if (isset($_SESSION['user'])): ?>
    <p><?php
    $query = $pdo->query('SELECT * FROM users');
    while($user = $query->fetch(PDO::FETCH_ASSOC)){
        echo $user['biography'];
    }
    ?>
    </p>
<?php endif; ?>





<?php

require __DIR__.'/views/footer.php';
?>
