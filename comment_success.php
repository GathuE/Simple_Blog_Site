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
    
    <!--====== Google Fonts ======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    
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
    
    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART STARTS ======-->
   
        <div id="navcontainer">
            <?php include 'includes/nav3.php' ?>
        </div>

        <div id="navcontainer">
            <?php include 'includes/category.php' ?>
        </div>
    <!--====== NAVBAR PART ENDS ======-->
    
    <!--====== ABOUT US PART BEGINS ======-->
    <div class="pic_wrapper">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12" style="margin-top: 20px;">
                <!-- Alert Box for Successful Comment -->
                <?php if ($_GET['commentsuccess']) { ?>
                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:relative;font-size:12px;margin-left:auto;margin-right:auto;" role="alert">
                        <strong><?=htmlspecialchars($_GET['commentsuccess']) ?></strong>
                    </div>
                    <?php }?>
            </div>

        </div>
        <div class="row">
             
             <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12" style="margin-top: 40px;">
                      <div id="picpost">
                        <img style="max-width:100%;margin-left:auto;margin-right:auto;" src="img/contact.jpg">
                        <br>
                        <br>
                        <p style="font-size:14px;font-weight:900;color:#138ea4;">Always Ready to Talk to You.</p>
                        <a href="tel:0701792195"style="background-color:#421966;color:#fff;padding:5px;margin-bottom:20px;font-size:12px;" class="btn"> Call Now </a>
                    </div>
                   
             </div>
        </div>
    </div>

    <!--====== ABOUT US PART ENDS ======-->


    
 

   
    

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
       }, 10000);
    </script>

    

</body>
</html>