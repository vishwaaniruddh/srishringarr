<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">

<link rel="stylesheet" type="text/css" href="dist/basic.css">
<link rel="stylesheet" type="text/css" href="dist/dropzone.css">
<script src="dist/dropzone-amd-module.js"></script>
<script src="dist/dropzone.js"></script>

      <div class="main-panel">
        <div class="content-wrapper">
            
            <?
            if(isset($_REQUEST['add_banner'])){
                
                $file = $_FILES['file'];
                
                // var_dump($file);
                
                
                
            }
            
            ?>
            <h3 style="background:white;padding:15px;text-align:center;">Mobile Banner</h3>
            
            <hr>

    <form action="add_banner.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" class="form-control">
        <input type="hidden" name="bannerfor" value="2" class="form-control">
        <br>
        <input name="add_banner" type="submit" class="btn btn-danger">
    </form>
    
    <br>
<div class="row">
    <?
    $sql = mysqli_query($con,"select * from bannerimg where bannerfor=2 and status=1");
    while($sql_result = mysqli_fetch_assoc($sql)){
        $image = $sql_result['img'];
        $id = $sql_result['id'];
        
    ?>
            <div class="col-sm-3">    
                <div class="bannerdiv" style="padding:10px;border:1px solid  #e48b8b;">
                    <img src="<? echo 'banner/mobile/'.$image; ?>" style="width:100%;">
                    <br><br>
                    <a class="btn btn-danger" href="deleteban.php?bannerfor=2&id=<? echo $id; ?>">Delete</a>                    
                </div>

                <br>
            </div>
    <? } ?>

</div>
            
            
            
            
            
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>