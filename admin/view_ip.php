<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
            
            <div class="card">
                <div class="card-body">        
                    <table class="table dataTable js-exportable no-footer">
                        <thead>
                            <tr>
                               <th>Sn No</th> 
                               <th>IP</th>
                            </tr>
                        </thead>
                        <tbody>
                    <? 
                    $i=1;
                    $date = $_REQUEST['date'];
                    $sql = mysqli_query($con,"select * from logintrack where created_at = '".$date."'");
                    while($sql_result = mysqli_fetch_assoc($sql)){ ?>
                        <tr>
                            <td><? echo $i; ?></td>
                            <td><? echo $sql_result['ip']; ?></td>
                        </tr>
                    <? $i++;  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            
            
            
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>