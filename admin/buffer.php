<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            <div class="card">
                <div class="card-body">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                
                                <select class="form-control" name="location" id="location">
                                    <option value="">Select</option>
                                    <option value="mumbai" <? if(isset($_GET['loc']) && $_GET['loc'] == 'mumbai'){ echo 'selected'; }?>>Mumbai</option>
                                    <option value="state" <? if(isset($_GET['loc']) && $_GET['loc'] == 'state'){ echo 'selected'; }?>> Maharashtra</option>
                                    <option value="country" <? if(isset($_GET['loc']) && $_GET['loc'] == 'country'){ echo 'selected'; }?>>India</option>
                                    <option value="outside" <? if(isset($_GET['loc']) && $_GET['loc'] == 'outside'){ echo 'selected'; }?>>Outside India</option>
                                </select>
                                
                            </div>
                            
                            <? if(isset($_GET['loc'])){ ?>
                                
                            
                            <div class="col-sm-12" id="buffer">
                                
                                <?
                                $location = $_GET['loc'];
                                $sql  = mysqli_query($con,"select * from bufferPeriod where location = '".$location."'");
                                $sql_result = mysqli_fetch_assoc($sql);
                                $prebuffer = $sql_result['prebuffer'];
                                $postbuffer = $sql_result['postbuffer'];
                                ?>
                                
                             <form action="<? echo $_SERVER['PHP_SELF'];?>?loc=<? echo $location;?>" method="POST">
                                 <div class="row">
                                     <div class="col-sm-12">
                                         <label>Pre Buffer (In Days)</label>
                                         <input type="text" name="prebuffer" class="form-control" value="<? echo $prebuffer; ?>">
                                     </div>
                                     <div class="col-sm-12">
                                         <label>Post Buffer (In Days)</label>
                                         <input type="text" name="postbuffer" class="form-control" value="<? echo $postbuffer; ?>">
                                     </div>
                                     <div class="col-sm-12">
                                         <br>
                                        <input type="submit" name="submit" class="btn btn-dark">
                                     </div>
                                 </div>
                             </form>
                                </div>
                                <? } ?>
                             
                             
                             
                             
                        </div>

                </div>
            </div>
            
            
            
            
            
            
        </div>
    </div>
    
    
    
<script>

$('#location').change(function() {
    $("#buffer").html('');
  window.location = 'buffer.php?loc='+$(this).val();

//  $.ajax({

//                 type: "POST",
//                 url: 'ajax_buffer.php',
//                 data: 'loc='+$(this).val(),
//                 success:function(msg) {

//                     $("#buffer").html(msg);
//                 }
//             });
    
    
    
});






</script>



<? include('footer.php'); ?>

