

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
    <div id="categorybar">
        <div class="col-xs-6 col-6 col-sm-8 col-md-9 col-lg-10 col-xl-10" style="float:left;">
                <table style="margin-top: -20px;margin-left:15px;">
                  <?php 
                        include 'conn.php';
                            $sql = "SELECT * FROM blog_cover where publish = '1'";
                            $query = $conn -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0)
                            {
                            foreach($results as $result)
                            {	
                    ?>
                   
                    <tbody style="font-size:9px;padding:10px;">
                    
                                                    
                        <tr>
                            <td><a href="#"><img style="width:200px;height:150px;border-radius:10px;margin-left:-10px;" src="admin/img/images/<?php echo htmlentities($result->imagename);?>"></td>
                        </tr>

                    <?php $cnt=$cnt+1; }} else{ echo '<td colspan="6" style="text-align:center;color:red;font-weight:bold;">Cover Image is Missing!! </td>'; } ?>
                    </tbody>
                </table> 
        </div>
        <div class="col-xs-6 col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2" style="float:right;text-align:right;">
                <table style="margin-top: -30px;margin-left:35px;margin-right:15px;">
                        <th>
                            <tr style="font-size:16px;color:#138ea4;">
                                <td>Categories</td>
                            </tr>
                        </th>
                    <tbody style="font-size:11px;padding:10px;">
                    <?php 
                        include 'conn.php';
                            $sql = "SELECT * FROM blog_categories where publish='1'";
                            $query = $conn -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0)
                            {
                            foreach($results as $result)
                            {	
                    ?>
                                               
                        <tr>
                            <td><a class="btn" style="background-color:#421966;color:#fff;text-decoration:none;font-size:11px;padding:3px;float:right;" href="category_posts?cat=<?php echo $result->category_name;?>"> <?php echo $result->category_name;?></a></td>
                        </tr>

                    <?php $cnt=$cnt+1; }} else{ echo '<td colspan="6" style="text-align:center;color:red;font-weight:bold;">No Categories have been Put Up Yet! </td>'; } ?>
                    </tbody>
                </table> 
        </div>
    </div>
        
</div>
