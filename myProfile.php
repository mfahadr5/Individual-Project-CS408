<?php
// Include loginUser file
require_once "dbLogin.php";

// Initialize the session
session_start();
// Check if the user is already logged in, if yes then display user name
$isLoggedIn = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true);
$email = "";
if($isLoggedIn){
    $userName = $_SESSION["name"];
    $email = $_SESSION["email"];
}else{
    header("location: Login.php");
    exit;
}

$fullName = $mobileNumber = $address = $currentInstituition = $degree = "";
$gradDate = $expecDeg = $profDescip = $interests = "";

$result1 = mysqli_query($conn, "select * from users_details where email = '$email' ");
while($row1 = mysqli_fetch_array($result1)){
    $fullName = $row1["full_name"];
    $mobileNumber = $row1["mobile_number"];
    $address = $row1["address"];
    $currentInstituition = $row1["current_institution"];
    $degree = $row1["degree"];
    $gradDate = $row1["graduation_date"];
    $expecDeg = $row1["expected_degree"];
    $profDescip = $row1["profile_description"];
    $interests = $row1["interests"];

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
    <title>Profile - GradHunt</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css">-->

    <link rel="stylesheet" href="recruiter/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="recruiter/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="recruiter/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="recruiter/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="recruiter/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="recruiter/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="profileStyle.css">


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
                    <h1>Your Profile</h1>
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
                        <div class="card-body">

                            <section>

                                <div class="container" style="margin-top: 30px;">
                                    <div class="profile-head">
                                        <div class="col-md- col-sm-4 col-xs-12">
                                            <img src="https://www.shareicon.net/data/512x512/2016/02/07/715342_people_512x512.png" class="img-responsive" />
                                            <span class="fa fa-user-alt"></span>
                                        </div>


                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <!--All below stuffs should come from DB table-->

                                            <h5><?php if(!$isLoggedIn) echo ""; else echo $userName ?></h5>
                                            <ul>
                                                <li><span class="fa fa-graduation-cap"></span><?php if($currentInstituition != "") echo $currentInstituition; else echo "*Empty field*"?></li>
                                                <li><span class="fa fa-certificate"></span><?php if($degree != "") echo $degree; else echo "*Empty field*"?></li>
                                                <li><span class="fa fa-clock-o"></span><?php if($gradDate != "") echo $gradDate; else echo "*Empty field*"?></li>
                                                <li><span class="fa fa-map-marker"></span><?php if($address != "") echo $address; else echo "*Empty field*"?></li>
                                                <li><span class="fa fa-mobile"></span><?php if($mobileNumber != "") echo $mobileNumber; else echo "*Empty field*"?></li>
                                                <li><span class="fa fa-envelope-o"></span><?php if(!$isLoggedIn) echo ""; else echo $email ?></li>

                                            </ul>
                                        </div>

                                    </div><!--profile-head close-->
                                </div><!--container close-->

                                <br>
                                <div id="sticky" class="container">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-menu" role="tablist" id="profile-tab-item">
                                        <li class="active">
                                            <a href="#profile" role="tab" data-toggle="tab">
                                                <i class="fa fa-male"></i> Profile
                                            </a>
                                        </li>
                                        <li class="edit-profile">
                                            <a href="#change" role="tab" data-toggle="tab">
                                                <i class="fa fa-key"></i> Edit Profile
                                            </a>
                                        </li>
                                    </ul>
                                    <!--nav-tabs close-->



                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="profile">
                                            <div class="container">
                                                <div class="col-sm-11" style="float:left;">
                                                    <div class="hve-pro">
                                                        <p><?php if($profDescip != "") echo $profDescip; else echo "*Empty field*"?></p>
                                                    </div><!--hve-pro close-->
                                                </div><!--col-sm-12 close-->
                                                <br clear="all" />
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4 class="pro-title">Details:</h4>
                                                    </div><!--col-md-12 close-->


                                                    <div class="col-md-6">

                                                        <div class="table-responsive responsiv-table">
                                                            <table class="table bio-table">
                                                                <tbody>
                                                                <tr>
                                                                    <td>Full Name</td>
                                                                    <td>: <?php if($fullName != "") echo $fullName; else echo "*Empty field*"?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Degree</td>
                                                                    <td>: <?php if($degree != "") echo $degree; else echo "*Empty field*"?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email Id</td>
                                                                    <td>: <?php echo $email; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td>: <?php if($address != "") echo $address; else echo "*Empty field*"?></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div><!--table-responsive close-->
                                                    </div><!--col-md-6 close-->

                                                    <div class="col-md-6">

                                                        <div class="table-responsive responsiv-table">
                                                            <table class="table bio-table">
                                                                <tbody>

                                                                <tr>
                                                                    <td>Mobile</td>
                                                                    <td>: <?php if($mobileNumber != "") echo $mobileNumber; else echo "*Empty field*"?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Graduation Year:</td>
                                                                    <td>: <?php if($gradDate != "") echo $gradDate; else echo "*Empty field*"?></td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div><!--table-responsive close-->
                                                    </div><!--col-md-6 close-->
                                                </div><!--row close-->

                                                </br>
                                                <!--Experience Bar-->
                                                <div class="bs-callout bs-callout-danger">
                                                    <h4>Language and Platform Skills</h4>
                                                    <ul class="list-group">
                                                        <a class="list-group-item inactive-link" href="#">
                                                            <div class="progress">
                                                                <div data-placement="top" style="width: 80%;"
                                                                     aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-success">
                                                                    <span class="sr-only">80%</span>
                                                                    <span class="progress-type">Java/ JavaEE/ Spring Framework </span>
                                                                </div>
                                                            </div>
                                                            &nbsp;

                                                            <div class="progress">
                                                                <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                                                    <span class="sr-only">70%</span>
                                                                    <span class="progress-type">PHP/ Lamp Stack</span>
                                                                </div>
                                                            </div>
                                                            &nbsp;

                                                            <div class="progress">
                                                                <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                                                    <span class="sr-only">70%</span>
                                                                    <span class="progress-type">JavaScript/ NodeJS/ MEAN stack </span>
                                                                </div>
                                                            </div>
                                                            &nbsp;

                                                            <div class="progress">
                                                                <div data-placement="top" style="width: 65%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-warning">
                                                                    <span class="sr-only">65%</span>
                                                                    <span class="progress-type">Python/ Numpy/ Scipy</span>
                                                                </div>
                                                            </div>
                                                            &nbsp;

                                                            <div class="progress">
                                                                <div data-placement="top" style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                                                                    <span class="sr-only">60%</span>
                                                                    <span class="progress-type">C</span>
                                                                </div>
                                                            </div>
                                                            &nbsp;

                                                            <div class="progress">
                                                                <div data-placement="top" style="width: 50%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                                                                    <span class="sr-only">50%</span>
                                                                    <span class="progress-type">C++</span>
                                                                </div>
                                                            </div>
                                                            &nbsp;

                                                            <div class="progress">
                                                                <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                                                                    <span class="sr-only">10%</span>
                                                                    <span class="progress-type">Go</span>
                                                                </div>
                                                            </div>

                                                            <div class="progress-meter" style="display: -webkit-box; min-height: 15px; border-bottom: 2px solid rgb(160, 160, 160); margin-bottom: 15px;">
                                                                <div style="width: 25%;" class="meter meter-left"><span class="meter-text">Beginner</span></div>
                                                                <div style="width: 25%;" class="meter meter-left"><span class="meter-text">Moderate</span></div>
                                                                <div style="width: 25%;" class="meter meter-right"><span class="meter-text">Intermediate</span></div>
                                                                <div style="width: 25%;" class="meter meter-right"><span class="meter-text">Expert</span></div>
                                                            </div>
                                                        </a>
                                                    </ul>
                                                </div>
                                                <!--Experience Bar close-->

                                            </div><!--container close-->
                                        </div><!--tab-pane close-->

                                        <div class="tab-pane fade" id="change">
                                            <div class="container fom-main">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h2 class="register">Edit Your Profile</h2>
                                                    </div><!--col-sm-12 close-->

                                                </div><!--row close-->
                                                <br />
                                                <div class="row">

                                                    <form name="form1" class="form-horizontal main_form text-left" action="" method="post"  enctype="multipart/form-data">
                                                        <fieldset>

                                                            <!--Full name-->
                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Full Name</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input  name="full_name" placeholder="John Smith" class="form-control" value="<?php if($fullName != "") echo $fullName; else echo "*Empty field*"?>"  type="text">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Mobile Number-->
                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Mobile Number</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input name="mobile_number" placeholder="+44 777 999 0000" class="form-control" value="<?php if($mobileNumber != "") echo $mobileNumber; else echo "*Empty field*"?>" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Address-->
                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Full Address and Country</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input name="address" placeholder="10 Downing St, Westminster, London SW1A 2AA" class="form-control" value="<?php if($address != "") echo $address; else echo "*Empty field*"?>" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Current Institution-->

                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Current Institution</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input name="current_institution" placeholder="University of Strathclyde" class="form-control" value="<?php if($currentInstituition != "") echo $currentInstituition; else echo "*Empty field*"?>" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Current Degree-->

                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Current Degree</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input name="degree" placeholder="BSc (Hons) Computer Science" class="form-control" value="<?php if($degree != "") echo $degree; else echo "*Empty field*"?>" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Graduation Month and Year-->

                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Graduation Month and Year</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input name="graduation_date" placeholder="June 2023" class="form-control" value="<?php if($gradDate != "") echo $gradDate; else echo "*Empty field*"?>" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Degree Classification-->

                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Degree Classification (Obtained/Predicted)</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input name="expected_degree" placeholder="2:1" class="form-control" value="<?php if($expecDeg != "") echo $expecDeg; else echo "*Empty field*"?>" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Profile Summary-->

                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Profile Summary</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <textarea class="form-control" name="profile_description" placeholder="Please provide a brief summary of yourself here (500 char. max)"><?php if($profDescip != "") echo $profDescip; else echo "*Empty field*"?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Text Area input-->

                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Your Interests</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <textarea class="form-control" name="interests" placeholder="Please provide a brief summary of your interests here (1000 char. max)"><?php if($interests != "") echo $interests; else echo "*Empty field*"?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Add your skills and corresponding level-->
                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Add your skills and corresponding level: </label>

                                                                <div class="controls">
                                                                    <form role="form" autocomplete="off">
                                                                        <div class="entry input-group col-md-5">
                                                                            <input class="form-control" name="skill1" type="text" placeholder="Java EE" />
                                                                            <select name="level1" class="form-control selectpicker" >
                                                                                <option>Beginner</option>
                                                                                <option>Moderate</option>
                                                                                <option>Intermediate</option>
                                                                                <option>Expert</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="entry input-group col-md-5">
                                                                            <input class="form-control" name="skill2" type="text" placeholder="JavaScript" />
                                                                            <select name="level2" class="form-control selectpicker" >
                                                                                <option>Beginner</option>
                                                                                <option>Moderate</option>
                                                                                <option>Intermediate</option>
                                                                                <option>Expert</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="entry input-group col-md-5">
                                                                            <input class="form-control" name="skill3" type="text" placeholder="SQL" />
                                                                            <select name="level3" class="form-control selectpicker" >
                                                                                <option>Beginner</option>
                                                                                <option>Moderate</option>
                                                                                <option>Intermediate</option>
                                                                                <option>Expert</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="entry input-group col-md-5">
                                                                            <input class="form-control" name="skill4" type="text" placeholder="MS Excel" />
                                                                            <select name="level4" class="form-control selectpicker" >
                                                                                <option>Beginner</option>
                                                                                <option>Moderate</option>
                                                                                <option>Intermediate</option>
                                                                                <option>Expert</option>
                                                                            </select>
                                                                        </div>

                                                                    </form>

                                                                </div>

                                                            </div>
                                                            <!--End of Add your skills and corresponding level-->

                                                            <!--Experience section-->
                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Most Recent Experience 1</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">Job Tile</label>
                                                                        <input class="company" name="title1" type="text" placeholder="Intern Astronaut" value=""/>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">Company</label>
                                                                        <input class="title" name="company1" type="text" placeholder="NASA"/>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">Start Date</label>
                                                                        <input type="date" name="start_date1" max="3000-12-31" min="1000-01-01" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">End Date</label>
                                                                        <input type="date" name="end_date1" max="3000-12-31" min="1000-01-01" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">Experience Summary</label>
                                                                        <textarea class="form-control" name="exp_desc1" placeholder="Please provide a brief summary of your experience here (1000 char. max)"></textarea>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="form-group col-md-12">
                                                                <label class="col-md-10 control-label">Most Recent Experience 2</label>
                                                                <div class="col-md-12 inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">Job Tile</label>
                                                                        <input class="form-control" name="title2" type="text" placeholder="Intern Astronaut" />
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">Company</label>
                                                                        <input class="form-control" name="company2" type="text" placeholder="NASA" />
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">Start Date</label>
                                                                        <input type="date" name="start_date2" max="3000-12-31" min="1000-01-01" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">End Date</label>
                                                                        <input type="date" name="end_date2" max="3000-12-31" min="1000-01-01" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-md-5 control-label">Experience Summary</label>
                                                                        <textarea class="form-control" name="exp_desc2" placeholder="Please provide a brief summary of your experience here (1000 char. max)"></textarea>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <!--Form Ends here-->

                                                            <!-- upload profile picture -->
                                                            <div class="col-md-12 text-left">
                                                                <div class="uplod-picture">
                                                                    <span class="btn btn-default uplod-file">
                                                                        Upload Photo <input type="file" />
                                                                    </span>

                                                                     <span class="btn btn-default uplod-file">
                                                                        Upload Resume <input type="file" />
                                                                    </span>
                                                                </div><!--uplod-picture close-->
                                                            </div><!--col-md-12 close-->
                                                            <!-- Button -->
                                                            <div class="form-group col-md-10">
                                                                <div class="col-md-6">
                                                                    <button type="submit" name="submit1" class="btn btn-warning submit-button" >Save</button>
                                                                    <button type="submit" class="btn btn-warning submit-button" >Cancel</button>

                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div><!--row close-->
                                            </div><!--container close -->
                                        </div><!--tab-pane close-->
                                    </div><!--tab-content close-->
                                </div><!--container close-->

                            </section><!--section close-->

                        </div>
                    </div>
                </div>
                <!--/.col-->


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<?php
if(isset($_POST["submit1"])){
    $loop = 0;
    $count = 0;

    //INSERT INTO `users_details` (`email`, `full_name`, `mobile_number`, `address`, `current_institution`, `degree`, `graduation_date`, `expected_degree`, `profile_description`, `interests`, `profile_picture`) VALUES ('mashrursahib@gmail.com', 'dsadsa asds', '', '', '', '', '', '', '', '', NULL)
    mysqli_query($conn, "insert into users_details values ('$email', '$_POST[full_name]', '$_POST[mobile_number]', '$_POST[address]', '$_POST[current_institution]', '$_POST[degree]', '$_POST[graduation_date]', '$_POST[expected_degree]', '$_POST[profile_description]', '$_POST[interests]', null) 
                                ON DUPLICATE KEY UPDATE    
                                full_name = '$_POST[full_name]',
                                  mobile_number = '$_POST[mobile_number]',
                                  address = '$_POST[address]',
                                  current_institution = '$_POST[current_institution]',
                                  degree = '$_POST[degree]',
                                  graduation_date = '$_POST[graduation_date]',
                                  expected_degree = '$_POST[expected_degree]',
                                  profile_description =  '$_POST[profile_description]',
                                  interests = '$_POST[interests]' ")
                                or die(mysqli_error($conn));

    /*user_experience*/
    mysqli_query($conn, "DELETE FROM user_experience WHERE email = '$email'") or die(mysqli_error($conn));

    mysqli_query($conn, "insert into user_experience values ('$email', '$_POST[title1]', '$_POST[company1]', '$_POST[start_date1]', '$_POST[end_date1]', '$_POST[exp_desc1]')") or die(mysqli_error($conn));
    mysqli_query($conn, "insert into user_experience values ('$email', '$_POST[title2]', '$_POST[company2]', '$_POST[start_date2]', '$_POST[end_date2]', '$_POST[exp_desc2]')") or die(mysqli_error($conn));


    /*user_skill*/
    mysqli_query($conn, "DELETE FROM user_skill WHERE email = '$email'") or die(mysqli_error($conn));

    mysqli_query($conn, "insert into user_skill values ('$email', '$_POST[skill1]', '$_POST[level1]')") or die(mysqli_error($conn));
    mysqli_query($conn, "insert into user_skill values ('$email', '$_POST[skill2]', '$_POST[level2]')") or die(mysqli_error($conn));
    mysqli_query($conn, "insert into user_skill values ('$email', '$_POST[skill3]', '$_POST[level3]')") or die(mysqli_error($conn));
    mysqli_query($conn, "insert into user_skill values ('$email', '$_POST[skill4]', '$_POST[level4]')") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        alert("Profile updated successfully!");
        window.location = "myProfile.php";
    </script>
    <?php
}
?>

<script type="text/javascript">
    //tab js//
    $(document).ready(function(e) {


        $('.form').find('input, textarea').on('keyup blur focus', function (e) {

            var $this = $(this),
                label = $this.prev('label');

            if (e.type === 'keyup') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.addClass('active highlight');
                }
            } else if (e.type === 'blur') {
                if( $this.val() === '' ) {
                    label.removeClass('active highlight');
                } else {
                    label.removeClass('highlight');
                }
            } else if (e.type === 'focus') {

                if( $this.val() === '' ) {
                    label.removeClass('highlight');
                }
                else if( $this.val() !== '' ) {
                    label.addClass('highlight');
                }
            }

        });

        $('.tab a').on('click', function (e) {

            e.preventDefault();

            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            target = $(this).attr('href');

            $('.tab-content > div').not(target).hide();

            $(target).fadeIn(600);

        });




    });

    // skills add & remove
    $(function()
    {
        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();

            var controlForm = $('.controls form:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html(' - ');
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });

</script>


<script src="recruiter/vendors/jquery/dist/jquery.min.js"></script>
<script src="recruiter/vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="recruiter/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="recruiter/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="recruiter/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="recruiter/assets/js/main.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</body>
</html>

