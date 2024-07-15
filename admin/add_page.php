
<?php

// add this at the start of the script
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Deny all overcoming errors
error_reporting (0);

session_start();

//redirect to login if User has not logged in(Closing Rule after HTML)

if(isset($_SESSION['user_jobid'])) {

?>
<?php 

 
 include 'includes/conn.php'; 

 if(isset($_POST['submit']))
        {
            $userid=$_SESSION['user_jobid'];
            $pname=$_POST['pagename'];
            $image=$_FILES["img"]["name"];
            $pone=$_POST['paragraphone'];
            $ptwo=$_POST['paragraphtwo'];
           
            
            move_uploaded_file($_FILES["img"]["tmp_name"],"img/images/".$_FILES["img"]["name"]);

            
            
            $sql = "INSERT INTO blog_pages (pagename, image, paragraphone, paragraphtwo, publish, user ) values (:pname, :image, :pone, :ptwo, '0',  :userid)";
            $query = $conn->prepare($sql);
            $query->bindParam(':userid',$userid,PDO::PARAM_STR);
            $query->bindParam(':pname',$pname,PDO::PARAM_STR);
            $query->bindParam(':image',$image,PDO::PARAM_STR);
            $query->bindParam(':pone',$pone,PDO::PARAM_STR);
            $query->bindParam(':ptwo',$ptwo,PDO::PARAM_STR);
        
            $query->execute();
            header("Location: view_pages?addpagesuccess= Page Created Successfully !!");
        }
        
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Home -- Dietetics </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- ckeditor -->       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
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
                                    <?php if ($_GET['success']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['success']) ?></strong>
                                    </div>
                                    <?php } ?>
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;"> <?= $_SESSION['user_role'] ?></h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget" style="font-weight: 700;">
                            <a class="btn btn-info" href="view_pages" style="color:white;float:right;">View Pages</a><h1 style="float: left;">New Page</h1>
                        
                                <form method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                                
                                                
                                                <input class="form-control" name="pagename" id="category" list="categoryname" placeholder="Choose Page..." required>
                                                    <datalist id="categoryname" >
                                                            <option type="optgroup" value="aboutus" >About Us</option>
                                                            <option type="optgroup" value="ourservices" >Our Services</option>
                                                    </datalist>  
                                        
                                            <br>
                                            <label>Page Image</label>
                                                <div>
                                                    <input class="form-control" type="file" name="img" required>
                                                    <small class="form-text text-muted">Max. file size: 4MB. Allowed images: jpg, gif, png.</small>
                                                </div>
                                            <br>
                                            <label>Paragraph One</label>
                                                <div>
                                                    <textarea name="paragraphone" id="paragraphone" cols="30" rows="6" class="form-control" required></textarea>
                                                </div>
                                            <br>
                                            
                                            <label>Paragraph Two</label>
                                                <div>
                                                    <textarea name="paragraphtwo" id="paragraphtwo" cols="30" rows="6" class="form-control" required></textarea>
                                                </div>
                                            <br>
                                               

                                            <input type="submit" name="submit" class="btn btn-info" onclick="return confirm('Save Page?');" value="Save Page">
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
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>
</html>

<!--====== Alert Script START ======-->
<script type="text/javascript">

CKEDITOR.replace('paragraphone');
CKEDITOR.replace('paragraphtwo');

setTimeout (function(){
//closing the alert
$('.alert').alert('close');
}, 3000);

</script>

<?php
} else {
    header("Location:index?errorlogin=Please Login to Proceed !!");
}
?>