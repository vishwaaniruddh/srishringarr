<? include('header.php'); 

?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <div class="main-panel">
        <div class="content-wrapper">
            
            
<div class="card">
    <div class="card-body">

<?


$basename = basename($_SERVER['SCRIPT_URI']);
$script_uri = $_SERVER['SCRIPT_URI'];
$basefolder = str_replace($basename,'',$script_uri);

$title = $_POST['title'];
$sku = $_POST['sku'];
$target_dir = "uploads/";
$date = date("Y-m-d");
$i=0;


$countcheck = 0 ; 
foreach($_FILES as $key=> $val){

    foreach($val['name'] as $k=>$v){
             $countcheck++;       
    }
}

if($countcheck>1){
    $ismultiple = 1 ; 
}elseif($countcheck==1){
    $ismultiple = 0 ;
}





ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "insert into client_diary(title,sku,status,isMultiple,created_at) values('".$title."','".$sku."',1,'".$ismultiple."','".$date."')" ;

if(mysqli_query($con,$sql)){


if (!file_exists('uploads/'.$sku)) {
    mkdir('uploads/'.$sku, 0777, true);
}



echo '$clientid' . $clientid = $con->insert_id;
foreach($_FILES as $key=> $val){

    foreach($val['name'] as $k=>$v){

            $target_file = $target_dir .$sku .'/'. basename($v);
            if (move_uploaded_file($val['tmp_name'][$i], $target_file)) { 

                    
                $filetosave  =  $basefolder . $target_file ;
                     $sql2 = "insert into client_diary_details(clientid,image_url,status,created_at) values('".$clientid."','".$filetosave."','1','".$date."')";
                    if(mysqli_query($con,$sql2)){ ?>
                    
                        <div class="alert alert-success" role="alert">
                            <? echo "The file ". htmlspecialchars( basename( $v )). " has been uploaded.";
                            } ?>
                        </div>                    
                    

            <? } else { 
            echo mysqli_error($con);
            ?>
                    <div class="alert alert-danger" role="alert">
                        <? echo "Sorry, there was an error uploading your file."; ?>
                    </div>
            <? } $i++;       
    }
}
}
?>
    </div>
</div>

            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>