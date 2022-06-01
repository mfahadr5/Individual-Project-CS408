<?php
session_start();
require_once "../dbLogin.php";

$question_no = "";
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$count = 0;
$ans = "";
$totalQuestions = 0;
$countTotal = 0;

$queno = $_GET["questionNo"];

if(isset($_SESSION["answer"][$queno])){

    $ans = $_SESSION["answer"][$queno];
}

$res = mysqli_query($conn, "select * from questions where category = '$_SESSION[test_category]' && question_no = $_GET[questionNo]");
$count = mysqli_num_rows($res);

$resTotal = mysqli_query($conn, "select 1 from questions where category = '$_SESSION[test_category]' ");
$countTotal = mysqli_num_rows($resTotal);

if($count == 0){
    echo "over";
}
else{

    while ($row = mysqli_fetch_array($res)){

        $question_no = $row["question_no"];
        $question = $row["question"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
    }


    ?>

<br>

    <!--Start of Q choice-->
    <div class="container-fluid ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><span class="label label-warning" id="qid">  <?php echo trim($question_no) ?> / <?php echo trim($countTotal) ?> </span> <?php echo "<div>&nbsp;</div>". $question; ?>  </h3>
                </div>
                <div class="modal-body">
                    <div class="col-xs-3 col-xs-offset-5">
                        <div id="loadbar" style="display: none;">
                            <div class="blockG" id="rotateG_01"></div>
                            <div class="blockG" id="rotateG_02"></div>
                            <div class="blockG" id="rotateG_03"></div>
                            <div class="blockG" id="rotateG_04"></div>
                            <div class="blockG" id="rotateG_05"></div>
                            <div class="blockG" id="rotateG_06"></div>
                            <div class="blockG" id="rotateG_07"></div>
                            <div class="blockG" id="rotateG_08"></div>
                        </div>
                    </div>

                    <div class="quiz" id="quiz" data-toggle="buttons">

                            <!--option1-->
                            <?php
                               if($ans != $opt1){
                               ?>
                                <label onclick="radioclick(<?php echo $opt1; ?>, <?php echo $question_no; ?>)"  class="element-animation1 btn btn-lg btn-primary btn-block "><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" >
                                        <?php if(strpos($opt1, 'images/') != false){ ?>
                                            <img src="recruiter/<?php echo $opt1; ?>" height="150" width="250">
                                            <?php
                                        }
                                        else{
                                            echo $opt1;
                                        } ?>
                                </label>

                            <?php
                                 } else {
                                ?>
                                    <label onclick="radioclick(<?php echo $opt1; ?>, <?php echo $question_no; ?>)" class="element-animation1 btn btn-lg btn-primary btn-block focus active"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                        <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" >
                                        <?php if(strpos($opt1, 'images/') != false){ ?>
                                            <img src="recruiter/<?php echo $opt1; ?>" height="150" width="250">
                                            <?php
                                        }
                                        else{
                                            echo $opt1;
                                        } ?>
                                    </label>
                            <?php
                             }
                            ?>


                        <!--option2-->
                        <?php
                        if($ans == $opt2){
                        ?>
                        <label onclick="radioclick(<?php echo $opt2; ?>, <?php echo $question_no; ?>)" class="element-animation2 btn btn-lg btn-primary btn-block focus active"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                            <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" >
                            <?php if(strpos($opt2, 'images/') != false){
                                ?>
                            <img src="recruiter/<?php echo $opt2; ?>" height="150" width="250">
                            <?php
                                }
                            else{
                                echo $opt2;
                            } ?>
                        </label>
                            <?php
                            } else {
                            ?>
                            <label onclick="radioclick(<?php echo $opt2; ?>, <?php echo $question_no; ?>)" class="element-animation2 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" >
                                <?php if(strpos($opt2, 'images/') != false){
                                    ?>
                                    <img src="recruiter/<?php echo $opt2; ?>" height="150" width="250">
                                    <?php
                                }
                                else{
                                    echo $opt2;
                                } ?>
                            </label>
                            <?php

                                }
                                ?>

                        <!--option3-->
                        <?php
                        if($ans == $opt3){
                        ?>
                        <label onclick="radioclick(<?php echo $opt3; ?>, <?php echo $question_no; ?>)" class="element-animation3 btn btn-lg btn-primary btn-block focus active"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                            <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" >
                            <?php if(strpos($opt3, 'images/') != false){
                                ?>
                                <img src="recruiter/<?php echo $opt3; ?>" height="150" width="250">
                                <?php
                            }
                            else{
                                echo $opt3;
                            } ?>
                            </label>
                            <?php
                            } else {
                            ?>
                            <label onclick="radioclick(<?php echo $opt3; ?>, <?php echo $question_no; ?>)" class="element-animation3 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" >
                                <?php if(strpos($opt3, 'images/') != false){
                                    ?>
                                    <img src="recruiter/<?php echo $opt3; ?>" height="150" width="250">
                                    <?php
                                }
                                else{
                                    echo $opt3;
                                } ?>
                            </label>
                            <?php

                                }
                                ?>



                            <!--option4-->
                            <?php
                            if($ans == $opt4){
                            ?>
                            <label onclick="radioclick(<?php echo $opt4; ?>, <?php echo $question_no; ?>)" class="element-animation4 btn btn-lg btn-primary btn-block focus active"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" >
                                <?php if(strpos($opt4, 'images/') != false){
                                    ?>
                                    <img src="recruiter/<?php echo $opt4; ?>" height="150" width="250">
                                    <?php
                                }
                                else{
                                    echo $opt4;
                                } ?>
                                </label>
                                <?php
                                } else {
                                ?>
                                <label onclick="radioclick(<?php echo $opt4; ?>, <?php echo $question_no; ?>)" class="element-animation4 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" >
                                    <?php if(strpos($opt4, 'images/') != false){
                                        ?>
                                        <img src="recruiter/<?php echo $opt4; ?>" height="150" width="250">
                                        <?php
                                    }
                                    else{
                                        echo $opt4;
                                    } ?>
                                </label>
                                <?php

                                    }
                                    ?>

                    </div>
                </div>
                <div class="modal-footer text-muted">
                    <span id="answer"></span>
                </div>
            </div>
        </div>
    </div>
    <!--End of Q choice-->

    <!--<table>
        <tr>
            <td style="font-weight: bold; font-size: 18px; padding-left: 5px" colspan="2">

                <?php /*echo "( ".$question_no ." ) ". $question; */?>

            </td>
        </tr>
    </table>

    <table style="margin-left: 20px">
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php /*echo $opt1; */?>" onclick="radioclick(this.value, <?php /*echo $question_no; */?>)"
                <?php
/*                if($ans == $opt1){
                    echo "checked";
                }
                */?>>
            </td>

            <td style="padding-left: 10px">
                <?php
/*                if(strpos($opt1, 'images/') != false){
                    */?>
                    <img src="recruiter/<?php /*echo $opt1; */?>" height="150" width="250">
                    <?php
/*                }
                else{
                    echo $opt1;
                }
                */?>

            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php /*echo $opt2; */?>" onclick="radioclick(this.value, <?php /*echo $question_no; */?>)"
                <?php
/*                if($ans == $opt2){
                    echo "checked";
                }
                */?>>
            </td>

            <td style="padding-left: 10px">
                <?php
/*                if(strpos($opt2, 'images/') != false){
                    */?>
                    <img src="recruiter/<?php /*echo $opt2; */?>" height="150" width="250">
                    <?php
/*                }
                else{
                    echo $opt2;
                }
                */?>

            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php /*echo $opt3; */?>" onclick="radioclick(this.value, <?php /*echo $question_no; */?>)"
                <?php
/*                if($ans == $opt3){
                    echo "checked";
                }
                */?>>
            </td>

            <td style="padding-left: 10px">
                <?php
/*                if(strpos($opt3, 'images/') != false){
                    */?>
                    <img src="recruiter/<?php /*echo $opt3; */?>" height="150" width="250">
                    <?php
/*                }
                else{
                    echo $opt3;
                }
                */?>

            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php /*echo $opt4; */?>" onclick="radioclick(this.value, <?php /*echo $question_no; */?>)"
                <?php
/*                if($ans == $opt4){
                    echo "checked";
                }
                */?>>
            </td>

            <td style="padding-left: 10px">
                <?php
/*                if(strpos($opt4, 'images/') != false){
                    */?>
                    <img src="recruiter/<?php /*echo $opt4; */?>" height="150" width="250">
                    <?php
/*                }
                else{
                    echo $opt4;
                }
                */?>

            </td>
        </tr>




    </table>-->




<?php
}



