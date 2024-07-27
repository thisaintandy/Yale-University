<?php
include 'database.php';
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("location: admin.php");
    } else {
        $error = "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yale: School of Art - Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="university-name">
            <h1 style="margin-bottom: 0;">Yale University</h1>
            <h3 style="margin-top: 0;">School of Arts</h3>
        </div>
        <nav class="navigation-links">
            <a href="index.php">Home</a>
            <a href="aboutus.php">About us</a>
            <a href="apply.php">Apply Now</a>
            <a href="#">Exhibitions</a>
            <a href="#">Publications</a>
            <a href="#">News</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>
    <div class="login-page">
        <div class="login-container" style="margin-top: 20px;">
        <h1 class="university" style="margin-top: 20px;">Login</h1>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button class="loginbutton" type="submit">Login</button>
            </form>
            <?php
            if ($error != '') {
                echo "<p class='error'>$error</p>";
            }
            ?>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <h1>Yale University</h1>
                <a>Visiting</a><br/>
                <a>Facebook</a><br/>
                <a>Instagram</a><br/>
                <a>Youtube</a><br/>
                <a>Sitemap</a><br/>
                <a>Accessibility at Yale</a><br/>
                <p>© 2024 Support the School</p>
            </div>
        </div>
    </footer>
</body>
</html>