<?php
    $dbServername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="greenhand";

    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
    if(!$conn){
        $urlQuery["server"]="conn-error";
        exitPHP($urlQuery);
    }
    if(!mysqli_ping($conn)){
        $urlQuery["server"]="conn-dead";
        exitPHP($urlQuery);
    }