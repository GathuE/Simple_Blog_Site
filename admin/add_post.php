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
    <title>Home -- Dietetics </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- ckeditor -->       
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- ckfinder -->       
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
    <!-- File Input CSS --> 
    <link rel="stylesheet" type="text/css" href="assets/css/fileinput.min.css">

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
                                <!-- Alert Box for Successful Post Added -->
                                    <?php if ($_GET['success']){?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['success'])?></strong>
                                    </div>
                                    <?php }?>
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;">ADMIN</h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget" style="font-weight: 700;">
                            <a class="btn btn-info" href="view_posts" style="color:white;float:right;">View Posts</a><h1 style="float: left;">New Post</h1>
                        
                                <form method="POST" action="process_post" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                                
                                                <?php
                                                
                                                include 'includes/db_conn.php';
                                                    $result = mysqli_query($con,"SELECT * FROM blog_categories where publish='1'");
                                                ?>
                                                <input class="form-control" name="category" id="category" list="categoryname" placeholder="Choose Category..." required>
                                                <datalist id="categoryname" >
                                                        <?php while($row = mysqli_fetch_array($result)):;?>
                                                        <option type="optgroup" value="<?= $row['category_name'] ?>">
                                                            
                                                        </option>
                                                        <?php endwhile;?> 
                                                </datalist> 
                                                        
                                                       
                                            <br>
                                            <label>Cover Image</label>
                                                <div>
                                                    <input class="form-control" type="file" name="img" required>
                                                    <small class="form-text text-muted">Max. file size: 4MB. Allowed images: jpg, gif, png.</small>
                                                </div>
                                            <br>
                                            <label>Title</label>
                                                <div>
                                                    <input class="form-control" name="title" id="title" placeholder="e.g How to Loose Weight" required>
                                                </div>
                                            <br>
                                            <label>Introduction Statement<br>
                                            <small style="color:red;font-size:11px;font-weight:bold;text-transform:capitalize;">Maximum of 20 words Required..</small> </label>
                                                <div>
                                                    <input class="form-control" name="introduction" id="introduction" placeholder="Enter Catchy Text Here.." required>
                                                </div>
                                            <br>
                                            <label>Post Description</label>
                                                <div>
                                                    <textarea name="body" id="body" cols="30" rows="6" class="form-control" required></textarea>
                                                </div>
                                            <br>
                                           

                                            <input type="submit" name="submit" class="btn btn-info" onclick="return confirm('Save Post?');" value="Save Post">
                                        </div>

                                </form>
                       
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/fileinput.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!--====== Alert Script START ======-->
    <script type="text/javascript">
    
    var editor = CKEDITOR.replace('body');
    CKFinder.setupCKEditor( editor );
    
    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);
    
    </script>


</body>
</html>

