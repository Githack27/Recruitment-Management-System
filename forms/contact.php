<?php

    $receiving_email_address = '2016123@saec.ac.in';
    
      // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
      //   include( $php_email_form );
      // } else {
      //   die( 'Coming Soon!');
      // }
   
$to = '2016123@saec.ac.in';
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    
      // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
      /*
      $contact->smtp = array(
        'host' => 'example.com',
        'username' => 'example',
        'password' => 'pass',
        'port' => '587'
      );
      */
    
      if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
        $headers = ['From' => ($name?"<$name> ":'').$from,
                'X-Mailer' => 'PHP/' . phpversion()
               ];
    
        mail($to, $subject, $message."\r\n\r\nfrom: ".$_SERVER['REMOTE_ADDR'], $headers);
        die('OK');
        
    } else {
        die('Invalid address');}
?>