<?php

header("Content-Type: application/json");
include("../commons/database.php");
$action = $_POST['action'];


//delete single district
function delete($conn) {
    extract($_POST);
    $query = "DELETE FROM sub_menu WHERE submenu_id = '$submenu_id'";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
   
        $result_data = array("status" => true, "message" => "Sub Menu has been deleted successfully");
    }
    else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}



//fetch data

function fetch($conn) {
    extract($_POST);
    $query = "SELECT * FROM sub_menu WHERE submenu_id = '$submenu_id'";
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


function update_submenus($conn)
{
    extract($_POST);
    $userId = $_SESSION['jst_user_id'];
    $result_info = '';
   
   
         $count= count($columns);
         for ($i = 0; $i < $count; $i++) {
                $query = "UPDATE `sub_menu` SET `auto`='$i++' WHERE `submenu_id` = '$columns[$i]'";
                $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);
                $result = $conn->query($query);
                $result_data = [];
                if ($result) {
                    $result_data = array('status' => true, 'message' => 'Updated successfully ');
                    
                } 
                else {
                    $result_data = array('status' => false, 'message' => $conn->error);
                }

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