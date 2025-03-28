<? include('header.php'); ?>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">
	<?php 
	
	$id = $_REQUEST['id'];
	
	$ordersql = mysqli_query($con,"select * from order_details ");
	while($orderidsql = mysqli_fetch_assoc($ordersql)){
	    $orderid = $orderidsql['order_id'];
	}
	
	$ordersqldata = mysqli_query($con,"select * from order_details where order_id='".$id."' ");
	$ordersqldata = mysqli_fetch_assoc($ordersqldata);
	   
	    $product_type = $ordersqldata['product_type'];
        $product_id = $ordersqldata['product_id'];
        $sku = get_sku($product_id,$product_type);
        $prodamt = $ordersqldata['product_amt'];
        $shipping_rate = $ordersqldata['shipping_charges'];
        $grandtotal = $ordersqldata['total_amt'];
        
        $pickup_date = $ordersqldata['date'];
        $pickup_date = date("Y-m-d",strtotime($pickup_date));
        
        
        $return_date = $ordersqldata['return_dt'];
        $rent_date = $ordersqldata['rent_dt'];
        $deposit_date  = $ordersqldata['deposite_date'];
        $return_deposit_amt = $ordersqldata['deposit_amt'];
	   // echo $return_deposit_amt;
	
	$sqlgetname = mysqli_query($con,"select * from Order_ent where acc_type=1 and id = '".$id."'") ; 
	$sql_result = mysqli_fetch_assoc($sqlgetname);
	$name = getusrname($sql_result['user_id']);
	
	
	?>
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="col-md-9 stretch-card grid-margin">
					<div class="card">
						<div class="card-body">
							<form action="couriertrackdetails_insert.php" method="post" enctype="multipart/form-data">
								
								 <h4 class="card-title">User Tracking Details</h4>
								 
								 <input type="hidden" id="orderid" name="orderid" value="<? echo $id;?>">
								 <input type="hidden" id="username" name="username" value="<? echo $name; ?>">
								 <input type="hidden" id="pickupdate" name="pickupdate" value="<? echo $pickup_date;?>">
								 <input type="hidden" id="returndate" name="returndate" value="<? echo $return_date;?>">
								 <input type="hidden" id="depositdate" name="depositdate" value="<? echo $deposit_date;?>">
								 <input type="hidden" id="ref_deposit_date" name="ref_deposit_date" value="<? echo $return_deposit_amt;?>">
								 <input type="hidden" id="sku" name="sku" value="<? echo $sku;?>">
								 
								 <div class="form-group row">
                                    <label for="trackid" class="col-sm-3 col-form-label">Enter Tracking ID</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="trackid" id="trackid" class="form-control" required  placeholder="Enter Tracking ID">
                                  </div>
                                </div>
								
								<div class="form-group row">
								    <label for="trackurl" class="col-sm-3 col-form-label">Enter Tracing URL</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="trackurl" id="trackurl" class="form-control" required placeholder="Enter Tracking URL">
                                  </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 col-form-label">Date</label>
                                  <div class="col-sm-9">
                                    <input type="datetime-local" name="date" id="date" class="form-control" required >
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mailadd" class="col-sm-3 col-form-label">Mail Address</label>
                                  <div class="col-sm-9">
                                    <input type="email" name="mailadd" id="mailadd" class="form-control" required placeholder="Enter Mail Address" >
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">Message</label>
                                  <div class="col-sm-9">
                                    <textarea type="text" name="msg" id="msg" class="form-control" rows="4"  required placeholder="Enter Message" ></textarea>
                                  </div>
                                </div>
									
								<button type="submit" class="btn btn-primary mr-2">Submit</button>	
									
								
									
									
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<? include('footer.php'); ?>
