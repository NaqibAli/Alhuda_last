<?php

header("Content-Type: application/json");
include("../commons/database.php");
$action = $_POST['action'];

//delete single district
function delete($conn) {
    extract($_POST);
    $query = "DELETE FROM emp_type WHERE id = '$emp_type_id'";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
   
        $result_data = array("status" => true, "message" => "Menu has been deleted successfully");
    }
    else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}



//fetch data

function fetch($conn) {
    extract($_POST);
    $query = "SELECT * FROM emp_type WHERE id = '$emp_type_id'";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = [];
            $row = $result->fetch_assoc();
            $data = $row;
            $result_data = array("status" => true, "message" => $data);
        }
        else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    }
    else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}





if (isset($action) && isset($_SESSION['jst_username'])) {
    $action($conn);
}
else {
    echo json_encode(array("status"=>false, "message"=>$_SESSION['jst_username']));
}




?>