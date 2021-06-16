<?php
include "conn.php";
extract($_POST);
if(isset($submit))
{
$select = $conn->prepare("SELECT * FROM admin_login WHERE email='".$email."'");
$select->execute();
$count = $select->rowCount();
if($count!=0)
{
	$row = $select->fetch(PDO::FETCH_OBJ);
	$name = $row->name;
	$username = $row->username;
	$password = base64_decode($row->password);
    $to = $email;
	$subject = "Forgot Password";
	 
	$message = "Dear <b>$name,</b><br><br>
	Your login credential is given below-<br>
	<b>Username - </b>$username<br>
	<b>Password - </b>$password<br><br>
	Thanks & Regards<br>
	Admin
	";
	 
	$header = "From:info@somedomain.com \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";
	 
	$retval = mail ($to,$subject,$message,$header);
	if( $retval == true ) {
		setcookie('msg',1,time()+2);
	   header("location:forgot-password");
	}
}else{
	   setcookie('msg',0,time()+2);
	   header("location:forgot-password.php");
	}
}
?>