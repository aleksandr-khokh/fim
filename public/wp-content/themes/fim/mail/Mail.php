<?php

class Mail {
	protected $type = "";
	protected $name;
	protected $phone;
	protected $email;
	protected $fields = array();
	protected $message;
	protected $headers;
	public static $recipient;
	public static $secret_key;

	public function __construct( $name, $phone, $email ) {
		$this->name              = htmlspecialchars( $name );
		$this->phone             = htmlspecialchars( $phone );
		$this->email             = htmlspecialchars( $email );
		$this->fields['Клиент']  = $this->name;
		$this->fields['Телефон'] = $this->phone;
		$this->fields['Email']   = $this->email;
	}

	public static function getCaptcha( $response ){
		$result = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=" . self::$secret_key ."&response=" . $response );
		return json_decode( $result );
	}

	protected function getHeaders() {
		$this->headers = "MIME-Version: 1.0\r\n";
		$this->headers .= "Content-type: text/html; charset=utf-8\r\n";
		$this->headers .= "From: Electropompa {$this->type} <site@elektropompa.ru>\r\n";
		$this->headers .= "Reply-To: {$this->email}\r\n";
		return $this->headers;
	}

	protected function getSubject() {
		return "Заказ {$this->type} с сайта от {$this->name} {$this->phone}";
	}

	protected function getMessage() {
		$this->message = "<html><head><title>Заказ с сайта {$this->type}</title></head><body><table>";
		foreach ( $this->fields as $key => $value ) {
			$this->message .= "<tr><td>{$key}</td><td>{$value}</td></tr>";
		}
		$this->message .= "</table></body></html>";
		return $this->message;
	}

	public function sendMail(): void {
		mail( self::$recipient, $this->getSubject(), $this->getMessage(), $this->getHeaders() );
	}

  public function getFields(){
    return $this->fields;
  }
}

class GeneralMail extends Mail {
  protected $type = "Общий";
  public function __construct( $name, $phone, $email, $equipment ) {
    parent::__construct( $name, $phone, $email );
    $this->fields['Продукция'] = htmlspecialchars( $equipment );
  }
  public function getFields(){
    return $this->fields;
  }
}
class VesselsMail extends Mail {
  protected $type = "на баки";
  public function __construct( $name, $phone, $email, $equipment ) {
    parent::__construct( $name, $phone, $email );
    $this->fields['Бак'] = htmlspecialchars( $equipment );
  }
  public function getFields(){
    return $this->fields;
  }
}

class SitMail extends Mail {
	protected $type = "Sit";
}

class InnovitaMail extends Mail {
  protected $type = "Innovita";

  public function __construct( $name, $phone, $email, $innovitaName, $innovitaPrice ) {
    parent::__construct( $name, $phone, $email );
    $this->fields['Продукт'] = htmlspecialchars( $innovitaName );
    $this->fields['Цена']    = htmlspecialchars( $innovitaPrice );
  }
}
