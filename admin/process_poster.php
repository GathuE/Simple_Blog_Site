<?php 
include 'includes/conn.php'; 
if(isset($_POST['submit']))
    {
            $image=$_FILES["img"]["name"];
            
            move_uploaded_file($_FILES["img"]["tmp_name"],"img/images/".$_FILES["img"]["name"]);

            $sql = "INSERT INTO blog_cover (imagename, publish ) values (:image, '0')";
            $query = $conn->prepare($sql);
            $query->bindParam(':image',$image,PDO::PARAM_STR);
            $query->execute();
            header("Location: view_poster?addpostersuccess= Cover Poster Successfully Added !!");
        }
        
