<?php
include('config.php');

$atmid = $_POST['atmid'];
$fileName = $atmid.'.zip';
if(isset($_POST['download'])){
    if($_POST['id']){
        $visitid = $_POST['id'];
        $zip = new ZipArchive();
            $tozip = __DIR__ . "/pmcreportapp/".$visitid."/";
            # create a temp file & open it
            $tmp_file = tempnam('.','');
            $zip->open($tmp_file, ZipArchive::CREATE);
            
            $zip->addGlob($tozip . "*.{mp4}", GLOB_BRACE, [
                            "add_path" => "inside/",
                            "remove_all_path" => true
                          ]);
             # close zip
            $zip->close();
            
            # send the file to the browser as a download
            header('Content-disposition: attachment; filename='.$fileName);
            header('Content-type: application/zip');
            ob_clean();
	        flush();
            readfile($tmp_file);
            unlink($tmp_file);              
    }
}

?>