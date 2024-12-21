<?php
include 'db.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Fetch user details to show in the form
    $sql = "SELECT * FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the form submission to update the user
    $name = $_POST['name'];
    $role = $_POST['role'];

    $update_sql = "UPDATE users SET name = ?, role = ? WHERE matric = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sss", $name, $role, $matric);
    $update_stmt->execute();

    header("Location: display.php"); // Redirect back to display page
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br><br>
        
        <label>Role:</label>
        <input type="text" name="role" value="<?php echo $user['role']; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
