<?php
        include("conn.php");
        $date  =$_POST['date'];
        $details = $_POST['detail'];
        $new = $_POST['price'];
        $old = $_POST['old_price'];
        $id  =$_POST['id'];
        $result = $new + $old;

        $update = $conn->prepare("UPDATE `customers` SET `price`= $result WHERE `id`= $id");
      
        $update->execute();
       
        $insert = $conn->prepare("INSERT INTO customer_detail(`customer_id`,`gave_price`,`take_price`,`details`,`date`) VALUES ('$id','$new',0,'$details','$date')");
        $insert->execute();
      
        
        
?>
