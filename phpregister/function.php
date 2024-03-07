<?php
function getConnection() {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'phpreg';
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getItems() {
    $conn = getConnection();
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    $items = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    $conn->close();
    return $items;
}
