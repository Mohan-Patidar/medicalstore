<?php
ob_start();
session_start();
include "conn.php";
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['submit']))
{
$adminid = $_SESSION['idadmin'];
$name = $_POST['name'];
$designation = $_POST['designation'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$date = date('d-m-Y');
if(!empty($_FILES['image']['name']))
{
$filename = $_FILES['image']['name'];
$tmpname = $_FILES['image']['tmp_name'];
$location = "uploads/";
$ext = strtolower(end(explode('.',$filename)));
$allowext = array('png','jpg','gif','jpeg');

$existdata = $conn->prepare("SELECT * FROM admin_login WHERE admin_id='".$adminid."'");
$existdata->execute();
$row = $existdata->fetch(PDO::FETCH_OBJ);
$oldimage = $row->image;
if(in_array($ext,$allowext))
{
	unlink("uploads/".$oldimage);
	$img = uniqid().$filename;
	move_uploaded_file($tmpname,$location.$img);
}else{
	$img = $oldimage;
}
}else{
	$img = "";
}
$update = $conn->prepare("UPDATE admin_login SET name=:nm, designation=:des, mobile=:mob, email=:mail, address=:add, city=:ct, state=:st, pincode=:pinc, image=:img, date=:dt WHERE admin_id=:adid");
$update->bindparam(':adid',$adminid);
$update->bindparam(':nm',$name);
$update->bindparam(':des',$designation);
$update->bindparam(':mob',$mobile);
$update->bindparam(':mail',$email);
$update->bindparam(':add',$address);
$update->bindparam(':ct',$city);
$update->bindparam(':st',$state);
$update->bindparam(':pinc',$pincode);
$update->bindparam(':img',$img);
$update->bindparam(':dt',$date);
if($update->execute())
{
	setcookie("msg",2,time()+2);
	header("location:profile");
}
}
ob_flush();
?>