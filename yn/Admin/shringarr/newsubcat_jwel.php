<? include('header.php'); ?>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="card">
				<div class="card-body">
					<?php 
		if(isset($_GET['delete'])){
			$del=$_GET['delete'];
			echo "<h1 style='color:red;'>".$del."</h1>" ;
			}else{ 
				isset($_GET['success']);
				$succ=$_GET['success'];
				echo "<h1 style='color:green;'>".$succ."</h1>";
				}
				
				$cid=$_GET['id'];
$sql1=mysqli_query($con,"select * from jewel_subcat where subcat_id='".$cid."'");
$row1=mysqli_fetch_row($sql1);




	?>
						<h3 style="color:#d1b754">Categories >> <?php echo $row1[2]; ?></h3>
						<table class="table" border="1" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th width="68" height="32">Sr No.</th>
									<th width="227">Sub Categories </th>
									<th width="227">Description </th>
									<th width="169">Add Product</th>
									<th width="62">Edit</th>
									<th width="107">Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
	$sql=mysqli_query($con,"select * from `subcat1` where maincat_id='$cid'");
	$i=1;
	while($row=mysqli_fetch_row($sql)){
	?>
									<tr>
										<td align="center">
											<?php echo $i++; ?>
										</td>
										<td align="left">
											<a href="jewelpro.php?cid=<?php echo $row[1]; ?>&sid=<?php echo $row[0]; ?>"> <img src="images/folder.gif" style="height: auto; width: auto;">&nbsp;
												<?php echo strtoupper($row[2]); ?>
											</a>
										</td>
										<td>
											<?php echo $row[4] ?>
										</td>
										<td align="left"> <a href="newproduct.php?cid=<?php echo $cid; ?>&sid=<?php echo $row[0]; ?>">Add Product</a> <a href="upload_data.php?cid=<?php echo $cid; ?>&sid=<?php echo $row[0]; ?>&type=1"> / Upload Product</a> </td>
										<td align="left"><a href="edit_subcat.php?id=<?php echo $row[0]; ?>&cid=<?php echo $cid; ?>">Edit</a></td>
										<td align="left"> <a href="javascript:confirm_delete(<?php echo $row[0]; ?>,<?php echo $cid; ?>);">Delete</a></td>
									</tr>
									<?php } ?>
							</tbody>
						</table>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<form id="form1" name="form1" method="post" action="process_subcat.php" enctype="multipart/form-data">
						<h3 style="color:#d1b754">New Sub Category</h3>
						<div class="row">
							<div class="col-sm-12">
								<label> Category Name </label> <b><u><?php echo $row1[2]; ?></u></b>
								<input type="hidden" name="cid" id="cid" value="<?php echo $row1[0]; ?>" /> </div>
							<div class="col-sm-12">
								<label> Sub Category Name </label>
								<input type="text" name="cname" id="cname" class="form-control"> </div>
							<div class="col-sm-12">
								<label> Sub Category Description </label>
								<textarea name="desc" class="form-control" id="desc" cols="20" rows="4" style="resize:none;"></textarea>
							</div>
							<div class="col-sm-12">
								<label> Discount (In Percent)</label>
								<select id="discount" name="discount" class="form-control">
									<option value="0">0</option>
									<?php 
                for($c=5;$c<=100;$c=$c+5){ ?>
										<option value="<?php echo $c;?>">
											<?php echo $c;?>
										</option>
										<?php  } ?>
								</select>
							</div>
							<div class="col-sm-12">
								<br>
								<input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Submit" class="sub" /> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<? include('footer.php'); ?>
