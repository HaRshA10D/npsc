<html>
    <head>
        <title>NPSC-2016 | Completed Registration</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <script src="js/blockBack.js"></script>
        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>

<?php

$paper_id = (int)$_POST["paperid"];
$if_author = $_POST["if_author"];
$paper_title = $_POST["papertitle"];
$reg_category = $_POST["reg_category"];
$tutorial1 = $_POST["tutorial1"];
$tutorial2 = $_POST["tutorial2"];

$reg_name = $_POST["reg_name"];
$reg_institution = $_POST["reg_institution"];
$reg_email = $_POST["reg_email"];
$reg_designation = $_POST["reg_designation"];
$reg_gender = $_POST["reg_gender"];
$reg_mobile = $_POST["reg_mobile"];
$reg_pincode = $_POST["reg_pincode"];
$reg_city = $_POST["reg_city"];
$reg_state = $_POST["reg_state"];
$reg_country = $_POST["reg_country"];
$reg_address = $_POST["reg_address"];

$reg_payment_mode = $_POST["reg_payment_mode"];
$reg_transactionno = $_POST["reg_transactionno"];
$reg_branchname = $_POST["reg_branchname"];
$if_ieee = $_POST["if_ieee"];
$reg_amount = $_POST["reg_amount"];
$reg_transactiondate = $_POST["reg_transactiondate"];

$if_accreq = $_POST["if_accreq"];
$reg_acctype = $_POST["reg_acctype"];
$reg_acc_days = $_POST["reg_acc_days"];
$reg_acc_startdate = $_POST["reg_acc_startdate"];
$end_date = "-";

$ser = "127.0.0.1";
$user = "root";
$pass = "Nstatehs_1";
$db_name = "npsc2016";
$conn = mysqli_connect($ser, $user, $pass, $db_name);
$q = "select * from accomodation_details";
$result = mysqli_query($conn,$q);
$reg_id = 1 + mysqli_num_rows($result);
if($conn){
    $q1 = "insert into paper_details values('$reg_id','$paper_id','$paper_title','$if_author','$reg_category','$tutorial1','$tutorial2',0)";
    $q1_1 = "delete from paper_details where registration_id = '$reg_id'";
    $q2 = "insert into personal_details values('$reg_id','$reg_name','$reg_designation','$reg_gender','$reg_institution','$reg_email','$reg_mobile','$reg_pincode','$reg_city','$reg_state','$reg_country','$reg_address')";
    $q2_1 = "delete from personal_details where registration_id = '$reg_id'";
    $q3 = "insert into payment_detail values('$reg_id','$reg_payment_mode','$if_ieee','$reg_transactionno','$reg_transactiondate','$reg_branchname','$reg_amount')";
    $q3_1 = "delete from payment_detail where registration_id = '$reg_id'";
    $q4 = "insert into accomodation_details values('$reg_id','$if_accreq','$reg_acc_days','$reg_acctype','$reg_acc_startdate','$end_date')";
    $q4_1 = "delete from accomodation_details where registration_id = '$reg_id'";
    if($_FILES["dd_scan"]["error"] > 0 && $reg_payment_mode=="DD"){
        ?>
        <div class="jumbotron">
            <h2>Registration Failure</h2>
            <h4>Problem with file you uploaded</h4>
            <a href="index.php"><button class="btn btn-default">Registration Page</button></a>
        </div><?php
    }
    elseif(($_FILES["dd_scan"]["size"] / 1024)>1024 && $reg_payment_mode=="DD"){
        ?>
        <div class="jumbotron">
            <h2>Registration Failure</h2>
            <h4>DD scanned copy size is greater than size limit</h4>
            <a href="index.php"><button class="btn btn-default">Registration Page</button></a>
        </div><?php
    }
    else{
    if(mysqli_query($conn,$q1)){
        if(mysqli_query($conn,$q2)){
            if(mysqli_query($conn,$q3)){
                if(mysqli_query($conn,$q4)){
                    if($reg_payment_mode="DD"){
                        move_uploaded_file($_FILES["dd_scan"]["tmp_name"], "uploads/".$reg_id."_".$paper_id."_".$reg_name."_".$_FILES["dd_scan"]["name"]);
                    }
                    ?>
                    <div class="jumbotron">
                        <h2>Registration Sucessful</h2>
                        <p>Please print this page for future references</p>
                        <p>Scroll down for printing option</p>
                        <a href="index.php"><button class="btn btn-default">Registration Page</button></a>
                    </div>
                    <div id="detail_form">
                        <form class="well form-horizontal" >
                        <span class="text-center"><h3>REGISTRATION DETAILS</h3></span><br/>
                        <span class="text-center"><h4>PAPER DETAILS</h4></span><br/>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Paper ID :</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="paperid" class="form-control"  type="text"  value="<?php echo$paper_id ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Author :</label>
                                    <div class="col-md-6 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <input name="paperid" class="form-control"  type="text"  value="<?php echo$if_author ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Paper Title :</label>
                                    <div class="col-md-9 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="papertitle" class="form-control" type="text" value="<?php echo$paper_title ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">*Registration Category :</label>
                                    <div class="col-md-9 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <input name="paperid" class="form-control"  type="text"  value="<?php echo$reg_category ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tutorial 1 :</label>
                                        <div class="col-md-9 selectContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                                <input name="paperid" class="form-control"  type="text"  value="<?php echo$tutorial2 ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tutorial 2 :</label>
                                        <div class="col-md-9 selectContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                                <input name="paperid" class="form-control"  type="text"  value="<?php echo$tutorial1?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <span class="text-center"><h4>PERSONAL DETAILS</h4></span><br/>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Name :</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_name"  class="form-control"  type="text" value="<?php echo$reg_name ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Institution :</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_institution" class="form-control"  type="text" value="<?php echo$reg_institution ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Email ID :</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_email" class="form-control"  type="email" value="<?php echo$reg_email ?>" readonly>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Designation :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_designation"  class="form-control"  type="text" value="<?php echo$reg_designation ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Gender :</label>
                                    <div class="col-md-6 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <input name="paperid" class="form-control"  type="text"  value="<?php echo$reg_gender ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Phone/Mobile No :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_mobile"  class="form-control"  type="text" value="<?php echo$reg_mobile ?>" readonly>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Pin/Zip No :</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_pincode" class="form-control"  type="text" value="<?php echo$reg_pincode ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*City :</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_city" class="form-control"  type="text" value="<?php echo$reg_city ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*State :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_state" class="form-control"  type="text" value="<?php echo$reg_state ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Country :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_country" class="form-control"  type="text" value="<?php echo$reg_country ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">*Full Address :</label>
                                    <div class="col-md-9 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_address" class="form-control"  type="text" value="<?php echo$reg_address ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <span class="text-center"><h4>PAYMENT DETAILS</h4></span><br/>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Payment Mode :</label>
                                    <div class="col-md-8 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <input name="paperid" class="form-control"  type="text"  value="<?php echo$reg_payment_mode ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*DD/Online Transaction No :</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_transactionno" class="form-control"  type="text" value="<?php echo$reg_transactionno ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Name of Bank and Branch :</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_branchname" class="form-control"  type="text" value="<?php echo$reg_branchname ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*IEEE Member :</label>
                                    <div class="col-md-6 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <input name="paperid" class="form-control"  type="text"  value="<?php echo$if_ieee ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Amount Paid :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i id="currency" class=""></i></span>
                                            <input name="reg_amount" id="amount"  class="form-control"  type="text" value="<?php echo$reg_amount ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*DD/Online Transaction Date :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_transactiondate" class="form-control"  type="text" value="<?php echo$reg_transactiondate ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <span class="text-center"><h4>ACCOMODATION DETAILS</h4></span>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">*Accomodation Required :</label>
                                    <div class="col-md-6 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                            <input name="paperid" class="form-control"  type="text"  value="<?php echo$if_accreq ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="acc_type">
                                    <label class="col-md-4 control-label">Preferred Occupancy Type :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="paperid" class="form-control"  type="text"  value="<?php echo$reg_acctype ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="acc_days">
                                    <label class="col-md-4 control-label">Days :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_acc_days" class="form-control"  type="text" value="<?php echo$reg_acc_days ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group" id="acc_indate">
                                    <label class="col-md-4 control-label">Check-in Date :</label>
                                    <div class="col-md-6 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <input name="reg_acc_startdate" class="form-control"  type="text" value="<?php echo$reg_acc_startdate ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </form>

                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2"><button class="btn btn-danger btn-block" onclick="window.print()">PRINT</button></div>
                            <div class="col-md-5"></div>
                        </div>
                </div><?php
                }
                else{
                    mysqli_query($conn,$q1_1);
                    mysqli_query($conn,$q2_1);
                    mysqli_query($conn,$q3_1);?>
                    <div class="jumbotron">
                        <h2>Registration Failure</h2>
                        <a href="index.php"><button class="btn btn-default">Registration Page</button></a>
                    </div><?php
                }
            }
            else{
                mysqli_query($conn,$q1_1);
                mysqli_query($conn,$q2_1);?>
                <div class="jumbotron">
                    <h2>Registration Failure</h2>
                    <a href="index.php"><button class="btn btn-default">Registration Page</button></a>
                </div><?php
            }
        }
        else{
            mysqli_query($conn,$q1_1);?>
            <div class="jumbotron">
                <h2>Registration Failure</h2>
                <a href="index.php"><button class="btn btn-default">Registration Page</button></a>
            </div><?php
        }
    }
    else {?>
        <div class="jumbotron">
            <h2>Registration Failure</h2>
            <a href="index.php"><button class="btn btn-default">Registration Page</button></a>
        </div><?php
    }
}
}
else{
?>
        <div class="jumbotron">
            <h2>Registration Failure</h2>
            <a href="index.php"><button class="btn btn-default">Registration Page</button></a>
        </div><?php
}
?>
    </body>
