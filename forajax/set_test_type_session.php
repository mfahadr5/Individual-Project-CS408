<?php
session_start();
require_once "../dbLogin.php";

$test_category = $_GET["test_category"];
$_SESSION["test_category"] = $test_category;
$res = mysqli_query($conn, "select * from test_category where category = '$test_category' ");

while ($row = mysqli_fetch_array($res)){
    $_SESSION["test_time"] = $row["test_time_minutes"];
}
$date = date("Y-m-d H:i:s");

$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+$_SESSION[test_time] minutes"));
$_SESSION["end_start"] = "yes";

?>