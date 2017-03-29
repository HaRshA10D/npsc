<?php

session_start();

$ser = "127.0.0.1";
$user = "root";
$pass = "Nstatehs_1";
$db_name = "npsc2016";
$conn = mysqli_connect($ser, $user, $pass, $db_name);

if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>NPSC-2016 | Registrations</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <style>
            #mainform{
                background-image: url('img/website-background-15.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .white{
                color: #FFF;
            }

            .center{
                text-align: center;
            }

            .titleh{
                color:white;
                font-size: 40px;
                font-weight: 600;
                text-shadow: 2px 2px #050404;
            }
            body{
                font-family: Segoe UI;
            }
        </style>
        <script>
        function get_title(){
            var id = document.getElementById("paper_id").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("paper_title").value = this.responseText;
              }
            };
            xhttp.open("GET", "check.php?title=" + id, true);
            xhttp.send();
            return false;
        }
        function submit_check(){
            var paper_id = document.getElementById("paper_id").value;
            var paper_title = document.getElementById("paper_title").value;
            if(paper_id.length!=10 || paper_title == null || paper_title == "")
            {
                alert('Paper id is not valid one');
                return false;
            }
        }
        </script>
    </head>
    <body>
        <div style="width: 100%;height: 4px;background-color: #FF8C00">

        </div>
        <header class="site-header" style="padding: 30px;margin-bottom: 20px;background-color: #7254AB;box-shadow: 0 5px #D5D5D5">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 header-left">
                        <div class="logo">
                           <img class="img-responsive center-block"  src="img/logo.png" alt="Universe" />
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="sitetitle">
                            <h1 class="white titleh center" >19<sup>th</sup> National Power Systems Conference</h1>
                            <h2 class="white titleh center" >NPSC-2016</h2>
                            <h4 class="white titleh center" style="font-size:30px" >List of registrations on a paper</h4>
                        </div>
                    </div>

                <div class="col-md-2 header-right">
                    <div class="logo">
                        <img class="img-responsive center-block" height="120px" width="120px" src="img/iitbbslogo1.png" alt="Universe" />
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <form method="get" action="desk.php" class="well form-horizantal" style="padding: 50px;">
              <div class="row" style="margin-bottom: 20px;">
                  <div class="col-md-7">
                      <div class="form-group">
                          <label class="col-md-4 control-label">*Paper ID :</label>
                          <div class="col-md-8 inputGroupContainer">
                              <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  <input name="paperid" placeholder="" class="form-control"  type="text" id="paper_id" oninput="get_title()" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-5">
                    <div class="col-md-2 inputGroupContainer">
                        <button class="btn btn-default" onclick="return(submit_check())">search</button>
                    </div>
                  </div>
                </div>
                <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label class="col-md-2 control-label">Paper Title :</label>
                  <div class="col-md-10 inputGroupContainer">
                      <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input placeholder="" class="form-control" id="paper_title" type="text" readonly required>
                      </div>
                  </div>
              </div>
            </div>
          </div>
            </form>
        </div>
        <?php
        if(isset($_GET["paperid"])){
          $paperid = $_GET["paperid"];
          ?>
          <div class="container">
            <div class="well">
            <table class="table table-hover" border="2">
              <thead>
                <tr>
                  <th>REGISTRATION ID</th>
                  <th>NAME</th>
                  <th>INSTITUTION</th>
                  <th>CONTACT</th>
                  <th>KIT</th>
                  <th>ACTIONS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $q = "SELECT * FROM paper_details natural join personal_details where paper_id='$paperid'";
                if($result=mysqli_query($conn,$q)){
                  while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <form method="post" action="deskUpdate.php">
                    <tr>
                      <td><?php echo $row["registration_id"];?></td>
                      <td><input class="form-control" value="<?php echo $row["reg_name"];?>" name="reg_name"/></td>
                      <td><input class="form-control" value="<?php echo $row["reg_institution"];?>" name="reg_institution"/></td>
                      <td><input class="form-control" value="<?php echo $row["reg_phoneno"];?>" name="reg_phoneno"/></td>
                      <td>
                      <?php
                      if($row["kit_issued"]==1){
                        echo 'kit issued';
                      }
                      else{
                        ?>
                        <input type="radio" name="kit_issue" value="dont" checked> Not now<br>
                        <input type="radio" name="kit_issue" value="issue"> Issue now<br>
                        <?php
                      }
                      ?>
                     </td>
                     <td>
                       <input type="hidden" value="<?php echo $row["registration_id"];?>" name="regid"/>
                       <input type="hidden" value="<?php echo $row["paper_id"];?>" name="paperid"/>
                       <button class="btn btn-default">CHANGE</button>
                     </td>
                    </tr>
                  </form>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
          </div>
          <?php
        }
        ?>
<div class="container">
  <h5>User: <?php echo $_SESSION["user"];?></h5>
  <a href="deskLogout.php"><button class="btn btn-default">Logout</button></a>
</div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.js"></script>
    </body>
</html>
<?php
}
else{
  header('Location: deskLogin.php');
}
 ?>
