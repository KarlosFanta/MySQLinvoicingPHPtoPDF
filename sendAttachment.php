<title>viewExp</title>
<?php

	
	
	require_once("inc_OnlineStoreDB.php");
			
?>
<b><br><font size = "4" type="arial">Send Email with attachment</b></font>&nbsp;&nbsp;&nbsp;&nbsp;
</br>


<?php

/*
C:\wamp\bin\apache\apache2.4.9\bin\php.ini
SMTP = smtp.myISP.com
smtp_port = 25
sendmail_from = myname@mydomainnn.com

Wampserver app: Restart all services

NB every time you try another setting on php.ini you have to Restart all services
*/
$name        = "karlos";
$email       = "gridpatrol@gmail.com";
$to          = "$name <$email>";
$from        = "John-Smith ";
$subject     = "Here is your attachment";
$mainMessage = "Hi, here's the file.";
$fileatt     = "./test.pdf";
$fileatttype = "application/pdf";
$fileattname = "newname.pdf";
$headers = "From: $from";

// File
$file = fopen($fileatt, 'rb');
$data = fread($file, filesize($fileatt));
fclose($file);

// This attaches the file
$semi_rand     = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers      .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";
$message = "This is a multi-part message in MIME format.\n\n" .
"-{$mime_boundary}\n" .
"Content-Type: text/plain; charset=\"iso-8859-1\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$mainMessage  . "\n\n";

$data = chunk_split(base64_encode($data));
$message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatttype};\n" .
" name=\"{$fileattname}\"\n" .
"Content-Disposition: attachment;\n" .
" filename=\"{$fileattname}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"-{$mime_boundary}-\n";
echo "<br>to:$to $email";
echo "<br>from:$from $email";
echo "<br>subject: $subject";
echo "<br>Message: $mainMessage";
echo "<br>it took this file: $fileatt";
echo "<br>file attachment type: $fileatttype";
echo "<br>renames attachment and sent it as : $fileattname<br>";


// Send the email
if(mail($to, $subject, $message, $headers)) {

    echo "The email was sent succesfully.";

}
else {

    echo "There was an error sending the mail.";

}
?>
</body>
</html>

<?php
//	require_once('footer.php');		
?>