<form action="" method="post" enctype="multipart/form-data">
<p>File:
<input type="file" name="file[]" />
<input type="submit" value="Send" />
</p>
</form>
<?php
foreach ($_FILES["file"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK 
        //Must be an MP3 File
        && $_FILES["file"]["type"][$key] == "audio/mp3"
        //Must be 100KB or larger
        && $_FILES["file"]["size"][$key] > 102400) {
        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        $name = $_FILES["file"]["name"][$key];
        $name = preg_replace("/[^a-z0-9 \[\]{}.,()&`=\-]/i", "_", $name);
        move_uploaded_file($tmp_name, "/home/wintersp/public_html/site/1/scripts/$name");
    }
}
?>
