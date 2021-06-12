<?php
header("Content-Type: application/json");
include "../commons/database.php";
$action = $_POST['action'];

//delete single district
function delete($conn)
{
    extract($_POST);
    $query = "DELETE FROM family WHERE Family_id = '$family_id'";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
        $result_data = array("status" => true, "message" => "Family has been deleted successfully");
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}
//fetch data
function fetch($conn)
{
    extract($_POST);
    $query = "SELECT * FROM family WHERE Family_id = '$family_id'";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = [];
            $row = $result->fetch_assoc();
            $data = $row;
            $result_data = array("status" => true, "message" => $data);
        } else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}
function newFamily($conn)
{
    extract($_POST);
    $user = $_SESSION['jst_user_id'];
    $query = "call family_sp('','$name','$family_contact','$responsible','$user','insert')";
    if ((isset($member_ids)?count($member_ids):0) < 2) {
        echo json_encode(array("status" => false, "message" => "You must select at least 2 members"));
        return;
    }
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = [];
            $row = $result->fetch_assoc();
            $family_id = $row['ID'];
            $result_data = addMembersFn($member_ids, $family_id);
        } else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function change_user($conn)
{
    extract($_POST);
    $query = "CALL change_username_or_password_sp('$user_id_side', '$username_side', '$new_password')";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
        $_SESSION['jst_username'] = $username_side;
        $result_data = array(
            "status" => true,
            "message" => "Username " . $username_side . " has been Updated Successefully!",
        );
    } else {
        $result_data = array(
            "status" => false,
            "message" => $conn->error,
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

            $data = array('status' => true, 'message' => 'Allowed');
        } else {
            $data = array('status' => false, 'message' => 'Not Allowed');

        }
    } else {
        $data = array('status' => false, 'message' => $conn->error);
    }

    echo json_encode($data);
}

function addMembers($conn)
{
    extract($_POST);
    $counter = isset($member_ids) ? count($member_ids) : 0;
    $nadd = 0;
    $result_data = addMembersFn((isset($member_ids))? $member_ids  : [], $family_id);
    
    echo json_encode($result_data);
}

function addMembersFn($member_ids, $family_id)
{
    $counter = isset($member_ids) ? count($member_ids) : 0;
    $nadd = 0;
    if ($counter > 0) {

        for ($i = 0; $i < $counter; $i++) {
            $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);
            $query = "call add_family_member('$member_ids[$i]','$family_id','add')";
            $result = $conn->query($query);
            if ($result) {
                $rows = $result->num_rows;
                if (!($rows > 0)) {
                    return array("status" => false, "added" => $nadd, "message" => --$counter - $nadd . " Failed to Add Members");
                }
                else{
                    $row = $result->fetch_assoc();
                    if(isset($row['Message']) && $row['Message']=="limitreached"){
                        return array("status" => false, "message" => "Family Members Limit Reached, You cannot Add Members");
                    }
                }
                $nadd++;
            } else {
                return array("status" => false, "message" => $conn->error);

            }
        }
        return array("status" => true, "added" => $nadd, "message" => "$nadd Members Added to Family ");
    } else {
        return array("status" => false, "added" => $nadd, "message" => "No Members Selected");
    }
}

if (isset($action) && isset($_SESSION['jst_username'])) {
    $action($conn);
} else {
    echo json_encode(array("status" => false, "message" => $_SESSION['jst_username']));
}
