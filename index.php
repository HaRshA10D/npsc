<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

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
            window.onload=function (){
                document.getElementById("amount").value = 10000;
                document.getElementById("currency").className = "fa fa-inr";
                
                document.getElementById("acc_type").value = 'No Accomodation';
                document.getElementById("acc_days").value = 'No Accomodation';
                document.getElementById("acc_indate").value = 'No Accomodation';
                document.getElementById("acc_type").style.visibility = 'hidden';
                document.getElementById("acc_days").style.visibility = 'hidden';
                document.getElementById("acc_indate").style.visibility = 'hidden';
            }
            function scan_dd_apper(){
                if(document.getElementById("pay_mode").value == "DD"){
                    document.getElementById("dd_scan").style.visibility = 'visible';
                }
                if(document.getElementById("pay_mode").value == "Online"){
                    document.getElementById("dd_scan").style.visibility = 'hidden';
                }
            }
            function acc_detail(){
                if(document.getElementById("if_acc").value=='yes'){
                    document.getElementById("acc_type").style.visibility = 'visible';
                    document.getElementById("acc_days").style.visibility = 'visible';
                    document.getElementById("acc_indate").style.visibility = 'visible';
                    document.getElementById("acc_type").value = '';
                    document.getElementById("acc_days").value = '';
                    document.getElementById("acc_indate").value = '';
                }
                if(document.getElementById("if_acc").value=='no'){
                    
                    document.getElementById("acc_type").value = 'No Accomodation';
                    document.getElementById("acc_days").value = 'No Accomodation';
                    document.getElementById("acc_indate").value = 'No Accomodation';
                    document.getElementById("acc_type").style.visibility = 'hidden';
                    document.getElementById("acc_days").style.visibility = 'hidden';
                    document.getElementById("acc_indate").style.visibility = 'hidden';
                }
            }
            function amount_value(){
                var category = document.getElementById("category").value;
                var member = document.getElementById("iee").value;
                if(category == "Delegates from industries/utilities/R&D organization"){
                    if(member=="no"){
                        document.getElementById("amount").value = 10000;
                    }else{
                        document.getElementById("amount").value = 8000;
                    }
                    document.getElementById("currency").className = "fa fa-inr";
                }
                if(category == "Delegates from academic institutions"){
                    if(member=="no"){
                        document.getElementById("amount").value = 7000;
                    }else{
                        document.getElementById("amount").value = 5600;
                    }
                    document.getElementById("currency").className = "fa fa-inr";
                }
                if(category == "Student delegates"){
                    if(member=="no"){
                        document.getElementById("amount").value = 3500;
                    }else{
                        document.getElementById("amount").value = 2800;
                    }
                    document.getElementById("currency").className = "fa fa-inr";
                }
                if(category == "Delegates from abroad"){
                   if(member=="no"){
                        document.getElementById("amount").value = 400;
                    }else{
                        document.getElementById("amount").value = 320;
                    }
                    document.getElementById("currency").className = "fa fa-usd";
                }
            }
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
                if(document.getElementById("pay_mode").value == "DD" && $('#dd_scan').val() == null){
                    alert('Please select the scanned copy of DD');
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
                            <h4 class="white titleh center" style="font-size:30px" >19<sup>th</sup>-21<sup>st</sup> December 2016</h4>
                        </div>
                    </div>

                <div class="col-md-2 header-right">
                    <div class="logo">
                        <img class="img-responsive center-block" height="120px" width="120px" src="img/iitbbslogo1.png" alt="Universe" />
                    </div>
                </div>
            </div>
        </header>
        <div class="container" id="mainform">
            <form method="post" action="submit.php" class="well form-horizontal" enctype="multipart/form-data">
            <span class="text-center"><h3>REGISTRATION DETAILS</h3></span><br/>
            <div class="container">
                <h4>Note:</h5><b4/>
                <p> 1.Plese enter the valid paper ID, the paper title will be generated automatically.</p>
                <p> 2.Make sure all your details are correct, Once you register with a transaction number you cannot register again.</p>
                <p> 3.Name on invoice will be generated according to the name you will submit here.</p>
            </div>
            <span class="text-center"><h4>PAPER DETAILS</h4></span><br/>
            <div class="row">
                <div class="col-md-6">
                    
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
                <div class="col-md-6">
                    
                    <div class="form-group"> 
                        <label class="col-md-4 control-label">*Author :</label>
                        <div class="col-md-6 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="if_author" class="form-control selectpicker" >
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
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
                                <input name="papertitle" placeholder="" class="form-control" id="paper_title" type="text" readonly required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group"> 
                        <label class="col-md-2 control-label">*Registration Category :</label>
                        <div class="col-md-9 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="reg_category" class="form-control selectpicker" id="category" onchange="amount_value()">
                                    <option value="Delegates from industries/utilities/R&D organization">Delegates from industries/utilities/R&D organization</option>
                                    <option value="Delegates from academic institutions">Delegates from academic institutions</option>
                                    <option value="Student delegates">Student delegates</option>
                                    <option value="Delegates from abroad">Delegates from abroad</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p class="text-center">----------------------</p>
                    <h4 class="text-center">PLEASE CHOSE TUTORIAL TOPICS</h4>
                    <hr/>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4">Tutorial session 1 :</label>
                            <div class="col-md-8 selectContainer">
                                <div class="radio">
                                    <label><input type="radio" name="tutorial1" value="State Estimation in Power System">State Estimation in Power System</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="tutorial1" value="Micro-grid / Renewable Integration">Micro-grid / Renewable Integration</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4">Tutorial session 2 :</label>
                            <div class="col-md-8 selectContainer">
                                <div class="radio">
                                    <label><input type="radio" name="tutorial2" value="Synchro-Phasor and Wide-Area applications">Synchro-Phasor and Wide-Area applications</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="tutorial2" value="Smart-grid and Cyber Security in Power System">Smart-grid and Cyber Security in Power System</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                        
                </div>
                <p class="text-center">----------------------</p>
                <span class="text-center"><h4>PERSONAL DETAILS</h4></span><br/>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*Name :</label>  
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_name" placeholder="" class="form-control"  type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*Institution :</label>  
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_institution" placeholder="" class="form-control"  type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*Email ID :</label>  
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_email" placeholder="" class="form-control"  type="email" required>
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
                                <input name="reg_designation" placeholder="" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group"> 
                        <label class="col-md-4 control-label">Gender :</label>
                        <div class="col-md-6 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="reg_gender" class="form-control selectpicker" >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*Phone/Mobile No :</label>  
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_mobile" placeholder="" class="form-control"  type="text" required>
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
                                <input name="reg_pincode" placeholder="" class="form-control"  type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*City :</label>  
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_city" placeholder="" class="form-control"  type="text" required>
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
                                <input name="reg_state" placeholder="" class="form-control"  type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">Country :</label>  
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_country" placeholder="" class="form-control"  type="text" required>
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
                                <input name="reg_address" placeholder="" class="form-control"  type="text" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">----------------------</p>   
            <div class="row">
                
                <span class="text-center"><h4>PAYMENT DETAILS</h4></span><br/>
                
                <div class="col-md-6">
                    
                    <div class="form-group"> 
                        <label class="col-md-4 control-label">*Payment Mode :</label>
                        <div class="col-md-8 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="reg_payment_mode" class="form-control selectpicker" id="pay_mode" onchange="scan_dd_apper()">
                                    <option value="DD" selected>Demand Draft</option>
                                    <option value="Online" >Online Banking</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*DD/Online Transaction No :</label>  
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_transactionno" placeholder="" class="form-control"  type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*Name of Bank and Branch :</label>  
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_branchname" placeholder="" class="form-control"  type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" id="dd_scan">
                        <label class="col-md-4 control-label">*Upload scanned copy of DD :</label>  
                        <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="dd_scan" id="dd_scan" class="form-control"  type="file" >
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
                                <select name="if_ieee" class="form-control selectpicker" id="iee" onchange="amount_value()">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">Amount Paid :</label>  
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i id="currency" class=""></i></span>
                                <input name="reg_amount" id="amount" placeholder="" class="form-control"  type="number" readonly required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*DD/Online Transaction Date :</label>  
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_transactiondate" placeholder="" class="form-control"  type="date" required>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <p class="text-center">----------------------</p>
            <div class="row">
                <span class="text-center"><h4>ACCOMODATION DETAILS</h4></span>
                <div class="col-md-6">
                    
                    <div class="form-group"> 
                        <label class="col-md-4 control-label">*Accomodation Required :</label>
                        <div class="col-md-6 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="if_accreq" class="form-control selectpicker" id="if_acc" onchange="acc_detail()">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" id="acc_type">
                        <label class="col-md-4 control-label">Preferred Occupancy Type :</label>  
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <select name="reg_acctype" class="form-control selectpicker" >
                                    <option value="single">Single</option>
                                    <option value="multiple">Multiple</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    
                     <div class="form-group" id="acc_days">
                        <label class="col-md-4 control-label">Days :</label>  
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_acc_days" placeholder="" class="form-control"  type="number" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" id="acc_indate">
                        <label class="col-md-4 control-label">Check-in Date :</label>  
                        <div class="col-md-6 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="reg_acc_startdate" placeholder="" class="form-control"  type="date">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2"><button class="btn btn-primary btn-block" onclick="return(submit_check())">SUBMIT</button></div>
                <div class="col-md-5"></div>
            </div>
            </form>
            
        </div>
        
    </div><!-- /.container -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.js"></script>
    </body>
</html>
