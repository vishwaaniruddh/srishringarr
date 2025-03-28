<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
   <form action="insertsuggestiondata.php" method="post" enctype= multipart/form-data>              

    <div class="row">
           
                <div class="col-sm-8">
                    <input type="text" name="sku" id="sku" class="form-control" required placeholder="Enter sku OR Bulk with Comma Seprated ...">
                </div>
                <div class="col-sm-4">
                    <input type="text" name="type" id="type" class="form-control" required placeholder="Enter product type: Jewellery or Apparels">
                </div>
                <div class="col-sm-12">
                    <br>
                    
                    <input type="submit" id="submit" class="btn btn-primary">
                    <br><br>
                </div>
                 </div>
   </form>             
                
           
<div class="row" id="showskuimages"></div>
            
        </div>
    </div>
    
    
    <script>
    
    $("#submit").on('click',function(){
        var sku = $("#sku").val();
        get_suggested(sku);
    });
    
 $("#sku").on('change',function(){
        var sku = $("#sku").val();
        get_suggested(sku);
    });
   



function get_suggested(sku){
         $.ajax({
                            type: "POST",
                            url: 'get_suggested.php',
                            data: 'sku='+sku,
                            success:function(msg) {
                                $("#showskuimages").html(msg);
                            }
                        });
}


    </script>
    
<? include('footer.php'); ?>