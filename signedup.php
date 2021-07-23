<?php
session_start();

if(!isset($_SESSION['username'])){
  header("Location: login.php");
}

$con = mysqli_connect('localhost','root','','workindia');
?>
REQUEST DATA: {<br>
  'username': <?php echo $_SESSION['username']; ?>,<br>
  'password': <?php echo $_SESSION['password']; ?><br>
}<br><br>

RESPONSE DATA: {<br>
  'status': success<br>
}
