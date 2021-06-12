<?php
header("Content-Type: application/json");
include("../commons/database.php");
$action = $_POST['action'];


//delete single district
function delete($conn) {
    extract($_POST);
    $query = "DELETE FROM users WHERE user_id = '$user_id'";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
   
        $result_data = array("status" => true, "message" => "Users has been deleted successfully");
    }
    else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}



//fetch data

function fetch($conn) {
    extract($_POST);
    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
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



function generate_users($conn) {
    $query = "SELECT user_id FROM users ORDER BY user_id ASC";
    $result = $conn->query($query);
    $user_id = '';

    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
            }
            $user_id++;
        }
        else {
            $user_id = 'USR0001';
        }
        $result_data = array("status" => true, "message" => $user_id);
       
    }
    echo json_encode($result_data);
    return $user_id;  
    
}


function change_user($conn){
    extract($_POST);
    $query =  "CALL change_username_or_password_sp('$user_id_side', '$username_side', '$new_password')";
    $result = $conn->query($query);
    $result_data = array();

    if($result){
        $_SESSION['jst_username'] = $username_side;
        $result_data = array(
            "status" => true,
            "message" => "Username ".$username_side." has been Updated Successefully!"
        );
    }else{
        $result_data = array(
            "status" => false,
            "message" => $conn->error
        );
    }
    echo json_encode($result_data);
}


function check_user_url($conn)
{
    extract($_POST);
    $userId = $_SESSION['jst_user_id'];
    $page = $conn->real_escape_string($page);
    $query = "CALL check_user_link_sp('$page','$userId')";
    $result = $conn->query($query);

    if ($result) {
        $Message = $result->fetch_assoc();
        $data = array();
        if ($Message['Message'] == 'Allowed') {
           
            $data = array('status' => true, 'message' =>'Allowed');
        }else {
            $data = array('status' => false, 'message' =>'Not Allowed');
   
        } 
    } else {
        $data = array('status' => false, 'message' => $conn->error);
    }

    echo json_encode($data);
}


if (isset($action) && isset($_SESSION['jst_username'])) {
    $action($conn);
}
else {
    echo json_encode(array("status"=>false, "message"=>$_SESSION['jst_username']));
}




?>