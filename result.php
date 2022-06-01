<?php
// Initialize the session
session_start();

// Include loginUser file
require_once "dbLogin.php";

$date = date("Y-m-d H:i:s");
$testTime = @$_SESSION["test_time"];
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+ $testTime minutes"));

// Check if the user is already logged in, if yes then display user name
$isLoggedIn = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true);

if($isLoggedIn){
    $userName = $_SESSION["name"];
    $email = $_SESSION["email"];
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
                    <h1>Results Page</h1>
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

                            <?php
                            $correct = 0;
                            $wrong = 0;

                            if(isset($_SESSION["answer"])){
                                for($i = 1;$i <= sizeof($_SESSION["answer"]); $i++){
                                    $answer = "";
                                    $res = mysqli_query($conn, "select * from questions where category = '$_SESSION[test_category]' && question_no = $i");
                                    while ($row = mysqli_fetch_array($res)){
                                        $answer = $row["answer"];
                                    }

                                    if(isset($_SESSION["answer"][$i])){
                                        if($answer == $_SESSION["answer"][$i]){
                                            $correct = $correct + 1;
                                        }
                                        else{
                                            $wrong = $wrong + 1;
                                        }
                                    }
                                    else{
                                        $wrong = $wrong + 1;
                                    }
                                }
                            }

                            $count = 0;

                            $res = mysqli_query($conn, "select * from questions where category = '$_SESSION[test_category]'");
                            $count = mysqli_num_rows($res);
                            $wrong = $count - $correct;
                            echo "<br>"; echo "<br>";
                            echo "<center>";
                            echo "Total Questions=".$count;
                            echo "<br>";
                            echo "Correct Answer=".$correct;
                            echo "<br>";
                            echo "Wrong Answer=".$wrong;

                            echo "</center>";
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

<?php
if(isset($_SESSION["test_time"])){
    $date = date("Y-m-d");
    mysqli_query($conn, "insert into test_results(id, name, email, test_type, total_question, correct_answer, wrong_answer, test_time)values(NULL, '$_SESSION[name]', '$_SESSION[email]', '$_SESSION[test_category]', '$count', '$correct', '$wrong', '$date')") or die(mysqli_error($conn));

}

if(isset($_SESSION["test_time"])){
    unset($_SESSION["test_time"]);
    ?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
    <?php
}
?>

<script src="recruiter/vendors/jquery/dist/jquery.min.js"></script>
<script src="recruiter/vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="recruiter/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="recruiter/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="recruiter/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="recruiter/assets/js/main.js"></script>
</body>
</html>


