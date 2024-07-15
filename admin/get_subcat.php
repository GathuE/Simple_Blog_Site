<?php
	include 'includes/db_conn.php'; 
	$category_id=$_POST["category_id"];
	$result = mysqli_query($con,"SELECT * FROM servings where foods_id=$category_id");
?>
<option value="">Select Serving Item</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
<?php
}
?>