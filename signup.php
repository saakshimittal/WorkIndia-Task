<?php
$con = mysqli_connect('localhost','root','','workindia');
session_start();

if(isset($_POST['submit'])){
  if(isset($_POST['username']) && isset($_POST['password'])){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "insert into users(username, password) values('".$_POST['username']."','".$password."');";
    if(!mysqli_query($con, $query)){
      echo 'could not add user as '.mysqli_error($con);
    }
    else{
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      header("Location: signedup.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WorkIndia Sign up</title>
  </head>
  <body>
    <form method="post">
      <label for="username">Username: </label>
      <input type="text" name="username" id="username"><br>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password"><br>
      <button type="submit" name="submit" id='submit'>Login</button>
    </form>
    <a href="index.php">Or Sign Up here</a>
  </body>
</html>
