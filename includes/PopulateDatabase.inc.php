<?php
include_once "DBConn.inc.php";

if($conn===false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$stmt=mysqli_stmt_init($conn);
$sql="SELECT * FROM users";
if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_execute($stmt);
    $results=mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($results)>0){
        return;
    }
}
$sql='INSERT INTO users (usersEmail,usersPwd,usersName,usersPhone,usersCountry,usersCity,usersImage,usersAge,usersGender) VALUES (?,?,?,?,?,?,?,?,?);';
if(mysqli_stmt_prepare($stmt,$sql)){
    $email="example@gmail.com";
    $pwd="123";
    $pwd=password_hash($pwd,PASSWORD_DEFAULT);
    $name="Demo Name";
    $phone=6912345678;
    $country="Greece";
    $city="Thessaloniki";
    $img="../Assets/demo-user-img.png";
    $age=20;
    $gender="male";
    mysqli_stmt_bind_param($stmt,"sssisssis",$email,$pwd,$name,$phone,$country,$city,$img,$age,$gender);
    mysqli_stmt_execute($stmt);
}
$sql='INSERT INTO users (usersEmail,usersPwd,usersName,usersPhone,usersCountry,usersCity,usersImage) VALUES (?,?,?,?,?,?,?);';
if(mysqli_stmt_prepare($stmt,$sql)){
    $email="org@gmail.com";
    $pwd="123";
    $pwd=password_hash($pwd,PASSWORD_DEFAULT);
    $name="Demo Org";
    $phone=6987654321;
    $country="Greece";
    $city="Athens";
    $img="../Assets/demo-org-img.png";
    mysqli_stmt_bind_param($stmt,"sssisss",$email,$pwd,$name,$phone,$country,$city,$img);
    mysqli_stmt_execute($stmt);
}