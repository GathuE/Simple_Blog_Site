<?php 
// add this at the start of the script
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//Deny all overcoming errors
error_reporting (0);
session_start();
//include the connection file
include 'includes/conn.php';

if(isset($_POST['jobid']) && isset($_POST['newpassword']) && isset($_POST['confirmpassword'])){
    $jobid = $_POST['jobid'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    //Notify User on Empty Fields Preventing Processing

    if (empty($jobid)){
        header("Location:new_password?error=Please Input your Job ID !!");
    }else if(empty($newpassword)){
        header("Location:new_password?error=Please Input New Password !!");
        
    }else if(empty($confirmpassword)){
        header("Location:new_password?error=Please Retype Your New Password !!");
        
    } else if($newpassword != $confirmpassword){
        header("Location:new_password?errorpass=Passwords Do Not Match !!");
        
    } else {
        //Perform Select Statement
       
        $stmt = $conn->prepare("SELECT * FROM blog_useraccounts WHERE jobid=? LIMIT 1");
        $stmt->execute([$jobid]);
       


        if ($stmt->rowCount() ===1){
            $user = $stmt->fetch();

            $user_jobid = $user['jobid'];
            $user_password = $user['password'];
            
            

           
            $stmt = $conn->prepare("UPDATE blog_useraccounts SET password =md5(:newpassword) WHERE jobid=:jobid LIMIT 1");
            $stmt -> bindParam(':jobid',$jobid, PDO::PARAM_STR);
            $stmt -> bindParam(':newpassword',$newpassword, PDO::PARAM_STR);
            $stmt-> execute();

            $_SESSION['user_jobid'] = $user_jobid;
            header('Location:index?passwordsuccess=Password Reset Complete !!');


           
    
        }else {
            header("Location:new_password?error=Something Went Wrong !!");
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Nutrition -- Blog </title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="bootstrap/dist/fonts/font-awesome.min.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="style.css">
    
   <style>
       
   </style>
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
<div class="container-fluid">
     
     <div class="row justify-content-center">
            <div class="col"  style="position:absolute; width:350px;">
                    <!-- Alert Box for User Logindata Errors -->
                    <?php if ($_GET['error']) { ?>
                        <div class="alert alert-danger fade show" style="max-width:wrap-content;max-height:wrap-content;position:relative;margin-top:-20px;font-size:12px;" role="alert">
                            <strong><?=htmlspecialchars($_GET['error']) ?></strong>
                        </div>
                    <?php } ?>
                    <?php if ($_GET['errorpass']) { ?>
                        <div class="alert alert-danger fade show" style="max-width:wrap-content;max-height:wrap-content;position:relative;margin-top:-20px;font-size:12px;" role="alert">
                            <strong><?=htmlspecialchars($_GET['errorpass']) ?></strong>
                        </div>
                    <?php } ?>
                     <!-- Alert Box for Successful Data Verification -->
                     <?php if ($_GET['success']) { ?>
                        <div class="alert alert-info fade show" style="max-width:wrap-content;max-height:wrap-content;position:relative;margin-top:-20px;font-size:12px;" role="alert">
                            <strong><?=htmlspecialchars($_GET['success']) ?></strong>
                        </div>
                    <?php } ?>

            </div>
    </div>
</div>



 
<div class="card">
    <img class="login_image" src="img/logo.png">
        <div class="card-body">
                <div class="container-fluid">
                    <form method="post">
                    <div class="mb-4"> 
                            <input type="hidden" name="jobid" value="<?=$_SESSION['user_jobid']?>" class="form-control" id="jobid" placeholder="Re-Enter Job ID">
                        </div>
                        <div class="mb-4"> 
                            <input type="password" name="newpassword"  class="form-control" id="newpassword" placeholder="Enter New Password">
                        </div>
                        <div class="mb-4"> 
                            <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn-sensational" style="outline: none;">SUBMIT</button>
                    </form>

                    <div class="py-3">
                        <a class="reset_password" href="index">Login Here</a>
                    </div>                          
                                                        
                </div>
        </div>
        
</div>
   
    

<?php 

    //include the footer file
    include 'includes/footer.php';

?>    

    
    
    <!--====== jquery js ======-->
    <script src="bootstrap/dist/jquery/modernizr-3.6.0.min.js"></script>
    <script src="bootstrap/dist/jquery/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    
     <!--====== Main js ======-->
     <script src="main.js"></script>

    <!--====== Alert Script ======-->
    <script type="text/javascript">

       setTimeout (function(){
           //closing the alert
           $('.alert').alert('close');
       }, 3000);
    </script>

    

</body>
</html>
