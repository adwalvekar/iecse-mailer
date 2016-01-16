<?php
require __DIR__ . '/vendor/autoload.php';
 $transport= Swift_SmtpTransport::newInstance("smtp.gmail.com","465","ssl")
  ->setUsername("mailman@iecsemanipal.com")
  ->setPassword("sierrazulufoxtrotindia");
  $mailer = Swift_Mailer::newInstance($transport);
  $message = Swift_Message::newInstance("Test")
          ->setFrom(array('server@iecsemanipal.com' => 'IE CSE Mailer'))
          ->setTo('aditya.s.walvekar@gmail.com')
          ->setBody("test");
          $result = $mailer->send($message);
 
    
  echo $result;