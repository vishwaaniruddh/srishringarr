<? include('config.php');
header('Content-Type: application/json; charset=utf-8');

function round_amount($amount){
$amount = (int)$amount;
$add_amount = 0;

    $round_num = substr( $amount, -2);
    
        if($round_num < 50 && $round_num!=00 ){
            $add_amount = 50 - $round_num;  
        
        }
        if($round_num > 50 && $round_num != 00 ){
            $add_amount = 100 - $round_num;  
        }
    $new_amount = $amount + $add_amount; 
    
    return $new_amount;            

}

$get_id = $_REQUEST['id'];

if($get_id){
    



// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


$pathmain ='https://yosshitaneha.com/';

if($get_id==0 && $get_type==1 && $viewall == 4 ){
 $all = "'2','1','6','3','68','4'";
 $necklace=1;
}

if($get_id==1 ||$get_id==2 ||$get_id==3 ||$get_id==4 ||$get_id==6||$get_id==68){
    if($type==1){
      $necklace=1;
    }
}

if($get_id==0 && $get_type==1 && $viewall == 76 ){
 $all = "'59','74','75','76','77','78','79','80'";
}


   if($all){
    $sql_query = "select product_id, product_image, product_code, product_name, product_desc, date_added, categories_id, subcategory, subcat_id, maincatagory, subcatagoty, sales_price, rent_price, itemid, product_new_imageid, deposit, facebook, Instagram, Google, Twitter, Pinterest, flipkart, amazon, discount, total_amt, seen_count, is_customized, is_color_same, is_pattern_same, is_piece_same, cgst, sgst, igst, short_desc, brand_color, youtube,CAST(REGEXP_SUBSTR(product_code,'[0-9]+') AS UNSIGNED) as sku,newProductName,ss_product_name from `product` where subcat_id in($all) order by sku desc";
   }else{
    $sql_query = "select product_id, product_image, product_code, product_name, product_desc, date_added, categories_id, subcategory, subcat_id, maincatagory, subcatagoty, sales_price, rent_price, itemid, product_new_imageid, deposit, facebook, Instagram, Google, Twitter, Pinterest, flipkart, amazon, discount, total_amt, seen_count, is_customized, is_color_same, is_pattern_same, is_piece_same, cgst, sgst, igst, short_desc, brand_color, youtube,CAST(REGEXP_SUBSTR(product_code,'[0-9]+') AS UNSIGNED) as sku,newProductName,ss_product_name from `product` where subcat_id='".$get_id."' order by sku desc";
   }

// echo $sql_query ; 


$minAddedRentPrice = PHP_INT_MAX; // Initialize with a high value
$maxAddedRentPrice = 0;          // Initialize with a low value
$minLastSellingPrice = PHP_INT_MAX; // Initialize with a high value
$maxLastSellingPrice = 0;          // Initialize with a low value


$todaysdt=date("Y-m-d");

$raw_data = mysqli_query($con,$sql_query);
$i = 1;
$cur_sym = $currency_symbol;
while($row = mysqli_fetch_array($raw_data)){
        

        
        $deposit = 0;
        $product_id = $row[0];    
        $prcode=$row[2];
        $sku = $prcode;
        
$product_name = $row['ss_product_name'];
        if(isset($product_name) && !empty($product_name)){
            
        }else{
            $product_name = $row[3];
        }
        
        $discount = $row[21];
        $youtube = $row[35];
        
        $re = mysqli_query($con3,"SELECT unit_price,quantity FROM phppos_items where name like '".$prcode."'");
        $rero=mysqli_fetch_row($re);
        
        $re1 = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$prcode."' and 
        bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
        $rero1=mysqli_fetch_row($re1);
        

        $qty=round($rero[1]);
        if($qty && $qty > 0){
            $mrp = $unitPrice = $rero[0];
            $commissionAmount = $rero1[0] ;
            $currentsp = $unitPrice - $commissionAmount ;   
        
        // echo ' MRP = ' . $mrp . '<br>';  
        // echo ' commission Amount = ' . $commissionAmount . '<br>'; 
        // echo ' Current Special Price = '.$currentsp . '<br>'; 
        
        
        
        
        $lastSellingPrice = 0 ; 
        $sellingPriceCalculation = $mrp - $commissionAmount ; 
        
        $sellingPriceCalculationPrecentageAmount = $sellingPriceCalculation * 0.4 ; 
        $sellingPriceCalculation = $sellingPriceCalculation - $sellingPriceCalculationPrecentageAmount  ;  

        if($mrp>=10000){
            if($sellingPriceCalculation < 5000){
                $lastSellingPrice = 5000 ;
            }else{
                $lastSellingPrice = $sellingPriceCalculation ;
            }
        }else if($mrp < 10000){
            $lastSellingPrice = $mrp - ( $mrp * 0.5 ) ; 
        }
        
        
        
        
        if($mrp<=2000){
                $courier = 100;
           }else if($mrp<=5000){
               $courier = 250;
           }else if($mrp<=10000){
               $courier = 500;
           }else{
               $courier = 1000;
           }
           
           
        
        if($currentsp > 0 ) {
            if($mrp<=10000){
                $rentprice=$mrp*0.20;
                $addedRentPrice = $courier + $rentprice ;
                $deposit = $mrp * 0.35 ;
            }else {
                if($currentsp<=40000){
                    $rentprice=$currentsp*0.20;
                    // echo 'rentprice = currentsp * 0.20 = ' . $rentprice .'<br>';
                    } else if($currentsp<=60000){
                        $rentprice=$currentsp*0.17;
                        // echo 'rentprice = currentsp * 0.17 = ' . $rentprice .'<br>';
                        } else{
                            $rentprice=$currentsp*0.15;
                            // echo 'rentprice = currentsp * 0.15 = ' . $rentprice.'<br>' ;
                            }
                            $addedRentPrice = $courier + $rentprice ;
                            if($addedRentPrice < 3000){
                                $addedRentPrice = 3000 ;
                            }
                            $deposit = $currentsp * 0.35 ;
                            if($deposit<3000){
                                $deposit = 3000 ;
                            }
            }
        }
        else{
            if($mrp<=10000){
                $rentprice=$mrp*0.20;
                $addedRentPrice = $courier + $rentprice ;
                $deposit = $mrp * 0.35 ;
            }else{
                $deposit = 3000 ;
                $addedRentPrice = 3000 ;
            }   
         }
    
        $deposit =  round_amount($deposit);  
        $addedRentPrice = round_amount($addedRentPrice) ; 
        
        
        
            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `product_id`='".$product_id."'";
            $qryimg = mysqli_query($con,$sqlimg);
            $rowimg = mysqli_fetch_row($qryimg);
             if($youtube){
                $ytarray=explode("/", $youtube);
                $ytendstring=end($ytarray);
                $ytendarray=explode("?v=", $ytendstring);
                $ytendstring=end($ytendarray);
                $ytendarray=explode("&", $ytendstring);
                $ytcode=$ytendarray[0];
                $imgframe =  "<iframe title=\"\" width=\"100%\" height=\"315\"  src=\"https://www.youtube.com/embed/$ytcode\" autoplay=\"0\"  frameborder=\"0\" allowfullscreen  loading=\"lazy\"></iframe>";
            }
            else if($rowimg){
                $path = ($pathmain."uploads".$rowimg[0]);
                $source_img = trim("yn/uploads".$rowimg[0]);
                $filename = basename($source_img);
                $_file_parent = "https://srishringarr.com/";
                $_new_filename = $_file_parent.$source_img;
                if(!file_exists($_new_filename)){
                   $destination_img =  $path;
                }else{
                    $destination_img =  str_replace($filename,'',$source_img) .'com_'.$filename;
                }
                $imgframe = '<img class="lazyload img-fluid product_img" loading="lazy" style="width: 100%; object-fit: contain; user-select: auto;" src="//images.weserv.nl/?url='.$destination_img.'&w=400&h=300" alt="'.$product_name.'">';
            }
        




        $link = "jewel_detail.php?id=$product_id&days=3";
        
        $newProductName = $row['newProductName'];
        if($newProductName){
            $link = 'jewel/'.$newProductName.'&days=3' ; 
        }
                
        $sellPrice = $mrp * 0.5 ; 
            
            
        $minAddedRentPrice = min($minAddedRentPrice, $addedRentPrice);
        $maxAddedRentPrice = max($maxAddedRentPrice, $addedRentPrice);
        $minLastSellingPrice = min($minLastSellingPrice, $lastSellingPrice);
        $maxLastSellingPrice = max($maxLastSellingPrice, $lastSellingPrice);
        

            
            
  
        $order_sql = mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$row[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >='".$todaysdt."' or `delivery_date` >='".$todaysdt."') and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
        
        
        if(mysqli_num_rows($order_sql)){
            
        $booking_date =' <span style="color:red;">Booking Status Dates</span>' ;
        
        while($order_sql_result = mysqli_fetch_assoc($order_sql)){
            $booking_billid = $order_sql_result['bill_id'];
            
            $booking_sql = mysqli_query($con3,"select * from phppos_rent where bill_id ='".$booking_billid."'") ;
            $booking_sql_result = mysqli_fetch_assoc($booking_sql);
            
            $pick_date = $booking_sql_result['pick_date'];
            $delivery_date = $booking_sql_result['delivery_date'];
            $booking_status = $booking_sql_result['booking_status'];
            
            if($pick_date!='' && $delivery_date!='' && $booking_status !='Returned') {

                  if($pick_date!="0000-00-00" && $delivery_date!="0000-00-00"){
                    $booking_date .= '<div> <br>'  .  date("d-m-Y", strtotime($pick_date)) .' - '. date("d-m-Y", strtotime($delivery_date)) . '</div>';
                  }      
            }
            else{
                $booking_date .='' ;
            }
        }
        }else{
                $booking_date ='' ;
            }
        
        
if(isset($row['rent_price']) && $row['rent_price'] > 0 ){
    $addedRentPrice = $row['rent_price'];
}

if(isset($row['deposit']) && $row['deposit'] > 0 ){
    $deposit = $row['deposit'];
}


if(isset($row['sales_price']) && $row['sales_price'] > 0){
    $lastSellingPrice = $row['sales_price'];
}

        
        
        
        $data[] = ['newProductName'=>$newProductName,'product_name'=>$product_name, 'mrp'=>$mrp,'addedRentPrice'=>$addedRentPrice,'imgframe'=>$imgframe,'sku'=>$sku,'deposit'=>$deposit,
        'discount'=>$discount,'link'=>$link,'courier'=>$courier,'sellPrice'=>$sellPrice,'lastSellingPrice'=>$lastSellingPrice,'commissionAmount'=>$commissionAmount,         'booking'=>$booking_date];
            
        }
                            
}




$final = $data;

$pricefilter = $_REQUEST['pricefilter'] ; 

if($pricefilter==2){
    usort($final, function ($item1, $item2) {
        return $item1['addedRentPrice'] <=> $item2['addedRentPrice'];
    });
}elseif($pricefilter==1){
    usort($final, function ($item1, $item2) {
        return $item2['addedRentPrice'] <=> $item1['addedRentPrice'];
    });
}elseif($pricefilter==4){
    usort($final, function ($item1, $item2) {
        return $item1['lastSellingPrice'] <=> $item2['lastSellingPrice'];
    });
}elseif($pricefilter==3){
    usort($final, function ($item1, $item2) {
        return $item2['lastSellingPrice'] <=> $item1['lastSellingPrice'];
    });
}



if ($_REQUEST['minPrice'] > 0 && $_REQUEST['maxPrice'] > 0 && isset($_REQUEST['typeFilter'])) {
    $minPrice = $_REQUEST['minPrice'];
    $maxPrice = $_REQUEST['maxPrice'];
    $typeFilter = $_REQUEST['typeFilter'];

    $filteredData = array_filter($final, function ($item) use ($minPrice, $maxPrice, $typeFilter) {
        $price = $typeFilter == 'addedRentPrice' ? $item['addedRentPrice'] : $item['lastSellingPrice'];
        return ($price >= $minPrice && $price <= $maxPrice);
    });

   echo json_encode(['data' => array_values($filteredData), 'minAddedRentPrice' => $minAddedRentPrice, 'maxAddedRentPrice' => $maxAddedRentPrice, 'minLastSellingPrice' => $minLastSellingPrice, 'maxLastSellingPrice' => $maxLastSellingPrice]);
} else {
    echo json_encode(['data' => array_values($final), 'minAddedRentPrice' => $minAddedRentPrice, 'maxAddedRentPrice' => $maxAddedRentPrice, 'minLastSellingPrice' => $minLastSellingPrice, 'maxLastSellingPrice' => $maxLastSellingPrice]);
}
}
?>