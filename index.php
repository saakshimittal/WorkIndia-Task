<?php
$con = mysqli_connect('localhost','root','','workindia');
session_start();

if(isset($_POST['submit'])){
  if(isset($_POST['username']) && isset($_POST['password'])){
    $query = "select * from users where username='".$_POST['username']."';";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result)!=0){
      while($row = mysqli_fetch_assoc($result)){
        if(password_verify($_POST['password'], $row['password'])){
          $_SESSION['username'] = $_POST['username'];
          $_SESSION['password'] = $_POST['password'];
          header('Location: loggedin.php');
        }
      }
    }
    else{
      echo 'invalid username';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Workindia Saakshi Mittal</title>
  </head>
  <body>
    <form method="post">
      <label for="username">Username: </label>
      <input type="text" name="username" id="username"><br>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password"><br>
      <button type="submit" name="submit" id='submit'>Login</button>
    </form>
    <a href="signup.php">Or Sign Up here</a>
  </body>
</html>
