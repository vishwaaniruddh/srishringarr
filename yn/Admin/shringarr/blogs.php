<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>


      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            
            
<h2>Create a New Blog</h2>
<form action="preview_new_blog.php" method="post" enctype="multipart/form-data">
    <label for="title">Blog Title:</label>
    <input class="form-control" type="text" name="title" required><br>

    <label for="content">Blog Content:</label>
    <textarea class="form-control" name="content" id="editor" required></textarea><br>

    <label for="image">Blog Image:</label>
    <input type="file" name="image" class="form-control"><br>

    <label for="link">Blog Link:</label>
    <input type="text" name="link" class="form-control"><br>

    <input type="submit" name="preview" class="btn btn-primary" value="Preview">
    
    <!--<input type="submit" name="submit_publish" class="btn btn-primary" value="Publish">-->
    <!--<input type="submit" name="save_draft" class="btn btn-secondary" value="Save / Draft">-->
    


</form>

<script>
    // Replace 'editor' with the ID of your textarea
    CKEDITOR.replace('editor');
</script>
            
            
            
            
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>


