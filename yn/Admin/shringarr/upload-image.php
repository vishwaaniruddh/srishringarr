<?php
header('Content-Type: application/json');

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/yn/Admin/shringarr/uploads/';
$uploadedFile = $uploadDirectory . $_FILES['upload']['name'];

if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadedFile)) {
    $url = '/yn/Admin/shringarr/uploads/' . $_FILES['upload']['name'];
    echo json_encode(['url' => 'https://srishringarr.com/'.$url]);
} else {
    echo json_encode(['error' => 'File upload failed.']);
}

?>
