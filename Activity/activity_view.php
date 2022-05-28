<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity Page</title>
    <link rel="stylesheet" href="activity_view.css">
    <link rel="stylesheet" href="../miscellaneous.css">
    <script src="../index.js"></script>
</head>
<body>
<?php
include_once '../includes/Header.php';
?>
<main>
    <h1>Activity Name</h1>
    <h2>By <a href="../index.php">Organization Page</a></h2>
    <section id="container">
        <div id="content_container">
            <section id="text_container">
                <p id="brief_desc">Brief Description</p>
            </section>
            <section id="highlight_list">
                <h3>Activity's Highlights:</h3>

                <ul>
                    <li>Highlight1</li>
                    <li>Highlight2</li>
                    <li>Highlight3</li>
                    <li>Highlight4</li>
                </ul>
            </section>
            <section>
                <h3>Have a look at your typical day there:</h3>
                <div class="sample_text_container"></div>
            </section>
            <section>
                <h3>There are some suggestions to enjoy your free time:</h3>
                <div class="sample_text_container"></div>
            </section>
            <section>
                <h3>This activity will take place between
                    <time datetime="dd-mm-yyyy">DD/MM/YYYY</time>
                    and
                    <time datetime="dd-mm-yyyy">DD/MM/YYYY</time>
                    .
                </h3>
                <h3 id="min_days_header">You have to be there at least <b>DD</b> days.</h3>
            </section>
            <section>
                <h3 id="requirements">In order to join, you have to meet the following requirements:</h3>
                <div class="sample_text_container"></div>
            </section>
            <section>
                <h3 id="maximize_exp">You could maximize your experience following some of the following:</h3>
                <div class="sample_text_container"></div>
            </section>
            <section id="multimedia_container">
                <a href="">&lsaquo;</a>
                <img src="../Assets/placeholder-image.png" alt="multimedia content" id="multimedia">
                <a href="">&rsaquo;</a>
            </section>
            <a href="">
                <button id="participate">Participate!</button>
            </a>
            <section>
                <h3>You might also like these:</h3>
                <section id="similar_activity_container">
                    <a href="">&lsaquo;</a>
                    <img src="../Assets/placeholder-image.png" alt="multimedia content" id="similar_activity">
                    <a href="">&rsaquo;</a>
                </section>
            </section>
        </div>
    </section>
    <footer id="contact-us">
        <div id="footer-title-container">
            <h1><b>Contact Us!</b></h1>
        </div>
        <div id="footer-details-container">
            <div id="contact-info">
                <p>Telephone: +30 123123123</p>
                <p>Email: contact-us@greenhand.com</p>
                <p>Street Address: Fictional Street 15</p>
            </div>
            <div id="follow-us">
                <div id="follow-us-title"><b>Follow Us!</b></div>
                <div id="follow-us-links">
                    <a href=""><img src="../Assets/facebook-logo.png" alt=""></a>
                    <a href=""><img src="../Assets/twitter-logo.png" alt=""></a>
                    <a href=""><img src="../Assets/youtube-logo.png" alt=""></a>
                </div>
            </div>
        </div>
    </footer>
</main>

</body>
</html>