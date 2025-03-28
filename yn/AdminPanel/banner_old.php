<? session_start();
include('config.php');

if($_SESSION['username']){ 

include('header.php');
?>
             <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>        
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-body">
                                <div class="card">
                                    <div class="card-block">
                                        
                                        <?
                                            if (!is_dir('banner/')) {
                                                mkdir('banner/', 0777, true);
                                            }        
                                          
                                          
                                          if(isset($_POST['submit'])){
                                              $title = $_POST['title'];
                                              $description = $_POST['description'];
                                              $link = $_POST['link'];
                                              $image_name = $_FILES['image']['name'];
                                              $image_temp = $_FILES['image']['tmp_name'];
                                              
                                              $created_at = date('Y-m-d');
                                              if(move_uploaded_file($image_temp ,'banner/'.$image_name)){
                                                   $image = 'banner/'.$image_name ;
                                                   
                                                   $statement = "insert into yn_banner(image,title,description,link,status,created_at) values('".$image."','".$title."','".$description."','".$link."','1','".$created_at."')";
                                                   if(mysqli_query($con,$statement)){ ?>
                                                        <script>
                                                            swal("Great!", "Banner Uploded !", "success");
                                                            
                                                            setTimeout(function(){ 
                                                            window.location.href="banner.php";
                                                            }, 3000);
                                                        
                                                        </script> 
 
                                                   <? }else{
                                                       ?>
                                                        <script>
                                                            swal("Ooops !", "Banner Uplode Error  !", "error");
                                                            
                                                            setTimeout(function(){ 
                                                            window.location.href="banner.php";
                                                            }, 3000);
                                                        
                                                        </script> 
                                                        <?
                                                   }
                                                  
                                              }
                                              

                                              
                                              
                                              
                                          }  
                                            

                                        ?>
                                        
                                        <form action="<? echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Description</label>
                                                    <input type="text" name="description" class="form-control">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Link</label>
                                                    <input type="text" name="link" class="form-control">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Image Upload</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                    <br>
                                                    <input type="submit" name="submit" value="submit" class="btn btn-success">
                                                </div>
                                                
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                
                                
                                

                                            <? $i=1;
                                            $ban_sql = mysqli_query($con,"select * from yn_banner where status=1 order by id asc");
                                            while($ban_sql_result = mysqli_fetch_assoc($ban_sql)){ ?>
                                <div class="card">
                                    <div class="card-block">
                                        
                                        
                                        <div class="row" style="margin-top:2%;">                                                
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <? echo $i . ' )'; ?>
                                                            <img src="<? echo $ban_sql_result['image'];?>" style="width:100%;">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h3><? echo $ban_sql_result['title'];?></h3>
                                                            <hr>
                                                            <p><? echo $ban_sql_result['description'];?></p>
                                                            <hr>
                                                            <a href="#"><? echo $ban_sql_result['link'];?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                                
                                            <? $i++; } ?>    
                                
                                
                                
                            </div>
                        </div>


                    </div>
                </div>
            </div>
                    
                    
    <? include('footer.php');
    }
else{ ?>
    
    <script>
        window.location.href="login.php";
    </script>
<? }
    ?>
</body>

</html>