<? include('header.php'); ?>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">


      <div class="main-panel">
        <div class="content-wrapper">
            
            
            

<div class="card">
    <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable js-exportable no-footer" id="data_table">
                  <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                    </tr>
                      </thead>
                  <tbody>
                      <?
                      $i=1;
                      $sql = mysqli_query($con,"select * from newsl order by id desc");
                      while($sql_result = mysqli_fetch_assoc($sql)){ ?>
                          <tr>
                              <td><? echo $i; ?></td>
                              <td><? echo $sql_result['name']; ?></td>
                              <td><? echo $sql_result['mobile']; ?></td>
                              <td><? echo $sql_result['email']; ?></td>
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