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
            <?php include 'includes/nav2.php' ?>
        </div>

        <div id="navcontainer">
            <?php include 'includes/category.php' ?>
        </div>
    <!--====== NAVBAR PART ENDS ======-->
    
    <!--====== ABOUT US PART BEGINS ======-->
    <div class="pic_wrapper">
        <div class="row">
        <?php 
            include 'includes/conn.php';
                $sql = "SELECT * FROM blog_pages where pagename='aboutus'";
                $query = $conn -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {	
        ?>
             <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                 <div class="row" style="max-width: 800px;margin-left:auto;margin-right:auto;margin-bottom:30px;">
                            <!-- <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 col-xs-12">  
                                   <img style="border-radius:50px;padding:40px;width:25%;" src="admin/img/images/<?php echo htmlentities($result->image);?>">
                                </div>
                            -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 col-xs-12">
                                <h5 style="font-size:20px;margin-top:5px;color:#138ea4;"><?php echo htmlspecialchars_decode($result->paragraphone);?></h5> 
                                <hr style="background-color:#421966;border-width:3px;width:100px;margin-top:-5px;border-radius:50px;">
                                <span class="content_two"><?php echo htmlspecialchars_decode($result->paragraphtwo);?></span>
                            </div>
                            
                            <?php $cnt=$cnt+1; }} else{ echo '<p style="text-align:center;color:red;font-weight:bold;margin-left:auto;margin-right:auto;">Please Be Patient While We Update this Page! </p>'; } ?>
                 </div>
                 <div class="row" style="margin-top:20px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div id="picpost">
                                <a href="#" style="background-color:#421966;color:#fff;padding:5px;margin-bottom:20px;font-size:12px;" class="btn"> Start Self Diet Plan </a>
                            </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12" style="margin-top: 10px;">
                        <div id="picpost">
                            <img style="max-width:100%;margin-left:auto;margin-right:auto;" src="img/contact.jpg">
                            <br>
                            <br>
                            <p style="font-size:14px;font-weight:900;color:#138ea4;">We are always Ready to Talk to You.</p>
                            <a href="tel:0711530740"style="background-color:#421966;color:#fff;padding:5px;" class="btn"> Call Us Now </a>
                        </div>
                   
                    </div>
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
       }, 3000);
    </script>

    

</body>
</html>