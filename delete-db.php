<?php
ob_start();
session_start();
include "conn.php";
date_default_timezone_set("Asia/Kolkata");
$datetime = date("d-m-Y h:i A");
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$table = $_POST['table'];
	$delete = $conn->prepare("DELETE FROM $table WHERE id='".$id."'");
	if($delete->execute())
	{
		echo "Success";
	}
}
ob_flush();
?>