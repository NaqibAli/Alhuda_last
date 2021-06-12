<?php

header("Content-Type: application/json");
include("../commons/database.php");
$action = $_POST['action'];


// General Insertion and updatition of Single row data
function insert_and_update($conn){
    extract($_POST);
    $userId = $_SESSION['jst_user_id'];

    $count = count($columns);
    
    $query = "CALL $procedure(";
    for ($i=0; $i <$count ; $i++) { 

        $query = $query  . "'$columns[$i]'"; 
        $query =  $query . ',' ;
       
        
    }
    $query = $query . "'$userId'" . ',';
    $query = $query . "'$type'";
    $query = $query . ")";
    $result = $conn->query($query);
    if ($result) {
        $Message = $result->fetch_assoc();
        if ($Message['Message'] == 'updated') {
            $data = array('status' => true, 'message' => 'Row Updated');
        }else {
            $data = array('status' => true, 'message' => 'New Row Inserted');
        } 
    } else {
        $data = array('status' => false, 'message' => $conn->error);
    }

    echo json_encode($data);
   
   
}


// General Read All Data
function read($conn) {
    extract($_POST);
   
    $query = "CALL $procedure('$id')";
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


// General Fill Data
function fill($conn) { 
    extract($_POST);
    $query = "call $procedure('$id')";
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
            $result_data = array("status" => false, "message" => "Not Found");
        }
    }
    else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}



function delete($conn) {
    extract($_POST);
    $query = "call $procedure('$id') ";
    $result = $conn->query($query);
    $result_data = array();

    if ($result) {
        $row = $result->fetch_assoc();
        if ($row['Message']=='success') {
            $result_data = array("status" => true, "message" => "deleted successfully");
      
        }else {
            $result_data = array("status" => false, "message" => $row['Message']);
        
        }
        
     } else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function fill_two($conn) { 
    extract($_POST);
    $query = "call $procedure('$id1','$id2')";
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
            $result_data = array("status" => false, "message" => "Not Found");
        }
    }
    else {
        $result_data = array("status" => false, "message" => $conn->error);
    }

    echo json_encode($result_data);
}

function generate($conn) {
    extract($_POST);
    $query = "CALL $procedure('')";
    $result = $conn->query($query);
    $id = '';
    $result_data = array();
    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
            }
            $orgianl = $id;
            $id = substr($id, $start);
            if ($max>$id) {
               
                $orgianl++;
                $id=$orgianl;
            }else {
                $id++;
                $id= $abbr . $id;
            }
           
        
            
        }
        else {
            $id = $default;
        }
        $result_data = array("status" => true, "message" => $id);
       
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