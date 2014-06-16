<?php

/******************************************************************************/
/* Classes                                                                    */
/******************************************************************************/

/**
 * 
 *
 */
class Mail {
	
	public $to;
	public $subject;
	public $message;
	public $headers;
	public $parameters;
	
	/**
	 * 
	 */
	public function __construct($to, $subject, $message, $headers, $parameters) {
		
		$this->to = $to;
		$this->subject = $subject;
		$this->message = $message;
		$this->headers = $headers;
		$this->parameters = $parameters;
	}
}

/******************************************************************************/
/* Functions                                                                  */
/******************************************************************************/


/**
 * For documentation about function parameters see:
 * http://www.php.net/manual/en/function.mail.php
 *
 * Return values:
 * TRUE if the mail was successfully queued, FALSE otherwise. 
 * 
 * 
 * @param $to string
 * @param $subject string
 * @param $message string
 * @param $headers string
 * @param $parameters string
 * @return bool
 */
function batch_mail
		(
			$to, 
			$subject, 
			$message, 
			$headers    = null, 
			$parameters = null
		) {

	$mail = new Mail($to, $subject, $message, $headers, $parameters);
	
	$fileName = dirname(__FILE__) . "/mail_queue/" . date("Ymd_His") . "_" . rand() . ".json"; 
	$text = json_encode($mail);
	
	return file_put_contents($fileName, $text);
}

?>