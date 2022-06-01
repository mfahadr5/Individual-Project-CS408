<?php
// Include loginUser file
require_once "../dbLogin.php";
$id = $_GET["id"];
$test_category = '';
$result = mysqli_query($conn, "select * from test_category where id = $id");
while ($row=mysqli_fetch_array($result)){
    $test_category = $row["category"];
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
                    <h1>Add Question inside <?php echo "<font color=purple>" .$test_category. "</font>"; ?></h1>
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
                        <div class="card-body">

                            <div class="col-lg-12">
                                <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Add New Questions with text</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="text" name="question" placeholder="Add Question" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Opt1</label><input type="text" name="opt1" placeholder="Add Opt1" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Opt2</label><input type="text" name="opt2" placeholder="Add Opt2" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Opt3</label><input type="text" name="opt3" placeholder="Add Opt3" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Opt4</label><input type="text" name="opt4" placeholder="Add Opt4" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label><input type="text" name="answer" placeholder="Add Answer" class="form-control"></div>
                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Add Question" class="btn btn-success" style="border-radius: 18px; background-color: purple; border: purple;"

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header"><strong>Add New Questions with images</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="text" name="fquestion" placeholder="Add Question" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Opt1</label><input type="file" name="fopt1" class="form-control" style="padding-bottom: 35px"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Opt2</label><input type="file" name="fopt2" class="form-control" style="padding-bottom: 35px"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Opt3</label><input type="file" name="fopt3" class="form-control" style="padding-bottom: 35px"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Opt4</label><input type="file" name="fopt4" class="form-control" style="padding-bottom: 35px"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label><input type="file" name="fanswer" class="form-control" style="padding-bottom: 35px"></div>
                                        <div class="form-group">
                                            <input type="submit" name="submit2" value="Add Question" class="btn btn-success" style="border-radius: 18px; background-color: purple; border: purple;"

                                        </div>
                                    </div>
                                </div>
                            </div>

                            </form>


                        </div>
                    </div>
                </div>
                <!--/.col-->

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">

                                <tr>
                                        <th>No</th>
                                        <th>Questions</th>
                                        <th>Opt1</th>
                                        <th>Opt2</th>
                                        <th>Opt3</th>
                                        <th>Opt4</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                </tr>

                            <?php

                            $res = mysqli_query($conn, "select * from questions where category = '$test_category' order by question_no asc");

                            while($row = mysqli_fetch_array($res)){

                                echo "<tr>";

                                echo "<td>"; echo $row["question_no"]; echo "</td>";
                                echo "<td>"; echo $row["question"]; echo "</td>";
                                echo "<td>";
                                if(strpos($row["opt1"], 'opt_images/')!==false){
                                    ?>
                                    <img src="<?php echo $row["opt1"]; ?>" height="150" width="250">
                                    <?php

                                }else{
                                    echo $row["opt1"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if(strpos($row["opt2"], 'opt_images/')!==false){
                                    ?>
                                    <img src="<?php echo $row["opt2"]; ?>" height="150" width="250">
                                    <?php

                                }else{
                                    echo $row["opt2"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if(strpos($row["opt3"], 'opt_images/')!==false){
                                    ?>
                                    <img src="<?php echo $row["opt3"]; ?>" height="150" width="250">
                                    <?php

                                }else{
                                    echo $row["opt3"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if(strpos($row["opt4"], 'opt_images/')!==false){
                                    ?>
                                    <img src="<?php echo $row["opt4"]; ?>" height="150" width="250">
                                    <?php

                                }else{
                                    echo $row["opt4"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if(strpos($row["opt4"], 'opt_images/')!==false){
                                    ?>
                                    <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>&id1= <?php echo $id; ?>">Edit</a>
                                    <?php

                                }else{
                                    ?>
                                    <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1= <?php echo $id; ?>">Edit</a>
                                    <?php
                                }
                                echo "</td>";

                                echo "<td>";
                                ?>
                                <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1= <?php echo $id; ?>">Delete</a>
                                <?php
                                echo "</td>";

                                echo "</tr>";

                            }

                            ?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<?php
if(isset($_POST["submit1"])){
    $loop = 0;
    $count = 0;
    $result = mysqli_query($conn, "select * from questions where category= '$test_category' order by id asc") or die(mysqli_error($conn));

    $count =mysqli_num_rows($result);

    if($count==0){

    }else{

        while ($row=mysqli_fetch_array($result)){
            $loop=$loop+1;
            mysqli_query($conn, "update questions set question_no='$loop' where id= $row[id]");

        }

    }

    $loop=$loop+1;
    mysqli_query($conn, "insert into questions values (NULL, '$loop', '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$test_category')") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        alert("Question added successfully!");
        window.location.href= window.location.href;
    </script>
    <?php

}

?>

<?php
if(isset($_POST["submit2"])){
    $loop = 0;
    $count = 0;
    $result = mysqli_query($conn, "select * from questions where category= '$test_category' order by id asc") or die(mysqli_error($conn));

    $count =mysqli_num_rows($result);

    if($count==0){

    }else{

        while ($row=mysqli_fetch_array($result)){
            $loop=$loop+1;
            mysqli_query($conn, "update questions set question_no='$loop' where id= $row[id]");

        }

    }

    $loop=$loop+1;

    $tm = md5(time());
    $fnm1 = $_FILES["fopt1"]["name"];
    $dst1 = "./opt_images/".$tm.$fnm1;
    $dst_db1 = "opt_images/".$tm.$fnm1;
    move_uploaded_file($_FILES["fopt1"]["tap_name"], $dst1);

    $fnm2 = $_FILES["fopt2"]["name"];
    $dst2 = "./opt_images/".$tm.$fnm2;
    $dst_db2 = "opt_images/".$tm.$fnm2;
    move_uploaded_file($_FILES["fopt2"]["tap_name"], $dst2);

    $fnm3 = $_FILES["fopt3"]["name"];
    $dst3 = "./opt_images/".$tm.$fnm3;
    $dst_db3 = "opt_images/".$tm.$fnm3;
    move_uploaded_file($_FILES["fopt3"]["tap_name"], $dst3);

    $fnm4 = $_FILES["fopt4"]["name"];
    $dst4 = "./opt_images/".$tm.$fnm4;
    $dst_db4 = "opt_images/".$tm.$fnm4;
    move_uploaded_file($_FILES["fopt4"]["tap_name"], $dst4);

    $fnm5 = $_FILES["fanswer"]["name"];
    $dst5 = "./opt_images/".$tm.$fnm5;
    $dst_db5 = "opt_images/".$tm.$fnm5;
    move_uploaded_file($_FILES["fanswer"]["tap_name"], $dst5);


    mysqli_query($conn, "insert into questions values (NULL, '$loop', '$_POST[fquestion]', '$dst_db1', '$dst_db2', '$dst_db3', '$dst_db4', '$dst_db5', '$test_category')") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        alert("Question added successfully!");
        window.location.href= window.location.href;
    </script>
    <?php

}

?>


<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

