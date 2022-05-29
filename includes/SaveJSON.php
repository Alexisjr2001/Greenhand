<?php
function statement_handler($stmt,$insertJSON,$jsonFileName,&$urlQuery){
    if(!mysqli_stmt_prepare($stmt,$insertJSON)){
        $urlQuery['server']="prepare-error";
        exitPHP($urlQuery);
    }
    if(!isset($_SESSION['id'])){
        $urlQuery['user']='no-log-in';
        exitPHP($urlQuery);
    }
    $UserID=$_SESSION['id'];
    mysqli_stmt_bind_param($stmt,"si",$jsonFileName,$UserID);
    if(!mysqli_stmt_execute($stmt)){
        $urlQuery['server']="insert-error";
        exitPHP($urlQuery);
    }
}
