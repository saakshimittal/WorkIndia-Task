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
  'status': success,<br>
  'userId': <?php
            $query = "select id from users where username = '".$_SESSION['username']."';";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($result)){
              echo $row['id'].'<br>';
            }
            ?>
}
