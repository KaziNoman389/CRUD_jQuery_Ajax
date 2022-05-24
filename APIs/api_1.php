<?php 
include('../database.php');

$return_data = array();

$request = isset($_POST['request']) ? $_POST['request'] : 0;
$parameter = isset($_POST['parameter']) ? $_POST['parameter'] : 0;

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
        $return_data = get_empTableView($sql,true);
        break;

}
echo json_encode($return_data);

function get_empTableView($sql){
    global $conn;
    try{
        $HTML="";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        $counter = 1;
        while($record = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
            $HTML .= '
                        <tr>
                        <td>'.$counter++.'</td>
                        <td> '.$record['name'].' </td> 
                        <td> '.$record['email'].' </td> 
                        <td> '.$record['phone'].' </td> 
                        <td> '.$record['gender'].' </td> 
                        <td> '.$record['birth_date'].' </td>
                        <td> '.$record['occupation'].' </td> 
                        <td> '.$record['marital_status'].' </td> 
                        <td> '.$record['nationality'].' </td> 
                        <td> '.$record['present_address'].' </td> 
                        <td> '.$record['permanent_address'].' </td> 
                        <td>
                            <button type="button" class="btn btn-primary btn-md mb-2 d-grid gap-2 mb-2" id="view_id" data-id='.$record["id"].'>View</button>
                            <button type="button" class="btn btn-warning btn-md mb-2 d-grid gap-2 mb-2" id="edit_id" name="update" data-id='.$record["id"].'>Edit</button>
                            <a  type="button" class="btn btn-danger btn-md d-grid gap-2 mb-2" id="delele_id" name="delete" data-id='.$record["id"].' value="Delete">Delete </a>
                        </td>
                        </tr>
                    ';
        }
        $return_data = $HTML;
    }
    catch(PDOException $e){
        $HTML = $e->getMessage();
    }
    return $return_data;
}

?>