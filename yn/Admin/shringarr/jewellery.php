<? include('header.php'); ?>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">


      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            
            
            
            
            
            
            <div class="card">
    <div class="card-body">
        
 
    <tr><td cospan="6">
	<?php 
		if(isset($_GET['delete'])){
			$del=$_GET['delete'];
			echo "<h1 style='color:red;'>".$del."</h1>" ;
			}else{ 
				isset($_GET['success']);
				$succ=$_GET['success'];
				echo "<h1 style='color:green;'>".$succ."</h1>";
				}
	?>
 </td>
 </tr>
 
 
<tr>
  <td width="808" height="32"><h3 style="color:#d1b754">All Categories</h3></td>
  </tr>
 
 
 
 
      
  <table class="table" width="798" height="59" border="1" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>Sr No.</th>
            <th>Categories Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Edit</th>

        </tr>
    </thead>
    <tbody>
        
    
    <?php
	$sql=mysqli_query($con,"select * from `jewel_subcat` ");
	$i=1;
	while($row=mysqli_fetch_row($sql)){
	?>
	
    <tr>
      <td align="center"><?php echo $i++; ?></td>
       <td align="left">
           <a href="subjewel.php?id=<?php echo $row[0]; ?>">
                <img src="images/folder.gif" / style="height: auto; width: auto;"> &nbsp;<?php echo $row[2]; ?>
           </a>
        </td>
            <td align="left"><?php echo $row[3]; ?></td>
             <td align="left"><?php if(isset($row[4]) and $row[4]!='0000-00-00') echo date('d/m/Y',strtotime($row[4])); ?></td>
           <td align="left"><a href="editCat.php?id=<?php echo $row[0]; ?>">Edit</a></td>
             
    </tr>
    <?php } ?>
    </tbody>
  </table>
  
  
  
  


</div>
</div>            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

<div class="card">
    <div class="card-body">
                
        <form id="form1" name="form1" method="post"  action="process_category.php" enctype="multipart/form-data">


    <h3>New Category</h3>
    
    <div class="row">
        <div class="col-sm-12">
            <label>    Category Name </label>
            <input type="text" class="form-control" name="cname" id="cname" />
        </div>
    


<input type="hidden" name="typ" value="1">  <!--ie rent--> 


          <div class="col-sm-12">
            <label>   Description </label>
            <textarea name="desc" class="form-control" id="desc" cols="20" rows="4" style="resize:none;"></textarea>
            </div>
        
        
          <div class="col-sm-12">
            <label>   Discount (In Percent)</label>
        
          <select id="discount" name="discount" class="form-control">
            <option value="0">0</option>
            <?php 
                for($c=5;$c<=100;$c=$c+5){ ?>
                    <option value="<?php echo $c;?>"><?php echo $c;?></option>
                    <?php  } ?>
        </select> 
        
        </div>
        
      <div class="col-sm-12">
    <br>
        <input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Submit" class="sub"/>
    </div>


</div>
  </form>
  
  
    </div>
</div>
            
            
            
            
        </div>
    </div>
    
    

<? include('footer.php'); ?>