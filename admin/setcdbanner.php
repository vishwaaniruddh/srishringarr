<? include('config.php');


$bannerid = $_REQUEST['checkid'];
$check = $_REQUEST['check'];

$update = "update client_diary_details set banner='".$check."' where id='".$bannerid."'" ;

if(mysqli_query($con,$update)){
    echo 1;
}
else{
    echo 0;
}
?>