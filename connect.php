<?php
 
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "cw412";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$image = $_FILES['image']['tmp_name']; // Temp file
$imageContent = addslashes(file_get_contents($image));
 
$sql = "INSERT INTO upload (Image) VALUES ('$imageContent')";
 
if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Data and image uploaded successfully!");</script>';
    echo '<a href="download.php?id=' . $conn->insert_id . '">Download Image</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();
?>