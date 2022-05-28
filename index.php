<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="miscellaneous.css">
    <title>Greenhand</title>
    <script type="text/javascript" src="index.js"></script>
</head>
<body>
<header>
    <div><a href=""><img src="Assets/logo-placeholder.png" alt="" class="GH_logo"></a></div>
    <nav id="header-links">
        <a href="#our-activities">Our Activities</a>
        <a href="#our-articles">Our Articles</a>
        <a href="About_Us/about_us.php">About Us</a>
        <a href="#contact-us">Contact Us</a>
    </nav>
    <div id="mobile-dropdown">
        <div id="img-container" onclick="toggleDropdownMenu()">
            <img src="Assets/dropdown-menu.png" alt="">
            <div id="mobile-dropdown-menu" class="section-card">
                <a href="#our-activities">Our Activities</a>
                <a href="#our-articles">Our Articles</a>
                <a href="About_Us/about_us.php">About Us</a>
                <a href="#contact-us">Contact Us</a>
            </div>
        </div>
    </div>
    <div id="header-sign-up">
        <a href="SignUp/SignUp.html">Sign Up</a>
        <?php
        if(isset($_SESSION['id'])){
            echo '<a href="LogIn/logout.php">Log Out</a>';
        }
        else{
            echo '<a href="LogIn/login.php">Log In</a>';
        }
        ?>
    </div>
</header>
    <div id="main-page-container">
        <section class="section-card" id="join-us">
            <div id="join-us-container">
                <h1>Join Greenhand Today!</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium et cum vero, iste dolore quisquam, in velit voluptate exercitationem repellat repudiandae. Soluta fugiat, hic aperiam quo quaerat ut aliquam, sapiente possimus sunt veniam rem, laboriosam quis. Quasi quibusdam repellat provident itaque, sit quidem, corrupti nobis enim voluptatem similique, sequi voluptate.</p>                <div id="join-button-container">
                    <a href="SignUp/SignUp.html" class="button">For Volunteers</a>
                    <a href="SignUp/SignUp.html?switch=on" class="button">For Organizations</a>
                </div>
            </div>
            <img src="Assets/placeholder-image.png" alt="">
        </section>
        <section class="section-card" id="our-activities">
            <h1>Our Activities</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias sed ipsum et praesentium autem repellat.</p>
            <div id="activity-card-container">
                <a class="activity-card" href="Activity/activity_view.php">
                    <h1>Example Activity</h1>
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, assumenda.</p>
                </a>
                <a class="activity-card" href="Activity/activity_view.php">
                    <h1>Activity 2</h1>
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, illum!</p>
                </a>
                <a class="activity-card" href="Activity/activity_view.php">
                    <h1>Activity 3</h1>
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, nihil.</p>
                </a>
            </div>
            <a href="Activity/publish_activity.php" class="publish-something">Publish an activity!</a>
        </section>
        <section class="section-card" id="our-activities-detailed">
            <div id="detailed-activities-title-container">
                <h1 id="detailed-activities-title">Locations</h1>
                <div id="detailed-activities-switch-container">
                    <label class="switch">
                        <input type="checkbox" onclick="switchDetailedActivities()" id="detailed-activities-switch">
                        <span class="slider round" id="detailed-activities-switch-slider"></span>
                      </label>
                </div>
            </div>
            <div id="detailed-activities-locations-container">
                <a href="" class="detailed-activities-link activity-card">
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Location 1</p>
                </a>
                <a href="" class="detailed-activities-link activity-card">
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Location 2</p>
                </a>
                <a href="" class="detailed-activities-link activity-card">
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Location 3</p>
                </a>
            </div>
            <div id="detailed-activities-type-container">
                <a href="" class="detailed-activities-link activity-card invisible">
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Type 1</p>
                </a>
                <a href="" class="detailed-activities-link activity-card invisible">
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Type 2</p>
                </a>
                <a href="" class="detailed-activities-link activity-card invisible">
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Type 3</p>
                </a>
            </div>
        </section>
        <section class="section-card" id="our-articles">
            <h1>Our Articles</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias sed ipsum et praesentium autem repellat.</p>
            <div id="article-card-container">
                <a class="activity-card" href="Article/article.php">
                    <h1>Example Article</h1>
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, assumenda.</p>
                </a>
                <a class="activity-card" href="Article/article.php">
                    <h1>Article 2</h1>
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, illum!</p>
                </a>
                <a class="activity-card" href="Article/article.php">
                    <h1>Article 3</h1>
                    <img src="Assets/placeholder-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, nihil.</p>
                </a>
            </div>
            <a href="Article/publish_article.php" class="publish-something">Publish an article!</a>
        </section>
    </div>
    <footer id="contact-us">
        <div id="footer-title-container">
            <h1><b>Contact Us!</b></h1>
        </div>
        <div id="footer-details-container">
            <div id="contact-info">
                <p>Telephone: +30 123123123</p>
                <p>Email: contact-us@greenhand.com</p>
                <p>Street Adress: Fictinal Street 15</p>
            </div>
            <div id="follow-us">
                <div id="follow-us-title"><b>Follow Us!</b></div>
                <div id="follow-us-links">
                    <a href=""><img src="Assets/facebook-logo.png" alt=""></a>
                    <a href=""><img src="Assets/twitter-logo.png" alt=""></a>
                    <a href=""><img src="Assets/youtube-logo.png" alt=""></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>