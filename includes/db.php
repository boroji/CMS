<?php

$db = [
    "link" => "localhost",
    "user" => "root",
    "pass" => "",
    "database" => "cms"

];

// creating constANT for each variable
foreach($db as $key => $value) {
    define(strtoupper($key), $value);
}


$connection = mysqli_connect(LINK, USER, PASS, DATABASE);


?>