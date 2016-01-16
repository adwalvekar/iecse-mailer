<?php
require __DIR__ . '/vendor/autoload.php';
$link = mysqli_connect("localhost", "iecse", "iecse_admin", "iecse");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 if(isset($_POST['username'])&&isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
   
  }

$query = "SELECT * FROM users WHERE username='$username' and password='$password';";
if($result = mysqli_query($link,$query)){

echo mysqli_num_rows($result);

    /* fetch associative array */
    if(mysqli_num_rows($result)==1){
      $row=mysqli_fetch_assoc($result);
      echo $row['username']."and".$row['password'];
      session_start();
      $_SESSION["access"] = $row["access"];
      header('Location: mail.php');

    }
    else {
      echo'Incorrect Username And Password Combination';

    }
  }
    /* free result set */
    mysqli_free_result($result);


/* close connection */
mysqli_close($link);
 
  

?>