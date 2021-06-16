<?php
ob_start();
session_start();
include "conn.php";
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['submit']))
{
$adminid = $_SESSION['idadmin'];
$old_password = base64_encode($_POST['old_password']);
$new_password = base64_encode($_POST['new_password']);
$select = $conn->prepare("SELECT * FROM admin_login WHERE admin_id='".$adminid."' AND password='".$old_password."'");
$select->execute();
$count = $select->rowCount();
if($count!=0)
{
$update = $conn->prepare("UPDATE admin_login SET password=:newpass WHERE admin_id=:adid");
$update->bindparam(':adid',$adminid);
$update->bindparam(':newpass',$new_password);
if($update->execute())
{
	setcookie("msg",3,time()+2);
	header("location:profile.php");
}
}else{
setcookie("msg",0,time()+2);
	header("location:profile");
}
}
ob_flush();
?>