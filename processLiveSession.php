<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<?php
    @session_start();
	if(isset($_SESSION["CustNo"]))
			$message = 	$_SESSION['CustNo'];
else
	$CustNo = 1;
 $message = str_replace('"', '&quot;', $message);  //double quotes for mailto: emails.  
    $von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é");  //to correct double whitepaces as well
    $zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;"," ","&#233;");  
	
    $message = str_replace($von, $zu, $message);  
$yourVal =  $message;
 $m2 = $_SESSION["CustNo"];
  
echo "<br><bR>message: ".$message. "<br>compared with ";
echo "<br>m2:".$m2." <br>";
  
  
?>