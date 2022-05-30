<?php
session_start();

function exitPHP($GETParams){
    $urlQuery=http_build_query($GETParams);
    header("Location: ..\Article\PublishArticle.php?$urlQuery");
    exit();
}
if(isset($_POST['submit'])){
    $urlQuery=array();
    $title=$_POST['title'];
    if(isset($_SESSION['id'])){
        $writerID=$_SESSION['id'];
    }
    else{
        $urlQuery['writerID']='not-found';
    }
    $allCategories=$_POST['allCategories'];
    $categories=array();
    if(isset($_POST['categories'])){
        $categories=$_POST['categories'];
    }
    $description=$_POST['description'];
    $detailed=$_POST['detailed'];
    $allMultimedia=$_FILES['multimedia'];

    if($title==""){
        $urlQuery["title"]="empty";
    }
    if($description==""){
        $urlQuery["description"]="empty";
    }
    if($detailed==""){
        $urlQuery["detailed"]="empty";
    }

    include_once "../includes/FileHandler.inc.php";
    $uploadedFiles=array();
    $folder="ArticleMultimedia/";
    Handle($folder,$uploadedFiles,$urlQuery);
    $date=date("Y/m/d");

    $json=json_encode(array('title'=>$title,'writerID'=>$writerID,'categories'=>$categories,'description'=>$description,'detailed'=>$detailed,'date'=>$date,'uploadedFiles'=>$uploadedFiles));
    $jsonFileName=uniqid('',true).".json";
    if(!file_put_contents("ArticleJSON/$jsonFileName",$json)){
        $urlQuery["json"]="err";
    }

    if (count($urlQuery)>0){
        exitPHP($urlQuery);
    }

    include_once "../includes/DBConn.inc.php";

    $stmt=mysqli_stmt_init($conn);

    $insertJSON='INSERT INTO articles (articlesJSON,articlesUserID) values(?,?)';
    include_once "../includes/SaveJSON.php";
    statement_handler($stmt,$insertJSON,$jsonFileName,$urlQuery);

    header("Location: PublishArticle.php?creation=success");
}