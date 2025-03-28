<? include('header.php'); ?>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">


      <div class="main-panel">
        <div class="content-wrapper">
            
            
            

<div class="card">
    <div class="card-body">
            <div class="table-responsive">

             
             <?
             $sql = mysqli_query($con,"select count(id) as id from logintrack");
             $sql_result = mysqli_fetch_assoc($sql);
             
             $id = $sql_result['id']; 
             ?>
            
            <h3>Total Visitors = <? echo $id; ?></h3>

            <table class="table dataTable js-exportable no-footer" id="data_table">
                <thead>
                    <tr>
                        
                    
                    <th>#</th>
                    <th>Visitor Count</th>
                    <th>Date</th>
                    <th>View IP</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    $sql = mysqli_query($con,"SELECT count(id) as count, created_at FROM `logintrack` group by created_at order by created_at desc");
                    $i=1;
                    while($sql_result = mysqli_fetch_assoc($sql)){ ?>
                        <tr>
                        <td><? echo $i;?></td>
                        <td><? echo $sql_result['count'];?></td>
                        <td><? echo $sql_result['created_at'];?></td>
                        <td><a href="view_ip.php?date=<? echo $sql_result['created_at']; ?>">View</a></td>

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