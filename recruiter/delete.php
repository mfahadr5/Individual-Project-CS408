<?php

// Include loginUser file
require_once "../dbLogin.php";
$id = $_GET["id"];
mysqli_query($conn, "delete from test_category where id = $id")
?>

<script type="text/javascript">
    window.location = "test_category.php";
</script>
