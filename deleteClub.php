<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM clubs WHERE club_id = $id"; 
$result = mysqli_query($conn,$query) or die (mysqli_error($conn));
header("Location: clubList.php"); 
exit();
?>