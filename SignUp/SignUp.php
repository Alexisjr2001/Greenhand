<?php
if (isset($_POST["submit"])){
    $urlQuery=array();

    $name = $_POST["name"];
    $email=$_POST["email"];
    $pwd=$_POST["pwd"];
    $pwd2=$_POST["pwd2"];
    $country=$_POST["country"];
    $city=$_POST["city"];
    $phone=$_POST["phone"];

    if(isset($_POST["age"])){
        if(is_numeric($_POST["age"])){
            $age=$_POST["age"] + 0;
            if(is_int($age)){
                if($age<=0){
                    $urlQuery["age"]="wrong-val";
                }
            }
            else{
                $urlQuery["age"]="not-int";
            }
        }
        else{
            $urlQuery["age"]="NaN";
        }
    }
    if(isset($_POST["gender"])){
        $gender=filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        if($gender=="male" or $gender=="female" or $gender=="other"){
            $gender=$_POST["gender"];
        }
        else{
            $urlQuery["gender"]="wrong-val";
        }
    }

    if ($name==""){
        $urlQuery["name"]="empty";
    }
    if ($email==""){
        $urlQuery["email"]="empty";
    }
    else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $urlQuery["email"]="wrong-val";
        }
    }
    if ((empty($pwd) and !$pwd=="0") or (empty($pwd2) and !$pwd2=="0")){
        $urlQuery["pwd"]="empty";
    }
    else {
        if ($pwd !== $pwd2) {
            $urlQuery["pwd"] = "not-equal";
        }
    }
    if($country==""){
        $urlQuery["country"]="empty";
    }
    if($city==""){
        $urlQuery["city"]="empty";
    }
    if($phone=="" or !is_numeric($phone)){
        $wrongInput=true;
    }
    else{
        $phone=(int)$phone;
    }
    if(is_numeric($phone)){
        $phone=$phone + 0;
        if(!is_int($phone)){
            $urlQuery["phone"]="not-int";
        }
    }
    else{
        $urlQuery["phone"]="NaN";
    }

    $file = $_FILES["photo"];
    $fileName = $_FILES["photo"]["name"];
    $fileTmpName = $_FILES["photo"]["tmp_name"];
    $fileSize = $_FILES["photo"]["size"];
    $fileError = $_FILES["photo"]["error"];
    $fileType = $_FILES["photo"]["type"];


    $fileExt = explode(".",$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed=array("jpg","jpeg","png");

    if (in_array($fileActualExt,$allowed)){
        if($fileError===0){
            if($fileSize<25000000){//25MB
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = '../Assets/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
            }
            else{
                $urlQuery["photo"]="too-big";
            }
        }
        else{
            $urlQuery["photo"]="err";
        }
    }
    else{
        $urlQuery["photo"]="inv-ext";
    }

    if (count($urlQuery)>0){
        $urlQuery=http_build_query($urlQuery);
        header("Location: ..\SignUp\SignUp.html?$urlQuery");
        exit();
    }
    header("Location: SignUp.html?acc=success");
}
