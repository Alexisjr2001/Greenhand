<?php
include_once "../includes/CreateDatabase.php";
include_once "../includes/PopulateDatabase.inc.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../miscellaneous.css">
    <title>Greenhand</title>
    <script type="text/javascript" src="index.js"></script>
</head>
<body>
<?php
include_once '../includes/Header.inc.php';
?>
<div id="main-page-container">
    <section class="section-card" id="join-us">
        <div id="join-us-container">
            <h1>Join Greenhand Today!</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium et cum vero, iste dolore quisquam, in
                velit voluptate exercitationem repellat repudiandae. Soluta fugiat, hic aperiam quo quaerat ut aliquam,
                sapiente possimus sunt veniam rem, laboriosam quis. Quasi quibusdam repellat provident itaque, sit
                quidem, corrupti nobis enim voluptatem similique, sequi voluptate.</p>
            <div id="join-button-container">
                <a href="../SignUp/SignUp.html" class="button">For Volunteers</a>
                <a href="../SignUp/SignUp.html?switch=on" class="button">For Organizations</a>
            </div>
        </div>
        <img src="../Assets/placeholder-image.png" alt="">
    </section>
    <section class="section-card" id="our-activities">
        <h1>Our Activities</h1>
        <p>Here are some activities you might be interested in:</p>
        <div id="activity-card-container">
            <?php
            include_once "../includes/DBConn.inc.php";

            $stmt=mysqli_stmt_init($conn);
            $sql="SELECT * FROM activities";
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../Index/index.php?activityID=error");
                exit();
            }
            mysqli_stmt_execute($stmt);
            $results=mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($results)>0){
                $counter=0;
                while($row = mysqli_fetch_assoc($results)){
                    $path=$row['activitiesJSON'];
                    $json=file_get_contents('../Activity/ActivityJSON/'.$path);
                    $array=json_decode($json,true);
                    $img="";
                    if(count($array['uploadedFiles'])>0){
                        $img='../Activity/'.array_values($array['uploadedFiles'])[0];
                    }
                    echo '<a class="activity-card" href="../Activity/ActivityView.php?activityID='.$row['activitiesID'].'">
                <h1>'.$array['title'].'</h1>
                <img src="'.$img.'" alt="">
                <p>'.$array['description'].'</p>
            </a>';
                    $counter=$counter+1;
                    if ($counter==3){
                        break;
                    }
                }
            }
            ?>
        </div>
        <a href="../Activity/PublishActivity.php" class="publish-something">Publish an activity!</a>
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
                <img src="../Assets/placeholder-image.png" alt="">
                <p>Location 1</p>
            </a>
            <a href="" class="detailed-activities-link activity-card">
                <img src="../Assets/placeholder-image.png" alt="">
                <p>Location 2</p>
            </a>
            <a href="" class="detailed-activities-link activity-card">
                <img src="../Assets/placeholder-image.png" alt="">
                <p>Location 3</p>
            </a>
        </div>
        <div id="detailed-activities-type-container">
            <a href="" class="detailed-activities-link activity-card invisible">
                <img src="../Assets/placeholder-image.png" alt="">
                <p>Type 1</p>
            </a>
            <a href="" class="detailed-activities-link activity-card invisible">
                <img src="../Assets/placeholder-image.png" alt="">
                <p>Type 2</p>
            </a>
            <a href="" class="detailed-activities-link activity-card invisible">
                <img src="../Assets/placeholder-image.png" alt="">
                <p>Type 3</p>
            </a>
        </div>
    </section>
    <section class="section-card" id="our-articles">
        <h1>Our Articles</h1>
        <p>Here are some interesting articles that you will find interesting:</p>
        <div id="article-card-container">
            <?php
            include_once "../includes/DBConn.inc.php";

            $stmt=mysqli_stmt_init($conn);
            $sql="SELECT * FROM articles";
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../Index/index.php?articleID=error");
                exit();
            }
            mysqli_stmt_execute($stmt);
            $results=mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($results)>0){
                $counter=0;
                while($row = mysqli_fetch_assoc($results)){
                    $path=$row['articlesJSON'];
                    $json=file_get_contents('../Article/ArticleJSON/'.$path);
                    $array=json_decode($json,true);
                    $img="";
                    if(count($array['uploadedFiles'])>0){
                        $img='../Article/'.array_values($array['uploadedFiles'])[0];
                    }
                    echo '<a class="activity-card" href="../Article/Article.php?articleID='.$row['articlesID'].'">
                <h1>'.$array['title'].'</h1>
                <img src="'.$img.'" alt="">
                <p>'.$array['description'].'</p>
            </a>';
                    $counter=$counter+1;
                    if ($counter==3){
                        break;
                    }
                }
            }
            ?>
        </div>
        <a href="../Article/PublishArticle.php" class="publish-something">Publish an article!</a>
    </section>
</div>

<?php
include_once '../includes/Footer.inc.php';
?>
</body>
</html>