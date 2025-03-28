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


$bannerfor=$_POST['bannerfor'];

if($bannerfor==1){
    $banner='web';
}else{
    $banner='mobile';
}

$target_dir = "banner/".$banner.'/';

$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); 



$image = $_FILES["image"]["name"] ; 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "insert into bannerimg(img,bannerfor,status) values('".$image."','".$bannerfor."',1)" ;

if(mysqli_query($con,$sql)){

 $clientid = $con->insert_id;

?>
                        <div class="alert alert-success" role="alert">
                            <? echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"] )). " has been uploaded.";
                            ?>
                        </div>                    
                    
<?       
            
            
}
else { 
            echo mysqli_error($con);
            ?>
                    <div class="alert alert-danger" role="alert">
                        <? echo "Sorry, there was an error uploading your file."; ?>
                    </div>
            <? }
            
?>
    </div>
</div>

            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>