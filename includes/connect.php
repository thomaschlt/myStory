<?php
    $host = "xxx";
    $dbname = "xxx";
    $username = "xxx";
    $password = "xxx";

    return new PDO("mysql:host=". $host .";dbname=". $dbname .";charset=utf8",
    $username,
    $password, 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
