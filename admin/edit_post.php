<?php 
 include 'includes/conn.php'; 
 if(isset($_POST['submit']))
        {
            $category=$_POST['category'];
            $image=$_FILES["img"]["name"];
            $title=$_POST['title'];
            $intro=$_POST['introduction'];
            $body=$_POST['tbody'];
            $id=$_GET['edit'];

            move_uploaded_file($_FILES["img"]["tmp_name"],"img/images/".$_FILES["img"]["name"]);
            
            $sql = "update  blog_posts set category=:category, imageone=:image, title=:title, intro=:intro, body=:body  where id=:id";
            $query = $conn->prepare($sql);
            $query->bindParam(':category',$category,PDO::PARAM_STR);
            $query->bindParam(':image',$image,PDO::PARAM_STR);
            $query->bindParam(':title',$title,PDO::PARAM_STR);
            $query->bindParam(':intro',$intro,PDO::PARAM_STR);
            $query->bindParam(':body',$body,PDO::PARAM_STR);
            $query->bindParam(':id',$id,PDO::PARAM_STR);
            $query->execute();
            header("Location: view_posts?editpostsuccess= Post Edited Successfully !!");
        }
        
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Nutrition -- Blog </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- ckeditor -->       
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- ckfinder -->       
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
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
                            <a class="btn btn-info" href="view_posts" style="color:white;float:right;">View Posts</a><h1 style="float: left;">Edit Post</h1>
                        
                                <form method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                                
                                <?php	
                                        $id=$_GET['edit'];
                                        $ret="select * from blog_posts where id=:id";
                                        $query= $conn -> prepare($ret);
                                        $query->bindParam(':id',$id, PDO::PARAM_STR);
                                        $query-> execute();
                                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query -> rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {
                                        
                                ?>
                                            

                                            
                                            <input class="form-control" name="category" style="height:40px;color:blue;" id="category" list="categoryname" value="<?php echo htmlentities($result->category);?>" readonly>
                                                  
                                            <br>
                                            <label>Current Cover Image</label>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <table style="text-align: center;">
                                                        <tr>
                                                             <td style="margin-left: auto;margin-right:auto;">
                                                                <img style="width: 70%;" src="img/images/<?php echo htmlentities($result->imageone);?>">
                                                            </td> 
                                                        </tr> 
                                                    </table>
                                                </div>
                                            <br>  
                                            <label>New Cover Image</label>
                                                <div>
                                                    <input class="form-control" type="file" name="img" required>
                                                    <small class="form-text text-muted">Max. file size: 4MB. Allowed images: jpg, gif, png.</small>
                                                </div>
                                            <br>
                                            <label>Post Title</label>
                                                <div>
                                                    <input class="form-control" name="title" id="title" value="<?php echo htmlentities($result->title);?>" required>
                                                </div>
                                            <br>
                                            <label>Post Introduction</label>
                                                <div>
                                                    <input class="form-control" name="introduction" id="introduction" value="<?php echo htmlentities($result->intro);?>" required>
                                                </div>
                                            <br>
                                            <label>Post Description</label>
                                                
                                                <div>
                                                    <textarea name="tbody" id="tbody" cols="30" rows="6" class="form-control"  required>
                                                        <?php echo htmlentities($result->body);?>
                                                    </textarea>
                                                </div>
                                            <br>
                                            <?php }} else{
                                            echo ' No Data Available !!';
                                        } ?>
                                               

                                            <input type="submit" name="submit" style="float: right;" class="btn btn-info" onclick="return confirm('Save Post?');" value="Save Post">
                                            <a class="btn btn-warning" style="float: left;" href="view_posts">Cancel</a>
                                        </div>

                                </form>
                       
							
                        </div>
                    </div>
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
    
    var editor = CKEDITOR.replace('tbody');
    CKFinder.setupCKEditor( editor );
    
    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);
    
    </script>

</body>
</html>


