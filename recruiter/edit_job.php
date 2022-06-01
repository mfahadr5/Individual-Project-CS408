<?php
// Include loginUser file
require_once "../dbLogin.php";
$id = $_GET["id"];
$result = mysqli_query($conn, "select * from jobs where id = $id");
while ($row=mysqli_fetch_array($result)){
    $company = $row["company"];
    $jobTitle = $row["job_title"];
    $jobLocation = $row["job_location"];
    $jobLink = $row["job_link"];
    $jobComp = $row["job_comp"];
    $jobDesc = $row["job_desc"];
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
                    <h1>Edit job Details</h1>
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
                                        <div class="card-header"><strong>Edit job Details</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">Edit Company Name</label><input type="text" name="companyname" placeholder="Add Company Name" class="form-control" value="<?php echo $company; ?>"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Edit Job Title</label><input type="text" placeholder="Add Job Title" class="form-control" name="jobtitle" value="<?php echo $jobTitle; ?>"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Edit Job Location</label><input type="text" placeholder="Add Job Location" class="form-control" name="joblocation" value="<?php echo $jobLocation; ?>"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Edit Job Link</label><input type="text" placeholder="Add Job Link" class="form-control" name="joblink" value="<?php echo $jobLink; ?>"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Edit Job compensation</label><input type="text" placeholder="Add Job compensation" class="form-control" name="jobcomp" value="<?php echo $jobComp; ?>"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Edit Job Description</label><input type="text" placeholder="Add Job Description" class="form-control" name="jobdesc" value="<?php echo $jobDesc; ?>"></div>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Update Job Position" class="btn btn-success" style="border-radius: 18px; background-color: purple; border: purple;"

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
        mysqli_query($conn,"update jobs set company='$_POST[companyname]', job_title='$_POST[jobtitle]', job_location='$_POST[joblocation]', job_link='$_POST[joblink]', job_comp='$_POST[jobcomp]', job_desc='$_POST[jobdesc]' where id=$id") or die(mysqli_error($conn));
        ?>
        <script type="text/javascript">
            window.location = "jobs.php";
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
