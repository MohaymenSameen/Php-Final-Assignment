<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "s627650_memberdb";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

    if(!$conn)
    {
        echo('Could not connect:');
    }
    else    
    {
        echo ('Successfully Connected');
    }

    
