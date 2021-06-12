<?php
header("Content-Type: application/json");
include("../commons/database.php");
    extract($_POST);
    $userId = NULL;

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
   

?>