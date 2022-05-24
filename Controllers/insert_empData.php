<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include('../database.php');

        $insert_name = $_POST['name'];
        $insert_email =  $_POST['email'];
        $insert_phone =  $_POST['phone'];
        $insert_gender =  $_POST['gender'];
        $insert_birth_date =  $_POST['birth_date'];
        $insert_occupation =  $_POST['occupation'];
        $insert_marital_status =  $_POST['marital_status'];
        $insert_nationality =  $_POST['nationality'];
        $insert_present_address =  $_POST['present_address'];
        $insert_permanent_address =  $_POST['permanent_address'];

        $sql = "INSERT INTO `employee`(
            `name`, `email`, `phone`, `gender`, `birth_date`, 
            `occupation`, `marital_status`, `nationality`, `present_address`, 
            `permanent_address`)
            VALUES ('$insert_name','$insert_email','$insert_phone',
            '$insert_gender','$insert_birth_date','$insert_occupation','$insert_marital_status',
            '$insert_nationality','$insert_present_address','$insert_permanent_address') ";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        echo $stmt->rowCount() . "Record Inserted Succesfully";
    }

?>