<?php
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require('db.php');
          
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);


    $sql = "SELECT * FROM users WHERE user_name='$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $newHash = password_hash($password, PASSWORD_DEFAULT); 
      $dbHash = $row['password'];

      $verify = password_verify($password, $dbHash); 

      echo $verify;

      if ($verify) {
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['admin'] = $row['admin'];
        $_SESSION['id'] = $row['id'];
        header("Location: index.php");      
      } 
      else{
       
        header("Location: login.php?error=Incorect User name or password");
        echo "Incorect User name or password!";
        exit();
    
    }

    }
    else{       
        header("Location: login.php?error=Incorect User name or password");
        exit();    
    }
}
?>