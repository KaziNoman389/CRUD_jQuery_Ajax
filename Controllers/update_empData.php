<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include('../database.php');

    $u_id = $_POST['update_emp_id'];

    $edit_name =  $_POST['edit_name'];
	$edit_email =  $_POST['edit_email'];
	$edit_phone =  $_POST['edit_phone'];
	$edit_gender =  $_POST['edit_gender'];
	$edit_birth_date =  $_POST['edit_birth_date'];
	$edit_occupation =  $_POST['edit_occupation'];
	$edit_marital_status =  $_POST['edit_marital_status'];
	$edit_nationality =  $_POST['edit_nationality'];
	$edit_present_address =  $_POST['edit_present_address'];
	$edit_permanent_address =  $_POST['edit_permanent_address'];

    $query = " UPDATE `employee` SET 
    `name`='$edit_name',`email`='$edit_email',`phone`='$edit_phone',`gender`='$edit_gender',
    `birth_date`='$edit_birth_date',`occupation`='$edit_occupation',`marital_status`='$edit_marital_status',
    `nationality`='$edit_nationality',`present_address`='$edit_present_address',`permanent_address`='$edit_permanent_address' WHERE `id`='$u_id' ";

    $stmt = $conn->prepare($query);
    
    $stmt->execute();

    echo $stmt->rowCount(). "Record Updated Successfully";
}


?>