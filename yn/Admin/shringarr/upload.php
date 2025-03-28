<?php
$uploadPath = 'uploads/';

if ($_FILES['upload']['error'] === UPLOAD_ERR_OK) {
    $tempName = $_FILES["upload"]["tmp_name"];
    $fileName = $_FILES["upload"]["name"];

    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = uniqid() . '.' . $extension;
    $destination = $uploadPath . $newFileName;

    if (move_uploaded_file($tempName, $destination)) {
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $destination;
        echo '<script>window.parent.CKEDITOR.tools.callFunction(' . $_GET['CKEditorFuncNum'] . ', "' . $url . '", "File uploaded successfully");</script>';
    } else {
        echo '<script>window.parent.CKEDITOR.tools.callFunction(' . $_GET['CKEditorFuncNum'] . ', "", "There was a problem uploading the file");</script>';
    }
}
