<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include('../database.php');

    $d_id = $_POST['del_emp_id'];

    $query = " UPDATE `employee` SET `status`= 0 WHERE `id`='$d_id' ";

    $stmt = $conn->prepare($query);
    
    $stmt->execute();

    echo $stmt->rowCount(). "Record Deleted Successfully";
}


?>