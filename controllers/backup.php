<?php

if (isset($_POST['action'])) {
    $_POST['action']();
}

function getAllFiles()
{
    $files_arr = [];
    $files = array_diff(scandir("../downloads/database/" . date("Y") . '/' . date("F")), array('.', '..'));
    $i = 1;
    $files = array_reverse($files);
    foreach ($files as $f) {
        $files_arr[] = ["filename" => $f, "year" => date("Y"), "month" => date("F")];
    }
    echo json_encode($files_arr);

}
function deletefile()
{
    extract($_POST);
    unlink("../downloads/database/$year/$month/$filename");
    echo json_encode(array("message" => "File deleted"));
}
function getYears()
{
    $years = array_diff(scandir("../downloads/database"), array('.', '..'));
    $years = array_reverse($years);
    echo json_encode($years);
}
function getMonths()
{
    extract($_POST);
    $months = array_diff(scandir("../downloads/database/$year"), array('.', '..'));
    $months = array_reverse($months);
    echo json_encode($months);
}

function getSpecificFiles(){
    extract($_POST);
    $files_arr = [];
    $files = array_diff(scandir("../downloads/database/$year/$month"), array('.', '..'));
    $i = 1;
    $files = array_reverse($files);
    foreach ($files as $f) {
        $files_arr[] = ["filename" => $f, "year" => date("Y"), "month" => date("F")];
    }
    echo json_encode($files_arr);
}


?>