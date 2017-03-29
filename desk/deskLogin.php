<?php

session_start();

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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <h2 class="white titleh center" >NPSC-2016</h2>
                            <h4 class="white titleh center" style="font-size:30px" >Enter Credentials</h4>
                        </div>
                    </div>

                <div class="col-md-2 header-right">
                    <div class="logo">
                        <img class="img-responsive center-block" height="120px" width="120px" src="img/iitbbslogo1.png" alt="Universe" />
                    </div>
                </div>
            </div>
        </header>
        <?php
        if(!isset($_SESSION["user"])){
          ?>
          <div class="container">
            <div class="well">
              <form method="post" action="deskCheck.php">
              <div class="row" style="margin-bottom: 20px;">

                  <div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-4 control-label"></label>
                          <div class="col-md-8 inputGroupContainer">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                  <input name="userid" placeholder="" class="form-control"  type="text" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">

                          <div class="col-md-8 inputGroupContainer">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-key fa-lg" aria-hidden="true"></i></span>
                                  <input name="password" placeholder="" class="form-control"  type="password" required>
                              </div>
                          </div>
                          <label class="col-md-4 control-label"></label>
                      </div>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                    <button class="btn btn-default btn-block">LOGIN</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <?php
        }
        else{
          ?>

                  <div class="container">
                    <h5>User: <?php echo $_SESSION["user"];?></h5>
                    <a href="deskLogout.php"><button class="btn btn-default">Logout</button></a>
                  </div>
          <?php
        }
         ?>



    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.js"></script>
    </body>
</html>
