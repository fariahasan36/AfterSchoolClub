<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM category WHERE category_id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: categoryList.php"); 
exit();
?>