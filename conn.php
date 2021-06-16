<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "medical_db";
try{
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
    die("Database Not Connected ".$e->getMessage());
}
$connection = mysqli_connect($hostname,$username,$password,$dbname);
?>