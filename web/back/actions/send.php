<?php
	
	$lang = $_GET['lang'];

	if (!isset($_POST['send'])) {
		header("Location: ../../?lang={$lang}&menu=contact");
		exit();
	}
	else {
		// USER INPUT
		$name    = $_POST['name'];
		$email   = $_POST['email'];
		$phone   = $_POST['phone'];
		$message = $_POST['message'];

		// CAPTCHA
		$secretKey   = '6Le2dLMUAAAAABOqWRZnoajxS7VbALXwsGF1vNLm';
		$responseKey = $_POST['g-recaptcha-response'];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'secret' => $secretKey,
		        'response' => $responseKey
		    )
		));
		$response = curl_exec($curl);
		curl_close($curl);

		// CAPTCHA success
		if (strpos($response, '"success": true') !== false) {
			$mailTo  = 'gd@gerardodominguez.es';
			$subject = 'Mensaje desde web';
			$headers = "From: {$email}";
			$txt = <<<EX
NUEVO MENSAJE DESDE WEB!
Nombre:   {$name}
Email:    {$email}
Telefono: {$phone}

Mensaje:
{$message}
EX;
			mail($mailTo, $subject, $txt, $headers);
			header("Location: ../../?lang={$lang}&menu=contact&status=success");	
		}
		// CAPTCHA fail
		else {
			header("Location: ../../?lang={$lang}&menu=contact&captcha=fail&name={$name}&email={$email}&phone={$phone}&message={$message}");
		}
	}