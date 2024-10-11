<?php
 
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "cw412";
 
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];
$sql = "SELECT Image FROM upload WHERE id='$id'";
$result = $conn->query($sql);

// Check if the image exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageData = $row['Image'];

    // Set the content type and filename for the download
    header('Content-Type: image/jpeg'); // Adjust the content type if needed
    header('Content-Disposition: attachment; filename="downloaded_image.jpg"'); // Adjust the filename as desired

    // Output the image data
    echo $imageData;
} else {
    echo "Image not found.";
}

// Close the database connection
$conn->close();

?>