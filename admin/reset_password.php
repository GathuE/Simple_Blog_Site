<?php

// add this at the start of the script
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Deny all overcoming errors
error_reporting (0);

session_start();



//include the connection file
include 'includes/conn.php';

if(isset($_POST['jobid']) && isset($_POST['question']) && isset($_POST['answer'])){
    $jobid = $_POST['jobid']; 
    $question = $_POST['question'];
    $answer = md5($_POST['answer']);

    //Notify User on Empty Fields Preventing Submit Function

    if (empty($jobid)){
        header("Location:reset_password?error=Please Provide your Login ID !!");
    } else if(empty($question)){
        header("Location:reset_password?error=Please Select Your Security Question !!");
    } else if(empty($answer)){
        header("Location:reset_password?error=Answer Cannot Be Empty !!");

    } else {
        //Perform Select Statement 
        $stmt = $conn->prepare("SELECT * FROM blog_useraccounts WHERE jobid=? LIMIT 1");
        $stmt->execute([$jobid]);

        if ($stmt->rowCount() === 1){
            $user = $stmt->fetch();

            $user_id = $user['id'];
            $user_jobid = $user['jobid'];
            $user_question = $user['question'];
            $user_answer = $user['answer'];


            
             //Check for Authenticity in Database
             if($jobid === $user_jobid && $question === $user_question){
                if($answer === $user_answer){

                    // session data for Receptionist
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_jobid'] = $user_jobid;
                    $_SESSION['user_role'] = $user_role;
                    $_SESSION['user_firstname'] = $user_firstname;
                    $_SESSION['user_lastname'] = $user_lastname;
                    header("Location:new_password?success=You have provided Correct Verification Details.");

                }else{
                    header("Location:reset_password?error=You have Provided Wrong Details !!");

                }
            } 
            //echo error for wrong ID
        }else {
            header("Location:reset_password?error=You have Provided Wrong Details !!");
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
            <div class="col"style="position:absolute; width:350px;">
                    <!-- Alert Box for User Logindata Errors -->
                    <?php if ($_GET['errorlogin']) { ?>
                        <div class="alert alert-danger fade show" role="alert">
                            <strong><?=htmlspecialchars($_GET['errorlogin']) ?></strong>
                        </div>
                    <?php } ?>
                       
                    <!-- Alert Box for User Logindata Errors -->
                    <?php if ($_GET['error']) { ?>
                    <div class="alert alert-danger fade show" role="alert">
                        <strong><?=htmlspecialchars($_GET['error']) ?></strong>
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
                            <select name="question" class="form-control" id="question">
                                <optgroup>
                                    <option value="">Choose your Security Question</option>
                                    <option value="1">What is your Role?</option>
                                    <option value="2">What is your Favourite Color?</option>
                                    <option value="3">What is your middle name?</option>
                                    
                                </optgroup>
                            </select>
                        </div>
                        <div class="mb-4"> 
                            <input type="text" name="answer" class="form-control" id="answer" placeholder="Enter appropriate Answer">
                        </div>
                            <button type="submit" class="btn-sensational" style="outline: none;">Submit</button>
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
       }, 5000);
    </script>

    

</body>
</html>
