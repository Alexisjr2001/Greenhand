<?php
function exitPHP($GETParams){
    $urlQuery=http_build_query($GETParams);
    header("Location: ..\Activity\publish_activity.php?$urlQuery");
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
    $highlights=$_POST['highlights'];
    $typicalDay=$_POST['typical_day'];
    $freeDay=$_POST['free_day'];
    $volunteers=$_POST['num_of_volunteers'];
    $beginDate=$_POST['begin_date'];
    $endDate=$_POST['end_date'];
    $minDays=$_POST['min_days'];
    $requirements=$_POST['requirements'];
    $recommendedFor=$_POST['recommended_for'];
    $allMultimedia=$_FILES['multimedia'];

    if($title==""){
        $urlQuery["title"]="empty";
    }
    if($description==""){
        $urlQuery["description"]="empty";
    }
    if($highlights==""){
        $urlQuery["highlights"]="empty";
    }
    if($typicalDay==""){
        $urlQuery["typical_day"]="empty";
    }
    if($freeDay==""){
        $urlQuery["free_day"]="empty";
    }
    if(is_numeric($_POST["num_of_volunteers"])){
        $volunteers=$_POST["num_of_volunteers"] + 0;
        if(is_int($volunteers)){
            if($volunteers<=0){
                $urlQuery["volunteers"]="wrong-val";
            }
        }
        else{
            $urlQuery["volunteers"]="not-int";
        }
    }
    else{
        $urlQuery["volunteers"]="NaN";
    }
    if (false === strtotime($beginDate)){
        $urlQuery['beginDate']="not-a-date";
    }
    else{
        list($yearBegin, $monthBegin, $dayBegin) = explode('-', $beginDate);
        if(!checkdate($monthBegin, $dayBegin, $yearBegin)){
            $urlQuery['beginDate']="invalid";
        }
    }
    if (false === strtotime($endDate)){
        $urlQuery['endDate']="not-a-date";
    }
    else{
        list($yearEnd, $monthEnd, $dayEnd) = explode('-', $beginDate);
        if(!checkdate($monthEnd, $dayEnd, $yearEnd)){
            $urlQuery['endDate']="invalid";
        }
    }
    if(is_numeric($_POST["min_days"])){
        $minDays=$_POST["min_days"] + 0;
        if(is_int($minDays)){
            if($minDays<=0){
                $urlQuery["minDays"]="wrong-val";
            }
        }
        else{
            $urlQuery["minDays"]="not-int";
        }
    }
    if($requirements==""){
        $urlQuery["requirements"]="empty";
    }
    if($recommendedFor==""){
        $urlQuery["recommendedFor"]="empty";
    }

    include_once "../includes/HandleFiles.php";
    $uploadedFiles=array();
    $folder="ActivityMultimedia/";
    Handle($folder,$uploadedFiles);

    $json=json_encode(array('title'=>$title,'categories'=>$categories,'description'=>$description,'highlights'=>$highlights,'typicalDay'=>$typicalDay,'freeDay'=>$freeDay,'volunteers'=>$volunteers,'beginDate'=>$beginDate,'endDate'=>$endDate,'minDays'=>$minDays,'requirements'=>$requirements,'recommendedFor'=>$recommendedFor,'uploadedFiles'=>$uploadedFiles));
    $jsonFileName=uniqid('',true).".json";
    if(!file_put_contents("ActivityJSON/$jsonFileName",$json)){
        $urlQuery["json"]="err";
    }

    if (count($urlQuery)>0){
        exitPHP($urlQuery);
    }

    include_once "../includes/DBConn.inc.php";

    $stmt=mysqli_stmt_init($conn);

    $insertJSON='INSERT INTO activities (activitiesJSON) values(?)';
    if(!mysqli_stmt_prepare($stmt,$insertJSON)){
        $urlQuery['server']="prepare-error";
        exitPHP($urlQuery);
    }
    mysqli_stmt_bind_param($stmt,"s",$jsonFileName);
    if(!mysqli_stmt_execute($stmt)){
        $urlQuery['server']="insert-error";
        exitPHP($urlQuery);
    }
    header("Location: publish_activity.php?creation=success");
}
