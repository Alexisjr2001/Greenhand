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
    $recommenderFor=$_POST['recommended_for'];
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
    if($recommenderFor==""){
        $urlQuery["recommendedFor"]="empty";
    }

    if (count($urlQuery)>0){
        exitPHP($urlQuery);
    }
    $uploadedFiles=array();

    if(count($_FILES['multimedia']['name'])>0){
        $num=count($_FILES['multimedia']['name']);
        for($i=0; $i < $num; $i++){
            $fileName=$_FILES['multimedia']['name']["$i"];
            $fileTmpName=$_FILES['multimedia']['tmp_name']["$i"];
            $fileSize=$_FILES['multimedia']['size']["$i"];
            $fileError=$_FILES['multimedia']['error']["$i"];

            $fileExt=explode(".",$fileName);
            $fileActualExt=strtolower(end($fileExt));

            $allowed=array("png","jpeg","jpg","mp4");

            if (in_array($fileActualExt,$allowed)){
                if($fileError===0){
                    if($fileSize<25000000){
                        $fileNameNew=uniqid('',true).".".$fileActualExt;
                        $uploadedFiles["$fileName"]='ActivityMultimedia/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$uploadedFiles["$fileName"]);
                    }
                    else{
                        $urlQuery['multimedia']="too-big";
                    }
                }
                else{
                    $urlQuery['multimedia']="err";
                }
            }
            else{
                $urlQuery['multimedia']="inv-ext";
            }
        }
    }

    include_once "../includes/DBConn.inc.php";

    $stmt=mysqli_stmt_init($conn);

}
