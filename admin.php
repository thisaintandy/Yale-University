<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yale: School of Art</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
        }
    </script>
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
            <a href="login.php">Admin</a>
        </nav>
    </header>
    <h1 class="university" style="margin-top: 20px;">Messages</h1>

        <div class="about-us-container">
            <div>
                <?php
                $sql = "SELECT * FROM messages";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='note'>";
                        echo "<h3>" . $row['subject'] . "</h3>";
                        echo "<p>" . $row['message'] . "</p>";
                        echo "<p><small>Email: " . $row['email'] . "</small></p>";
                        echo "</div>";
                    }
                } else {
                    echo "No notes available.";
                }
                $conn->close();
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