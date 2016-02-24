<?php

require __DIR__ . '/vendor/autoload.php';
ini_set('max_execution_time', 300);
session_start();
if(!(isset($_SESSION['access'])&&$_SESSION['access']=='board')){
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = '';
 header("Location: http://$host$uri/$extra");
  sesion_start();

}
else {
  $link = mysqli_connect("localhost", "iecse_mailer", "sierrazulufoxtrotindia","iecseman_mailer");
  // check connection 
  if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit();
  } 
  $log = new Monolog\Logger("Mailer:");
  $log->pushHandler(new Monolog\Handler\StreamHandler('mails.log', Monolog\Logger::INFO)); 

  try {
  $transport= Swift_SmtpTransport::newInstance("smtp.zoho.com","465","ssl")
  ->setUsername("postman@iecse.xyz")
  ->setPassword("posterman");
  } catch (Exception $e) {
    echo "Couldn't establish connection to the SMTP Server. Check server config in code.";
    
  }
  $mailer = Swift_Mailer::newInstance($transport);
  if(isset($_POST['subject']))$subject=$_POST['subject'];
  if(isset($_POST['message'])&&isset($_POST['submit'])){
    $subject= $_POST['subject'];
    $message=$_POST['message'];
 if(isset($_POST['board'])){
      if($_POST['board']=='board'){
        $q1="SELECT email FROM emails  WHERE position='board'";
        $r1=mysqli_query($link,$q1);
        if($r1){
           if(mysqli_num_rows($r1)>=1){
            $num= mysqli_num_rows($r1);
            $i=0;
            $a=array();
         while($q1_arr=mysqli_fetch_assoc($r1)){
          array_push($a, $q1_arr['email']); 
       }
        $mail = Swift_Message::newInstance($subject)
          ->setFrom(array('postman@iecse.xyz' => 'IE CSE:Postman'))
          ->setTo($a)
          ->setBody($message,'text/html');
          $result = $mailer->send($mail);
           for ($i=0; $i <sizeof($a) ; $i++) { 
         echo $a[$i];
         echo '<br>';
       }
        }        
      }
    }
  }
    if(isset($_POST['mancomm'])){
      if($_POST['mancomm']=='mancomm'){
        $q1="SELECT * FROM emails  WHERE position='mancomm'";
        $r1=mysqli_query($link,$q1);
        if($r1){
          if(mysqli_num_rows($r1)>=1){
            $num= mysqli_num_rows($r1);
            $i=0;
            $a=array();
         while($q1_arr=mysqli_fetch_assoc($r1)){
          array_push($a, $q1_arr['email']); 
       }
        $mail = Swift_Message::newInstance($subject)
          ->setFrom(array('postman@iecse.xyz' => 'IE CSE:Postman'))
          ->setTo($a)
          ->setBody($message,'text/html');
          $result = $mailer->send($mail);
           for ($i=0; $i <sizeof($a) ; $i++) { 
         echo $a[$i];
         echo '<br>';
       }
        }    
        
      }
    }
  }
    if(isset($_POST['wc'])){
      if($_POST['wc']=='wc'){
        $q1="SELECT * FROM emails  WHERE position='wc'";
        $r1=mysqli_query($link,$q1);
        if($r1){
          if(mysqli_num_rows($r1)>=1){
            $num= mysqli_num_rows($r1);
            $i=0;
            $a=array();
         while($q1_arr=mysqli_fetch_assoc($r1)){
          array_push($a, $q1_arr['email']); 
       }
        $mail = Swift_Message::newInstance($subject)
          ->setFrom(array('postman@iecse.xyz' => 'IE CSE:Postman'))
          ->setTo($a)
          ->setBody($message,'text/html');
          $result = $mailer->send($mail);
           for ($i=0; $i <sizeof($a) ; $i++) { 
         echo $a[$i];
         echo '<br>';
       }
        }    
        
      }
    }
  }
   if(isset($_POST['members'])){
      if($_POST['members']=='members'){
        $q1="SELECT * FROM emails  WHERE position='members'";
        $r1=mysqli_query($link,$q1);
        if($r1){
          if(mysqli_num_rows($r1)>=1){
            $num= mysqli_num_rows($r1);
            $i=0;
            $a=array();
         while($q1_arr=mysqli_fetch_assoc($r1)){
          array_push($a, $q1_arr['email']); 
       }
        $mail = Swift_Message::newInstance($subject)
          ->setFrom(array('postman@iecse.xyz' => 'IE CSE:Postman'))
          ->setTo($a)
          ->setBody($message,'text/html');
          $result = $mailer->send($mail);
           for ($i=0; $i <sizeof($a) ; $i++) { 
         echo $a[$i];
         echo '<br>';
       }
        }    
        
      }
    }
  }
 
if(isset($_POST['alumni'])){
      if($_POST['alumni']=='alumni'){
        $q1="SELECT * FROM emails  WHERE position='alumni'";
        $r1=mysqli_query($link,$q1);
        if($r1){
         if(mysqli_num_rows($r1)>=1){
            $num= mysqli_num_rows($r1);
            $i=0;
            $a=array();
         while($q1_arr=mysqli_fetch_assoc($r1)){
          array_push($a, $q1_arr['email']); 
       }
        $mail = Swift_Message::newInstance($subject)
          ->setFrom(array('postman@iecse.xyz' => 'IE CSE:Postman'))
          ->setTo($a)
          ->setBody($message,'text/html');
          $result = $mailer->send($mail);
           for ($i=0; $i <sizeof($a) ; $i++) { 
         echo $a[$i];
         echo '<br>';
       }
        }    
        
      }
    }
  }git push -u origin --all
  if(isset($_POST['gdg'])){
      if($_POST['gdg']=='gdg'){
        $q1="SELECT * FROM emails  WHERE position='gdg'";
        $r1=mysqli_query($link,$q1);
        if($r1){
         if(mysqli_num_rows($r1)>=1){
            $num= mysqli_num_rows($r1);
            $i=0;
            $a=array();
         while($q1_arr=mysqli_fetch_assoc($r1)){
          array_push($a, $q1_arr['email']); 
       }
        $mail = Swift_Message::newInstance($subject)
          ->setFrom(array('postman@iecse.xyz' => 'IE CSE:Postman'))
          ->setTo($a)
          ->setBody($message,'text/html');
          $result = $mailer->send($mail);
           for ($i=0; $i <sizeof($a) ; $i++) { 
         echo $a[$i];
         echo '<br>';
       }
        }    
        
      }
    }
  }
  }
} 
?> 

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src='dist/js/inputs.js'></script>
  <title> IE CSE: Send a Mail</title>
  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link href="dist/css/bootstrap-inputs.css" rel="stylesheet">
  <script src="css/bootstrap/bootstrap.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>  
</head>

<body>
  <div class="container">



    <form class="form-inputs" role="form" method="POST" action="mail.php">

    
     <div class="row pure-g padb-30">
      <div class="card center-block">
        <h3> Send a Mail</h3>
        <div class="form-inline">
          <h4 class="padb-30">Send To: </h4>
          <br>
          <div class="form-group">
           <div class="form-group">
            <input type="checkbox" id="input014" name="board" value="board">
            <label for="input014">Board</label>
            <input type="checkbox" id="input015" name="mancomm" value="mancomm">
            <label for="input015">Management Committee</label>
            <input type="checkbox" id="input016" name="wc" value="wc">
            <label for="input016">Working Committee</label>
            <input type="checkbox" id="input017" name="members" value="members">
            <label for="input017">Members</label>
            <input type="checkbox" id="input018" name="alumni" value="alumni">
            <label for="input018">Alumni</label>
            <input type="checkbox" id="input019" name="gdg" value="gdg">
            <label for="input019">GDG</label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row pure-g marb-10 card">
    <div class="col-sm-10 pure-u-1-3 large-3 columns">
      <div class="form-group">
       <h4 class="padb-30">Subject: </h4>
       <input type="text" name ="subject">
     </div>
   </div>
 </div>
 <div class="row pure-g marb-10 card">
  <div class="col-sm-10 pure-u-1-3 large-3 columns">
    <div class="form-group">
     <h4 class="padb-30">Message Body:(Accepts HTML. Use &#60;br&#62; for new line.) </h4>


     <textarea id="inputta3" rows="5" name="message"></textarea>
   </div>
 </div>
</div>

<input type="submit" class="btn" name="submit" value="Send Mail"> <a href="logout.php">Logout</a>
</form>



</div>
</div>
</body>

</html>
