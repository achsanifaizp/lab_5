<?php
include 'db.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Delete user based on matric
    $delete_sql = "DELETE FROM users WHERE matric = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("s", $matric);
    $delete_stmt->execute();

    header("Location: display.php"); // Redirect back to display page after deletion
    exit;
}
?>
