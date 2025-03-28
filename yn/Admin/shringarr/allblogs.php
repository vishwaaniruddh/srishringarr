<? include('header.php'); ?>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">
<div class="main-panel">
    <div class="content-wrapper">
    <?    
            
function removeEmptyParagraphs($content) {
    $content = preg_replace('/<p>(&nbsp;|\s)*<\/p>/', '', $content);
    return $content;
}

$query = "SELECT * FROM blogs where status=1 ORDER BY created_at DESC";

if(mysqli_num_rows($result = mysqli_query($con, $query)) > 0 ){ ?>




<style>
    .card {
        box-shadow: 7px 23px 8px rgba(146, 115, 120, 0.4);
    }

    p:empty {
        display: none;
    }
</style>

<div class="container mt-5">
    <h2>Latest Blogs</h2>
    <hr />
    <div class="row">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>SR No</th>
            <th>Title</th>
            <th>Actions</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>

   

        <?php 
        $i=1; 
        while ($row = mysqli_fetch_assoc($result)) {
        $isPublished = $row['isPublished'];
        ?>

        <tr>
            <td><?= $i; ?></td>
            <td> <a href="edit_blog.php?id=<?= $row['id'];?>"> <?php echo $row["title"]; ?></a></td>
            <td>
              <a href="deleteBlog.php?id=<?= $row['id']; ?>">
                    Inactive
                </a>

            </td>
            <td>
                <?
                echo ($isPublished == 1 ? ' Published !' : ' Not Published !') ;
                ?>
            </td>
            <td><?= $row['created_at'];?></td>
        </tr>

        <?php $i++ ;  } ?>

            </tbody>
        </table>

    </div>
</div>

            
            
      <? }else{
        echo '<h2 style="margin:5%; text-align:center; ">No Blogs Found !</h2>' ; 
      }
      
      ?>      
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>