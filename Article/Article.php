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
    if (isset($_GET['articleID'])) {
        include_once "../includes/DBConn.inc.php";

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM articles WHERE articlesID=?";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Index/index.php?articleID=error");
            exit();
        }
        $id = $_GET['articleID'] + 0;
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($results) == 0) {
            header("Location: ../Index/index.php?articleID=not-found");
            exit();
        } else {
            $path = mysqli_fetch_assoc($results)['articlesJSON'];
        }
    } else {
        header("Location: ../Index/index.php?articleID=not-found");
        exit();
    }
    $json = file_get_contents('ArticleJSON/' . $path);
    $array = json_decode($json, true);
    ?>
    <?php
    echo '<h1>' . $array['title'] . '</h1>';
    ?>
    <section class="container">
        <div id="article-category-container">
            <?php
            echo '<div>Categories: ';
            if (count($array['categories']) > 0) {
                foreach ($array['categories'] as $key => $value) {
                    echo "$value ";
                }
            }
            echo '</div>';
            ?>
        </div>
        <div id="infos">
            <?php
            include_once "../includes/DBConn.inc.php";

            $stmt = mysqli_stmt_init($conn);
            $sql = "SELECT usersName FROM users WHERE usersID=?";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../Index/index.php?writerName=error");
                exit();
            }
            $id = $array['writerID'] + 0;
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($results) == 0) {
                header("Location: ../Index/index.php?creator=not-found");
                exit();
            } else {
                $name = mysqli_fetch_assoc($results)['usersName'];
            }
            echo '<div>Author:' . $name . '</div>';
            echo '<div>Date: ' . $array['date'] . '</div>';
            ?>
        </div>

        <div id="article-content">
            <p><?php
                echo $array['detailed'];
                ?>
            </p>

            <div id="multimedia_container">
                <?php
                if (count($array['uploadedFiles']) > 0) {
                    foreach ($array['uploadedFiles'] as $key => $value) {
                        echo '<img src="' . $value . '" alt="multimedia content" id="multimedia">';
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>
<?php
include_once '../includes/Footer.inc.php';
?>
</body>
</html>