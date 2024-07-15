<?php 
include'includes/conn.php'; 
if(isset($_POST['submit']))
       {
           $title=$_POST['title'];
           $name=$_POST['name'];
           $contact=$_POST['contact'];
           $comment=$_POST['comment'];
           $postid=$_GET['post'];
           $sql = "INSERT INTO blog_comments (postid, title, name, contact, comment, publish ) values (:postid, :title, :name, :contact, :comment, '0')";
           $query = $conn->prepare($sql);
           $query->bindParam(':title',$title,PDO::PARAM_STR);
           $query->bindParam(':name',$name,PDO::PARAM_STR);
           $query->bindParam(':contact',$contact,PDO::PARAM_STR);
           $query->bindParam(':comment',$comment,PDO::PARAM_STR);
           $query->bindParam(':postid',$postid,PDO::PARAM_STR);
           $query->execute();
           header("Location:comment_success?commentsuccess=Thank You For Your Enquiry.We will reach out to you soon !!");
       }?>
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
 
  
</head>

<body>
   
    <!--====== PRELOADER PART START 
    
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
    
 PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART STARTS ======-->
   
        <div id="navcontainer">
            <?php include 'includes/navbar.php' ?>
        </div>

        <div id="navcontainer">
            <?php include 'includes/category.php' ?>
        </div>
    <!--====== NAVBAR PART ENDS ======-->
     
    <!--====== POST PART BEGINS ======-->
    <div class="pic_wrapper">
        <div class="row">
        <?php include'includes/conn.php'; 
                        $postid = $_GET['post'];                      
                        $sql = "SELECT category, imageone, title, intro, body FROM blog_posts where id=:postid and publish='1'";
                        $query = $conn -> prepare($sql);
                        $query->bindParam(':postid',$postid,PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {
            ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                 <div class="row">

                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 col-xs-12" id="view_post">
                                <img style="border-radius:20px;width:75%;padding:20px;" src="admin/img/images/<?php echo htmlentities($result->imageone);?>">
                                <h6 style="color:rgb(184, 164, 164);">Nutri App / Custom Images</h6>
                            </div>        
                 </div> 
                 <div class="row">
                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 col-xs-12" id="view_post_content">
                                <div id="viewpost_content">
                                    <span class="topic_post"><?php echo htmlentities($result->title);?></span><br>
                                    <span class="content_post"><?php echo htmlspecialchars_decode($result->intro);?></span>
                                    <span class="content_two"><?php echo htmlspecialchars_decode($result->body);?></span>
                                </div>
                                <?php $cnt=$cnt+1; }} else{ echo '<p style="margin-left:auto;margin-right:auto;color:red;font-weight:bold;">The Post has been Deleted!! </p>'; }?>
                            </div>
                           
                 </div>
                 
                
                 <div class="row" style="margin-top: 20px;">
                            
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-12 col-xs-12">
                                <div id="picpost">
                                    <h6 class="share_heading" style="margin-bottom:5px;text-transform:uppercase;"> Share this Post</h6>
                                        <table class="share_link">
                                            <tr>
                                                <td><a href="http://www.facebook.com/share.php?u=YOUR_URL" target="_blank"><img class="social_icons" src="img/facebook.png" ></a></td>
                                                <td><a href="https://twitter.com/share?url=YOUR_URL&amp;text=YOUR_TITLE&amp;hashtags=YOUR_HASHTAGS" target="_blank"><img class="social_icons"  src="img/twitter.png" ></a></td>
                                                <td><a href="https://web.whatsapp.com/send?text=YOUR_URL" target="_blank"><img class="social_icons"  src="img/whatsapp.png" ></a></td>
                                            </tr>                              
                                        </table>
                                </div>
                            </div>  -->
                 
             </div>
             
        </div>
    </div>

    <!--====== POST PART ENDS ======-->
    <!--====== PICTURE PART BEGINS ======-->
    <div class="pic_wrapper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div id="view_picpost">
                                    <h5 class="comment" style="margin-top:40px;">Have a Diet Plan Enquiry ?</h5>
                                    <h6 class="comment2">We are always ready to respond.</h6>
                                        <form class="comment_form" method="post">
                                                    <br>
                                                            <input type="hidden" class="form-control" name="title" id="title" value="<?php echo htmlentities($result->title);?>">  
                                                        <div>
                                                            <input class="form-control" name="name" id="name" placeholder="Enter your Full Name e.g John Doe..." required>
                                                        </div>
                                                    <br>
                                                        <div>
                                                            <input class="form-control" name="contact" id="contact" placeholder="Enter your Phone Number or Email Address..." required>
                                                        </div>
                                                    <br>
                                                    <label style="font-weight: 500;color:#421966;">Diet Plan For?</label>
                                                        <textarea class="form-control" name="comment" cols="20" rows="3" placeholder="Enter the Diet Plan Goal Here e.g. Weight Loss.." required></textarea>

                                                    <br>
                                                        <input type="submit" name="submit" style="background-color:#421966;color:#fff;padding:5px;font-size:12px;" class="btn" value="Make Enquiry">
                                        </form>
                                    <br>
                                
                                </div>
            </div>
           <!--  
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                    <div id="picpost">
                        <img style="max-width:100%;margin-left:auto;margin-right:auto;" src="img/contact.jpg">
                        <br>
                        <br>
                        <p style="font-size:14px;font-weight:900;color:#138ea4;">Always Ready to Talk to You.</p>
                        <a href="tel:0701792195"style="background-color:#421966;color:#fff;padding:5px;margin-bottom:20px;font-size:12px;" class="btn"> Call Now </a>
                    </div>
                 </div>

            -->
            
        </div>
    </div>

    <!--====== PICTURE PART ENDS ======-->


    <!-- 
        <a href="#" class="back-to-top">Scroll Up</a>
    -->


   
    

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