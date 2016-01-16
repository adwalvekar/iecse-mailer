<?php
require __DIR__ . '/vendor/autoload.php';
$login=TRUE;
if(isset($_POST['submit'])){
$link = mysqli_connect("localhost", "iecse_mailer", "sierrazulufoxtrotindia", "iecseman_mailer");
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
echo "$query";
if($result = mysqli_query($link,$query)){
    /* fetch associative array */
    if(mysqli_num_rows($result)>=1){
      $row=mysqli_fetch_assoc($result);
      session_start();
  
      $_SESSION['access']=$row['access'];
      $_SESSION['username']=$username;
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'mail.php';
        header("Location: http://$host$uri/$extra");

      $login=TRUE;
    }
    else {
      $login=FALSE;

    }
  }
    /* free result set */
    mysqli_free_result($result);


/* close connection */
mysqli_close($link);
 
  }

?>

<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src='dist/js/inputs.js'></script>
    <title> Login to Postman</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link href="dist/css/bootstrap-inputs.css" rel="stylesheet">
    <script src="css/bootstrap/bootstrap.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>  
  </head>

<body>
<div class="container center-align">
<form class="form-inputs" role="form" method="POST" action="index.php">
        
        <div class="row pure-g marb-10 card col-sm-4 ">
           
            <div class="col-sm-10 pure-u-1-3 large-6 columns col-md-12">
              <h3 class="padb-30">LOGIN TO POSTMAN</h3>
              <div class="form-group col-sm-12 padb-30">
                <input type="text" id="input-t1" name='username'>
                <label for="input-t1">Username:</label>
              </div>
              <div class="form-group col-sm-12 padb-30">
                <input type="password" id="input-t2" name='password'>
                <label for="input-t2">Password:</label>
              <?php if(!$login)echo "<div class='alert'> Incorrect Username or Password </div>"; ?>
            </div>
            <div class="custom">
            <input type="submit" class="btn" name='submit'>
            </div>
            <div class="alert"></div>
            </div>
          </div>
	</form>
	</div>
</body>
</html>