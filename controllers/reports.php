<?php

header("Content-Type: application/json");
include("../commons/database.php");
$action = $_POST['action'];


function rpt_members($conn)
{
    extract($_POST);
   
    $query = "CALL rpt_members_get('$from', '$to', '$status', '$user', '$type', '$gender','$family')";
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
function rpt_update_logs($conn)
{
    extract($_POST);
    $query = "CALL get_update_logs('$mid','$from','$to','$user')";
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
function rpt_delete_logs($conn)
{
    extract($_POST);
    $query = "CALL delete_logs_sp('$user','$from','$to')";
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

function fetch($conn)
{
    extract($_POST);
    $query = "call $procedure()";
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
function getUpdates($conn)
{
    $userId = $_SESSION['jst_user_id'];
    $query = "call last_activities('$userId')";
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

function last_10_members($conn)
{
    extract($_POST);
    $query = "SELECT concat(concat_ws(' ',`FirstName`,`SecondName`,`Surname`),' (',`Nickname`,')') 'Full Name',`Gender`,`NationalID` 'National ID',`Phone`,`Status` FROM `members` order by members.Registered_Date DESC LIMIT 10";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data []= $row;
            }
            
            $result_data = array("status" => true, "message" => $data);
        } else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}
function get_latest_10($conn)
{
    extract($_POST);
    $query = "call get_latest_10()";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data []= $row;
            }
            
            $result_data = array("status" => true, "message" => $data);
        } else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function get_family_stats($conn)
{
    extract($_POST);
    $opt = isset($type) ? $type : "";
    $query = "call get_families('$id')";
    $result = $conn->query($query);
    $result_data = array();
    $families = array();
    if ($result) {
        $num_rows = $result->num_rows;
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $members = [];
            $nconn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);
 $myquery = "call getMemberInfoFamily('".$row['ID'] . "')";
            $sec_result = $nconn->query($myquery);
            if ($sec_result) {
                while ($member = $sec_result->fetch_assoc()) {
                    $members[] = $member;
                }
            }
            // array_push($row,"Members"=>$members)
            $row['Members'] = $members;
            // $row[]=[];
            $data[] = $row;
        }
        $result_data = array("status" => true, "message" => $data);

    }

    echo json_encode($result_data);

}


function customer_get_balance($conn) {
    extract($_POST);
   
    $query = "CALL get_customer_balance_sp('$type', '$from', '$to')";
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



function rpt_customer_get_sp($conn) {
    extract($_POST);
   
    $query = "CALL rpt_customer_get_sp('$type', '$from', '$to', '$address', '$status','$gender')";
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



function rpt_invoice_get($conn) {
    extract($_POST);
   
    $query = "CALL rpt_invoice_get_sp('$type', '$from', '$to','$customer_id','$status','$address_id')";
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


function rpt_customer__statements_get($conn) {
    extract($_POST);
   
    $query = "CALL get_customer_statement_sp('$customer_id','$type', '$from', '$to')";
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

function rpt_receipt_get($conn) {
    extract($_POST);
   
    $query = "CALL rpt_receipt_get_sp('$type', '$from', '$to','$customer_id','$invoice_id','$receipt_id')";
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

function rpt_payable_get($conn) {
    extract($_POST);
   
    $query = "CALL rpt_payable_get_sp('$type', '$from', '$to','$customer_id','$aircrafts_id','$payable_type')";
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

function rpt_payment_get($conn) {
    extract($_POST);
   
    $query = "CALL rpt_payment_get_sp('$type', '$from', '$to','$customer_id','$aircrafts_id','$payable_type')";
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

function fetch_assets_balance_sheet($conn) {
    extract($_POST);
   
    $query = "CALL fetch_assets_balance_sheet_get_sp('$type', '$from', '$to')";
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

function fetch_liablity_balance_sheet($conn) {
    extract($_POST);
   
    $query = "CALL fetch_liablity_balance_sheet_get_sp('$type', '$from', '$to')";
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

function fetch_equity_balance_sheet($conn) {
    extract($_POST);
   
    $query = "CALL fetch_equity_balance_sheet_sp('$type', '$from', '$to')";
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

function rpt_income__statements_get($conn) {
    extract($_POST);
   
    $query = "CALL income_statement_get_sp('$type', '$from', '$to')";
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





?><?php
