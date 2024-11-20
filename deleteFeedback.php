<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM feedback WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: feedbackList.php"); 
exit();
?>