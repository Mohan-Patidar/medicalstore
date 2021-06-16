<?php
  include("conn.php");
        $date  =$_POST['sdate'];
        $sdetails = $_POST['sdetail'];
        $new = $_POST['sprice'];
        $old = $_POST['old_price'];
        $id  =$_POST['id'];
        $result = $old - $new;

        $update = $conn->prepare("UPDATE `customers` SET `price`= $result WHERE `id`= $id");
      
        $update->execute();
        
        // echo $results?"Price Substract Successfully!":"failed to substract failed.";
        $insert = $conn->prepare("INSERT INTO customer_detail(`customer_id`,`gave_price`,`take_price`,`details`,`date`) VALUES ('$id',0,'$new','$details','$date')");
        $insert->execute();


?>
