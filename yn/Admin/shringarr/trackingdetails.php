<? include('header.php'); ?>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">
	<!--<link rel="stylesheet" type="text/css" href="datatable/tracking.style.css">-->
	<?php 
	
	$id = $_REQUEST['id'];
	
	$ordersql = mysqli_query($con,"select * from order_details where order_id='".$id."' ");
	while($ordersql = mysqli_fetch_assoc($ordersql)){
	    $orderid = $ordersql['order_id'];
	    $product_type = $ordersql['product_type'];
        $product_id = $ordersql['product_id'];
        $sku = get_sku($product_id,$product_type);
        $prodamt = $ordersql['product_amt'];
        $shipping_rate = $ordersql['shipping_charges'];
        $grandtotal = $ordersql['total_amt'];
        
        $pickup_date = $ordersql['date'];
        // $pickup_date = date("d-m-Y H:i:s",$pickup_date);
        $pickup_date = date("Y-m-d",strtotime($pickup_date));
        
        $return_date = $ordersql['return_dt'];
        $rent_date = $ordersql['rent_dt'];
        $deposit_date  = $ordersql['deposite_date'];
        $return_deposit_amt = $ordersql['deposit_amt'];
	}
	?>
	<?php
	if($product_type==1){
	    $prodname = mysqli_query($con,"select * from product where product_code='".$sku."'");
	    $prodnameres = mysqli_fetch_assoc($prodname);
	    $prodname = $prodnameres['product_name'];
	}
	else
	if($product_type==2){
	    $prodname = mysqli_query($con,"select * from garment_product where gproduct_code='".$sku."'");
	    $prodnameres = mysqli_fetch_assoc($prodname);
	    $prodname = $prodnameres['gproduct_name'];
	}
	
	?>
	<style>
	    .space{
	        margin: 10px;
	    }
	</style>
	<style>
	    .progress {
	        width: 100%;
	        height: 20px;
	    }
	</style>
    <style>
    
    .table, .th, .td {
      border:5px solid black;
    }
    </style>
	
	
	
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="col-md-6 stretch-card grid-margin">
					<div class="card">
						<div class="card-body">
						
							    <?php
							        $sql = mysqli_query($con,"select * from order_detail_history  ");
							        $sqlres = mysqli_fetch_assoc($sql);
							    ?>
								
								 <h3 class="card-title"><big>Order Details</big></h3><hr/>
								 
								 <input type="hidden" id="orderid" name="orderid" value="<? echo $id;?>">
								 <div class="info">
								     <div class="row">
                                        <div class="col-md-6"> 
                                            <span id="heading"><big><strong>Date</strong></big></span><br> 
                                                <span id="details">
                                                    <? echo $sqlres['order_datetime'];?>
                                                </span> 
                                        </div>
                                        <div class="col-md-6 pull-right">
                                            <span id="heading"><big><strong>Order No.</strong></big></span><br>
                                            <span id="details"><? echo $sqlres['order_id'];?></span>
                                        </div>
                                        
                                    </div>
								 </div>
								 <br/>
								 <div class="info">
								     <div class="row">
                                        <div class="col-md-6"> 
                                            <span id="heading"><big><strong>Tracking ID</strong></big></span><br> 
                                            <span id="details text-align: center"><? echo $sqlres['tracking_id'];?></span>
                                        </div>
                                        <div class="col-md-6 pull-right">
                                            <span id="heading"><big><strong>Tracking URL</strong></big></span><br>
                                            <span id="details"><a href="<? echo $sqlres['tracking_url'];?>" target="_blank"><? echo $sqlres['tracking_url'];?></a></span>
                                        </div>
                                    </div>
								 </div>
								 <hr/>
								
								 <div class="info">
								     <div class="row">
                                        <div class="col-md-6"> 
                                            <span id="heading"><big><strong>Pickup Date</strong></big></span><br> 
                                            <span id="details text-align: center"><? echo $pickup_date;?></span>
                                        </div>
                                        <div class="col-md-6 pull-right">
                                            <span id="heading"><big><strong>Return Date</strong></big></span><br>
                                            <span id="details"><? echo $return_date;?></span>
                                        </div>
                                    </div>
								 </div>
								 <br/>
								 <div class="info">
								     <div class="row">
                                        <div class="col-md-6"> 
                                            <span id="heading"><big><strong>Deposit Date</strong></big></span><br> 
                                            <span id="details text-align: center"><? echo $deposit_date;?></span>
                                        </div>
                                        <div class="col-md-6 pull-right">
                                            <span id="heading"><big><strong>Return Deposit Amount</strong></big></span><br>
                                            <span id="details"><? echo $return_deposit_amt;?></span>
                                        </div>
                                    </div>
								 </div><br>
								 <div class="info">
								     <div class="row">
                                        <!--<div class="col-md-6"> -->
                                        <!--    <span id="heading"><big><strong>Rent Amount</strong></big></span><br> -->
                                        <!--    <span id="details text-align: center"><? echo 0;?></span>-->
                                        <!--</div>-->
                                        <div class="col-md-6 pull-right">
                                            <span id="heading"><big><strong>SKU</strong></big></span><br>
                                            <span id="details"><? echo $sku;?></span>
                                        </div>
                                    </div>
								 </div>
								 <hr/>
								    <div class="pricing">
                                        <div class="row">
                                            <div class="col-9">
                                                <span id="heading"><big><strong>Product Name</strong></big></span><br>
                                                <span id="name">
                                                    <? echo $prodname; ?>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <hr/>
                                        <div class="row">
                                            <div class="col-9">
                                                <span id="heading"><big><strong>Order Summary</strong></big></span><br>
                                                <span id="name">
                                                   Item(s) Subtotal:
                                                </span>
                                            </div><br/>
                                             <div class="col-3">
                                                <span id="price">
                                                    <br/>
                                                    <? echo "₹"." ".$prodamt ;?>
                                                </span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-9"> 
                                                <span id="name">Shipping:</span> </div>
                                                <div class="col-3">
                                                    <span id="price">
                                                        <? echo "₹"." ".$shipping_rate;?>
                                                    </span>
                                                </div>
                                        </div>
                                    </div><hr/>
                                    
                                    <div class="total">
                                        <div class="row">
                                            <div class="col-9"><big><strong>Grand Total</strong></big></div>
                                            <div class="col-3">
                                                <? echo "₹"." ". $grandtotal;?>
                                            </div>
                                        </div><hr/>
                                    </div>
							
						</div>
						
					</div>
					<br/>
					<div class="space"></div>
					<div class="card">
					    <div class="card-body">
						    <h3 class="card-title"><big>Tracking Details</big></h3><hr/>
						    
						    <div class="info">
						         
								     <div class="row">
								         <div class="col-md-6"> 
                                            <span id="heading"><big><strong>Order Status</strong></big></span><br> 
                                            
                                        </div>
                                        <div class="col-md-6 pull-right">
                                            <span id="heading"><big><strong>Time</strong></big></span><br>
                                           
                                        </div>
								         <?php 
						                
    						               $sql = mysqli_query($con,"select * from order_status_update_history where order_id = '".$id."' ");
    							           while($updatehistory_result = mysqli_fetch_assoc($sql)){
    							           $id = $updatehistory_result['id'];
    							           $order_status = $updatehistory_result['status'];
    							           $order_time = $updatehistory_result['order_datetime'];
    							           
    							           $status = str_replace('_', ' ', $order_status);
    							           $time = date("H:i:s",strtotime($order_time));
    							         //  echo $status;
    							           
						                ?>
                                        <div class="col-md-6"> 
                                            <br> 
                                            <span id="details text-align: center"><? echo $status;?></span>
                                        </div>
                                        <div class="col-md-6 pull-right">
                                            <br>
                                            <span id="details"><? echo $time;?></span>
                                        </div>
                                        <? } ?>
                                    </div>
                                    
								 </div>
								
						</div>
						<!--<div class="card-body">-->
						<!--    <div class="info">-->
						<!--            <table>-->
						<!--               <thead>-->
						<!--                   <tr>-->
    		<!--				                   <th>Order Status</th>-->
    		<!--				                   <th>Time</th>-->
    		<!--				               </tr>-->
						<!--               </thead>-->
						            
						                
						<!--                   <tbody>-->
						<!--                   <tr>-->
						<!--                       <td><?=$order_status;?></td>-->
						<!--                       <td><?=$time;?></td>-->
						<!--                   </tr>-->
						<!--               </tbody>-->
						               
						<!--           </table>-->
						         
						        
						<!--    </div>-->
						<!--</div>-->
					</div>
				</div>
			</div>
		</div>
		<script src="datatable/jquery.min.js"></script>
		<script src="datatable/bootstrap.bundle.min.js"></script>
		<script src="datatable/bootstrap.min.js"></script>
		<? include('footer.php'); ?>
