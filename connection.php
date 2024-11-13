<?php

$host = 'localhost';
$username = 'root';
$password = '' ;
$database = 'e_commerce' ;

$connection = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);
    
if (!$connection) {
    die('Could not connect: ' . mysqli_error($connection));
};

?>