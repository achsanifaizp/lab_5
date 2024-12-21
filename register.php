<!-- Registration Page (register.php) -->
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="">
        <label for="matric">Matric:</label><br>
        <input type="text" id="matric" name="matric" required><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="role">Role:</label><br>
        <input type="text" id="role" name="role" required><br><br>
        <button type="submit" name="submit">Register</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $matric = $_POST['matric'];
        $name = $_POST['name'];
        $role = $_POST['role'];

        $sql = "INSERT INTO users (matric, name, role) VALUES ('$matric', '$name', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>