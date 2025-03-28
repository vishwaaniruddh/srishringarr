<?php include('header.php');
ini_set('max_execution_time', 0);
?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">

<div class="main-panel">
    <div class="content-wrapper">
        <!-- Add your newsletter module here -->
        <h1>Newsletter</h1>
        <hr />

        <?php


$countsql = mysqli_query($con,"select * from newsl");
$countsqlResult = mysqli_num_rows($countsql);

        // Function to send email to subscribers
        function sendNewsletter($title, $content, $con, $start, $end)
        {
            // Get the list of email addresses from the 'newsl' table for the selected range
            $query = "SELECT email FROM newsl LIMIT $start, $end";
            $result = mysqli_query($con, $query);

            if ($result) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $to = $row['email'];
                    // $to = 'vishwaaniruddh@gmail.com' ; 
                    $subject = $title;
                    $message = $content;

                    // Headers with the sender's name and other details
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                    $headers .= 'From: Srishringarr Fashion Studio <info@srishringarr.com>' . "\r\n" .
                        'Reply-To: Srishringarr Fashion Studio <info@srishringarr.com>' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    // Send the email using cURL
                    $nodes = 'sendmailapi.sarmicrosystems.in/ss_api.php';
                    $data = array(
                        'subject' => $subject,
                        'to' => $to,
                        'setFrom' => 'info@srishringarr.com',
                        'message' => $message,
                    );

                    $ch = curl_init($nodes);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    $response = curl_exec($ch);

                    echo $i . ') Sent to ' . $to . ' Succesfully ! <br />';
                    curl_close($ch);

                    $i++;
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newsletterTitle = $_POST['newsletterTitle'];
            $newsletterContent = $_POST['newsletterContent'];
            $selectedRange = $_POST['emailRange'];

            // Assuming each batch size is 50
            $batchSize = 50;

            // Calculate the start and end range based on the selected dropdown value
            list($start, $end) = explode("-", $selectedRange);
            $start = ($start - 1) * $batchSize; // Adjusting for zero-based index

            // Call the function to send the newsletter for the selected range
            sendNewsletter($newsletterTitle, $newsletterContent, $con, $start, $batchSize);
        }
        ?>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="newsletterTitle">Newsletter Title:</label>
            <input class="form-control" type="text" id="newsletterTitle" name="newsletterTitle"><br><br>

            <label for="newsletterContent">Newsletter Content:</label>
            <textarea class="form-control" id="newsletterContent" name="newsletterContent"></textarea><br><br>

            <label for="emailRange">Select Email Range:</label>
            <select class="form-control" id="emailRange" name="emailRange">
                <?php
                // Assuming each batch size is 50 and total records is 2000
                $totalRecords = $countsqlResult;
                $batchSize = 50;

                for ($i = 1; $i <= ceil($totalRecords / $batchSize); $i++) {
                    $start = ($i - 1) * $batchSize + 1;
                    $end = $i * $batchSize;
                    echo "<option value=\"$start-$end\">$start-$end</option>";
                }
                ?>
            </select><br><br>

            <button class="btn btn-primary btn-sm" type="submit">Send Newsletter</button>
        </form>

        <!-- Include CKEditor for the newsletter content -->
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <!-- End CKEditor -->

        <!-- End Newsletter Module -->

    </div>
</div>

<script>
    CKEDITOR.replace('newsletterContent', {
        filebrowserImageUploadUrl: '/yn/Admin/shringarr/upload-image.php?responseType=json',
    });


    CKEDITOR.on('instanceReady', function (evt) {
        evt.editor.on('paste', function (event) {
            // Check if the pasted content includes an image
            if (event.data.dataValue.includes('<img')) {
                // Extract the image source URL
                console.log('Pasted content with images:');
                console.log(event.data.dataValue);

                var imgSrc = event.data.dataValue.match(/src="([^"]+)"/);
                if (imgSrc) {
                    // You have the image URL; you can now initiate an upload using your script
                    var imageUrl = imgSrc[1];
                    // Perform the image upload using AJAX to your script
                    // This part requires custom JavaScript to send the image to your server.
                }
            }
        });
    });
</script>

<?php include('footer.php'); ?>
