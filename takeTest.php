<?php
// Include loginUser file
require_once "dbLogin.php";

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
    <title>Graduate panel - GradHunt</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="recruiter/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="recruiter/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="recruiter/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="recruiter/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="recruiter/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="recruiter/assets/css/style.css">
    <link rel="stylesheet" href="style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>

<body>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel" style="background-color: #0e6498">
    <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #0e6498">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="homePage.php"><img src="recruiter/images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="recruiter/images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="homePage.php"> <i class="menu-icon fa fa-home"></i>Home</a>
                </li>

                <li>
                    <a href="myProfile.php"> <i class="menu-icon fa fa-user"></i>Profile</a>
                </li>

                <li>
                    <a href="takeTest.php"> <i class="menu-icon fa fa-lightbulb-o"></i>Tests</a>
                </li>

                <li>
                    <a href="old_test_results.php"> <i class="menu-icon fa fa-list"></i>Test Results</a>
                </li>

                <li>
                    <a href="jobListings.php"> <i class="menu-icon fa fa-briefcase"></i>Job Listings</a>
                </li>

                <li>
                    <a href="logout.php"> <i class="menu-icon fa fa-close"></i>LogOut</a>
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

                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
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
                    <h1>Take our Psychometric, Logical & Numerical test</h1>
                </div>
            </div>

            <div class="page-header float-right">
                <div class="page-title">
                    <h1><?php if(!$isLoggedIn) echo ""; else echo $userName; ?></h1>
                </div>
            </div>
        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="font-size: medium;">
                            Take our Psychometric test from which majority of companies leverage in the first stage.
                            This eliminates the need to complete several tests for different companies and saves precious time for students

                        </div>

                        <div class="card-body">

                            <?php
                            $res = mysqli_query($conn, "select * from test_category");
                            while($row = mysqli_fetch_array($res)){
                            ?>
                            <input type="button" class="btn btn-success form-control" value="<?php echo $row["category"]; ?>" style="border-radius: 18px; margin-top: 10px; background-color: #0e6498; color: white; border: #0e6498" onclick="set_test_type_session(this.value);">

                            <?php

                            }
                            ?>

                        </div>

                    </div>
                </div>
                <!--/.col-->

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<script type="text/javascript">
    function set_test_type_session(test_category) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET", "forajax/set_test_type_session.php?test_category=" + test_category, true);
        xmlhttp.send(null);
    }
</script>


<script src="recruiter/vendors/jquery/dist/jquery.min.js"></script>
<script src="recruiter/vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="recruiter/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="recruiter/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="recruiter/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="recruiter/assets/js/main.js"></script>
</body>
</html>

