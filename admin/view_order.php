<? include('header.php'); ?>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">
	<?
$id = $_REQUEST['id'];


$sql = mysqli_query($con,"select * from Order_ent where id='".$id."'");
$sql_result = mysqli_fetch_assoc($sql);

$date = $sql_result['date'];
$delivery_add =$sql_result['delivery_add'];
$pickup_add = $sql_result['pickup_add'] ; 






?>
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="card">
					<div class="card-body">
						<div>
							<div id="order_data">
								<h2> Order #<? echo $id; ?> details </h2>
								<div class="row">
									<div class="col-sm-3">
										<p class="form-field form-field-wide">
											<label for="order_date">Date created:
												<? echo $date ; ?>
											</label>
										</p>
										<label>Status:</label>
										<!--<select id="order_status" name="order_status" class="form-control" tabindex="-1" aria-hidden="true">-->
										<!--	<option value="wc-pending">Pending payment</option>-->
										<!--	<option value="wc-processing" selected="selected">Processing</option>-->
										<!--	<option value="wc-on-hold">On hold</option>-->
										<!--	<option value="wc-completed">Completed</option>-->
										<!--	<option value="wc-cancelled">Cancelled</option>-->
										<!--	<option value="wc-refunded">Refunded</option>-->
										<!--	<option value="wc-failed">Failed</option>-->
										<!--</select>-->
										<?php 
										    $sqlorder = mysqli_query($con,"select * from order_detail_history where order_id='".$id."'");
										    $ordersqlresult = mysqli_fetch_assoc($sqlorder);
										    $status  = $ordersqlresult['status'];
										    $status = str_replace('_', ' ', $status);
										?>
										<input type="text" id="order_status" name="order_status" class="form-control" value="<? echo $status;?>" readonly>
									</div>
									<div class="col-sm-3">
										<label><b>Delivery Address:</b></label>
										<div>
											<? $del_sql = mysqli_query($con,"select * from shippingInfo where id='".$delivery_add."'");
            if($del_sql_result = mysqli_fetch_assoc($del_sql)){ ?> <span><? echo $del_sql_result['person_name'];?></span>
												<br>
												<p>
													<? echo $del_sql_result['person_contact'];?>
												</p>
												<p> <span><? echo $del_sql_result['address'] . ', ' . $del_sql_result['landmark']. ', ' . $del_sql_result['city'].', '.$del_sql_result['state'].', '.$del_sql_result['country'].', '.$del_sql_result['pincode'] ; ?></span> </p>
												<? } ?>
										</div>
									</div>
									<div class="col-sm-3">
										<label><b>Pickup Address:</b></label>
										<div>
											<? $del_sql = mysqli_query($con,"select * from shippingInfo where id='".$pickup_add."'");
            if($del_sql_result = mysqli_fetch_assoc($del_sql)){ ?> <span><? echo $del_sql_result['person_name'];?></span>
												<br>
												<p>
													<? echo $del_sql_result['person_contact'];?>
												</p>
												<p> <span><? echo $del_sql_result['address'] . ', ' . $del_sql_result['landmark']. ', ' . $del_sql_result['city'].', '.$del_sql_result['state'].', '.$del_sql_result['country'].', '.$del_sql_result['pincode'] ; ?></span> </p>
												<? } ?>
										</div>
									</div>
									<div class="col-sm-3">
									    
									        <input type="submit" class="btn btn-success" name="trackdetails" id="trackdetails" value="Track Order" target="_blank" onclick="window.location.href='trackingdetails.php?id=<? echo $id;?>'">
									    
									    
									    
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<table class="table" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th>Item</th>
									<th>SKU</th>
									<th>Cost</th>
									<th>Qty</th>
									<th>Total</th>
									<thwidth="1%">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?
                
                $detail_sql = mysqli_query($con,"select * from order_details where order_id='".$id."'");
                
                while($detail_sql_result = mysqli_fetch_assoc($detail_sql)){ 
                    
                                
                $product_type = $detail_sql_result['product_type'];
                $product_id = $detail_sql_result['product_id'];
                $image = $detail_sql_result['image'];
                $sku = get_sku($product_id,$product_type);
                $qty = $detail_sql_result['qty'];
                $product_amt = $detail_sql_result['product_amt'];
                $total_amt = $detail_sql_result['total_amt'];
                
?>
										<td>
											<div> <img width="150" height="150" src="<? echo $image; ?>" loading="lazy" title=""> </div>
										</td>
										<td>
											<div><strong><? echo $sku; ?></strong> </div>
										</td>
										<td>
											<div class="view"> <span>
			    <bdi>
			        <span>&#8377;</span>
												<? echo $product_amt; ?>
													</bdi>
													</span>
											</div>
										</td>
										<td>
											<div class="view"> <small class="times">×</small>
												<? echo $qty; ?>
											</div>
										</td>
										<td>
											<div class="view"> <span class="woocommerce-Price-amount amount"><bdi>
                <span>&#8377;</span>
												<? echo $total_amt; ?>
													</bdi>
													</span>
											</div>
										</td>
								</tr>
								<? } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card">
				    <div class="card-body">
				        <form action="update_status.php" method="POST">
				            <input type="hidden" id="id" name="id" value="<? echo $id;?>">
				        <div class="form-group row">
                             <label for="status" class="col-sm-3 col-form-label">Update Status</label>
                             <br/>
                          <div class="col-sm-6">
                            <select id='status' name='status' class="form-control" onchange="setOption(this.value)">
								<option value="">Select</option>
								<option value="Order_Dispatched">Order Dispatched</option>
								<option value="Order_Shipped">Order Shipped</option>
								<option value="Order_Recieved">Order Delivered</option>
								<option value="Order_Returned">Order Returned</option>
							</select>
                          </div>
                          <input type="submit" class="btn btn-success" name="enterdata" id="enterdata" style="width: 10%;height: 100%;" value="Submit">
                        </div>
                            
                        </form>
				    </div>
				    
				</div>
			</div>
		</div>
// 		<script>
// 		    $('#status').on('change',function(){
// 		         var status = $("#status").val();
// 		         $.ajax({
// 		             type:"POST",
// 		             url:"update_status.php",
// 		             data:'status='+status,
		             
// 		             success:function(msg) {
// 		                 alert(msg);
// 		             }
		             
// 		         });
		        
// 		    }
// 		</script>
		<? include('footer.php'); ?>
