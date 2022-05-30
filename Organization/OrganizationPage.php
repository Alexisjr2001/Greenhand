<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organization Page</title>
    <link rel="stylesheet" href="OrganizationPage.css">
    <link rel="stylesheet" href="../miscellaneous.css">
</head>
<body>
<?php
include_once '../includes/Header.inc.php';
include_once '../includes/DBConn.inc.php';
if(!isset($_GET['orgID'])){
    header("Location: ../Index/index.php");
    exit();
}
$stmt=mysqli_stmt_init($conn);
$sql='SELECT * FROM users WHERE usersID=?';
if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../Index/index.php?statement=err");
    exit();
}
$id=$_GET['orgID'];
mysqli_stmt_bind_param($stmt,"s",$id);
mysqli_stmt_execute($stmt);
$results=mysqli_stmt_get_result($stmt);
if(mysqli_num_rows($results)==0){
    header("Location: ../Index/index.php?orgID=not-found");
    exit();
}
$row=mysqli_fetch_assoc($results);
?>
<?php
echo '<h1>'.$row['usersName'].'</h1>';
?>
<section id="container">
    <div id="content-container">
        <span>Organization's Country:</span>
        <?php
        echo '<span>'.$row['usersCountry'].'</span>';
        ?>
    </div>
    <div id="content-container">
        <span>Organization's City/Town:</span>
        <?php
        echo '<span>'.$row['usersCity'].'</span>';
        ?>
    </div>
    <div id="content-container">
        <span>Organization's Phone Number:</span>
        <?php
        echo '<span>'.$row['usersPhone'].'</span>';
        ?>
    </div>
    <div id="image-container">
        <?php
        echo '<img src="'.$row['usersImage'].'" alt="Organization'."&lsquos".' Image">';
        ?>
    </div>
</section>
<?php
include_once '../includes/Footer.inc.php';
?>
</body>
</html>