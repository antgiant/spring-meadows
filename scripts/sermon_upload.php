<form action="" method="post" enctype="multipart/form-data">
<p>File:
<input type="file" name="file[]" />
<input type="submit" value="Send" />
</p>
</form>
<?php
foreach ($_FILES["file"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        $name = $_FILES["file"]["name"][$key];
        move_uploaded_file($tmp_name, "/home/wintersp/public_html/site/1/scripts/$name");
    }
}
?>
