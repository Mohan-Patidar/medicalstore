<?php 
include("conn.php");

if(isset($_POST['submit'])){
extract($_POST);
// $name= $_POST['name'];
// $phone = $_POST['phone'];
// $address = $_POST['address'];

$insert = $conn->prepare("INSERT INTO customers(`name`,`lname`, `phone`, `address`,`price`) VALUES ('$name','$lname','$phone' ,'$address','0')");

if($insert->execute()) {
 

    header("location:customerlist.php");

  }

}
?>
