<?php 
include('../database.php');

$return_data = array();

$request = isset($_POST['request']) ? $_POST['request'] : 0;
$parameter = isset($_POST['parameter']) ? $_POST['parameter'] : 0;
$data = isset($_POST['data']) ? $_POST['data'] : 0;

switch($request){
    case '1':
        $table = 'employee';
        break;
    default:
        $table = '';
}

switch($parameter){
    case '1':
        $sql = " SELECT * FROM ".$table." WHERE `status` = 1 ORDER BY `id` DESC ";
        $return_data = get_empTable_View($sql,true);
        break;

    case '2':
        $sql = "SELECT * FROM ".$table." WHERE ".$data;
        $return_data = get_empTable_Modal_View($sql,true);
        break;

    case '3':
    $sql = "SELECT * FROM ".$table." WHERE ".$data;
    $return_data = get_empTable_Modal_Edit($sql,true);
    break;
}
echo json_encode($return_data);


// table view 
function get_empTable_View($sql){
    global $conn;
    try{
        $HTML="";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        $counter = 1;
        while($record = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
            $HTML .= '
                        <tr class="text-center">
                            <td>'.$counter++.'</td>
                            <td> '.$record['name'].' </td> 
                            <td> '.$record['phone'].' </td> 
                            <td>
        <a type="button" class="btn btn-success view" id="view_id" name="view" data-id='.$record["id"].' title="View" ><i class="fa fa-eye"></i></a> 
        <a type="button" class="btn btn-warning edit" id="edit_id" name="update" data-id='.$record["id"].' title="Edit"> <i class="fa fa-pencil-square-o"></i> </a>
        <a type="button" class="btn btn-danger delete" id="delele_id" name="delete" data-id='.$record["id"].' title="Delete"> <i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                    ';
                        // <td> '.$record['email'].' </td>
                        // <td> '.$record['gender'].' </td> 
                        // <td> '.$record['birth_date'].' </td>
                        // <td> '.$record['occupation'].' </td> 
                        // <td> '.$record['marital_status'].' </td> 
                        // <td> '.$record['nationality'].' </td> 
                        // <td> '.$record['present_address'].' </td> 
                        // <td> '.$record['permanent_address'].' </td> 

                        // <button type="button" class="btn btn-success" id="view_id" data-id='.$record["id"].'>View</button>
                        // <button type="button" class="btn btn-warning " id="edit_id" name="update" data-id='.$record["id"].'>Edit</button>
                        // <a  type="button" class="btn btn-danger" id="delele_id" name="delete" data-id='.$record["id"].' value="Delete">Delete </a>
        }
        $return_data = $HTML;
    }
    catch(PDOException $e){
        $HTML = $e->getMessage();
    }
    return $return_data;
}

// Modal View 
function get_empTable_Modal_View($sql){
    global $conn;
    try{
        $row_data = '';
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
        {
            $row_data .= '
                <p>Full Name: <b> '.$row['name'].' </b> </p> 
                <p style="text-transform: none;">Email:  <b> '.$row['email'].' </b> </p>
                <p>Phone: <b> '.$row['phone'].' </b> </p>
                <p>Gender: <b> '.$row['gender'].' </b> </p>
                <p>Date Of Birth: <b> '.$row['birth_date'].' </b> </p>
                <p>Occupation : <b> '.$row['occupation'].' </b> </p>
                <p>Marital Status: <b> '.$row['marital_status'].' </b> </p>
                <p>Present Address: <b> '.$row['present_address'].' </b> </p>
                <p>Permanent Address: <b> '.$row['permanent_address'].' </b> </p>
                <p>Nationality: <b> '.$row['nationality'].' </b> </p>
                ';
        }
        $record = $row_data;
    }
    catch(PDOException $e){
        $row_data = $e->getMessage();
    }
    return $record;
}


function get_empTable_Modal_Edit($sql){
    global $conn;
    try{
        $record = '';
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        $record = $e->getMessage();
    }
    return $record;
}

?>