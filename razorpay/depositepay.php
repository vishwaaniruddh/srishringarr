<?php session_start();
require('sample-config.php');
require('razorpay-php/Razorpay.php');


use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
$id = $_REQUEST['id'];


$orderdetails_sql = mysqli_query($con,"select * from order_details where id='".$id."'");
$orderdetails_sql_result = mysqli_fetch_assoc($orderdetails_sql);

$product_id=$orderdetails_sql_result['product_id'];
$skua=get_sku($product_id,$type);
$skua=json_encode($skua);
$userid = $orderdetails_sql_result['user_id'];
$amount = $orderdetails_sql_result['total_amt'];

$order_ent = mysqli_query($con,"insert into Order_ent(user_id) values('".$userid."')");
$orderid = $con->insert_id;


// Registration

$usersql = mysqli_query($con,"select * from Registration where registration_id = '".$userid."'");
$usersql_result = mysqli_fetch_assoc($usersql);


$name = $usersql_result['Firstname'] .' ' .$usersql_result['Lastname'] ;
// $amount = $_SESSION['rp_amount'];
$email = $usersql_result['email'];
$mobile = $usersql_result['Mobile'];


// Create the Razorpay Order


//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $orderid,
    'amount'          => $amount * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];



$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $name,
    "description"       => "SriShringarr Fashion Studio",
    'ss_orderid'        => $orderid,
    "image"             => "https://srishringarr.com/assets/loader.gif",
    "prefill"           => [
    "name"              => $name,
    "email"             => $email,
    "contact"           => $mobile,
    ],
    "notes"             => [
    "address"           => $orderid,
    "merchant_order_id" => "$orderid",
    ],
    "theme"             => [
    "color"             => ""
    ],
    "order_id"          => $razorpayOrderId,
];


$json = json_encode($data);





?>
<html>
    <head>
        

        <title>Srishringarr</title>
        <link rel="" href="logo/Untitled-2 copy.jpg"/><link rel="icon" href="logo/Untitled-2 copy.jpg" type="image/x-icon" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- jQuery (necessary for Bootstrap s JavaScript plugins) -->
        
        <script src="yn/js/jquery.min.js"></script>
        
        <!-- Custom Theme files -->
        <!--theme-style-->
        
        <link href="yn/css/style.css" rel="stylesheet" type="text/css" media="all" />
        
        <!--//theme-style-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- start menu -->
        <script src="yn/js/simpleCart.min.js"></script>
        <!-- start menu -->
        <link href="yn/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="yn/js/memenufi.js"></script>
        
        <script>
            $(document).ready(function(){
                if($.fn.memenu){
                    $(".memenu").memenu();
                }
            });
        </script>
    
        <link href="yn/css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link href="yn/css/custom.css" rel="stylesheet" type="text/css" media="all" />	
        
        <!-- this meta viewport is required for BOLT //-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 
       <link href="style.css" rel="stylesheet" type="text/css" media="all" />	
 
    </head>
    <body >
        <?php //include("addtocartpopup.php");?>
        <?php //include("requiredfields.php");?>
    
    
        <div class="top_bga">
        	<div class="container">
        		<div class="header_top-sec">
        			<?php //include('topbar.php')?>
        	    </div>
            </div>
            <div class="header-top">
        		<div class="container">	
        		    <!---->
        		    <div class="" style=" margin-top:-px; ">
        			  <?php //include('menu.php')?>
        			</div>
        			
                    <div class="table-wrapper" style="padding:5%; ">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="index.php">
                                        <img src="http://srishringarr.com/static/images/site/logo/main_logo.png">
                                    </a>
                                </div>
                                <div class="col-sm-4 custom_checkout_heading text-center">
                                    <!--<h2>Payment Process</h2>-->
                                </div>
                                <div class="col-md-4" style="font-size: 20px;">
            						<div>Kindly complete your payment within <span id="timer"></span></div>
                                </div>
                                    
            						


            					</div>
                            </div>
                        </div>
                    </div>
    		        <div class="clearfix"> </div>
    		        
    		        <div class="container">
        			<div class="main">



                        <div> </div>
         

                            <div class="form-group row">
                                <label for="amount" class="col-sm-2 col-form-label">Amount ( IN INR ):</label>
                                <div class="col-sm-10">
                                  <!--<input type="text" class="form-control" id="amount" placeholder="amount" name="amount" value="1.00" / >-->
                                  <input type="text" class="form-control" id="amount" placeholder="amount" name="amount" value="<? echo sprintf("%.2f", $amount/100) ;?>" readonly / >
                                  
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="amount" class="col-sm-2 col-form-label">First Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<? echo $name ; ?>" readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="email" name="email" placeholder="Email ID" value="<?php echo $email ; ?>" readonly />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-sm-2 col-form-label">Mobile/Cell Number:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="<? echo $mobile ; ?>" readonly/>
                                </div>
                            </div>

                            <div class="text-center" style="display: flex;
    justify-content: space-evenly;">
                                <a class="btn btn-danger" href="../cart.php">Cancel</a>
                            	<? require("checkout/automatic.php"); ?>
                            </div>


                    	
                    	
                    	
                    	
                    	
                    </div>    		            
    		        </div>

                    
        		</div>
        		<div class="clearfix"> </div>
            </div>
        </div>
        
        
        <script>



// Time 
var countDownDate = new Date();
countDownDate = countDownDate.setMinutes(countDownDate.getMinutes()+5);

var x = setInterval(function() {
var now = new Date().getTime();
var distance = countDownDate - now;
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
document.getElementById("timer").innerHTML =  minutes + "m " + seconds + "s ";
    
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);

// end Timer 


// get all product id from php variable and hit the function to increase quantity if timer is about to end .... in this case it is 1 second before timeer end  
var product_id=<? echo $skua; ?>;

//alert(product_id);

setInterval(function(){
    
    

    if(document.getElementById("timer").innerHTML == "EXPIRED") {
        alert('Maximum time limit extended to complete the transaction ! ');
        window.location='https://srishringarr.com';
        // add_again(product_id);
    }
    
},1000);
// });
        </script>
          </body>
</html>