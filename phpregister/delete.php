<?php
if (isset($_GET['id'])) {
    $conn = getConnection();
    $id = $_GET['id'];
    $sql = "DELETE FROM items WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}