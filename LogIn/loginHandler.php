<?php
function exitPHP($GETParams){
    $urlQuery=http_build_query($GETParams);
    header("Location: ..\LogIn\login.php?$urlQuery");
    exit();
}
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $pwd=$_POST['pwd'];
    $urlQuery=array();

    if ($username==""){
        $urlQuery["email"]="empty";
    }
    else{
        if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
            $urlQuery["email"]="wrong-val";
        }
    }
    if($pwd==""){
        $urlQuery["pwd"]="empty";
    }
    if (count($urlQuery)>0){
        exitPHP($urlQuery);
    }

    include_once "../includes/DBConn.inc.php";

    $stmt=mysqli_stmt_init($conn);

    $verifyUser='SELECT * FROM users WHERE usersEmail=?;';
    if(!mysqli_stmt_prepare($stmt,$verifyUser)){
        $urlQuery["server"]="error";
        exitPHP($urlQuery);
    }
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $results=mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($results)==0){
        $urlQuery['user']="not-found";
        exitPHP($urlQuery);
    }
    foreach($results as $row){
        if (password_verify($pwd,$row['usersPwd'])){
            session_start();
            $_SESSION['id']=$row['usersID'];
            header("Location: ../index.php?login=success");
            exit();
        }
    }
    $urlQuery['user']="wrong-pwd";
    exitPHP($urlQuery);
}
