<?php
// Include loginUser file
require_once "../dbLogin.php";
$id = $_GET["id"];
$result = mysqli_query($conn, "select * from test_category where id = $id");
while ($row=mysqli_fetch_array($result)){
    $test_category = $row["category"];
    $test_time = $row["test_time_minutes"];
}

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then display user name
$isLoggedIn = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true);

if($isLoggedIn){
    $userName = $_SESSION["name"];
}

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Exam - GradHunt</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel" style="background-color: purple">
    <nav class="navbar navbar-expand-sm navbar-default" style="background-color: purple">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="recruiterHome.php"><img src="images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href=""><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="recruiterHome.php"> <i class="menu-icon fa fa-home"></i>Home</a>
                </li>

                <li>
                    <a href="test_category.php"> <i class="menu-icon fa fa-pencil"></i>Add and Edit Test categories</a>
                </li>

                <li>
                    <a href="add_edit_test_questions.php"> <i class="menu-icon fa fa-pencil"></i>Add and Edit Questions</a>
                </li>

                <li>
                    <a href="old-test-results.php"> <i class="menu-icon fa fa-list"></i>All Student's Test Results</a>
                </li>

                <li>
                    <a href="jobs.php"> <i class="menu-icon fa fa-briefcase"></i>Add and Edit Job Listings</a>
                </li>

                <li>
                    <a href="../logout.php"> <i class="menu-icon fa fa-sign-out"></i>LogOut </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="https://www.shareicon.net/data/512x512/2016/02/07/715342_people_512x512.png" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">

                        <a class="nav-link" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>


            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Test Categories</h1>
                </div>
            </div>

            <div class="page-header float-right">
                <div class="page-title">
                    <h1><?php if(!$isLoggedIn) echo ""; else echo $userName ?></h1>
                </div>
            </div>


        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form name="form1" action="" method="post">
                            <div class="card-body">

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header"><strong>Edit Test Categories</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">New Test Category</label><input type="text" name="testname" placeholder="Add Test Category" class="form-control" value="<?php echo $test_category; ?>"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Test Time In Minutes</label><input type="text" placeholder="Test Time in Minutes" class="form-control" name="testtime" value="<?php echo $test_time; ?>"></div>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Update Test" class="btn btn-success" style="border-radius: 18px; background-color: purple; border: purple;"

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col-->


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <?php
    If(isset($_POST["submit1"])){
        mysqli_query($conn,"update test_category set category='$_POST[testname]', test_time_minutes='$_POST[testtime]' where id=$id") or die(mysqli_error($conn));
        ?>
        <script type="text/javascript">
            window.location = "test_category.php";
        </script>
        <?php
    }
    ?>

</div><!-- /#right-panel -->
<!-- Right Panel -->


<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
