<?php

header("Content-Type: application/json");
include "../commons/database.php";
$action = $_POST['action'];


function registerFamilyWith($conn)
{
    extract($_POST);
    $user = $_SESSION['jst_user_id'];
    $query = "call family_sp('','$family_name','$family_contact','$responsible','$user','insert')";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = [];
            $row = $result->fetch_assoc();
            $family_id = $row['ID'];
            $i=0;
            $registered=0;
            while ($i<count($firstname)) {
                $conn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);
                $q="INSERT INTO `members`(`Member_Id`,`FirstName`, `SecondName`, `NationalID`,`Registered_Date`, `user_id`,`MemberType`, `Family_id`, `Status`) values(generate_member_id(),'$firstname[$i]','$second_name[$i]','$nationalID[$i]',CURRENT_DATE(),'$user','Family','$family_id','Active')";
                $result = $conn->query($q);
                $i++;
                if (!$result) {
                  $result_data = array("status" => false, "message" => $conn->error);
                  break;
                }
                else{
                    $registered++;
                }
            }
            if ($registered > 0) {
                $result_data = array("status" => true, "message" => "$family_name is registered And $registered Members Registered");
            }
        } else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

//delete single district
function delete($conn)
{
    extract($_POST);
    $userId = $_SESSION['jst_user_id'];
    $q = "set @log_user_deletes='$userId';";
    $ress = $conn->query($q);
    $query = "DELETE FROM members WHERE members.Member_Id= '$member_id'";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
        $result_data = array("status" => true, "message" => "Member has been deleted successfully");
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}
function Managefamily($conn)
{
    extract($_POST);
    $query = "call add_family_member('$id','$fid','$type')";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
        $rows = $result->num_rows;
        if ($rows > 0) {
            $m = $result->fetch_assoc();
            $result_data = array("status" => true, "message" => $m['Message']);
        }

    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function DeleteMembers($conn)
{

    extract($_POST);
    $userId = $_SESSION['jst_user_id'];
    $counter = isset($members) ? count($members) : 0;
    $nadd = 0;
    $result_data = [];

    if ($counter > 0) {
        for ($i = 0; $i < $counter; $i++) {
            $q = "set @log_user_deletes='$userId';";
            $ress = $conn->query($q);
            $query = "DELETE FROM members WHERE members.Member_Id='$members[$i]'";
            $result = $conn->query($query);
            if ($result) {
                $nadd++;
            } else {
                $result_data = array("status" => false, "message" => $conn->error);
                break;
            }
            $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);
        }
        $result_data = array("status" => true, "deleted" => $nadd, "message" => "$nadd Members Deleted");
    } else {
        $result_data = array("status" => false, "deleted" => $nadd, "message" => "No Members Deleted");
    }
    echo json_encode($result_data);
}

function ChangeStatus($conn)
{
    extract($_POST);
    $query = "update members set members.Status = '$status' WHERE members.Member_Id='$member'";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $result_data = array("status" => true, "message" => "Member Status Changed");
    } else {
        $result_data = array("status" => false, "message" => "Cannot Change Member Status");
    }

    echo json_encode($result_data);
}
//fetch data

function getMemberInfo($conn)
{
    extract($_POST);
    $query = "call getMemberInfo('$member_id')";
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

function fetch($conn)
{
    extract($_POST);
    $query = "SELECT * FROM members WHERE members.Member_Id = '$member_id'";
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
function getColumns($conn)
{
    $query = "SELECT `Member_Id`, `FirstName`, `SecondName`, `Surname`, `Nickname`, `Gender`, `NationalID`, `Phone`, `Email`, `Address`, `Registered_Date`, `MemberType`, `Status`,`Modified_date` from members WHERE members.Member_Id='#'";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $data = [];
        $row = $result->fetch_assoc();
        while ($column = $result->fetch_field()) {
            $data[] = $column->name;
        }

        $result_data = array("status" => true, "message" => $data);

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
            $myquery = "call member_f('" . $row['ID'] . "','$opt')";
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

function generate_users($conn)
{
    $query = "SELECT employee_id FROM employee ORDER BY employee_id ASC";
    $result = $conn->query($query);
    $employee_id = '';

    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employee_id = $row['employee_id'];
            }
            $employee_id++;
        } else {
            $employee_id = 'G2101';
        }

    }

    return $employee_id;

}
function fetch_emp_info($conn)
{
    extract($_POST);
    $query = "SELECT employee.employee_id, employee.name, emp_type.name as emp_type, employee.gender, employee.email, employee.contact, district.name as `address`, employee.photo, employee.status FROM `employee` JOIN emp_type on employee.emp_type=emp_type.id JOIN district on employee.address=district.id WHERE employee.employee_id = '$employee_id'";
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

function fill_specific_employee($conn)
{
    $type = $_SESSION['jst_user_type'];
    $employee_id = $_SESSION['jst_employee_id'];

    if ($type == 'Admin') {
        $type = "All";
    }

    $query = "call fill_specific_employee('$type','$employee_id')";
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
        } else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function load_projects($conn)
{
    $type = $_SESSION['jst_user_type'];
    $employee_id = $_SESSION['jst_employee_id'];

    if ($type == 'Admin') {
        $query = "SELECT employee.employee_id, employee.name, employee.photo FROM `employee` WHERE 1";
    } else {
        $query = "SELECT employee.employee_id, employee.name, employee.photo FROM `employee` WHERE employee.employee_id='$employee_id'";
    }

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
        } else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function load_employees_with_project($conn)
{
    extract($_POST);

    $query = "SELECT project.project_id, project.project_name, project.project_type, project.price, project.cost, project.min_discount, project.start_date, project.end_date, project.status FROM assigns JOIN project on assigns.project_id=project.project_id  where assigns.employee_id='$employee_id' ORDER by project.start_date DESC";
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
        } else {
            $result_data = array("status" => false, "message" => "Data Not Found");
        }
    } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

if (isset($action) && isset($_SESSION['jst_username'])) {
    $action($conn);
} else {
    echo json_encode(array("status" => false, "message" => $_SESSION['jst_username']));
}
