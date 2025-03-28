<?php

include('config.php');

$sku[] = $_POST['sku'];
$productsku = $_POST['productsku'];
$type = $_POST['prodtype'];



$skulist = json_encode($sku);
$skuarray=str_replace( array('[',']','"') , ''  , $skulist);
$arr=explode(',',$skuarray);
$skuarray = "'" . implode ( "', '", $arr )."'";

// print_r($skuarray);

// print_r($skulist);
//  print_r($type);


    
         //echo "Jewellery";
        $sql = mysqli_query($con,"select * from product where product_code in (".$skuarray.")");
        if (!$sql || mysqli_num_rows($sql) == 0){
            
        }else{
          $test = array();
                while($sqlres = mysqli_fetch_assoc($sql)){
                    
                     $prod_id = $sqlres['product_id'];
                
                     array_push($test,$prod_id);
                    //  echo $prod_id."<br>";
                }
                 $final_prodid  = implode(',',$test);
                //  print_r($final_prodid);
                 $prodidlist = json_encode($final_prodid);
                 
        }
   
   
        $sqla = mysqli_query($con,"select * from garment_product where gproduct_code in (".$skuarray.")");
        if (!$sqla || mysqli_num_rows($sqla) == 0){
            
        }else{
            $test = array();
             while($sqlresapp = mysqli_fetch_assoc($sqla)){
                $prod_id = $sqlresapp['gproduct_id'];
                
                //  echo $prod_id."<br>";
                
                array_push($test,$prod_id);
             }
              $final_prodid_a  = implode(',',$test);
                //  print_r($final_prodid);
                 $prodidlist = json_encode($final_prodid);
        }
    
$final_prodid_new = $final_prodid .','. $final_prodid_a;
// echo $final_prodid_new; 


// echo $prod_id;
if($type=="Jewellery")
{
    $type='1';
    
}
else
if($type=="Apparels")
{
    $type='2';
}

    // echo $prodidlist;
    $sql = mysqli_query($con,"insert into suggestionlist(prod_id,products_sku,suggestion_prod_sku) values ('".$final_prodid_new."','".$skulist."','".$productsku."')  ");
    $sqlresult=mysqli_fetch_assoc($sql);
    
    // $sqlresult = 0;
    if($sqlresult!='0')
    {
        echo '<script>alert("Data Inserted")</script>';
            echo '<script>window.location="newsuggestion.php"</script>';
    }
    else
    {
        echo '<script>alert("Data Error")</script>';
            echo '<script>window.location="newsuggestion.php"</script>';
    }

?>