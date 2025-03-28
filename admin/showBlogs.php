<?php
include("config.php");

// Fetch blogs from the database
$query = "SELECT * FROM blogs ORDER BY created_at DESC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>

<h2>Latest Blogs</h2>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div>
        <h3><?php echo $row["title"]; ?></h3>
        <p><?php echo $row["content"]; ?></p>
        <img src="<?php echo $row["image"]; ?>" alt="Blog Image" style="max-width: 300px;">
        <p><a href="<?php echo $row["link"]; ?>" target="_blank">Read More</a></p>
    </div>
    <hr>
<?php } ?>

</body>
</html>
