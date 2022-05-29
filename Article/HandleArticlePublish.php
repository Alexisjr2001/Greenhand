<?php
function exitPHP($GETParams){
    $urlQuery=http_build_query($GETParams);
    header("Location: ..\Article\publish_article.php?$urlQuery");
    exit();
}
if(isset($_POST['submit'])){
    $urlQuery=array();
    $title=$_POST['title'];
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

    include_once "../includes/HandleFiles.php";
    $uploadedFiles=array();
    $folder="ArticleMultimedia/";
    Handle($folder,$uploadedFiles);

    $json=json_encode(array('title'=>$title,'categories'=>$categories,'description'=>$description,'detailed'=>$detailed,'uploadedFiles'=>$uploadedFiles));
    $jsonFileName=uniqid('',true).".json";
    if(!file_put_contents("ArticleJSON/$jsonFileName",$json)){
        $urlQuery["json"]="err";
    }

    if (count($urlQuery)>0){
        exitPHP($urlQuery);
    }

    include_once "../includes/DBConn.inc.php";

    $stmt=mysqli_stmt_init($conn);

    $insertJSON='INSERT INTO articles (articlesJSON) values(?)';
    if(!mysqli_stmt_prepare($stmt,$insertJSON)){
        $urlQuery['server']="prepare-error";
        exitPHP($urlQuery);
    }
    mysqli_stmt_bind_param($stmt,"s",$jsonFileName);
    if(!mysqli_stmt_execute($stmt)){
        $urlQuery['server']="insert-error";
        exitPHP($urlQuery);
    }
    header("Location: publish_article.php?creation=success");
}