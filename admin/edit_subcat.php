<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">


<style>
    tr td:nth-child(2){
        padding:20px;
    }
</style>
      <div class="main-panel">
        <div class="content-wrapper">
<?
            

$cid=$_GET['cid'];
$sql=mysqli_query($con,"select * from maincategory where `categories_id`=$cid");
$row=mysqli_fetch_row($sql);
	
	$id=$_GET['id'];
// 	echo "select * from subcat1 where `subcat_id`=$id";
	$sql1=mysqli_query($con,"select * from subcat1 where `subcat_id`=$id");
	$row1=mysqli_fetch_assoc($sql1);
	
// 	var_dump($row1) ; 
	
		?>
        

<form id="form1" name="form1" method="post"  action="processEdit_subcategory.php" enctype="multipart/form-data">
  <table style="width:100%;" border="0" cellpadding="0" cellspacing="0" >
  <tr>
 <td colspan="2"><h3 style="color:#d1b754">New Category</h3></td></tr>
    
    <tr>
      <td height="50" >Category Name:</td>
      <td valign="bottom"> <input type="text" class="form-control" name="cname" id="cname"  value="<?php echo $row1['name']; ?>"/></td>
      </tr>
    <tr>
    

    

  <td height="82">Category Description :</td>
      <td valign="bottom">
        <textarea name="desc" id="desc" class="form-control" cols="28" rows="4" style="resize:none;"><?php echo $row1['desc']; ?></textarea></td>
      </tr>

      <tr>
          <td width="178" height="123" >Category Image :</td>
          <td width="361">
          <img src="../<?php echo $row1['image']; ?>" width="88" height="93" />
          <input type="hidden" name="oldimg" value="<?php echo $row1['image']; ?>" /> 
          <input type="file" class="form-control" name="image" id="image" />
          </td>
    </tr>
    
    <tr>
        <td height="38" >Discount :</td>
      <td>
          <select id="discount" name="discount" class="form-control">
            <?php 
                for($c=0;$c<=100;$c=$c+5){ ?>
                    <option value="<?php echo $c;?>" <? if($row1['discount'] == $c ){ echo 'selected'; } ?>><?php echo $c;?></option>
                    <?php  } ?>
        </select> %
      </td>
  </tr>
  
  <tr>
      <td>Meta Title</td>
      <td><input type="text" class="form-control" name="meta_title" placeholder="Meta Title Text" value="<?php echo $row1['meta_title'];?>" /></td>
  </tr>
  
  
  <tr>
      <td>Meta Description</td>
      <td><input type="text" class="form-control" name="meta_description" placeholder="Meta Description Text" value="<?php echo $row1['meta_description'];?>"  /></td>
  </tr>
  
  
  
    <!--Ruchi-->
    <tr><input type="hidden" name="id" id="id"  value="<?php echo $id; ?>"/>
      <td height="51" colspan="2" style="padding:10px 0;"><input type="submit" name="Submit" id="Submit" value="Submit" class="sub"/> 
      &nbsp;&nbsp;&nbsp;
      <input type="button" class="btn btn-primary" value="Cancel" id="cancel" name="cancel"  onClick="javascript:location.href = 'welcome.php';" class="sub">
      </td>
      </tr>
      
     
  </table>
  </form>
            
            
            
            
            
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>










