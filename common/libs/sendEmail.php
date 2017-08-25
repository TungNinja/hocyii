<?php 
namespace commont\libs;
use commont\libs\PHPMailer;
/**
* 
*/
class sendEmail
{
	
	function sendEmail($sendEmail1, $subject, $body = "no body")
	{
		$mail = new PHPMailer();

		$mail->isSMTP();
		$mail->host = 'smtp.mail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'tungninja8386@gmail.com';
		$mail->Password = 'BuiThanhTung@36';
		$mail->SMTPSecure = 'ss1';
		$mail->Port = 465;
		$mail->isHTML(true);
		$mail->ChartSet = 'UTF-8';

		$mail->setFrom('tungninja8386@gmail.com', 'Mailer');
		if (is_array($sendEmail1)) {
			foreach ($sendEmail1 as  $value) {
				$mail->addAdress($value);
			}
		}else {
			$mail->addAdress($value);
		}

		$mail->Subject = $subject;
		$mail->body = $Body;

		if (!$mail->send()) {
			echo "Messga could not be sent";
			echo "Error: ".$mail->ErrorInfor();
		}else{
			echo "Messga has been sent";
		}
		
	}
}
?>