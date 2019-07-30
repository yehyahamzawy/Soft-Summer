<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="assets/vendor/inputmask/css/inputmask.css" />
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script src="assets/vendor/datepicker/moment.js"></script>
    <script src="assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="assets/vendor/datepicker/datepicker.js"></script>
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <!--  <?php
// include 'dbheader.html';

?> -->
<!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.html" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Database Control</a>
                                            <div id="submenu-1-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">

                                                    <?php
                                                        include "class/db.php"; 
                                                        $db=new Database();
                                                        $output=$db->showTables();
                                                        foreach ($output as $i) {
                                                            echo "<li class='nav-item'>

                                                        <a class='nav-link' href=''>".$i['Tables_in_se']."</a>
                                                    </li>";
                                                        }
                                                     ?>
                                                    
                                                   
                                                </ul>
                                                
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                           
                           
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="voulanteerform.php">Voulantee
                                                         Form</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="employeeform.php">Employee Form</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="doctorform.php">Doctor Form</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="driverform.php">Driver Form</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="assistantform.php">Assistant Form</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="userType.php">Promote Users</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="daysOff.php">Attendance</a>
                                                </li>
                                                 <li class="nav-item">
                                                    <a class="nav-link" href="routePlan.php">Missions</a>
                                                </li>
                                                </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="userprofile.php">User profile</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="accesscontrol.php">Access Control</a>
                                    </li>
                            <li class="nav-divider">
                                Features
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Forms Features </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="editemployeeforms.php">Edit Employee Forms</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <!-- <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">update attribute type  </h2>
                                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">edit attribute Form</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        
                           
                            
                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                       <!--  <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">update attribute type</h3>
                                    <!-- ============================================================== -->
                
                        <!-- ============================================================== -->
                                </div>
                            <!--     <div class="card">
                                    
                                    <div class="card-body">
                                        <form class=".form-control-lg" method = "POST" action = <?php echo "'attributeEdit.php?ID=".$_GET["ID"]."'"?>>
                                           <br>
                                           <div class="form-group">
                                            <label for="inputText3" class="col-form-label">attribute Name</label>
                                            <input id="inputText3" type="text" class="form-control" name = "attributeName">
                                            <!-- <?php 
                                            $Connection = new mysqli("localhost", "root", "", "se");
                                            $sql = "SELECT * FROM attribute WHERE ID = ".$_GET["ID"];
                                            $result = mysqli_query($Connection, $sql);
                                            $attribute = mysqli_fetch_array($result);
                                            echo "value = '".$attribute["attributeName"]."'"; ?>  -->
<!-- <!-- <!-- 
                                        </div>
                                        <br>
                                         
                                                        <label for="inputText3" value=".form-control-lg" class="col-form-label">type</label>

                                                        <!-- <select class="selectpicker dropup" name = "attributeDType" > -->
                                                    <!--     <?php include "../class/attributeClass.php";
                                                            $attributes =new Attribute(2);
                                                            $output=$attributes->readInSelect();
                                                            foreach ($output as $i) {
                                                                # code...
                                                                echo $i;
                                                            }
                                                         ?>

                                                    <option value = "int">INT</option>
                                                    <option  value = "varchar">VARCHAR</option>
                                                    <option  value = "text">TEXT</option>
                                                <!-- </select> -->
                                                            <!-- </select> -->
                                                           <!--  <br>
                                                            
                                                </div> -->
                                     
                                            <!-- <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </form>
                                    </div> --> -->
                                    <!-- </div> --> -->
                                     --> --> --> -->
                        
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php
// include_once 'dbfooter.html';

?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script src="assets/vendor/datepicker/moment.js"></script>
    <script src="assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="assets/vendor/datepicker/datepicker.js"></script>
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
</body>
 
</html>