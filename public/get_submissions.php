<?php

// Database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'xpeedstudio';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get filter values
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];
$userId = $_GET['userId'];

// Prepare SQL query
$sql = 'SELECT * FROM submissions WHERE 1=1';
if (!empty($startDate)) {
    $sql .= " AND entry_at >= '$startDate'";
}
if (!empty($endDate)) {
    $sql .= " AND entry_at <= '$endDate'";
}
if (!empty($userId)) {
    $sql .= " AND id = '$userId'";
}

// Execute the query
$result = $conn->query($sql);

// Fetch and return the submissions as JSON
$submissions = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $submission = array(
            'id' => $row['id'],
            'userId' => $row['buyer'],
            'phone' => $row['phone'],
            'entry_at' => $row['entry_at']
            // Add more keys for other submission data
        );
        $submissions[] = $submission;
    }
}

echo json_encode($submissions);

// Close the database connection
$conn->close();