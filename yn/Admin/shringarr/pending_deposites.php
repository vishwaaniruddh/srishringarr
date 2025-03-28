<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
<? $sql = mysqli_query($con,"SELECT * FROM `payable_deposit` where is_complete=0"); ?>



<div class="card">
    <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable js-exportable no-footer" id="data_table">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Rent Amount</th>
                            <th>Rent Date</th>
                            <th>Deposite Amount</th>
                            <th>Deposite Date</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        $i=1 ; 
                        while($sql_result = mysqli_fetch_assoc($sql)){
                        
                        

                        
                        $userid = $sql_result['userid']; 
                        $order_ent = $sql_result['order_ent'];
                        $order_detail = $sql_result['order_detail'];
                        $product_amt = $sql_result['amount'];
                        
                        $rent_amount = get_order_details($order_detail,'total_amt');
                        $product_id = get_order_details($order_detail,'product_id');
                        $type       = get_order_details($order_detail,'product_type');
                        $sku        = get_sku($product_id,$type) ; 

                        $rent_dt = get_order_details($order_detail,'rent_dt');
                        $return_dt = get_order_details($order_detail,'return_dt');
                        $rent_dt = $rent_dt . ' TO ' . $return_dt;
                        
                        $deposit_amt = get_order_details($order_detail,'deposit_amt');
                        
                        $deposite_date = get_order_details($order_detail,'deposite_date');
                        ?>
                            
                            <tr>
                                <td><? echo $i; ?></td>
                                <td><? echo getusrname($userid) ; ?></td>
                                <td><? echo $sku ; ?></td>
                                <td><? echo $product_amt ; ?></td>
                                <td><? echo $rent_dt; ?></td>
                                <td><? echo $deposit_amt; ?></td>
                                <td><? echo $deposite_date; ?></td>
                                <td>
                                    <a class="btn btn-success" href="../../../razorpay/depositepay.php?id=<? echo $order_detail ; ?>">Payment Link</a>
                                    <p class="hide">https://srishringarr.com/razorpay/depositepay.php?id=<? echo $order_detail ; ?></p>

                                </td>
                                
                            </tr>
                        
                        <? $i++ ; } ?>

                    </tbody>
                </table>
            </div>
    </div>
</div>

            


            
            
            
            
            
            
        </div>
    </div>
    
    
<? include('footer.php'); ?>