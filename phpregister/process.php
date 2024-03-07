<?php
include 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConnection();
    $name = $_POST['name'];
    $description = $_POST['description'];
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE items SET name='$name', description='$description' WHERE id=$id";
    } else {
        $sql = "INSERT INTO items (name, description) VALUES ('$name', '$description')";
    }
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}
