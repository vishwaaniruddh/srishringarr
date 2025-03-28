<?php
include('config.php');

var_dump($_POST);
if(isset($_POST['id'])) {
    $pageId = htmlspecialchars($_POST['pageid']);
    $pageName = htmlspecialchars($_POST['page_name']);
    $url = htmlspecialchars($_POST['url']);
    $metaTitle = htmlspecialchars($_POST['meta_title']);
    $metaKeywords = htmlspecialchars($_POST['meta_keywords']);
    $metaDescription = htmlspecialchars($_POST['meta_description']);
    
    $sql = "UPDATE pages SET title=?, url=?, meta_title=?, meta_keywords=?, meta_description=? WHERE id=?";
    

    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssi", $pageName, $url, $metaTitle, $metaKeywords, $metaDescription, $pageId);
    

    if ($stmt->execute()) {
        echo json_encode(array('success' => '202'));
    } else {
        echo json_encode(array('error' => 'Error updating page: ' . $stmt->error));
    }

    $stmt->close();
} else {

    echo json_encode(array('error' => 'Required data not provided'));
}

// Close the connection
$con->close();