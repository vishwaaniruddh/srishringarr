<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
        
            <div class="card">
                <div class="card-body">
                    <table class="table dataTable js-exportable no-footer" id="data_table">
                <thead>
                    <tr>
                        
                    
                    <th>#</th>
                    <th>Order</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>View</th>
                    <th>Courier Details</th> 
                    </tr>
                </thead>
                <tbody>
                    <? $i=1;
                    $sql = mysqli_query($con,"select * from Order_ent where acc_type=1 order by id desc") ; 
                    while($sql_result = mysqli_fetch_assoc($sql)){ ?>
                        <tr>
                            <td><? echo $i; ?></td>
                            <td><? echo $sql_result['id'];?></td>
                            <td><? echo getusrname($sql_result['user_id']);?></td>
                            <td><? echo $sql_result['date'];?></td>
                            <td><? echo $sql_result['total_amount'];?></td>
                            <td><a class="btn btn-danger" href="view_order.php?id=<? echo $sql_result['id'];?>">View</a></td>
                            <td><input type="submit" class="btn btn-success" name="trackdetails" id="trackdetails" value="Courier Details" onclick="window.location.href='couriertrackdetails.php?id=<? echo $sql_result['id'];?>'"></td>
                        </tr>
                    <? $i++; } ?>

                    
                </tbody>
            </table>
            
            
            
                </div>
            </div>    
            
        </div>
    </div>
    
    
<? include('footer.php'); ?>