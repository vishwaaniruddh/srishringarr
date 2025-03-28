<? include('config.php');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



$sku = $_REQUEST['sku'];

$sku_arr = explode(',',$sku);

			    $pathmain = "http://yosshitaneha.com/";
		        $jewellery = 'jewellery';
                $apparels = 'Apparels';
                $path = '../Admin/';
                
                
                
                
     
foreach($sku_arr as $key=>$val){


$Apparel=mysqli_query($con,"SELECT g.*,gp.* FROM `garments` g left join  garment_product gp on g.garment_id = gp.product_for WHERE gp.gproduct_code='".$val."'");

$garment_row_count = mysqli_num_rows($Apparel);



$Jewellery=mysqli_query($con,"SELECT j.categories_name,j.subcat_id as m_category,js.name,js.subcat_id as sub_cat,p.* from jewel_subcat j join subcat1 js on j.subcat_id=js.maincat_id join product p on js.subcat_id = p.subcat_id where p.product_code='".$val."'");
$jewel_row_count = mysqli_num_rows($Jewellery);

                                



if($garment_row_count > 0){
                    
                    $result = $Apparel;
                    $category = 2;
                } else if($jewel_row_count > 0){
                    
                    $result = $Jewellery;
                    $category = 1;
                } else {
                    echo $val .' Not Found' ; 
                    echo '<br>';

                }


                if($row = mysqli_fetch_array($result)){
                    

                    $youtube = $row['youtube'];
                    if($youtube){
                        $is_youtube = 1 ;
                    }else{
                        $is_youtube = 0 ; 
                    }
                    
                    if($category==2){
                        $prcode=$row['gproduct_code'];
                        $pid = $row['gproduct_id'];
                        $image_qry ="SELECT prod_image from product_images_new where gproduct_id = '".$pid."' or pro_code='".$prcode."' ";
                        $name = $row['gproduct_name'];
                        
                    } else if($category==1){
                        $prcode=$row['product_code'];
                        $pid = $row['product_id'];
                        $image_qry ="SELECT prod_image from product_images_new where product_id = '".$pid."' or pro_code='".$prcode."' ";
                        $name = $row['product_name'];
                    }
                    //echo $image_qry;
                    
                    $re = mysqli_query($con3,"SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$prcode."'");
                    $rero=mysqli_fetch_row($re);
                    $newselling_price = $rero[0]; 
                    

        $re1 = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$prcode."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
        $rero1=mysqli_fetch_row($re1);
        $currentsp=$rero[0]-$rero1[0];
        $splimit=$rero[1]*0.8;
        
                if($currentsp>$splimit)
        $newsp=$currentsp;
        else
        $newsp=$splimit;
        
        
                    
                    
                    if($category=="1"){
                            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `product_id`='".$pid."'";
                              if($newsp<=40000){
                                $rentprice=$newsp*0.20;  
                              }   
                            else if($newsp<=60000){
                                $rentprice=$newsp*0.17;
                            }
                            else{
                                $rentprice=$newsp*0.15;
                            }
                                
                               if($newsp<=2000){
                                   $courier = 100;
                               }else if($newsp<=5000){
                                   $courier = 250;                                   
                               }else if($newsp<=10000){
                                   $courier = 500;                                   
                               }else{
                                   $courier = 1000;                                   
                               }
                        }
                        else
                        {
                            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='".$pid."'";
                              if($newsp<=40000)
                                $rentprice=$newsp*0.20;
                            else if($newsp<=60000)
                                $rentprice=$newsp*0.17; 
                            else
                                $rentprice=$newsp*0.15;
                                
                                
                                
                               if($newsp<=10000){
                                   $courier = 750;
                               }else {
                                   $courier = 1000;                                   
                               }
                            
                            if($rentprice<1500){
                                $rentprice  =1500;

                            }
                        }  
                        $qryimg = mysqli_query($con,$sqlimg);
                        $rowimg = mysqli_fetch_row($qryimg);
                        
                        
                            
                        if($rowimg){
                            $path = trim($pathmain."uploads".$rowimg[0]);
                            $imgframe = '<img class="img-fluid product_img" style="height:300px;width: 100%; object-fit: contain; user-select: auto;" src="' . $path . '">';
                        } else if($youtube){
                                
                                
                                $ytarray=explode("/", $youtube);
                                $ytendstring=end($ytarray);
                                $ytendarray=explode("?v=", $ytendstring);
                                $ytendstring=end($ytendarray);
                                $ytendarray=explode("&", $ytendstring);
                                $ytcode=$ytendarray[0];
                                $imgframe =  "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/$ytcode\" frameborder=\"0\" allowfullscreen></iframe>";
                        }else{

                        }
                        
                        
                        
                        $rentprice = intval($rentprice) ;
                        $deposit = intval($newsp*0.35);
                        
                        
                        $rentprice = $rentprice+$courier;
                        
                        
                        $round_num = substr( $deposit, -2);
if($round_num < 50 && $round_num!=00 && $round_num!=50){
    $add_amount = 50 - $round_num;
}
elseif($round_num > 50 && $round_num != 00 && $round_num!=50){
    $add_amount = 100 - $round_num;  
}
else{
    $add_amount = 0; 
}
$final_deposit = $deposit + $add_amount;


                        
                        
                    
                    
        
                    $image=mysqli_query($conn,$image_qry);
                    
                    $img = mysqli_fetch_assoc($image);
                    $path=trim($pathmain."uploads".$img['prod_image']);
                  
                    $re = mysqli_query($con3,"SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$prcode."'");
                    $rero=mysqli_fetch_row($re);
                    $re1 = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$prcode."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
                    $rero1=mysqli_fetch_row($re1);
                    $currentsp=$rero[0]-$rero1[0];
                    $splimit=$rero[1]*0.8;
                    if($currentsp>$splimit)
                        $newsp=$currentsp;
                    else
                        $newsp=$splimit;
                        
                        
?>
<div class="col-sm-3" style="text-align:center;">
    <? echo $imgframe; ?>
        <br>
    <a href="#"><? echo $val; ?></a>
</div>



                            
<?
// $data[] = ['pid'=>$pid,'category'=>$category,'link'=>$url,'image'=>$path,'product_name'=>$name,'deposite'=>$final_deposit, 'selling_price'=>$newselling_price,'sku'=>$prcode,'rent_price'=>$rentprice,'imageframe'=>$imgframe];

                }


$imgframe='';

}



?>

