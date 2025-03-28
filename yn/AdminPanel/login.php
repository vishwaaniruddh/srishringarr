<? session_start();
include('config.php');

// if($_SESSION['username']){ 

include('header.php');


?>

<style>
    body{
            overflow: hidden;
    }
</style>     
            <div class="pcoded-content" style="margin-left: 0px;">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-body">
                                <div class="card">
                                    <div class="card-block">
                                       
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <form action="process_login.php" class="md-float-material form-material" method="POST">

                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Log In</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required=""
                                        placeholder="Ener Username">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required=""
                                        placeholder="Password">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" type="submit" value="Sign In">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
                    
                    
    <? include('footer.php');
//     }
// else{ ?>
    
<!--//     <script>-->
<!--//         window.location.href="login.php";-->
<!--//     </script>-->

    ?>
</body>

</html>