<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
            
<form action="process_pdfmaker.php" method="POST">
    
    <div class="row">
        <div class="col-sm-12">
            <label>
                Enter PDF Name
            </label>
            <input type="text" name="pdfName" class="form-control" required />
            
        </div>
    </div>
    
    <?php
    $sku = $_REQUEST['sku'];
    $skuar = explode(',', $sku);

    foreach ($skuar as $k => $v) {
        $sku = explode('-', $v)[0];
        $product_id = explode('-', $v)[1];

        $sqlimg = "SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='$product_id'";
        $qryimg = mysqli_query($con, $sqlimg);

        if (!$qryimg || mysqli_num_rows($qryimg) == 0) {
            $sqlimg = "SELECT img_name FROM `product_images_new` WHERE `product_id`='$product_id'";
            $qryimg = mysqli_query($con, $sqlimg);
        }

        if ($qryimg && mysqli_num_rows($qryimg) > 0) {
            $rowimg = mysqli_fetch_array($qryimg);
        }

        // $sqlimg = "SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='$product_id' ORDER BY rank";
        // $qryimg = mysqli_query($con, $sqlimg);
        $pathmain = 'https://yosshitaneha.com/';
        $html = '';

        echo '<div class="card">
            <div class="card-header">
                <h3>SKU :' . $sku . ' </h3>
            </div>
            <div class="card-body">
                <div class="row">';
        while ($rowimg23 = mysqli_fetch_array($qryimg)) {

            $img = str_replace("/ ", "/", $rowimg23[0]);
            $path = trim($pathmain . "uploads" . $img);
            $expl = explode('/', $path);
            $cnt = count($expl);
            $angle_img = trim($pathmain . "thumbs/" . trim($expl[$cnt - 1]));

            $zoom_img = $path;
            ?>
                    <div class="col-sm-3">
                        <div class="img-box">
                            <img src="<?php echo $angle_img; ?>" alt="<?= $product_name; ?>" style="width:200px;" onclick="toggleRadio(this)" />
                            <br />
                            <input type="radio" class="radio-group <?= $sku . '-' . $product_id; ?>" name="<?= $sku . '-' . $product_id; ?>" value="<?= $v . '-' . basename($angle_img); ?>" />
                        </div>
                    </div>
            <?php
        }
        echo '</div>
            </div>
        </div>';
    }
    ?>
    <input type="submit" name="submit" value="Submit" />
</form>

<script>
    function toggleRadio(imgElement) {
        // Get the closest radio button to the clicked image within the same group
        var radioBtn = imgElement.closest('.img-box').querySelector('.radio-group');
        // Toggle the checked state
        radioBtn.checked = !radioBtn.checked;
    }
</script>

            
            
        </div>
    </div>
<? include('footer.php'); ?>