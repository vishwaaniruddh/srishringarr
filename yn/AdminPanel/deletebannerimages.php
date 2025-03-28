<?php
include ('config.php');

$id = $_REQUEST['id'];

$sqldelete = mysqli_query($con,"delete from yn_banner where id = '".$id."'");
if($sqldelete){ ?>
    <script>
        alert("Record Deleted Successfully !!");
        window.location.href="banner.php";
    </script>
<? } else { ?>
       <script>
        alert("Error Something Wrong !!");
         window.location.href="banner.php";
    </script> 
<? }

?>