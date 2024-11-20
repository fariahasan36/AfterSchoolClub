<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from category where category_id='".$id."'"; 
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
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
        $id = $row['category_id'];
        $category_name=$_REQUEST['categoryName'];

        if (isset($_POST['active']))
        {
            $isActive = "1";
        } else {
            $isActive = "0";
        }

        // Duplicate Category check

        $checkCategory = "SELECT * FROM category WHERE name = '$category_name' and category_id != '$id';";
        $getData = mysqli_query($conn, $checkCategory);
        $row = $getData->num_rows;

        if($row>0){
          $message = $category_name." already exists";
          echo "<script>
          alert('$message');
          window.location.href='categoryList.php';
          </script>";          
        } 
        else { 
          $update="update category set name='".$category_name."',
          active='".$isActive."' where category_id='".$id."'";

          mysqli_query($conn, $update) or die(mysqli_error($conn));
          $status = "<div class='container'>Record Updated Successfully. <br><br>
          <a href='categoryList.php'> View Updated Record</a>";
          echo '<p style="color:#FF0000;">'.$status.'</p></div>';
        }
}
else
{
?>
    <form action="" style="border:1px solid #ccc" method="post">
        <div class="container">
            <br>
          <h1>Update Category</h1>
         
          <hr>
          <input type="hidden" name="new" value="1" />
          <label for="email"><b>Category Name</b></label><br>
          <input type="text" placeholder="Category Name" name="categoryName" id="categoryName" value="<?php echo $row['name'];?>" required><br>
          
          <label>
            <input type="checkbox" value="<?php echo $row['active'];?>" <?php echo ($row['active']==1 ? 'checked' : '');?>  name="active" id="active" style="margin-bottom:15px"> Is Active
          </label>
          <div class="clearfix">
            
            <button type="submit" class="btn-success">Update</button>
            <br/>
            <!-- <button type="button" class="cancelbtn">Cancel</button> -->
          </div>
        </div>
      </form>
    <!-- Sign up page ends -->
    <?php } ?>

    <br>
    

    <div class="footer">
        <p class="text-center">@Copyright After School Club 2023</p>
    </div>
    
</body>
</html>
<?php 

}else{

     header("Location: login.php");

     exit();

}

 ?>