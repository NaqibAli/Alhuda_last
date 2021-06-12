<?php

session_start();
header("Location: login");
include("commons/database.php");
$username = $_SESSION['jst_username'];
$query = "UPDATE users SET users.log='Offline',users.lastseen=CURRENT_TIMESTAMP() WHERE users.username = '$username'";
$conn->query($query);
session_unset();
session_destroy();                
?>