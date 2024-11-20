<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>After School Club</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<!-- Header starts -->
<div class="container">
  <div class="row">
    
    <div class="col-md-6 col-sm-6">
        <div class="row">
          <!-- <div class="col-md-12 col-sm-12"> -->
            <div class="col-md-2 col-sm-6">
              <img src="image/C.png" class="img-responsive" width="70" height="70">
            </div>
        
            <div class="col-md-10 col-sm-6" style="padding-top: 16px;">
              <h3>After School Club</h3>
            </div>
          <!-- </div> -->
        </div>
          
    </div>
    <div class="col-md-6 col-sm-6" id="addLogin" style="text-align: right;">
         <a href="logout.php" ><?php echo $_SESSION['user_name']; ?> logout</a>
      </div>
  </div>
</div>
<!-- Header ends -->

  <!-- Menu starts -->
<!--Get Help from lab week 2 -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #a42744;color: white">
  
    <div class="" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link menuColor" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link menuColor" href="aboutUs.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menuColor" href="clubs.php">Clubs</a>
          </li>         
          <li class="nav-item">
            <a class="nav-link menuColor" href="contactUs.php">Contact us</a>
          </li>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="categoryList.php">Category List</a>
          </li>';
          ?>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="clubList.php">Club List</a>
          </li>';
          ?>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="userClubList.php">User-Club</a>
          </li>';
          ?>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="userList.php">User List</a>
          </li>';
          ?>
          <?php if($_SESSION['admin'] == 1)
          echo '<li class="nav-item">
            <a class="nav-link menuColor" href="feedbackList.php">Feedback List</a>
          </li>';
          ?>
      </ul>
      
    </div>
  </nav>

  <!-- Table starts -->

    <!-- Get Help from bootrap documentation -->
  <div class="container">

  <br>
    <?php if($_SESSION['user_name'] == 'admin')
          echo '<a href="createCategory.php" style="padding: 10px;">Create Caterory</a>
                <a href="createClub.php" style="padding: 10px;">Create Club</a>'
    ?>

    <br>
    <br>
<h3> Different types of clubs category</h3>
<br>

<?php
require('db.php');   
$query = "SELECT ca.name, GROUP_CONCAT(cl.name ORDER BY cl.name ASC SEPARATOR ', ') AS club_list
          FROM `category` ca LEFT JOIN clubs cl ON cl.category_id = ca.category_id
          GROUP BY ca.name;";

echo '<table style="margin-bottom:50px;">
          <tr>
            <th>Category</th>
            <th>Clubs</th>
          </tr>'; 
if ($result = $conn->query($query)) 
{
  $counter = 0;
  while ($row = $result->fetch_assoc())
  {
  $field1name = $row["name"];
  $field2name = $row["club_list"];
           
  echo '<tr>
            <td>'.$field1name.'</td>
            <td>'.$field2name.'</td>
          </tr>';
  }
  $result->free();
  
}
$conn -> close();
echo '</table>';
?>        
  <!-- Table ends -->
            
  <h3> Club Details</h3>
  <a href="cricket.php" style="padding: 10px;">Cricket</a>
  <a href="football.php" style="padding: 10px;">Football</a>
  <a href="tennis.php" style="padding: 10px;">Tennis</a>

  </div>
  <div class="footer">
    <p class="text-center">@Copyright After School Club 2023</p>
  </div>
    

</body>
</html>
<?php 

}
else
{
     header("Location: login.php");
     exit();
}
?>