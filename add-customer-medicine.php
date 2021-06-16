<?php
include("conn.php");
if (isset($_POST['add'])) {
    $medicine_name = $_POST['medicine_name'];
    $quantity = $_POST['quantity'];
    $medicine = $conn->prepare("SELECT * FROM medicine WHERE medicine_name='" . $medicine_name . "'");
    $medicine->execute();
    $medicineList = array();
    $count = $medicine->rowCount();
    $row = $medicine->fetch(PDO::FETCH_OBJ);
    $available_quantity = $row->quantity;

    if ($count > 0) {
        if ($available_quantity >= $quantity) {

            $mrp = $row->mrp;
            $medicineList['id'] = $row->id;
            $medicineList['medicine_name'] = $row->medicine_name;
            $medicineList['mrp'] = $mrp;
            $medicineList['quantity'] = $quantity;
            $medicineList['amount'] = $mrp * $quantity;
            $medicineList['response'] = "success";

        } else {
            $medicineList['response'] = "error";
            $medicineList['message'] = "Please enter less than or equal to $available_quantity quantity";
        }
    } else {
        $medicineList['response'] = "error";
        $medicineList['message'] = "No medicine available!";
    }
    echo json_encode($medicineList);
}
