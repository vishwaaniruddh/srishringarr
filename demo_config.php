<?php 
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

date_default_timezone_set('Asia/Kolkata');
$con = mysqli_connect("localhost", "u464193275_srishrinjuser", "9b@hMgk!=zI","u464193275_srishrinjewels");
$conn = mysqli_connect("localhost", "u464193275_srishrinjuser", "9b@hMgk!=zI","u464193275_srishrinjewels");
$con3=mysqli_connect("localhost", "u464193275_sarmicropos", "Mypos1234","u464193275_srishringarr");
$pathmain="";


$currency = $_SESSION['cur'] ?? ($_SESSION['cur'] = 'INR');


// Check if gid is set
if (!isset($_SESSION['gid'])) { 
    $query = "INSERT INTO `Registration`(`registration_id`) VALUES (NULL)";
    if (mysqli_query($con, $query)) {
        $_SESSION['gid'] = mysqli_insert_id($con);
        echo "GID Set: " . $_SESSION['gid'];
    } else {
        echo "MySQL Error: " . mysqli_error($con);
    }
}

$userid = $_SESSION['gid'] ?? 'Not Set';
?>
