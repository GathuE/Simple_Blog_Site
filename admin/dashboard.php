<?php 
error_reporting (0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" type="image/png" href="/img/logo.png"/>
    <title>Nutrition -- Blog </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">

                <!-- INCLUDE DB CONNECTION -->
                    <?php include 'includes/conn.php'; ?> 
                <!-- INCLUDE DB CONNECTION -->

                <!-- header Code Goes Here -->
                    /* <?php include 'includes/header.php' ?> */
                <!-- header Code Goes Here -->
       
                <!-- Side Bar Code Goes Here -->
                    <?php include 'includes/sidebar.php' ?>
                <!-- Side Bar Code Goes Here -->

                <!-- Dashboard Content Goes Here -->
        <div class="page-wrapper">
            <div class="content">
             <!-- USER DATA AND NOTIFICATIONS -->
             <div class="row">
                    <div class=" col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">
                            <div class="dash-widget-info text-left">
                                <!-- Alert Box for Successful Login -->
                                    <?php if ($_GET['success']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['success']) ?></strong>
                                    </div>
                                    <?php } ?>
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;">ADMIN</h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                
                <div class="row">
                <?php 
                include 'includes/conn.php';
                    $sql ="SELECT id from blog_posts where publish='1' ";
                    $query = $conn -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $posts=$query->rowCount();
                ?>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-flag-o" aria-hidden="true"></i></span>
							<a href="view_posts">
    							<div class="dash-widget-info text-right">
    								<h3><?php echo htmlentities($posts);?></h3>
    								<span class="widget-title1"> Live Posts <i class="fa fa-check" aria-hidden="true"></i></span>
    							</div>
							</a>
                        </div>
                    </div>

                <?php 
                include 'includes/conn.php';
                    $sql ="SELECT ID from users where status='1'";
                    $query = $conn -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $users=$query->rowCount();
                ?>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                            <a href="pending_forms">
                                <div class="dash-widget-info text-right">
                                    <h3><?php echo htmlentities($users);?></h3>
                                    <span class="widget-title3">New filled Forms <i class="fa fa-check" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>

                <?php 
                include 'includes/conn.php';
                    $sql ="SELECT id from blog_categories where publish='1'";
                    $query = $conn -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $categories=$query->rowCount();
                ?>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-book"></i></span>
                            <a href="view_category">
                                <div class="dash-widget-info text-right">
                                    <h3><?php echo htmlentities($categories);?></h3>
                                    <span class="widget-title2">Active Categories <i class="fa fa-check" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>

                
                   <!-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>618</h3>
                                <span class="widget-title4">Enquiries <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
    
    <!--====== Alert Script START ======-->
    <script type="text/javascript">
    
    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);
    
    </script>

</body>
</html>


