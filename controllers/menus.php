<?php

header("Content-Type: application/json");
include("../commons/database.php");
$action = $_POST['action'];


//delete single district
function delete($conn) {
    extract($_POST);
    $query = "DELETE FROM menu WHERE menu_id = '$menu_id'";
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
    $query = "SELECT * FROM menu WHERE menu_id = '$menu_id'";
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



function generate_menu($conn) {
    $query = "SELECT menu_id FROM menu ORDER BY menu_id ASC";
    $result = $conn->query($query);
    $menu_id = '';

    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $menu_id = $row['menu_id'];
            }
            $menu_id++;
            
        }
        else {
            $menu_id = 'MN001';
        }
        $result_data = array("status" => true, "message" => $menu_id);
       
    }
    echo json_encode($result_data);
    return $menu_id;  
    
}

function load_nav($conn) {
    extract($_POST);
    $userId = $_SESSION['jst_user_id'];
    $query = "CALL `user_nav_get`('$userId')";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
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