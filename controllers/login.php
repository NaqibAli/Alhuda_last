<?php

header("Content-Type: application/json");
include "../commons/database.php";
$action = $_POST['action'];

function login($conn)
{
    extract($_POST);
    $query = "CALL login_sp('$username', '$password')";
    $result = $conn->query($query);
    $result_data = array();

    $result_data = array();
    if ($result) {
        $data = [];
        $row = $result->fetch_assoc();
        if (isset($row['Message']) && $row['Message'] == 'Denied') {
            $result_data = array("status" => false, "message" => "Username or Password is incorrect");

        } elseif (isset($row['Message']) && $row['Message'] == 'inactive') {
            $result_data = array("status" => false, "message" => "Your Sessions is Locked By Administrator");

        } else {
            $data[] = $row;$usertype='';
            $result_data = array("status" => true, "message" => $data);
            foreach ($row as $key => $value) {
                
                if ($key == 'jst_user_type') {
                $usertype = $value;
                }
                $_SESSION[$key] = $value;
                
                if ($key == 'jst_secure') {
                    if ($usertype=='Admin') {
                       setcookie("secret", $value); 
                    }
                }
                // echo $_COOKIE['secret'];
            }

        }

    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function checkPassword($conn)
{
    extract($_POST);
    $query = "SELECT  * FROM users WHERE users.password = PASSWORD('$pass') and users.status = 'Active' LIMIT 1";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $row = $result->fetch_assoc();

                $result_data = array("status" => true, "message" => "Success");
        
        } else {
            $result_data = array("status" => false, "message" => "Incorrect Password");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function check_user_session($conn)
{
    if (empty($_SESSION['jst_user_id'])) {
        $result = array('status' => false);
    } else {
        $result = array('status' => true);
    }

    echo json_encode($result);
}

function change_password($conn)
{
    extract($_POST);
    $userId = $_SESSION['jst_user_id'];
    $userName = $_SESSION['jst_username'];
    $query = "CALL change_username_or_password_sp('$userId', '$userName', '$new_password')";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
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

function generate($conn)
{
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
        } else {
            $user_id = 'USR0001';
        }
    }

    return $user_id;
}

function fetch_settings($conn)
{

    $query = "SELECT * FROM settings";
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

if (isset($action)) {
    $action($conn);
}
