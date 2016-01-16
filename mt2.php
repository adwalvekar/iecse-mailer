<?php
require __DIR__ . '/vendor/autoload.php';
  $link = mysqli_connect("localhost", "iecse", "iecse_admin","iecseman_mailer");
  // check connection 
  if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", mysqli_connect_error());
  } 
  
$transport= Swift_SmtpTransport::newInstance("smtp.gmail.com","465","ssl")
  ->setUsername("mailman@iecsemanipal.com")
  ->setPassword("sierrazulufoxtrotindia");
  $mailer = Swift_Mailer::newInstance($transport);
 
    $subject= $_POST['subject'];
    $message=$_POST['message'];
    if(isset($_POST['board'])){
      if($_POST['board']=='board'){
        $q1="SELECT * FROM emails  WHERE position='board'";
        $r1=mysqli_query($link,$q1);
        if($r1){
          if(mysqli_num_rows($r1)>=1){
         while($q1_arr=mysqli_fetch_assoc($r1)){
          echo $q1_arr['email'];
          $mail = Swift_Message::newInstance($subject)
          ->setFrom(array('server@iecsemanipal.com' => 'IE CSE Mailer'))
          ->setTo($q1_arr['email'])
          ->setBody($message);
          $result = $mailer->send($mail);
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



    <form class="form-inputs" role="form" method="POST" action="mt2.php">

    
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
