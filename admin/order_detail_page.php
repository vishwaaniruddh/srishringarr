<? include('header.php'); ?>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">
	<div class="main-panel">
		<div class="content-wrapper">
			<form action="orderdetailhistory_insert.php" method="post" enctype= multipart/form-data>
				<div class="row">
					<div class="col-sm-3">
						<input type="text" name="orderid" id="orderid" class="form-control" required placeholder="Enter Order ID"> </div>
					<div class="col-sm-3">
						<input type="text" name="trackid" id="trackid" class="form-control" required placeholder="Enter Tracking ID"> </div>
						<div class="col-sm-4">
						<input type="text" name="trackurl" id="trackurl" class="form-control" required placeholder="Enter Tracing URL"> </div>
						<div class="col-sm-2">
						<select id='status' name='status' class="form-control">
						    <option value="">Select</option>
						    <option value="Order_Placed">Order Placed</option>
						    <option value="Order_Dispatched">Order Dispatched</option>
						    <option value="Order_Delivered">Order Delivered</option>
						</select> </div>
					<div class="col-sm-12">
						<br>
						<input type="submit" id="submit" class="btn btn-primary">
						<br>
						<br> </div>
				</div>
			</form>
			<!--<div class="row" id="showskuimages"></div>-->
		</div>
	</div>
	<!--<script>-->
	<!--	$("#submit").on('click', function() {-->
	<!--		var sku = $("#sku").val();-->
	<!--		get_suggested(sku);-->
	<!--	});-->
	<!--	$("#sku").on('change', function() {-->
	<!--		var sku = $("#sku").val();-->
	<!--		get_suggested(sku);-->
	<!--	});-->

	<!--	function get_suggested(sku) {-->
	<!--		$.ajax({-->
	<!--			type: "POST",-->
	<!--			url: 'get_suggested.php',-->
	<!--			data: 'sku=' + sku,-->
	<!--			success: function(msg) {-->
	<!--				$("#showskuimages").html(msg);-->
	<!--			}-->
	<!--		});-->
	<!--	}-->

	<!--</script>-->
	<? include('footer.php'); ?>
