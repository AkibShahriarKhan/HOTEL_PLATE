<?php 
    $con = new mysqli("localhost", "root", "", "wtproject");
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT d_name FROM district";
    $result = $con->query($sql);
    $resultArray = array();
    
    while($row = $result->fetch_assoc()) {
        $resultArray[] = $row['d_name'];
    }
    echo json_encode($resultArray);
?>