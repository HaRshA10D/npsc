<html>
    <head>
        <title>Registration | NPSC2016</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    </head>
    <body>
        <?php
        $ser = "127.0.0.1";
        $user = "root";
        $pass = "Nstatehs_1";
        $db_name = "npsc2016";
        $conn = mysqli_connect($ser, $user, $pass, $db_name);
        if($conn){
            ?>
        <div class="container">
        <table class="table table-hover">
            <thead>
                <tr><td>Paper ID</td><td>Category</td><td>Registration name</td><td>Institution</td><td>Mail</td><td>Address</td><td>Tutorial</td></tr>
            </thead>
            <tbody>
                <?php
            $q = 'select * from select_all';
            $result = mysqli_query($conn,$q);
            while($row = mysqli_fetch_assoc($result)) {?>
                <tr><td><?php echo $row["paper_id"];?></td><td><?php echo $row["category"];?></td><td><?php echo $row["reg_name"];?></td><td><?php echo $row["reg_institution"];?></td><td><?php echo $row["reg_email"];?></td><td><?php echo $row["reg_address"];?></td><td><?php echo $row["tutorial1"];?></td></tr>
            <?php }?>  
            </tbody>
        </table>
        </div>
                <?php
        }
        ?>
        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>


