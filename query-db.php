<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Kolkata');
$datetime = date("d-m-Y h:i A");
include("conn.php");
if(isset($_POST['submit']))
{
    $table = $_POST['table'];
    unset($_POST['table']);
    unset($_POST['submit']); 
    $allKeys = array_keys($_POST);
    $keys = implode(', ',$allKeys);
    $allValues = array_values($_POST);
    $values = implode("', '", $allValues);
    $insert = $conn->prepare("INSERT INTO `$table`($keys) VALUES ('".$values."')");
    if($insert->execute())
    {
        echo "success";
    }else{
        echo "error";
    }
}
if(isset($_POST['update']))
{
    $table = $_POST['table'];
    $id = $_POST['id'];
    unset($_POST['table']);
    unset($_POST['id']);
    unset($_POST['update']); 
    $updateArray = array();
    foreach($_POST as $key => $value){
        $updateArray[] = $key." = "."'".$value."'";
    }
    $setValues = implode(", ",$updateArray);
    $update = $conn->prepare("UPDATE $table SET $setValues WHERE id='".$id."'");
    if($update->execute())
    {
        echo "updated";
    }else{
        echo "error";
    }
}
if(isset($_POST['update_stock']))
{
    $table = $_POST['table'];
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    unset($_POST['table']);
    unset($_POST['id']);
    unset($_POST['update_stock']); 
    unset($_POST['quantity']); 
    $updateArray = array();
    foreach($_POST as $key => $value){
        $updateArray[] = $key." = "."'".$value."'";
    }
    $setValues = implode(", ",$updateArray);
    $update = $conn->prepare("UPDATE $table SET quantity=quantity+$quantity, $setValues WHERE id='".$id."'");
    if($update->execute())
    {
        echo "updated";
    }else{
        echo "error";
    }
}
if(isset($_POST['status_update']))
{
    $table = $_POST['table'];
    unset($_POST['table']);
    unset($_POST['status_update']);
    if(!isset($_POST['id'])){
        $_POST['admin_id'] = $_SESSION['idadmin'];  
    }
    $conditionArray = array();
    $updateArray = array();
    foreach($_POST as $key => $value){
        if($key=='id' || $key=='admin_id'){
            $conditionArray[] = $key." = "."'".$value."'";
        }else{
            $updateArray[] = $key." = "."'".$value."'";
        }
    }
    $setValues = implode(", ",$updateArray);
    $setConditions = implode(", ",$conditionArray);
    $update = $conn->prepare("UPDATE $table SET $setValues WHERE $setConditions");
    if($update->execute())
    {
        echo "updated";
    }else{
        echo "error";
    }
}
ob_flush();
