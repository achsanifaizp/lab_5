<!-- Display Page (display.php) -->
<?php 
include 'db.php'; 
session_start(); 
if (!isset($_SESSION['loggedin'])) { 
    header("Location: login.php"); 
    exit; 
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php
        // Query to fetch all users from the database
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Output each user row
                echo "<tr>
                        <td>{$row['matric']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['role']}</td>
                        <td>
                            <!-- Update button/link -->
                            <a href='update.php?matric={$row['matric']}'>Update</a> | 
                            <!-- Delete button/link -->
                            <a href='delete.php?matric={$row['matric']}'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
