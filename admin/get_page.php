<?php
include('config.php');
header('Content-Type: application/json; charset=utf-8');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
if(isset($_GET['id'])) {
    $pageId = $_GET['id'];

    // Prepare and bind the SQL statement
    $stmt = $con->prepare("SELECT * FROM pages WHERE id = ?");
    $stmt->bind_param("i", $pageId);
    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        // Page found
        $page = $result->fetch_assoc();

        // Encode special characters in HTML entities
        $encodedPage = array_map('htmlspecialchars', $page);

        echo json_encode($encodedPage, JSON_UNESCAPED_UNICODE); // Output page data as JSON without escaping Unicode characters
    } else {
        // Page not found
        echo json_encode(array('error' => 'Page not found'), JSON_UNESCAPED_UNICODE);
    }

    // Close the statement
    $stmt->close();
} else {
    // Page ID not provided
    echo json_encode(array('error' => 'Page ID not provided'), JSON_UNESCAPED_UNICODE);
}

// Close the connection
$con->close();
?>
