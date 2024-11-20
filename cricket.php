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
<body>

  <!-- Header starts -->
  <div class="container">
    <div class="row">
      
      <div class="col-md-6 col-sm-6">
          <div class="row">
            
              <div class="col-md-2 col-sm-6">
                <img src="image/C.png" class="img-responsive" width="70" height="70">
              </div>
          
              <div class="col-md-10 col-sm-6" style="padding-top: 16px;">
                <h3>After School Club</h3>
              </div>
            
          </div>
            
      </div>
      <div class="col-md-6 col-sm-6" id="addLogin" style="text-align: right;">
         <a href="logout.php" ><?php echo $_SESSION['user_name']; ?> logout</a>
      </div>
    </div>
  </div>
   <!-- Header ends -->
   <!-- Menu starts -->

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
  <!-- Menu ends -->

  <?php 
  require('db.php');   

  $query = "SELECT * FROM clubs where name = 'Cricket'";
  $result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
  $row = mysqli_fetch_assoc($result);


  ?>

    <!-- Cricket club description starts -->
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <br><br>
            <h3><?php echo $row['name'];?> club:</h3>
            <br>
            <dl>
              <dt>Benefits</dt>
              <dd><?php echo $row['benefits'];?></dd>

              <dt>Days</dt>
              <dd><?php echo $row['days'];?></dd>

              <dt>Timing</dt>
              <dd><?php echo date("h:i:sa", strtotime($row['fromTime']));?> - <?php echo date("h:i:sa", strtotime($row['toTime']));?></dd>

              <dt>Age Range</dt>
              <dd><?php echo $row['fromAge'];?> to <?php echo $row['toAge'];?>.</dd>


              <dt>Price</dt>
              <dd>£<?php echo $row['price'];?> per session (per month)</dd>

              <dt>Location</dt>
              <dd><?php echo $row['location'];?>.</dd>
            </dl>
          </div>
          <div class="col-md-6" style="justify-content:center;">
            <br><br>
            <img src="image/cricket_club.jpg" class="img-fluid">
          </div>
      </div>
    </div>
    <!-- Cricket club description ends -->

    <br><br>
    <div class="footer">
      <p>@Copyright After School Club 2023</p>
  </div>

   
</body>
</html>
<?php 

}else{

     header("Location: login.php");

     exit();

}

 ?>