<?php

/******************************************************************************/
/* Includes                                                                   */
/******************************************************************************/

include_once(dirname(__FILE__) . "/phpbatchmail.lib.php");

/******************************************************************************/
/* Main                                                                       */
/******************************************************************************/

$workingDirectory = getcwd();
chdir(dirname(__FILE__));

$properties = parse_ini_file("properties.ini", true);
$i = $properties["General"]["number_of_mails"];

if ($handle = opendir("mail_queue")) {

    while (false !== ($file = readdir($handle)) && $i != 0) {
    	
    	$fullName = "./mail_queue/" . $file; 
    	
    	if (is_file($fullName)) {
    		
    		$mail = json_decode(file_get_contents($fullName));
    		if ($mail) {
	    		if (mail($mail->to, $mail->subject, $mail->message, $mail->headers, $mail->parameters)) {
	    			unlink($fullName);
	    		}
	    	    	
		    	if ($i > 0) {
		    		--$i;
		    	}    		
    		}
    	}
    }

    closedir($handle);
}

chdir($workingDirectory);

?>