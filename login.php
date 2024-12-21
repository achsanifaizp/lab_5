<!-- Login Page (login.php) -->
<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="matric">Matric:</label><br>
        <input type="text" id="matric" name="matric" required><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>

    <?php
    if (isset($_POST['login'])) {
        $matric = $_POST['matric'];
        $name = $_POST['name'];

        $sql = "SELECT * FROM users WHERE matric='$matric' AND name='$name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['loggedin'] = true;
            $_SESSION['matric'] = $matric;
            header("Location: display.php");
        } else {
            echo "Invalid login credentials.";
        }
    }
    ?>
</body>
</html>