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
    <title>Activity Page</title>
    <link rel="stylesheet" href="ActivityView.css">
    <link rel="stylesheet" href="../miscellaneous.css">
    <script src="../Index/index.js"></script>
</head>
<body>
<?php
include_once '../includes/Header.inc.php';
?>
<main>
    <?php
    if (isset($_GET['activityID'])) {
        include_once "../includes/DBConn.inc.php";

        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM activities WHERE activitiesID=?";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Index/index.php?activityID=error");
            exit();
        }
        $id = $_GET['activityID'] + 0;
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($results) == 0) {
            header("Location: ../Index/index.php?activityID=not-found");
            exit();
        } else {
            $path = mysqli_fetch_assoc($results)['activitiesJSON'];
        }
    } else {
        header("Location: ../Index/index.php?activityID=not-found");
        exit();
    }
    $json = file_get_contents('ActivityJSON/' . $path);
    $array = json_decode($json, true);
    ?>
    <?php
    echo '<h1>' . $array['title'] . '</h1>';
    ?>
    <?php
    include_once "../includes/DBConn.inc.php";

    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT usersName FROM users WHERE usersID=?";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../Index/index.php?orgName=error");
        exit();
    }
    $id = $array['creatorID'] + 0;
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($results) == 0) {
        header("Location: ../Index/index.php?creator=not-found");
        exit();
    } else {
        $name = mysqli_fetch_assoc($results)['usersName'];
    }
    echo '<h2>By <a href="../Organization/OrganizationPage.php?orgID='.$id.'">' . $name . '</a></h2>';
    ?>
    <section id="container">
        <div id="content_container">
            <section id="text_container">
                <?php
                echo '<p id="brief_desc">' . $array['description'] . '</p>';
                ?>
            </section>
            <section class="section-container">
                <h3>Activity's Highlights:</h3>
                <?php
                echo '<p class="paragraph">' . $array['highlights'] . '</p>';
                ?>
            </section>
            <section class="section-container">
                <h3>Have a look at your typical day there:</h3>
                <div class="sample_text_container">
                    <?php
                    echo '<p class="paragraph">' . $array['typicalDay'] . '</p>';
                    ?>
                </div>
            </section>
            <section class="section-container">
                <h3>There are some suggestions to enjoy your free time:</h3>
                <div class="sample_text_container">
                    <?php
                    echo '<p class="paragraph">' . $array['freeDay'] . '</p>';
                    ?>
                </div>
            </section>
            <section class="section-container" id="activity-date">
                <h3>This activity will take place between
                    <?php
                    echo '<time datetime="dd-mm-yyyy">' . $array['beginDate'] . '</time>';
                    ?>

                    and
                    <?php
                    echo '<time datetime="dd-mm-yyyy">' . $array['endDate'] . '</time>';
                    ?>
                    .
                </h3>
                <?php
                echo '<h3 id="min_days_header">You have to be there at least <b>' . $array['minDays'] . '</b> days.</h3>';
                ?>
            </section>
            <section class="section-container">
                <h3 id="requirements">In order to join, you have to meet the following requirements:</h3>
                <div class="sample_text_container">
                    <?php
                    echo '<p class="paragraph">' . $array['requirements'] . '</p>';
                    ?>
                </div>
            </section>
            <section class="section-container">
                <h3 id="maximize_exp">You could maximize your experience following some of the following:</h3>
                <div class="sample_text_container">
                    <?php
                    echo '<p class="paragraph">' . $array['recommendedFor'] . '</p>';
                    ?>
                </div>
            </section>
            <section id="multimedia_container">
                <?php
                if (count($array['uploadedFiles']) > 0) {
                    foreach ($array['uploadedFiles'] as $key => $value) {
                        echo '<img src="' . $value . '" alt="multimedia content" id="multimedia">';
                    }
                }
                ?>
            </section>
            <section class="participate-container">
                <?php
                echo '<a href="../Organization/OrganizationPage.php?orgID='.$id.'">';
                ?>
                    <button id="participate">Participate!</button>
                </a>
            </section>
        </div>
    </section>
</main>
<?php
include_once '../includes/Footer.inc.php';
?>
</body>
</html>