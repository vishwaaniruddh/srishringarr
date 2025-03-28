<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">

<style>
    .modal .modal-dialog {
    margin-top: 50px;
}

.table th, .jsgrid .jsgrid-table th, .table td, .jsgrid .jsgrid-table td {
    line-height: 1.5;

}


</style>

      <div class="main-panel">
        <div class="content-wrapper">
            
            
<?

function breakContent($content) {
    // Split the content into words
    $words = explode(' ', $content);
    
    // Initialize an empty array to store broken content
    $brokenContent = array();
    
    // Loop through the words and add them to brokenContent array with line breaks after every 7 words
    $counter = 0;
    $line = '';
    foreach ($words as $word) {
        $line .= $word . ' ';
        $counter++;
        if ($counter % 7 == 0) {
            $brokenContent[] = trim($line);
            $line = '';
        }
    }
    
    // Add any remaining words to brokenContent array
    if (!empty($line)) {
        $brokenContent[] = trim($line);
    }
    
    // Join the broken content array into a single string with line breaks
    $result = implode('<br>', $brokenContent);
    
    return $result;
}


function createPage($title, $content) {
    global $con;
    $sql = "INSERT INTO pages (title, content) VALUES ('$title', '$content')";
    if ($con->query($sql) === TRUE) {
        echo "New page created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// READ operation
function getPages() {
    global $con;
    $sql = "SELECT * FROM pages";
    $result = $con->query($sql);
    $pages = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $pages[] = $row;
        }
    }
    return $pages;
}

// UPDATE operation
function updatePage($id, $title, $content) {
    global $con;
    $sql = "UPDATE pages SET title='$title', content='$content' WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        echo "Page updated successfully";
    } else {
        echo "Error updating page: " . $con->error;
    }
}

// DELETE operation
function deletePage($id) {
    global $con;
    $sql = "DELETE FROM pages WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        echo "Page deleted successfully";
    } else {
        echo "Error deleting page: " . $con->error;
    }
}


  $pages = getPages();
?>

  <h2>Create Page</h2>
    <form action="create_page.php" method="POST">
        <label for="page_name">Page Name:</label><br>
        <input class="form-control" type="text" id="page_name" name="page_name" required><br>
        
        <label for="url">Page URL:</label><br>
        <input class="form-control" type="text" id="url" name="url" required><br>
        
        <label for="meta_title">Meta Title:</label><br>
        <input class="form-control" type="text" id="meta_title" name="meta_title" required><br>
        
        <label for="meta_keywords">Meta Keywords:</label><br>
        <input class="form-control" type="text" id="meta_keywords" name="meta_keywords"><br>
        
        <label for="meta_description">Meta Description:</label><br>
        <textarea  class="form-control" id="meta_description" name="meta_description" rows="4" cols="50" required></textarea><br>
        
        <input type="submit" value="Submit">
    </form>

  
  


<div class="card">
    <div class="card-body">
        <table class="table">
          <thead>
            <tr>
                <th>Sr No</th>
                <th>Page</th>
                <th>Meta Title</th>
                <th>Meta Keywords</th>
                <th>Meta Descriptions</th>
                <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;  foreach ($pages as $page): ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $page['title']; ?></td>
                <td><?php echo breakContent($page['meta_title']); ?></td>
                <td><?php echo breakContent($page['meta_keywords']); ?></td>
                <td><?php echo breakContent($page['meta_description']); ?></td>
                <td><button class="btn btn-primary editBtn" data-pageid="<?php echo $page['id']; ?>" data-toggle="modal" data-target="#editModal">Edit</button></td>
              </tr>
            <?php $i++ ; endforeach; ?>
          </tbody>
        </table>
        
    </div>
</div>
</div>
</div>
    
    
    
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm">
            <input type="hidden" name="pageid"  />
            <label for="page_name">Page Name:</label><br>
            <input class="form-control" type="text" id="page_name" name="page_name" required><br>
            
            <label for="url">Page URL:</label><br>
            <input class="form-control" type="text" id="url" name="url" required><br>
            
            <label for="meta_title">Meta Title:</label><br>
            <input class="form-control" type="text" id="meta_title" name="meta_title" required><br>
            
            <label for="meta_keywords">Meta Keywords:</label><br>
            <input class="form-control" type="text" id="meta_keywords" name="meta_keywords"><br>
            
            <label for="meta_description">Meta Description:</label><br>
            <textarea class="form-control" id="meta_description" name="meta_description" rows="4" cols="50" required></textarea><br>

          <input id="updatesubmitbtn" type="submit" value="Save Changes">
        </form>
      </div>
    </div>
  </div>
</div>


<script>

    
    
  $(document).on('click','.editBtn',function(){
            var pageId = $(this).data('pageid');
            $.ajax({
                type: 'GET',
                url: 'get_page.php',
                data: { id: pageId },
                success: function(response) {
                    console.log(response);
                                            $('#editModal input[name="pageid"]').val(pageId);

                    try {
                        $('#editModal input[name="page_name"]').val(response.title);
                        $('#editModal input[name="url"]').val(response.url);
                        $('#editModal input[name="meta_title"]').val(response.meta_title);
                        $('#editModal input[name="meta_keywords"]').val(response.meta_keywords);
                        $('#editModal textarea[name="meta_description"]').val(response.meta_description);

                    } catch (error) {
                        console.error('Error parsing JSON:', error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                }
            });
        });
        
    $('#editForm').submit(function(event) {
        

        event.preventDefault(); // Prevent form submission
        
        var pageId = $(this).find('[type="submit"]').data('pageid');
        var formData = $(this).serialize(); // Serialize form data
        
        $.ajax({
            type: 'POST',
            url: 'update_page.php',
            data: formData + '&id=' + pageId, // Append page ID to the form data
            success: function(response) {
                console.log(response.sucess==202);
                alert('Updated !');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
    });

</script>






<? include('footer.php'); ?>