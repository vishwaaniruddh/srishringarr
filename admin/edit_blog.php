<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>


      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            
<?
$id = $_REQUEST['id'];
$sql = mysqli_query($con,"select * from blogs where id='".$id."'");
$sql_result = mysqli_fetch_assoc($sql);
$title = $sql_result['title'];
$content = $sql_result['content'];
$image = $sql_result['image'];




?>            
<h2>Edit Blog</h2>
<hr />

<form action="preview_editblog.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="blogid" value="<?= $id; ?>">
    <label for="title">Blog Title:</label>
    <input type="text" name="title" class="form-control" value="<?= $title; ?>" required><br>

    <label for="content">Blog Content:</label>
    <textarea name="content" id="editor"  class="form-control" required>
        <?= ($content); ?>
    </textarea><br>

    <input type="hidden" name="image2" value="<?= $image; ?>">
    <img src="<?= $image; ?>" style="width: 50%;"/>

    <label for="image">Blog Image:</label>
    <input type="file" name="image"><br>

    <label for="link">Blog Link:</label>
    <input type="text" name="link"><br>

<input type="submit" name="preview" class="btn btn-primary" value="Preview">
    
    
    <!--<input type="submit" name="submit_publish" class="btn btn-primary" value="Publish">-->
    <!--<input type="submit" name="save_draft" class="btn btn-secondary" value="Save / Draft">-->
    

</form>

<script>
 CKEDITOR.replace('editor', {
                filebrowserUploadUrl: 'upload.php'
            });
</script>
            
            
            
            
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>


