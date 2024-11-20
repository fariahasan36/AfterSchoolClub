<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
$id = $_SESSION['id'];
$user_name = $_SESSION['user_name'];
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

<!-- Get Help from w3school and bootstrap documentation -->
    <style>
      input[type=text], select, textarea {
        width: 70%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        
        margin-top: 1px;
        margin-bottom: 2px;
        resize: vertical;
      }
      
      input[type=submit] {
        background-color: #a42744;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      
      input[type=submit]:hover {
        background-color: #45a049;
      }

      </style>
</head>

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

  <!-- Menu Starts -->
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
$query = "SELECT * FROM users WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
$row = $result->fetch_assoc();
$name = $row["first_name"].' '.$row["last_name"];
$email = $row["email"];

?>
<!-- Get Help from w3school and bootstrap documentation -->
<!-- Form Starts -->

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
      require('db.php'); 
      $feedback=$_POST['feedback'];

      $sql = "INSERT INTO feedback (user_id,  feedback) VALUES ('$id', '$feedback')";

      mysqli_query($conn,  $sql) or die(mysqli_error($conn));
      $status = "<div class='container'>
      Feedback Sent Successfully. <br><br>";
      echo '<p style="color:#FF0000;">'.$status.'</p></div>';
} 
else {
?>
  <div class="container">
    <form action="" method="post">
      <br>
      <h3>Contact Us</h3><br>
      <label for="name">Name</label><br>
      <input type="hidden" name="new" value="1" />
      <input type="text" id="name" name="name" value="<?php echo $name?>" readonly><br>
  
      <label for="lname">Email</label><br>
      <input type="text" id="email" name="email" value="<?php echo $email?>" readonly><br>  
    
      <label for="subject">Feedback</label><br>
      <textarea id="feedback" name="feedback" placeholder="Write something.." maxlength="255" style="height:200px"></textarea>
      <br>
      <input type="submit" value="Submit">
    </form>
  </div>
  <?php 
    } 
    ?>
<!-- Form ends -->

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