<?php require __DIR__.'/views/header.php';?>


<form class="image-group" action="/app/posts/store.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="image">Choose an image to upload</label>
        <input class="image-input" type="file" accept=".jpeg" name="image" required>
        <label for="description">Description</label>
        <textarea class="description-field" name="description"
        placeholder="Write something here"></textarea>
        <button class="btn-primary" type="submit" name="button">Upload</button>
    </div>
</form><!-- /form-group -->

<?php require __DIR__.'/views/footer.php';?>
