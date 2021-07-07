<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'form';

$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    die("Error ". mysqli_connect_error());
}
// check if table exists
$checkTable = "SHOW TABLES LIKE 'formtb'";
$result = mysqli_query($conn, $checkTable);
if($result){
    $createTable = "CREATE TABLE `form`.`formtb` ( `name` VARCHAR(30) NOT NULL , `age` INT(2) NOT NULL , `mobile` BIGINT(10) NOT NULL , `city` VARCHAR(20) NOT NULL , `state` VARCHAR(20) NOT NULL , `pin` INT(6) NOT NULL , `education` VARCHAR(20) NOT NULL , `mar_status` VARCHAR(10) NOT NULL , `id` INT NULL )";
    $result = mysqli_query($conn, $checkTable);
}
?>