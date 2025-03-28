<?php include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <?php
                // Establish MySQL connection (assuming it's included in header.php)
                // $con = mysqli_connect("your_host", "your_username", "your_password", "your_database");
                $datetime = date('Y-m-d h:i:s');
                // Process the form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $mobile = $_POST["mobile"];
                    $status = $_POST["status"];

                    // Prepare and execute the SQL query to insert data
                    $stmt = $con->prepare("INSERT INTO newsl (name, email, mobile, status,created_at) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssi", $name, $email, $mobile, $status,$created_at);

                    if ($stmt->execute()) {
                        echo "Subscription successful!";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                    <br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control" name="email" required>
                    <br>

                    <label for="mobile">Mobile:</label>
                    <input type="text" id="mobile" name="mobile" class="form-control" required>
                    <br>

                    <input type="hidden" name="status" value="1">

                    <input type="submit" class="btn btn-success" value="Subscribe">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
    // DataTables initialization script
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
