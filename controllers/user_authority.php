<?php

header("Content-Type: application/json");
include("../commons/database.php");
$action = $_POST['action'];

//insert 

function update($conn)
{
    extract($_POST);
    $userId = $_SESSION['jst_user_id'];
    $result_info = '';
   
    if ($sub_menu==0) {
        $query = "CALL user_authorize_sp('$username','$sub_menu','$userId','0','$action')";
        $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);
        $result = $conn->query($query);
        $result_data = [];
        if ($result) {
            $result_data = array('status' => true, 'message' => 'User Permissions has been saved successfully ');
            
        } 
        else {
            $result_data = array('status' => false, 'message' => $conn->error);
        }

    }else {
         $count= count($sub_menu);
         for ($i = 0; $i < $count; $i++) {
                $query = "CALL user_authorize_sp('$username','$sub_menu[$i]','$userId','$i','$action')";
                $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);
                $result = $conn->query($query);
                $result_data = [];
                if ($result) {
                    $result_data = array('status' => true, 'message' => 'User Permissions has been saved successfully ');
                    
                } 
                else {
                    $result_data = array('status' => false, 'message' => $conn->error);
                }

            }
    }
    

    echo json_encode($result_data);
}




function update_Settings($conn)
{
    extract($_POST);

    $result_info = '';
    $userId = $_SESSION['jst_user_id'];
    $data = [];
    
    
   
    $logo_nature = 'logo.png';
    if (isset($_FILES['logo_nature']['name'])) {
         if ($_FILES['logo_nature']['error'] > 0) {
            $data = array('status' => false, 'Message' => $_FILES['logo_nature']['error']);
        } else {
            move_uploaded_file($_FILES['logo_nature']['tmp_name'], '../uploads/images/system/'. $logo_nature);
        }
    }else {
        $logo_nature = $logo_nature_h;
    }

    $logo_white = 'logo_white.png';
    if (isset($_FILES['logo_white']['name'])) {
         if ($_FILES['logo_white']['error'] > 0) {
            $data = array('status' => false, 'Message' => $_FILES['logo_white']['error']);
        } else {
            move_uploaded_file($_FILES['logo_white']['tmp_name'], '../uploads/images/system/'. $logo_white);
        }
    }else {
        $logo_white = $logo_white_h;
    }

    $fav_icon_nature = 'fav.png';
    if (isset($_FILES['fav_icon_nature']['name'])) {
         if ($_FILES['fav_icon_nature']['error'] > 0) {
            $data = array('status' => false, 'Message' => $_FILES['fav_icon_nature']['error']);
        } else {
            move_uploaded_file($_FILES['fav_icon_nature']['tmp_name'], '../uploads/images/system/'. $fav_icon_nature);
        }
    }else {
        $fav_icon_nature = $fav_icon_nature_h;
    }

    $fav_icon_white = 'fav_white.png';
    if (isset($_FILES['fav_icon_white']['name'])) {
         if ($_FILES['fav_icon_white']['error'] > 0) {
            $data = array('status' => false, 'Message' => $_FILES['fav_icon_white']['error']);
        } else {
            move_uploaded_file($_FILES['fav_icon_white']['tmp_name'], '../uploads/images/system/'. $fav_icon_white);
        }
    }else {
        $fav_icon_white = $fav_icon_white_h;
    }


   
   $background1 = '1.png';
    if (isset($_FILES['background1']['name'])) {
        if ($_FILES['background1']['error'] > 0) {
        $data = array('status' => false, 'Message' => $_FILES['background1']['error']);
    } else {
        move_uploaded_file($_FILES['background1']['tmp_name'], '../uploads/images/system/1.png');
    }
        } else {
        $background1 = $background1_h;
    }

    $background2 = '2.png';
    if (isset($_FILES['background2']['name'])) {
        if ($_FILES['background2']['error'] > 0) {
        $data = array('status' => false, 'Message' => $_FILES['background2']['error']);
    } else {
        move_uploaded_file($_FILES['background2']['tmp_name'], '../uploads/images/system/2.png');
    }
    } else {
    $background2 = $background2_h;
    }

    $background3 = '3.png';
    if (isset($_FILES['background3']['name'])) {
        if ($_FILES['background3']['error'] > 0) {
        $data = array('status' => false, 'Message' => $_FILES['background3']['error']);
    } else {
        move_uploaded_file($_FILES['background3']['tmp_name'], '../uploads/images/system/3.png');
    }
    } else {
    $background3 = $background3_h;
    }

    $background4 = '4.png';
    if (isset($_FILES['background4']['name'])) {
        if ($_FILES['background4']['error'] > 0) {
        $data = array('status' => false, 'Message' => $_FILES['background4']['error']);
    } else {
        move_uploaded_file($_FILES['background4']['tmp_name'], '../uploads/images/system/4.png');
    }
    } else {
    $background4 = $background4_h;
    }

    
    $title = $conn->real_escape_string($title);
    $head = $conn->real_escape_string($head);
    $body = $conn->real_escape_string($body);
    $footer = $conn->real_escape_string($footer);

    $query = "CALL 	settings_sp('1','$title','$body','$head','$footer','$fav_icon_nature','$fav_icon_white','$logo_nature','$logo_white','$background1','$background2','$background3','$background4','update')";
  
    
    $result = $conn->query($query);

    if ($result) {
        $Message = $result->fetch_assoc();
        $data = array();
        if ($Message['Message'] == 'updated') {
            $data = array('status' => true, 'message' => 'New Settings has been updated successfully');
        } 
    } else {
        $data = array('status' => false, 'message' => $conn->error);
    }

    echo json_encode($data);
}


function fetch($conn) {
    extract($_POST);

    $query = "call fill_user_authority_sp('$user_id')";
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