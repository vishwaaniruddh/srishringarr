<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    .table td img, .jsgrid .jsgrid-table td img {
    width: 100%;
    height: 250px;
    object-fit: contain;
}
</style>
      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
<div class="card">
    <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable js-exportable no-footer" id="data_table">
                <thead>
                    <tr>
                        
                    
                    <th>#</th>
                    <th>Image</th>
                    <th>Banner</th>
                    <th>Actions</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?
                    $sql = mysqli_query($con,"select distinct(image_url) as image, id,banner from client_diary_details where status=1");
                    $i=1;
                    while($sql_result = mysqli_fetch_assoc($sql)){ 
                    $coupon_id = $sql_result['id'];
                    $banner = $sql_result['banner'];
                    
                    
                    ?>
                        <tr>
                        <td><? echo $i;?></td>
                        <td><img src="<? echo $sql_result['image'];?>"></td>
                        <td>
                            <input type="checkbox" class="bannercheck" id="<? echo $sql_result['id']; ?>" name="bannercheck" value="<? echo $sql_result['id']; ?>" <? if($banner=='1'){ echo 'checked';}?> >
                        </td>
                            <td><a class="btn btn-danger" href="deletecd.php?id=<? echo $coupon_id; ?>">Delete</a></td>
                        </tr>
                    <? $i++; } ?>
                    
                </tbody>
            </table>


                    
                </div>            
                
        
    </div>
</div>
            
            
            
  
            
            
            
            
            <script>
                $(".bannercheck").on('click',function(){
                        var checkid = this.value ; 
                        
                        if ($(this).is(':checked')) {
                         var check = 1 ; 
                        }else{
                            var check = 0 ;
                        }
                        
                            $.ajax({
                            
                            type: "POST",
                            url: 'setcdbanner.php',
                            data: 'checkid='+checkid+'&check='+check,
                            success:function(msg) {
                                

                                if(msg==1){
                                    swal('Success','','success');
                                    setTimeout(function(){ 
                                        
                                        window.location.reload();
                                        
                                    }, 1500);

                                }else{
                                    swal('Error','','error');
                                }
                            }
                            });
                        

                });
            </script>
            
            
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>