<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "accounting_budget";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_error()){
    die("Failed to connect" . mysqli_connect_error());
}
?>