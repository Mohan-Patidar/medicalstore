<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$datetime = date("d-m-Y h:i A");
include("conn.php");
extract($_POST);
if(isset($submit))
{
$pwd = base64_encode($password);
$select = $conn->prepare("SELECT * FROM admin_login WHERE username='".$username."' AND password='".$pwd."' AND status='Active'");
$select->execute();
$count = $select->rowCount();
if($count>0)
{
	$row = $select->fetch(PDO::FETCH_OBJ);
	$_SESSION['idadmin'] = $row->admin_id;
	$_SESSION['username'] = $row->username;
	$_SESSION['name'] = $row->name;
	$_SESSION['email'] = $row->email;
	//setcookie("msg","1",time()+60);
	header("location:./");
}else{
	setcookie("error","0",time()+2);
	header("location:login");
}
}
?>