<?php
if(!is_dir("../Activity/ActivityJSON")){
    mkdir("../Activity/ActivityJSON");
}
if(!is_dir("../Activity/ActivityMultimedia")){
    mkdir("../Activity/ActivityMultimedia");
}
if(!is_dir("../Article/ArticleJSON")){
    mkdir("../Article/ArticleJSON");
}
if(!is_dir("../Article/ArticleMultimedia")){
    mkdir("../Article/ArticleMultimedia");
}
if(!is_dir("../ProfilePictures")){
    mkdir("../ProfilePictures");
}
try{
    $conn = mysqli_connect("localhost","root","");
}
catch(Exception $e){
    die ("ERROR: Could not make connection to server: " . mysqli_connect_error());
}

if($conn===false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql="CREATE DATABASE IF NOT EXISTS greenhand";
if($stmt=mysqli_prepare($conn,$sql)){
    mysqli_stmt_execute($stmt);
}else{
    die ("ERROR: Could not prepare query for database creation: $sql. " . mysqli_error($conn));
}

$dbName=mysqli_select_db($conn,"greenhand");
$sql="CREATE TABLE IF NOT EXISTS users(
    usersID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    usersEmail varchar(128) NOT NULL,
    usersPwd varchar(128) NOT NULL,
    usersName varchar(128) NOT NULL,
    usersPhone bigint(20) NOT NULL,
    usersCountry varchar(128) NOT NULL,
    usersCity varchar(128) NOT NULL,
    usersImage varchar(128) NOT NULL,
    usersAge tinyint(4),
    usersGender varchar(128)
);";
if($stmt=mysqli_prepare($conn,$sql)){
    mysqli_stmt_execute($stmt);
}else{
    die("ERROR: Could not prepare query for users TABLE creation: $sql. " . mysqli_error($conn));
}
$sql="CREATE TABLE IF NOT EXISTS activities(
    activitiesID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    activitiesJSON varchar(128) NOT NULL,
    activitiesUserID int(11) NOT NULL
);";
if($stmt=mysqli_prepare($conn,$sql)){
    mysqli_stmt_execute($stmt);
}else{
    die("ERROR: Could not prepare query for activities TABLE creation: $sql. " . mysqli_error($conn));
}
$sql="CREATE TABLE IF NOT EXISTS articles(
    articlesID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    articlesJSON varchar(128) NOT NULL,
    articlesUserID int(11) NOT NULL
);";
if($stmt=mysqli_prepare($conn,$sql)){
    mysqli_stmt_execute($stmt);
}else{
    die("ERROR: Could not prepare query for articles TABLE creation: $sql. " . mysqli_error($conn));
}
mysqli_stmt_close($stmt);
mysqli_close($conn);