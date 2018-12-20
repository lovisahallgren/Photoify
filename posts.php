<?php require __DIR__.'/views/header.php';?>


<form class="upload-image-group" action="/app/posts/store.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="upload-image">Choose an image to upload</label>
        <input type="file" accept=".jpeg" name="upload-image" required>
        <button class="confirm-btn" type="submit" name="button">Upload</button>

    </div>
</form>


<?php require __DIR__.'/views/footer.php';?>
