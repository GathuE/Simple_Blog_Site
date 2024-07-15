<?php

//Deny all overcoming errors
error_reporting (0);
session_start();

//include the connection file
include 'includes/conn.php';

if(isset($_POST['jobid']) && isset($_POST['password'])){
    $jobid = $_POST['jobid'];
    $password = md5($_POST['password']);

    //Notify User on Empty Fields Preventing Login

    if (empty($jobid)){
        header("Location:index?error=Please Input Login ID !!");
    } else if(empty($password)){
        header("Location:index?error=Please Input Password !!");

    } else {
        //Perform Select Statement 
        $stmt = $conn->prepare("SELECT * FROM blog_useraccounts WHERE jobid=? LIMIT 1");
        $stmt->execute([$jobid]);

        if ($stmt->rowCount() === 1){
            $user = $stmt->fetch();

            $user_jobid = $user['jobid'];
            $user_role = $user['role'];
            $user_username = $user['username'];
            $user_password = $user['password'];

        
             //Check for Admin login Password
             if($jobid === $user_jobid  && $user_role === 'admin'){
                if($password === $user_password){

                    // session data for Receptionist                    
                    $_SESSION['user_jobid'] = $user_jobid;
                    $_SESSION['user_role'] = $user_role;
                    $_SESSION['user_username'] = $user_username;                   
                    header("Location:dashboard?success= You have Successfully Logged In !!");
                    echo $_SESSION['user_jobid'];

                }else{
                    header("Location:index?error=Incorrect Password !!");

                }
            } 
            //echo error for wrong ID
        }else {
            header("Location:index?error=Incorrect Login Details !!");
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
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>

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
            <div class="col" style="position:absolute; width:350px;">
                    <!-- Alert Box for User Logindata Errors -->
                    <?php if ($_GET['errorlogin']) { ?>
                        <div class="alert alert-danger fade show" style="max-width:wrap-content;max-height:wrap-content;position:relative;margin-top:-20px;font-size:12px;" role="alert">
                            <strong><?=htmlspecialchars($_GET['errorlogin']) ?></strong>
                        </div>
                    <?php } ?>
                       
                    <!-- Alert Box for User Logindata Errors -->
                    <?php if ($_GET['error']) { ?>
                    <div class="alert alert-danger fade show" style="max-width:wrap-content;max-height:wrap-content;position:relative;margin-top:-20px;font-size:12px;" role="alert">
                        <strong><?=htmlspecialchars($_GET['error']) ?></strong>
                    </div>
                    <?php } ?>

                    <!-- Alert Box for Successful Login -->
                    <?php if ($_GET['success']) { ?>
                    <div class="alert alert-info fade show" style="max-width:wrap-content;max-height:wrap-content;position:relative;margin-top:-20px;font-size:12px;" role="alert">
                        <strong><?=htmlspecialchars($_GET['success']) ?></strong>
                    </div>
                    <?php } ?>
                     <!-- Alert Box for Successful Password Reset -->
                    <?php if ($_GET['passwordsuccess']) { ?>
                        <div class="alert alert-info fade show" style="max-width:wrap-content;max-height:wrap-content;position:relative;margin-top:-20px;font-size:12px;" role="alert">
                            <strong><?=htmlspecialchars($_GET['passwordsuccess']) ?></strong>
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
                            <input type="text" name="jobid" class="form-control" id="jobid" placeholder="Enter Login ID">
                        </div>
                        <div class="mb-4"> 
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                        </div>
                        <button type="submit"  class="btn-sensational" style="outline: none;">LOGIN</button>
                    </form>

                    <div class="py-3">
                        <a class="reset_password" href="reset_password">Forgot Password?</a>
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
