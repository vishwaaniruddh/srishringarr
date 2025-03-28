<?php
include("config.php"); // Include your database configuration

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $link = $_POST["link"];

    // Handle image upload (customize as needed)
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $target_file = $_REQUEST['image'];

    // Insert data into the database using prepared statements
    $statement = "INSERT INTO blogs (title, content, image, link, site, status) VALUES('".$title."', '".$content."', '".$target_file."', '".$link."','SS',1)" ;

    
    // Execute the statement
    if (mysqli_query($con,$statement)) {
        $insertId = $con->insert_id;
        echo "Blog post created successfully!";

        if (isset($_REQUEST['submit_publish']) && !empty($_REQUEST['submit_publish'])) {
            // save and publish
            $query = "UPDATE blogs SET isPublished = 1 WHERE id = '".$insertId."'";
        } else {
            // save draft
            $query = "UPDATE blogs SET isPublished = 0 WHERE id = '".$insertId."'";
        }

mysqli_query($con,$query);

    } else {
        echo "Error creating blog post: " . mysqli_error($con);
    }
}
?>

<br />
<a href="./allblogs.php">GO Back</a>
