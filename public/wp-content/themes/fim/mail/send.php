<?php
require_once 'Mail.php';

// Получатель
Mail::$recipient  = "office@spaceweb.studio";
Mail::$secret_key = "6LfqWNcoAAAAABW2dp-2b0zwIVWr8vogfbdt13bq";

$return = Mail::getCaptcha( $_POST[ 'g-recaptcha-response' ] );

if( $return->success == true && $return->score > 0.5 ) {

  if( isset( $_POST[ 'modal-type' ] ) ) {
    $modal_type = htmlspecialchars( $_POST[ 'modal-type' ] );
  } else {
    exit();
  }

  switch( $modal_type ){
    case "general":
      $formSend = new GeneralMail( $_POST[ 'name' ], $_POST[ 'phone' ], '', $_POST[ 'equipment' ] );
      break;

    case "innovita":
      $formSend = new InnovitaMail( $_POST[ 'name' ], $_POST[ 'phone' ], $_POST[ 'email' ], $_POST[ 'innovitaName' ], $_POST[ 'innovitaPrice' ] );
      break;

    case "sit":
      $formSend = new SitMail( $_POST[ 'name' ], $_POST[ 'phone' ], $_POST[ 'email' ] );
      break;

    case "vessels":
      $formSend = new VesselsMail( $_POST[ 'name' ], $_POST[ 'phone' ], $_POST[ 'email' ], $_POST[ 'equipment' ] );
      break;

    default:
      $formSend = new Mail( $_POST[ 'name' ], $_POST[ 'phone' ], $_POST[ 'email' ] );
  }

  $formSend->sendMail();
  echo "score " . $return->score;
} else {
  echo "You are Robot";
}
