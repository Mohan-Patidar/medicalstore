<?php
include "conn.php";
if (isset($_POST['restore'])) {
    $query = file_get_contents($_FILES["db_file"]["tmp_name"]);
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        setcookie("msg", 5, time() + 2);
        header("location:setting");
    }
}
