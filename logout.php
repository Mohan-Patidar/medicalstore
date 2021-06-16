<?php
session_start();
$adminid = $_SESSION['idadmin'];
unset($adminid);
session_destroy();
header("location:./");
?>