<?php 
include('config.php');
session_start();

$id=$_GET['id'];
$sql="select * from goals where goal_id='$id'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

?>
<link href="All_MiddleBar.css" rel="stylesheet" type="text/css" />
<link href="view_master_edit.css" rel="stylesheet" type="text/css" />
<link href="view_master.css" rel="stylesheet" type="text/css" />
<style>

</style>



	<div id="site_title_bar">
    
   	 
        
             <?php include("header_clinic.php")?><!--end of site title-->

       <h2>Edit Physiotherapy Goal </h2>
        
               <form method="post" class="signin" action="update_phygoal.php" >
                <fieldset>
                
                
            	<label class="name">
                <span>Physiotherapy Goal:</span>
                <input id="act" name="act" type="text" value="<?php echo $row[0]; ?>">
                </label>
                
                
                
                <input id="id" name="id" type="hidden" value="<?php echo $id; ?>">
                <button class="submit formbutton" type="submit">Submit</button>
                <button class="submit formbutton" type="button" onClick="javascript:location.href = 'view_phygoal.php';">Cancel</button>
                       
                </fieldset>
          </form>
</div> 
	<!-- end of site_title_bar  -->
    
