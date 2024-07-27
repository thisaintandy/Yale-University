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

    <h3 class="university" style="margin-top: 10px; margin-bottom: 0; font-size: medium; padding-top: 2%;">Yale University</h3>
    <h1 class="university" style="margin-top: 0;">School of Arts</h1>

    <div class="description" style="font-size: 25px;">
        <p>The <strong>Yale School of Art</strong> is a graduate school that confers MFAs in Graphic Design, Painting/Printmaking, Photography, and Sculpture; and offers undergraduate-level art courses to Yale College students. Our website exists as an ongoing collaborative experiment in digital publishing and information sharing. It functions as a wiki—all members of the School of Art community have the ability to add new, and edit most existing content.</p>
    </div>
    
    <div class="navigation-on-page">
        <p>On this page: <button onclick="scrollToSection('content1')">Happening Now</button><button onclick="scrollToSection('content2')">Bulletin Board</button><button onclick="scrollToSection('content3')">Calendar</button></p>
    </div>

    <section class="section-container">
        <section class="left-side">
            <button id="qbutton">Quick Links</button>
            <script src="script.js"></script>
            <ul id="quicklinks" style="display: none;">
                <li><a>Current Students</a></li>
                <li><a>Faculty and Staffs</a></li>
                <li><a>Facilities</a></li>
                <li><a>Courses</a></li>
            </ul>
            
            <button id="nbutton">Newsletters</button>
            <script src="script.js"></script>
            <ul id="newsletters" style="display: none;">
                <li><a>Sign up for School of Art newsletters</a></li>
                <li><a>Community Calendar</a></li>
                <li><a>Academic Calendar</a></li>
                <li><a>Public Events Calendar</a></li>
            </ul>
        </section>
    
        <section class="center">
            <!-- Happenings Now -->
            <div id="content1" class="content1">
                <h2 class="content-headings"><img src="assets/content-heading1.png"></h2>
                <div class="content-container" style="margin-bottom: 20px;">
                    <div class="image-content">
                        <img src="assets/Graduation-Image.jpg">
                    </div>

                    <div class="text-description">
                        <h1 style="padding-left: 20px; font-family: 'Acme', sans-serif; font-size: 28px;">CONGRATULATIONS TO THE CLASS OF 2024!🎓</h1>
                        <p>The Yale School of Art celebrates its graduating class of 2024 with a commencement address by Los Angeles-based artist and educator Patty Chang on Monday, May 20, 2024.</p>  
                        <p>This event will be followed by the Yale School of Art Diploma Ceremony and Reception in the Sculpture Garden at the Yale University Art Gallery.</p>
                    </div>
                </div>
                <div class="content-container">
                    <div class="image-content">
                        <img src="assets/Yale-Image.jpg">
                    </div>

                    <div class="text-description">
                        <h1 style="padding-left: 20px; font-family: 'Acme', sans-serif; font-size: 20px;">Why Yale Law Is So Good at Producing Reactionaries Like JD Vance</h1>
                        <p>Yale Law School’s prominence in producing high-profile reactionary figures like J.D. Vance can be attributed to its extensive network and influential alumni base. Graduates often have significant platforms and resources that amplify their voices, which can make certain ideological perspectives more visible. While the school fosters a diverse array of political views, the visibility of prominent individuals can skew perceptions of its overall ideological leanings.</p>  
                    </div>
                </div> 
                <div class="others">
                    <h3>Other events happening now:<button style="font-size: 10px;">Spring 2024 Visiting Artist Lecture Schedule</button><button style="font-size: 10px;">Spring 2024 Exhibitions and Schedule</button></h3>
                </div>
            </div>
            <!-- Bulletin Board -->
            <div id="content2" class="content2">
                <h2 class="content-headings"><img src="assets/content-heading2.png"></h2>
                <?php
                $sql = "SELECT * FROM bulletin_board";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='note'>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<p>" . $row['content'] . "</p>";
                        echo "<p><small>Author: " . $row['author'] . "</small></p>";
                        echo "</div>";
                    }
                } else {
                    echo "No notes available.";
                }

                $conn->close();
                ?>
            </div>

            <!-- Add Note Form -->
            <div class="add-note">
                <form action="insert_note.php" method="POST">
                    <input type="text" name="title" placeholder="Title" required><br>
                    <textarea name="content" placeholder="Content" required></textarea><br>
                    <input type="text" name="author" placeholder="Author" required><br>
                    <button type="submit">Post</button>
                </form>
            </div>

            </div>
            <!-- Calendar -->
            <hr>
            <div id="content3" class="content3">
                <h2 class="content-headings"><img src="assets/content-heading3.png"></h2>
                <div class="container">
                    <div class="column">
                      <h3>NEW CALENDARS BEGINNING SUMMER 2020</h3>
                      <a><strong>Public Calendar</strong></a><br/>
                      <p>Containing those events open to the public.</p>
                      <a><strong>School of Art in the World</strong></a><br/>
                      <p>Containing events and exhibitions hosted by, led by, or featuring members of the School of Art community.</p>
                      <a><strong>Community Calendar</strong></a><br/>
                      <p>Containing those events open only to the SoA community.</p>
                    </div>
                    <div class="column">
                        <h3>Get news from the Yale School of Art in your inbox: Sign up for our newsletters</h3>
                        <p>We publish two newsletters during the academic year:</p>
                        <p>News From New Haven — A public monthly newsletter about news and events happening on campus.</p>
                        <p>Week at SoA — A weekly community-only email listing SoA events as well as public and university events in New Haven.</p>

                    </div>
                  </div>
            </div>

            <!-- Send us a message -->
            <div class="email">
                <hr>
                <h2>Email us below for any concern</h2>
                <form action="message.php" method="POST">
                    <input type="text" name="email" placeholder="Email" required><br>
                    <input type="text" name="subject" placeholder="Subject" required><br>
                    <textarea name="message" placeholder="Content" required style="height: 80px"></textarea><br>
                    <button type="submit">Send</button>
                </form>
            </div>

        </section>

    
        <section class="right-side">
            <div class="right-container">
                <div class="news-images">
                    <img src="assets/News1.png">
                </div>
                <div class="news-images">
                    <img src="assets/News2.png">
                </div>
                <div class="news-images">
                    <img src="assets/News3.png">
                </div>
            </div>
        </section>
    </section>
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
