<?php
// Include loginUser file
require_once "../dbLogin.php";

// Initialize the session
session_start();

$total_que = 0;
$res1 = mysqli_query($conn, "select * from questions where category='$_SESSION[test_category]' ");
$total_que = mysqli_num_rows($res1);
echo $total_que;


?>