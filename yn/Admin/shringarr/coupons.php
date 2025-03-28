<? include('header.php'); ?>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">


      <div class="main-panel">
        <div class="content-wrapper">


<div class="card">
    <div class="card-body">
        
                    
                     <form action="process_coupon.php" method="POST">
            <div class="row">
                 <div class="col-sm-3">
                     <label>Code</label>
                     <input class="form-control" name="code" type="text">
                 </div>
                 <div class="col-sm-3">
                     <label>% Discount</label>
                     <input class="form-control" name="percent_discount" type="text">
                 </div>
                 <div class="col-sm-3">
                     <label>Min Price</label>
                     <input class="form-control" name="min_price" type="text">
                 </div>
                 <div class="col-sm-3">
                     <label>Max Price</label>
                     <input class="form-control" name="max_price" type="text">
                 </div>
             </div>    
                 <div class="row">
                     <br>
                     <input class="btn btn-primary" class="btn btn-primary mb-2" name="submit" type="submit" value="Submit">
                 </div>
        </form>
         </div>
      </div>



            
            

<div class="card">
    <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable js-exportable no-footer" id="data_table">
                <thead>
                    <tr>
                        
                    
                    <th>#</th>
                    <th>Coupon Code</th>
                    <th>Percent Discount</th>
                    <th>Minimum Range</th>
                    <th>Maximum Range</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    $sql = mysqli_query($con,"select * from xircle_coupon where status=1");
                    $i=1;
                    while($sql_result = mysqli_fetch_assoc($sql)){ 
                    $coupon_id = $sql_result['id'];
                    ?>
                        <tr>
                        <td><? echo $i;?></td>
                        <td><? echo $sql_result['code'];?></td>
                        <td><? echo $sql_result['percent_discount'];?></td>
                        <td><? echo $sql_result['min_price'];?></td>
                        <td><? echo $sql_result['max_price'];?></td>
                        <td><a class="btn btn-danger" href="deletecoupon.php?id=<? echo $coupon_id; ?>">Delete</a></td>
                        </tr>
                    <? $i++; } ?>
                    
                </tbody>
            </table>


                    
                </div>            
                
        
    </div>
</div>
            
            
            
            
        </div>
    </div>
    
    
<? include('footer.php'); ?>