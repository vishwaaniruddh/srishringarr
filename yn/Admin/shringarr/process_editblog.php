<? include('config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$blogid = $_REQUEST['blogid'];
$title = $_REQUEST['title'];
$content = htmlspecialchars($_POST['content']);


// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
// return ; 


if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])){

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

}else{
    $sql = mysqli_query($con,"select * from blogs where id='".$blogid."'");
    $sql_result = mysqli_fetch_assoc($sql);
    $target_file = $sql_result['image'];
}


    $query = "update blogs set title='".$title."', content='".$content."', image='".$target_file."' where id='".$blogid."' ";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Blog post Updated successfully!";
    } else {
        echo "Error updating blog post: " . mysqli_error($con);
    }
    

if(isset($_REQUEST['submit_publish']) && !empty($_REQUEST['submit_publish'])){
    // save and published
    $query = "update blogs set isPublished=1 where id='".$blogid."'  ";
}else{
    // save_draft
    $query = "update blogs set isPublished=0 where id='".$blogid."'";
}
mysqli_query($con,$query);



?>


<br />
<a href="./allblogs.php">Go Back</a>