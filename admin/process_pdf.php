<?php 
include 'includes/conn.php'; 
if(isset($_POST['submit']))
    {
            $user=$_POST['user_id'];
            $description=$_FILES["description"]["name"];
            $mealplan=$_FILES["mealplan"]["name"];
            $detailedplan=$_FILES["detailedplan"]["name"];


            move_uploaded_file($_FILES["description"]["tmp_name"],"pdf/clientplans/".$_FILES["description"]["name"]);
            move_uploaded_file($_FILES["mealplan"]["tmp_name"],"pdf/clientplans/".$_FILES["mealplan"]["name"]);
            move_uploaded_file($_FILES["detailedplan"]["tmp_name"],"pdf/clientplans/".$_FILES["detailedplan"]["name"]);

            $sql = "INSERT INTO client_plans (user_id, description_name, mealplan_name,  detailedplan_name ) values (:user, :description, :mealplan, :detailedplan)";
            $query = $conn->prepare($sql);
            $query->bindParam(':user',$user,PDO::PARAM_STR);
            $query->bindParam(':description',$description,PDO::PARAM_STR);
            $query->bindParam(':mealplan',$mealplan,PDO::PARAM_STR);
            $query->bindParam(':detailedplan',$detailedplan,PDO::PARAM_STR);
            $query->execute();
            header("Location: pdf_upload?uploadsuccess= PDF Successfully Uploaded !!");
        }
        
