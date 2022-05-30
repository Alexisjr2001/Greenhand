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
    <h1>Article Title</h1>
    <section class="container">
        <div id="article-category">
            <div>Article's Category</div>
        </div>
        <div id="infos">
            <div>Author name: Lorem, ipsum.</div>
            <div>Organization Name: Lorem</div>
            <div>Date: dd/mm/yyyy</div>
        </div>

        <div id="article-content">
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus aliquid autem, blanditiis ex explicabo fugit modi natus, nemo, nisi non omnis qui quo rerum suscipit totam veniam. A, delectus?</span><span>Explicabo hic inventore minus nisi nobis obcaecati porro provident quo similique, unde. A aperiam blanditiis delectus dicta eveniet excepturi, harum illo ipsam molestiae officiis possimus sunt tempore? Ab dolorum, sit!</span><span>Ab ad culpa in ipsa ipsam iusto magnam magni minus molestias nostrum, repudiandae veniam voluptate. Dolor earum fugit ipsam odio. Asperiores at est laboriosam nemo nesciunt quod suscipit unde vero.</span>
            </p>
            <img src="/Assets/placeholder-image.png" alt="article image">
        </div>

        <div id="similar_activity_container">
            <p id="also-like">You might also like this:</p>
            <a class="activity-card" href="">
                <h3>Similar Article</h3>
                <img src="../Assets/placeholder-image.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, nihil.</p>
            </a>
        </div>
    </section>
</main>
<?php
include_once '../includes/Footer.inc.php';
?>
</body>
</html>


<!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <body> -->

<!-- <div class="main-carousel"> -->
<!--     <div class="ell"><img src="../Assets/light_blue.jpg"></div> -->
<!--     <div class="ell"><img src="../Assets/meta.jpg"></div> -->
<!--     <div class="ell"><img src="../Assets/dark_blue.jpg"></div> -->
<!--     <div class="ell"><img src="../Assets/black.jpg"></div> -->
<!--     <div class="ell"><img src="../Assets/pinterest.jpg"></div> -->
<!-- </div> -->


<!-- <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script> -->
<!-- <script type="text/javascript"> -->
<!--     $('.main-carousel').flickity({ -->
<!--         cellAlign: 'left', -->
<!--         wrapAround: true, -->
<!--         freeScroll: true -->
<!--     }); -->
<!-- </script> -->