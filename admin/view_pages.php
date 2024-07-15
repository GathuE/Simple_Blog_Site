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
                                <!-- Alert Box for Successful Post -->
                                    <?php if ($_GET['addpagesuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['addpagesuccess']) ?></strong>
                                    </div>
                                    <?php } ?>

                                <!-- Alert Box for Successful Post Publish -->
                                <?php if ($_GET['publishsuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['publishsuccess']) ?></strong>
                                    </div>
                                    <?php } ?>

                                 <!-- Alert Box for Error Post Publish -->
                                 <?php if ($_GET['publisherror']) { ?>
                                    <div class="alert alert-danger fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['publisherror']) ?></strong>
                                    </div>
                                    <?php } ?>

                                <!-- Alert Box for Successful Post -->
                                     <?php if ($_GET['editpagesuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['editpagesuccess']) ?></strong>
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
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">
                        <h1 style="float: left;">Pages</h1>
                       <form action="process_pages">
                           <table class="table mb-0 table-striped" style="border:2px;font-size:12px;text-align:right;cursor:pointer;">
                                        <thead style="font-weight:500;color:#421966">
                                            <tr>
                                                <td>No:</td>
                                                <td>Name</td>
                                                <td>Image</td>
                                                <td>Heading</td>
                                                <td>Action</td>

                                            </tr>
                                        </thead>
										<tbody>

                                            <?php 
                                            include 'includes/conn.php';
                                                $sql = "SELECT * FROM blog_pages";
                                                $query = $conn -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {	
                                            ?>
											<tr>
		                                        <td><?php echo htmlentities($cnt);?></td> 
                                                <td><?php echo htmlentities($result->pagename);?></td>
                                                <td> <img style="width:25%;" src="img/images/<?php echo htmlentities($result->image);?>"></td>
                                                <td><?php echo htmlspecialchars_decode($result->paragraphone);?></td>
												
												<td style="font-size:12px;padding:10px;">
                                                    <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="process_pages?pub=<?php echo $result->id;?>" onclick="return confirm('Publish Page?');"><i class="fa fa-eye m-r-5"></i> Publish</a>
                                                        <a class="dropdown-item" href="process_pages?unpub=<?php echo $result->id;?>" onclick="return confirm('Unpublish Page?');"><i class="fa fa-eye m-r-5"></i> Unpublish</a>
                                                        <a class="dropdown-item" href="edit_pages?edit=<?php echo $result->id;?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <!-- <a class="dropdown-item" href="view_pages?del=<?php echo $result->id;?>" onclick="return confirm('Delete Page?');"><i class="fa fa-trash-o m-r-5"></i> Delete</a> -->
                                                    </div>
                                                    </div>
                                                </td>
											</tr>
                                            <?php $cnt=$cnt+1; }} else{ echo '<td colspan="6" style="text-align:center;color:red;font-weight:bold;">You have no Pages Yet! </td>'; } ?>
											
										</tbody>
									</table>
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
    
    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);
    
    </script>

</body>
</html>


