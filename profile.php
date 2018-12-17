<?php

require __DIR__.'/views/header.php';
?>

<form class="" action="upload.php" method="post" enctype="multipart/form-data">
    <label for="avatar">Choose an avatar image to upload</label>
    <input type="file" accept=".jpg" name="avatar" value="" multiple="" required>
    <button type="submit" name="button">Upload</button>
</form>








<?php

require __DIR__.'/views/footer.php';
?>
