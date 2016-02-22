<?php
require __DIR__ . '/vendor/autoload.php';
  $link = mysqli_connect("localhost", "iecse", "iecse_admin","iecseman_mailer");
  // check connection 
  if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", mysqli_connect_error());
  } 
  


        $q1="SELECT email FROM emails";
        $r1=mysqli_query($link,$q1);
        if($r1){
          if(mysqli_num_rows($r1)>=1){
            $num= mysqli_num_rows($r1);
            $i=0;
            $a=array();
         while($q1_arr=mysqli_fetch_assoc($r1)){
          array_push($a, '"'.$q1_arr['email'].'"'); 
        
       }
       for ($i=0; $i <sizeof($a) ; $i++) { 
         echo $a[$i];
         echo '<br>';
       }
      }
    }

  ?>
 