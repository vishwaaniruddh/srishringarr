<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>


      <div class="main-panel">
        <div class="content-wrapper">
            
            


<?

$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
?>
<form action="process_editblog.php" method="POST">
    
    <input type="hidden" name="blogid" value="<?= $_REQUEST['blogid']; ?>">
    
    <div class="container mt-5">
        <div class="">
            <img src="<?php echo $targetFile; ?>" class="card-img-top" alt="Blog Image" style="max-height: 500px; object-fit: contain;">
            <input type="hidden" name="image" value="<?= $targetFile; ?>">
            <input type="hidden" name="title" value="<?= $_REQUEST["title"]; ?>">
            <input type="hidden" name="content" value="<?= $_REQUEST["content"]; ?>">
            <div class="card-body">
                <h2 class="card-title" ><?php echo $_REQUEST["title"]; ?></h2>
                <p class="card-text"><?php echo $_REQUEST["content"]; ?></p>
            </div>
        </div>
    </div>
    
    <hr />
    
    <input type="submit" name="submit_publish" class="btn btn-primary" value="Publish">
    <input type="submit" name="save_draft" class="btn btn-secondary" value="Save / Draft">
    
</form>

<? 
} else {
    echo 'Oops ! Went Something wrong.' ;
}
?>




            
        </div>
    </div>
    
<? include('footer.php'); ?>


