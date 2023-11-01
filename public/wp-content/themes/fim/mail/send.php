<?php
require_once 'Mail.php';

// Получатель
Mail::$recipient  = "info@eprint.ru";
Mail::$secret_key = "6LfqWNcoAAAAABW2dp-2b0zwIVWr8vogfbdt13bq";

$return = Mail::getCaptcha( $_POST[ 'g-recaptcha-response' ] );

if( $return->success == true && $return->score > 0.5 ) {

  $formSend = new Mail( $_POST[ 'name' ], $_POST[ 'phone' ] );


  $formSend->sendMail();
  echo "score " . $return->score;
} else {
  echo "You are Robot";
}
