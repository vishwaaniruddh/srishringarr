<? include('config.php');
$jewelid = $_REQUEST['jewelid'];

$get_id = $jewelid ; 

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
    $sql_query = "select product_id, product_image, product_code, product_name, product_desc, date_added, categories_id, subcategory, subcat_id, maincatagory, 
    subcatagoty, sales_price, rent_price, itemid, product_new_imageid, deposit, facebook, Instagram, Google, Twitter, Pinterest, flipkart, amazon, discount,
    total_amt, seen_count, is_customized, is_color_same, is_pattern_same, is_piece_same, cgst, sgst, igst, short_desc, brand_color,
    youtube,CAST(REGEXP_SUBSTR(product_code,'[0-9]+') AS UNSIGNED) as sku,newProductName,ss_product_name from `product` where subcat_id in($all) order by sku desc";
   }else{
    $sql_query = "select product_id, product_image, product_code, product_name, product_desc, date_added, categories_id, subcategory, subcat_id, maincatagory,
    subcatagoty, sales_price, rent_price, itemid, product_new_imageid, deposit, facebook, Instagram, Google, Twitter, Pinterest, flipkart, amazon, discount, 
    total_amt, seen_count, is_customized, is_color_same, is_pattern_same, is_piece_same, cgst, sgst, igst, short_desc, brand_color, youtube,
    CAST(REGEXP_SUBSTR(product_code,'[0-9]+') AS UNSIGNED) as sku,newProductName,ss_product_name from `product` where subcat_id='".$get_id."' order by sku desc";
}

// echo $sql_query ; 


// echo '<br />';

$raw_data = mysqli_query($con,$sql_query);
$i = 1;
$cur_sym = $currency_symbol;


?>
<div class="row">
    
    
<?
while($row = mysqli_fetch_array($raw_data)){
      
      
        $deposit = 0;
        $product_id = $row[0];    
        $prcode=$row[2];
        $sku = $prcode;
          
          
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
                
                
 
 ?>
    <div class="col-sm-3" style="margin: 10px auto;">
        <img src="<?= $destination_img; ?>" style="width:100%;" />
        <br />
        SKU: <strong><?= $sku; ?></strong>
        <button class="btn btn-primary addInExclusiveCollection" data-image="<?= $destination_img; ?>" data-sku="<?= $sku; ?>" data-link="<?= $link; ?>"> Add </button>
    </div>
 <?
}

?>

</div>



 <script>
    $(document).ready(function() {
        $('.addInExclusiveCollection').click(function() {
            var image = $(this).data('image');
            var sku = $(this).data('sku');
            var link = $(this).data('link');
            
            var dataToSend = {
                image: image,
                sku: sku,
                link: link,
                type:'Jewel'
            };
            $.ajax({
                type: 'POST',
                url: 'addcollection.php',
                data: dataToSend,
                success: function(response) {
                    if(response==1){
                        alert('Added to Collection !');
                    }else{
                        alert('Error !');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>