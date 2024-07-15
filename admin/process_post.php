<?php 
include 'includes/conn.php'; 
if(isset($_POST['submit']))
        {
            $category=$_POST['category'];
            $image=$_FILES["img"]["name"];
            $title=$_POST['title'];
            $intro=$_POST['introduction'];
            $body=$_POST['body'];
            
            move_uploaded_file($_FILES["img"]["tmp_name"],"img/images/".$_FILES["img"]["name"]);
          

            $sql = "INSERT INTO blog_posts (category, imageone, title, intro, body, publish) values (:category, :image, :title, :intro, :body, '0')";
            $query = $conn->prepare($sql);
            $query->bindParam(':category',$category,PDO::PARAM_STR);
            $query->bindParam(':image',$image,PDO::PARAM_STR);
            $query->bindParam(':title',$title,PDO::PARAM_STR);
            $query->bindParam(':intro',$intro,PDO::PARAM_STR);
            $query->bindParam(':body',$body,PDO::PARAM_STR);
            $query->execute();
            header("Location: view_posts?addpostsuccess= Post Created Successfully !!");
        }
        
