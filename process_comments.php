<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cw412";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the posted name and comment
$name = $_POST['name'];
$comment = $_POST['comment'];

// Prepare the SQL statement and bind parameters
$stmt = $conn->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $comment);

// Execute the statement
if ($stmt->execute()) {
    echo "Comment submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();

// Retrieve comments from the database
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["name"] . "</strong>: " . $row["comment"] . "</p>";
    }
} else {
    echo "No comments found.";
}

$conn->close();
?>