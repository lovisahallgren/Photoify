<?php

require __DIR__.'/views/header.php';

?>

<h2>Upload post</h2>
<div class="upload">
    <form class="upload-post-group" action="/app/posts/store.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Choose an image to upload</label>
            <input class="image-input" type="file" accept="image/jpeg, image/png" name="image">
            <label for="description">Description</label>
            <textarea class="description-field" name="description"
            placeholder="Write something here"></textarea>
            <div class="update-post-buttons">
                <button class="btn-primary" type="submit" name="button">Upload</button>
                <button class="btn-primary cancel hidden" type="submit" name="button">Cancel</button>
            </div><!-- /update-post-buttons -->
        </div> <!-- /form-group -->
    </form><!-- upload-post-group -->
</div> <!-- upload -->

<?php

require __DIR__.'/views/footer.php';
?>
