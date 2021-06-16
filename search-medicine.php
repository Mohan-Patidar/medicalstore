<?php
include("conn.php");
if(isset($_POST['keywords']))
{
   $keywords = $_POST['keywords'];
    $medicine = $conn->prepare("SELECT * FROM medicine");
    $medicine->execute();
    $medicineList = array();
    $count = $medicine->rowCount();
    while($row = $medicine->fetch(PDO::FETCH_OBJ))
    {
        $medicineList[] = $row->medicine_name;
    }
    echo json_encode($medicineList);
}
?>