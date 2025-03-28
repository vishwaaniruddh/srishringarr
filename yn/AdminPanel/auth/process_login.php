<?php session_start();
include('../config.php') ; ?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>        
    </head>
    <body>
        


<?php
$uname = $_REQUEST['username'];
$password = $_REQUEST['password'];

if($uname && $password){
    
    
    $sql = mysqli_query($con,"select * from login1 where username = '".$uname."' and password='".$password."'");
    $result = mysqli_num_rows($sql);
    if($result>0){
        $sql_result = mysqli_fetch_assoc($sql);
        $_SESSION['auth']=1;
        $_SESSION['username']=$sql_result['username'];
        $_SESSION['designation']=$sql_result['designation'];
        $_SESSION['userid'] = $sql_result['srno'];
        $userid = $sql_result['srno'];
        $_SESSION['access'] = $sql_result['access'];
        $_SESSION['bm_id'] = $sql_result['bm_id'];
        
        $approval_sql = mysqli_query($con,"select * from approval_master where userid='".$userid."'");
        $approval_sql_result = mysqli_fetch_assoc($approval_sql);
        
        $_SESSION['min_approval_limit'] = $approval_sql_result['min_limit']; 
        $_SESSION['max_approval_limit'] = $approval_sql_result['max_limit'];
        
        ?>
       <script>
       swal("Good job!", "Login Success !", "success");

           setTimeout(function(){ 
               window.location.href="../index.php";
           }, 3000);

       </script> 

    <? }else{ ?>
       <script>
       swal("", "Login Error !", "error");
           swal('error','','Login Error');
           setTimeout(function(){ 
               window.history.back();
           }, 3000);

       </script>
<? }

    
    
}
else{ ?>
       <script>
       swal("", "Please Put Username and Password  !", "error");
           swal('error','','Login Error');
           setTimeout(function(){ 
               window.history.back();
           }, 3000);

       </script>
<? }

?>
    </body>
</html>