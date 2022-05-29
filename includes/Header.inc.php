<header>
    <div><a href="../Index/index.php"><img src="../Assets/logo-placeholder.png" alt="" class="GH_logo"></a></div>
    <nav id="header-links">
        <a href="../Index/index.php#our-activities">Our Activities</a>
        <a href="../Index/index.php#our-articles">Our Articles</a>
        <a href="../About_Us/AboutUs.php">About Us</a>
        <a href="../Index/index.php#contact-us">Contact Us</a>
    </nav>
    <div id="mobile-dropdown">
        <div id="img-container" onclick="toggleDropdownMenu()">
            <img src="../Assets/dropdown-menu.png" alt="">
            <div id="mobile-dropdown-menu" class="section-card">
                <a href="../Index/index.php/#our-activities">Our Activities</a>
                <a href="../Index/index.php/#our-articles">Our Articles</a>
                <a href="../About_Us/AboutUs.php">About Us</a>
                <a href="../Index/index.php/#contact-us">Contact Us</a>
            </div>
        </div>
    </div>
    <div id="header-sign-up">
        <?php
        if (isset($_SESSION['id'])) {
            include_once "../includes/DBConn.inc.php";

            $stmt=mysqli_stmt_init($conn);
            $sql='SELECT usersImage FROM users WHERE usersID=?;';
            if(!mysqli_stmt_prepare($stmt,$sql)){
                $urlQuery["server"]="error";
                exitPHP($urlQuery);
            }
            $id=$_SESSION['id']+0;
            mysqli_stmt_bind_param($stmt,"i",$id);
            mysqli_stmt_execute($stmt);
            $results=mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($results)==0){
                $path="../Assets/empty-user.png";
            }
            else{
                $path=mysqli_fetch_assoc($results)['usersImage'];
            }
            echo '<div class="dropdown">
                      <button class="dropbtn">Profile</button>
                      <div class="dropdown-content">
                        <img src="'.$path.'" alt="user image" id="prof-image">
                        <a href="../Article/PublishArticle.php">Publish Article</a>
                        <a href="../Activity/PublishActivity.php">Publish Activity</a>
                        <a href="">Edit Profile</a>
                      </div>
                    </div>';
        } else {
            echo '<a href="../SignUp/SignUp.html">Sign Up</a>';
        }

        ?>
        <?php
        if (isset($_SESSION['id'])) {
            echo '<a href="../LogIn/logout.php">Log Out</a>';
        } else {
            echo '<a href="../LogIn/login.php">Log In</a>';
        }
        ?>
    </div>
</header>