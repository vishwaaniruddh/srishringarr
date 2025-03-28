<? include('config.php');
$garmentid = $_REQUEST['garmentid'];



$pathmain ='https://yosshitaneha.com/';

$sql_query = "select *, CAST(REGEXP_SUBSTR(gproduct_code,'[0-9]+') AS UNSIGNED) as sku from `garment_product` 
where  product_for='".$garmentid."' and gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0) order by sku desc limit 50";

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
          
        $sqlimg="SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='".$product_id."'";
            $qryimg = mysqli_query($con,$sqlimg);
            $rowimg = mysqli_fetch_row($qryimg);
           
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
           
            
            $link = "apparel_detail.php?id=$product_id&days=3";
            $newProductName = $row['newProductName'];
            if($newProductName){
                $link = 'apparel/'.$newProductName.'&days=3' ; 
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
            // Get data attributes from the button
            var image = $(this).data('image');
            var sku = $(this).data('sku');
            var link = $(this).data('link');

            // Create an object with the data
            var dataToSend = {
                image: image,
                sku: sku,
                link: link,
                type:'Apparel'
            };

            // Send the data to the addcollectionphp page using AJAX
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
                    // Handle any errors that occur during the AJAX request
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
