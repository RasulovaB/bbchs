<?

if(isset($_POST['email']) && $_POST['email'] != ''){

if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
//submit the form

$userName=$_POST['name'];
$Email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$body .= "From: " .$userName. "\n";
$body .= "Email: " . $Email . "\n";
$body .= "subject: " . $subject . "\n";
$body .= "Message: " . $message . "\n";

$headers = 'From: BoomBallon Charleston <marina@boomballoonscharleston.com>' . "\r\n" .
	   'Reply-To: marina@boomballoonscharleston.com' . "\r\n" .
	   'X-Mailer: PHP/' . phpversion();

mail("marina@boomballoonscharleston.com", "From BoomBalloons Site",$body, $headers);

header("location: success.html");

}
}
?>