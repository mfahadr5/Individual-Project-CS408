<?php

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
    <title>Recruiter panel - GradHunt</title>
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
                    <h1>Recruiter Home</h1>
                </div>
            </div>

            <div class="page-header float-right">
                <div class="page-title">
                    <h1><?php if(!$isLoggedIn) echo ""; else echo "Welcome, ", $userName ?></h1>
                </div>
            </div>

        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="card" style="width: 15rem;">
                                <img class="card-img-top" src="https://images.saymedia-content.com/.image/c_limit%2Ccs_srgb%2Cq_auto:good%2Cw_425/MTc0NDU4MDYxMjMzMDcxNDY0/top-5-tips-for-taking-reading-tests.webp">
                                <div class="card-body">
                                    <h5 class="card-title">Graduate's Test categories & questions</h5>
                                    <p class="card-text">Recruiters can add and edit test categories and the questions in each of the test categories. </p>
                                    <a href="test_category.php" class="btn btn-success" style="border-radius: 18px; background-color: purple; border: purple; width: 200px; height: 30px;">Add/Edit Test Category</a><br>
                                    <br>
                                    <a href="add_edit_test_questions.php" class="btn btn-success" style="border-radius: 18px; background-color: purple; border: purple; width: 200px; height: 30px;">Add/Edit Test Questions</a>
                                </div>
                            </div>

                            <div class="card" style="width: 15rem;">
                                <img class="card-img-top" src="https://news.liverpool.ac.uk/wp-content/uploads/2020/09/results.jpeg">
                                <div class="card-body">
                                    <h5 class="card-title">Test & Results</h5>
                                    <p class="card-text">All Graduates who have performed the tests results can be found here. </p>
                                    <a href="old-test-results.php" class="btn btn-success" style="border-radius: 18px; background-color: purple; border: purple; width: 150px; height: 30px;">All Test Results</a>
                                </div>
                            </div>

                            <div class="card" style="width: 15rem;">
                                <img class="card-img-top" src="https://img.resized.co/breaking-news/eyJkYXRhIjoie1widXJsXCI6XCJodHRwczpcXFwvXFxcL2ltYWdlcy5icmVha2luZ25ld3MuaWVcXFwvcHJvZFxcXC9sZWdhY3lzM1xcXC9tZWRpYVxcXC9pbWFnZXNcXFwvalxcXC9Kb2JTZWFyY2hJbk5ld3NwYXBlcmlTdG9ja0dlbmVyaWNfeGxhcmdlLmpwZ1wiLFwid2lkdGhcIjpudWxsLFwiaGVpZ2h0XCI6NDIwLFwiZGVmYXVsdFwiOlwiaHR0cHM6XFxcL1xcXC93d3cuYnJlYWtpbmduZXdzLmllXFxcL2ltYWdlc1xcXC9uby1pbWFnZS5wbmdcIixcIm9wdGlvbnNcIjpbXX0iLCJoYXNoIjoiYzQyNzRjMjBjNTMzMDFlOWYxNjMyZmRjMmE0MTViODA3MGFhYzI2OSJ9/jobsearchinnewspaperistockgeneric-xlarge.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Job Listings</h5>
                                    <p class="card-text">Recruiters can add/edit available graduate job positions for students to apply. </p>
                                    <a href="jobs.php" class="btn btn-success" style="border-radius: 18px; background-color: purple; border: purple; width: 150px; height: 30px; ">Jobs Listings</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!--/.col-->

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
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
