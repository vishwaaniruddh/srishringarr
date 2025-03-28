<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



<!--      <div class="main-panel">-->
<!--        <div class="content-wrapper">-->
<!--   <form action="get_suggestionlist.php" method="post" enctype= multipart/form-data>-->
<!--    <div class="row">-->
        
<!--                <div class="col-sm-4">-->
<!--                    <input type="text" name="productsku" id="productsku" class="form-control" required placeholder="Enter Product SKU where you want suggestion">-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <input type="text" name="prodtype" id="prodtype" class="form-control" required placeholder="Type of SKU ">-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <input type="text" name="sku" id="sku" class="form-control" required placeholder="Enter sku OR Bulk with Comma Seprated ...">-->
<!--                </div>-->
                
<!--                <div class="col-sm-12">-->
<!--                    <br>-->
                    
<!--                    <input type="submit" id="submit" class="btn btn-primary">-->
<!--                    <br><br>-->
<!--                </div>-->
<!--                 </div>-->
<!--   </form>             -->
                
           
<!--<div class="row" id="showskuimages"></div>-->
            
<!--        </div>-->
<!--    </div>-->
    
    	<div class="main-panel">
			<div class="content-wrapper">
				<div class="col-md-9 stretch-card grid-margin">
					<div class="card">
						<div class="card-body">
							<form action="get_suggestionlist.php" method="post">
								
								 <h4 class="card-title">Suggestion List Details</h4>
								 
								 
								 
								<div class="form-group row">
                                    <label for="productsku" class="col-sm-3 col-form-label">Enter Suggestion SKU</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="productsku" id="productsku" class="form-control" required placeholder="Enter Product SKU where you want suggestion">
                                  </div>
                                </div>
								
								<div class="form-group row">
								    <label for="prodtype" class="col-sm-3 col-form-label">Enter Product Type</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="prodtype" id="prodtype" class="form-control" required placeholder="Type of SKU ">
                                  </div>
                                </div>
                   
                                <div class="form-group row">
                                    <label for="sku" class="col-sm-3 col-form-label">Enter SKU List</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="sku" id="sku" class="form-control" required placeholder="Enter sku OR Bulk with Comma Seprated ...">
                                  </div>
                                </div>
                              
									
								<button type="submit" class="btn btn-primary mr-2">Submit</button>	<br/><br/>
								
								<div class="row" id="showskuimages"></div>
									
							</form>
						</div>
					</div>
				</div>
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