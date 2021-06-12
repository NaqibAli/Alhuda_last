<?php

header("Content-Type: application/json");
include("../commons/database.php");
$action = $_POST['action'];


function insert($conn)
{
    extract($_POST);

    $result_info = '';
    $userId = $_SESSION['jst_user_id'];
  
  
    $data = [];

    $id= generate_users($conn);
    
    $photoName = $id.'_photo.png';
   
    
    if (isset($_FILES['photo']['name'])) {
         if ($_FILES['photo']['error'] > 0) {
            $data = array('status' => false, 'Message' => $_FILES['photo']['error']);
        } else {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/images/' . $photoName);
        }
    } else {
        $photoName = 'default_emp.jpg';
    }
    $name = $conn->real_escape_string($name);

    $query = "CALL 	employee_sp('$id','$name','$emp_type_id','$gender','$email','$tel','$address_id','$photoName','$status','$userId','$user_date','$action')";
    $result = $conn->query($query);

    if ($result) {
        $Message = $result->fetch_assoc();
        $data = array();
        if ($Message['Message'] == 'inserted') {
            $data = array('status' => true, 'message' => 'New Employee has been saved successfully');
        } 
    } else {
        $data = array('status' => false, 'message' => $conn->error);
    }

    echo json_encode($data);
}

function update($conn)
{
    extract($_POST);

    $result_info = '';
    $userId = $_SESSION['jst_user_id'];
   
  
    $data = [];
    
    $photoName = $employee_id.'_photo.png';
   
    
    if (isset($_FILES['photo']['name'])) {
         if ($_FILES['photo']['error'] > 0) {
            $data = array('status' => false, 'Message' => $_FILES['photo']['error']);
        } else {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/images/' . $photoName);
        }
    } else {
        $photoName = $imgName;
    }
    $name = $conn->real_escape_string($name);

    $query = "CALL 	employee_sp('$employee_id','$name','$emp_type_id','$gender','$email','$tel','$address_id','$photoName','$status','$userId','$user_date','$action')";
    $result = $conn->query($query);

    if ($result) {
        $Message = $result->fetch_assoc();
        $data = array();
        if ($Message['Message'] == 'updated') {
            $data = array('status' => true, 'message' => 'New Employee has been updated successfully');
        } 
    } else {
        $data = array('status' => false, 'message' => $conn->error);
    }

    echo json_encode($data);
}



//delete single district
function delete($conn) {
    extract($_POST);
    $query = "DELETE FROM employee WHERE employee_id = '$employee_id'";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
   
        $result_data = array("status" => true, "message" => "Employee has been deleted successfully");
    }
    else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}



//fetch data

function fetch($conn) {
    extract($_POST);
    $query = "SELECT * FROM employee WHERE employee_id = '$employee_id'";
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
        }
        else {
            $employee_id = 'EMP0001';
        }
        
       
    }
  
    return $employee_id;  
    
}
function fetch_emp_info($conn) {
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

function fill_specific_employee($conn) { 
    $type = $_SESSION['jst_user_type'];
    $employee_id = $_SESSION['jst_employee_id'];

    if ($type=='Admin') {
        $type="All";
    }

    
    $query = "call fill_specific_employee('$type','$employee_id')";
    $result = $conn->query($query);
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = [];
            while($row = $result->fetch_assoc()){
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

function load_projects($conn) {
     $type = $_SESSION['jst_user_type'];
    $employee_id = $_SESSION['jst_employee_id'];

    if ($type=='Admin') {
        $query = "SELECT employee.employee_id, employee.name, employee.photo FROM `employee` WHERE 1";
    }else {
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

function load_employees_with_project($conn) {
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