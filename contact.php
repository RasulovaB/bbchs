<?php

//define variables and set to empty values
$name_error = $email_error = "";
$name = $email = $message = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["name"]))
	{
		$name_error = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		//check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z\s]+$/",$name)) 
		{
			$name_error = "Only letters and white space allowed";
		}
	}
	
	if (empty($_POST["email"]))
	{
		$email_error = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		//check if email address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$email_error = "Invalid email format";
		}
	}
	
	if (empty($_POST["message"]))
	{
		$message = "";
	} else {
		$message = test_input($_POST["message"]);
		
	}
	
	if ($name_error == '' and $email_error == '')
	{
		$message_body = '';
		unset($_POST['submit']);
		foreach ($_POST as $key => $value) {
			$message_body .= "$key: $value\n";
		}
		
		$to = 'marina@boomballoonscharleston.com';
		$subject = 'BoomBalloon New Customer Request';
		if (mail($to, $subject, $message_body)){
			$success = "Message sent, thanks for being awesome!";
			$name = $email = $message = '';
		}
	}
	
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
