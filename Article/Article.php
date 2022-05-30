<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
    <link rel="stylesheet" href="/Article/Article.css">
    <link rel="stylesheet" href="../miscellaneous.css">
    <script src="../Index/index.js"></script>
</head>
<body>
<?php
include_once '../includes/Header.inc.php';
?>
<main>
    <?php
    if(isset($_GET['articleID'])){
        include_once "../includes/DBConn.inc.php";

        $stmt=mysqli_stmt_init($conn);
        $sql="SELECT * FROM articles WHERE articlesID=?";
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../Index/index.php?articleID=error");
            exit();
        }
        $id=$_GET['articleID']+0;
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $results=mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($results)==0){
            header("Location: ../Index/index.php?articleID=not-found");
            exit();
        }
        else{
            $path=mysqli_fetch_assoc($results)['articlesJSON'];
        }
    }
    else{
        header("Location: ../Index/index.php?articleID=not-found");
        exit();
    }
    $json=file_get_contents('ArticleJSON/'.$path);
    $array=json_decode($json,true);
    ?>
    <?php
    echo '<h1>'.$array['title'].'</h1>';
    ?>
    <?php
    include_once "../includes/DBConn.inc.php";

    $stmt=mysqli_stmt_init($conn);
    $sql="SELECT usersName FROM users WHERE usersID=?";
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../Index/index.php?writerName=error");
        exit();
    }
    $id=$array['writerID']+0;
    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
    $results=mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($results)==0){
        header("Location: ../Index/index.php?creator=not-found");
        exit();
    }
    else{
        $name = mysqli_fetch_assoc($results)['usersName'];
    }
    echo '<h3>'.$name.'</h3>';
    ?>
    <?php
    echo '<h3>Category:';
    if(count($array['categories'])>0){
        foreach($array['categories'] as $key=>$value){
            echo "$value ";
        }
    }
    echo '</h3>';
    echo '<h3>Date: '.$array['date'].'</h3>';
    ?>
    <section class="container">
        <div class="content_container">
            <p>
                <?php
                echo $array['detailed'];
                ?>
            </p>
        </div>
    </section>
</main>
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<body>

<div class="main-carousel">
    <div class="ell"><img src="../Assets/light_blue.jpg"></div>
    <div class="ell"><img src="../Assets/meta.jpg"></div>
    <div class="ell"><img src="../Assets/dark_blue.jpg"></div>
    <div class="ell"><img src="../Assets/black.jpg"></div>
    <div class="ell"><img src="../Assets/pinterest.jpg"></div>
</div>


<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script type="text/javascript">
    $('.main-carousel').flickity({
        cellAlign: 'left',
        wrapAround: true,
        freeScroll: true
    });
</script>
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
</body>
</body>
</html>