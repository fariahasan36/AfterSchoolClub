<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from clubs where club_id = '".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
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

    <!-- Get Help from  w3school and bootstrap documentation-->
    <style>
      
      /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 70%;
          padding: 10px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: none;
          background: #f1f1f1;
        }
        
        input[type=text]:focus, input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }
        
        hr {
          border: 1px solid #f1f1f1;
          margin-bottom: 25px;
        }
        
        /* Set a style for all buttons */
        button {
          background-color: #a42744;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          /* width: 100%; */
          opacity: 0.9;
        }
        
        button:hover {
          opacity:1;
        }
        
    
        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
          float: left;
          width: 10%;
        }
      </style>

</head>
<body>

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

   <!-- navigation menu starts -->
   <!-- Get Help from the Week 2 lab -->
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
    <!-- navigation menu ends -->

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
  require('db.php'); 
  $id = $row['club_id'];
  $clubName=$_POST['clubName'];
  $categoryName=(int)$_POST['categoryName'];
  $benefits=$_POST['benefits'];
  $days=$_POST['days'];
  $fromAge=(int)$_POST['fromAge'];
  $toAge=(int)$_POST['toAge'];
  $fromTime = date('Y-m-d H:i:s', strtotime($_POST['fromTime']));
  $toTime = date('Y-m-d H:i:s', strtotime($_POST['toTime']));
  $location=$_POST['location'];
  $price=floatval($_POST['price']);
  
  // Duplicate Club check

  $checkCategory = "SELECT * FROM clubs WHERE name = '$clubName' and club_id != $id;";
  $getData = mysqli_query($conn, $checkCategory);
  $row = $getData->num_rows;

        if($row>0){
            $message = $clubName." already exists";
            echo "<script>
            alert('$message');
            window.location.href='clubList.php';
            </script>";            
        } 
        else { 
            $update="update clubs set name='".$clubName."', category_id = '".$categoryName."',
            benefits='".$benefits."', days='".$days."', 
            fromAge='".$fromAge."', toAge='".$toAge."',
            fromTime='".$fromTime."', toTime='".$toTime."',
            location='".$location."', price='".$price."' where club_id='".$id."'";

            // echo $update;

            mysqli_query($conn, $update) or die(mysqli_error($conn));
            $status = "<div class='container'> Record Updated Successfully. <br><br>
            <a href='clubList.php'> View Updated Record</a>";
            echo '<p style="color:#FF0000;">'.$status.'</p></div>';
          }
} 
else {
?>
    <form action="" style="border:1px solid #ccc" method="post">
        <div class="container">          
          <br>
          <br>
          <h1>Update Club</h1>
         
          <hr>
          <input type="hidden" name="new" value="1" />
          <label for="clubName"><b>Club Name</b></label><br>
          <input type="text" placeholder="Club Name" name="clubName" id="clubName" value="<?php echo $row['name'];?>"  maxlength="100" required><br>
     
          <label for="benefits"><b>Benefits</b></label><br>
          <input type="text" placeholder="Enter Benefits" name="benefits" id="benefits" value="<?php echo $row['benefits'];?>"  maxlength="100" required><br>

          <label for="email"><b>Days</b></label><br>
          <input type="text" placeholder="Enter Days. Ex. Monday - Sunday" name="days" value="<?php echo $row['days'];?>" maxlength="100" id="days" required><br>
      
          <label for="location"><b>Location</b></label><br>
          <input type="text" placeholder="Enter location" name="location" maxlength="100" value="<?php echo $row['location'];?>" id="location"><br>
       
          <div class="row">
          <div class="col-md-5 col-sm-5">
            <label for="categoryName"><b>Category Name</b></label><br>
              <select name="categoryName" id="categoryName" style="width: 300px;">
                <option value="">Select Category</option>
                //populate value using php
                <?php
                    require('db.php');
                    $query = "SELECT * FROM category where active = 1;";
                    $results=mysqli_query($conn, $query);
                    //loop
                    foreach ($results as $category){
                ?>
                        <option value="<?php echo $category["category_id"];?>" <?php if ($row['category_id'] == $category["category_id"]) echo ' selected="selected"'; ?>><?php echo $category["name"];?></option>
                <?php
                    }
                ?>
              </select>

            </div>
            <div class="col-md-5 col-sm-5">
        <label for="price"><b>Price</b></label><br>
        <input placeholder="Enter price" type="number" step="0.01" name="price" value="<?php echo $row['price'];?>" style="width:300px" id="price"  required><br>
          
      </div>
        </div>

          <div class="row">
          <div class="col-md-5">
          <label for="fromAge" style="padding-top: 20px;"><b>From Age</b></label><br>

          <input placeholder="Enter From Age" name="fromAge" pattern="[0-9\/]*" id="fromAge" value="<?php echo $row['fromAge'];?>" type="number" style="width:300px"  required/><br>
          </div>
          <div class="col-md-5">
          <label for="toAge" style="padding-top: 20px;"><b>To Age</b></label><br>
          <input placeholder="Enter To Age" name="toAge" pattern="[0-9\/]*" id="toAge" type="number" value="<?php echo $row['toAge'];?>" style="width:300px" required/><br>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-5">
          <label for="fromTime" style="padding-top: 20px;"><b>From Time</b></label><br>
          <input type="time" placeholder="Enter From Time" name="fromTime" style="width:300px" value="<?php echo date("H:i:s", strtotime($row['fromTime']));?>" id="fromTime"  required><br>
          </div>
          <div class="col-md-5">
          <label for="toTime" style="padding-top: 20px;"><b>To Time</b></label><br>
          <input type="time" placeholder="Enter To Time" name="toTime" id="toTime" style="width:300px" value="<?php echo date("H:i:s", strtotime($row['toTime']));?>" required><br>
          </div>  
        </div>

          <div class="clearfix" style="padding-top: 20px;padding-bottom:50px;">            
          <button type="submit" class="btn-success">Update</button>
            <br>
            <!-- <button type="button" class="cancelbtn">Cancel</button> -->
          </div>
        </div>
      </form>
    <!-- Sign up page ends -->
    <?php 
    }
    ?>
    <br>  
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