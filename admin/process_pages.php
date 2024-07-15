<?php
include 'includes/conn.php';
if(isset($_GET['pub']))
{
    $postid = $_GET['pub'];
    $sql2= "SELECT * FROM blog_pages where publish='1' and id=:postid";
    $query= $conn -> prepare($sql2);
    $query->bindParam(':postid',$postid,PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
        if($query -> rowCount() > 0)
            {
                header("Location: view_pages?publisherror= Page is Published at the Moment!!");
            } 
        else{

            $sql = "UPDATE blog_pages set publish = '1' WHERE id=:postid";
            $query = $conn->prepare($sql);
            $query->bindParam(':postid',$postid,PDO::PARAM_STR);
            $query->execute();
            header("Location: view_pages?publishsuccess= Page Successfully Published !!");
        }
} else 
    if(isset($_GET['unpub'])){
    $postid = $_GET['unpub'];
    $sql = "UPDATE blog_pages set publish = '0' WHERE id=:postid";
    $query = $conn->prepare($sql);
    $query->bindParam(':postid',$postid,PDO::PARAM_STR);
    $query->execute();
    header("Location: view_pages?publishsuccess= Page Successfully Unpublished !!");
}

if(isset($_GET['del']))
{
    $postid = $_GET['del'];
    $sql = "DELETE FROM blog_pages WHERE id=:postid";
    $query = $conn->prepare($sql);
    $query->bindParam(':postid',$postid,PDO::PARAM_STR);
    $query->execute();
    header("Location: view_pages?publishsuccess= Page Successfully Deleted !!");
}
?>