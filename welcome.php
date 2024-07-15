<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="how to lose weight, weight loss, low card, nutrition, africanmeals, african diet, diet plans,diabetic diet, weight loss pills,vegan diet, no carb diet, healthy diet, Kuria wa Njoroge, calories, nutritionist, apple, avocado nutrition, oranges, vitaminC, healthy eating, low calorie meals, nutrients, spinach, bodybuilding tips, healthy meals">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Nutrition -- Blog </title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" type="image/png" style="border-radius:50%;" href="img/logo.png" />

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
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400&family=Indie+Flower&display=swap" rel="stylesheet">
 
  
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
            <?php include 'includes/navbar.php' ?>
        </div>

        <div id="navcontainer">
            <?php include 'includes/category.php' ?>
        </div>
    <!--====== NAVBAR PART ENDS ======-->
     <!--====== POSTS PART STARTS ======-->

    <div id="postscontainer">
   
        <!--====== MAJOR COLUMN PART STARTS ======-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                <div class="row">

                        <?php include 'includes/conn.php'; ?> 

                        <?php $sql = "SELECT * FROM blog_posts where publish ='1' order by id desc limit 12";
                        $query = $conn -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {  ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 col-xs-12">
                                        <div class="postscard" id="post">
                                            <img class="cover_image" src="admin/img/images/<?php echo htmlentities($result->imageone);?>">
                                                <div>
                                                    <p id="post_content">
                                                        <span class="topic"><?php echo htmlentities($result->title);?></span><br>
                                                        <span class="content"><?php echo htmlspecialchars_decode($result->intro);?></span> 
                                                    </p>
                                                    <a class="btn_post" href="view_post?post=<?php echo $result->id;?>">Read More</a>                                          
                                                </div>
                                                
                                        </div>
                                </div>
                        <?php }} else{ echo '<p style="margin-left:auto;margin-right:auto;color:red;font-weight:bold;">Ooops !! There are no Posts Yet! </p>'; }?>     
                </div>
            </div>
             <!--====== MAJOR COLUMN PART ENDS ======-->
            

       
    </div>
    <!--====== POSTS PART ENDS ======-->

    
    <!--====== PICTURE PART BEGINS ======-->
    <div class="pic_wrapper">
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                     <div id="picpost">
                        <a href="https://www.yoururl.com" style="background-color:#421966;color:#fff;padding:5px;margin-bottom:20px;font-size:12px;" class="btn"> Pay our Official Website a visit. <br></a>
                    </div>
             </div>
        </div>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                     <div id="picpost">
                        <img style="max-width:100%;margin-left:auto;margin-right:auto;" src="img/contact.jpg">
                        <br>
                        <br>
                        <p style="font-size:14px;font-weight:900;color:#138ea4;">Always Ready to Talk to You.</p>
                        <a href="tel:0701792195"style="background-color:#421966;color:#fff;padding:5px;margin-bottom:20px;font-size:12px;" class="btn"> Call Us Now </a>
                        
                    </div>
             </div>
        </div>
    </div>

    <!--====== PICTURE PART ENDS ======-->


    
 

   
    

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
       }, 6000);
    </script>

    

</body>
</html>