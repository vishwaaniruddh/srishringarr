<?php session_start();
include('config.php') ; ?>
<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>        
    </head>
    <body>
        


<?php
$uname = $_REQUEST['username'];
$password = $_REQUEST['password'];

if($uname && $password){
    
    // echo "select * from login2 where username = '".$uname."' and password='".$password."'" ; 
    $sql = mysqli_query($con,"select * from login where username = '".$uname."' and password='".$password."'");
    $result = mysqli_num_rows($sql);
    if($result>0){
        $sql_result = mysqli_fetch_assoc($sql);
        $_SESSION['auth']=1;
        $_SESSION['username']=$sql_result['username'];
        
        ?>
       <script>
       swal("Good job!", "Login Success !", "success");

           setTimeout(function(){ 
               window.location.href="index.php";
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