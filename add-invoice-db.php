<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Kolkata');
$datetime = date("d-m-Y h:i A");
include("conn.php");
if(isset($_POST['submit']))
{
    $customer_name = $_POST['c_name'];
    $customer_email = $_POST['c_email'];
    $customer_mobile = $_POST['c_mobile'];
    $customer_address = $_POST['c_address'];
    $med_id = explode(",", $_POST['medicine_id']);
    $med_qty = explode(",", $_POST['customer_medicine_quantity']);
    $medicine_id = $_POST['medicine_id'];
    $medicine_name = $_POST['customer_medicine_name'];
    $medicine_quantity = $_POST['customer_medicine_quantity'];
    $medicine_mrp = $_POST['customer_medicine_mrp'];
    $total_amount = $_POST['customer_total_amount'];
    $sub_total = $_POST['sub_total'];
    $discount = $_POST['discount'];
    $grand_total = $_POST['grand_total'];
    $data = array(
        'customer_name' => $customer_name,
        'customer_email' => $customer_email,
        'customer_mobile' => $customer_mobile,
        'customer_address' => $customer_address,
        'medicine_id' => $medicine_id,
        'medicine_name' => $medicine_name,
        'medicine_quantity' => $medicine_quantity,
        'medicine_mrp' => $medicine_mrp,
        'total_amount' => $total_amount,
        'sub_total' => $sub_total,
        'discount' => $discount,
        'grand_total' => $grand_total
    );
    $allKeys = array_keys($data);
    $keys = implode(', ',$allKeys);
    $allValues = array_values($data);
    $values = implode("', '", $allValues);
    $insert = $conn->prepare("INSERT INTO customer_invoice($keys) VALUES ('".$values."')");
    if($insert->execute())
    {
        $response = "error";
        for($i=0; $i<count($med_id); $i++){
            $qty = $med_qty[$i];
            $mid = $med_id[$i];
            $update_medicine = $conn->prepare("UPDATE medicine SET quantity = quantity-$qty WHERE id='".$mid."'");
            if($update_medicine->execute())
            {
                $response = "success";
            }
        }
        echo $response;
    } else {
        echo "error";

    }
}
ob_flush();
?>