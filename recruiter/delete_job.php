<?php

// Include loginUser file
require_once "../dbLogin.php";
$id = $_GET["id"];
mysqli_query($conn, "delete from jobs where id = $id")
?>

<script type="text/javascript">
    window.location = "jobs.php";
</script>
