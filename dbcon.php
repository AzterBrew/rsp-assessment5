<?php

    $sname = "localhost";
    $unmae= "root";
    $password = "";

    $dbname = "websys_db";

    $conn = mysqli_connect($sname,$unmae,$password,$dbname);

    if(!$conn) {
        echo 'Connection Failed';
    }