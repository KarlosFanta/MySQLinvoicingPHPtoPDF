<?php	//this is "editCustProcess_last.php"
 $page_title = "You updated a customer";
	include 'header.php';
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
require_once 'inc_OnlineStoreDB.php';//mysql connection and database selection
?>

<!DOCTYPE html>
<html>
<head>
<title>EditCustProcess</title>
<!--<meta charset="UTF-8">-->
</head>

<body>
<?php
$Cust_No = 0;
$CustNo = 0;
    @session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = @$_SESSION['CustNo'];
//	$CustNo = @$_SESSION['CustNo'];
echo"<font size = 1>";

$CustFName = '';
$Cust_LName = '';
$u1 = '';
$u2 = '';
$Cust_Tel = '';
$Cust_Cell ='';
$Cust_Email = '';
$Cust_Addr = '';
$Cust_Dist = '';
$CustIDdoc = '';
$CustDetails = '';  //textarea varchar(1300)
$CustDetailsTXT = '';  //textarea varchar(1300)
$Extra = '';
$ADSLTel = '';
$CustPW = '';
$Important = '';
$adslinv = '';
$ae = '';
$invD2 = '';
$ae2 = '';
$invD3 = '';
$ae3 = '';
$invD4 = '';
$ae4 = '';
$invD5 = '';
$ae5 = '';
$invD6 = '';
$ae6 = '';
$invD7 = '';
$ae7 = '';
$invD8 = '';
$ae8 = '';
$dotdot = '';
$L1 = '';
$Abbr = '';
$Confid = '';

$L2 = $_POST['L2'];
echo "L2: ".$L2." <br><br>";
$L2 = "";
//$L1 = str_replace('\\', '/', $L1);
$Cust_LName = $_POST['CustLName'];
$FCLN = $Cust_LName[0]; // NOT TOO SURE!!!

$L3 = "C:/_work/Customers/".$FCLN."/".$L2."/";
$L1 = "C:/_work/Customers/".$FCLN."/".$L2."/";

$LS ="";
$LS = $_POST['LS'];
echo "LS: ".$LS." <br><br>";
$MID1 ="";
$MID1 = $_POST['MID1'];
echo "MID1: ".$MID1." <br><br>";

//////

mkdir('C:\_work',0777);
mkdir('C:\_work\Customers',0777);

//////


mkdir($MID1,0777);

echo "Folder created: ".$MID1." <br><br>";
mkdir($LS,0777);

echo "Folder created: ".$LS." <br><br>";

$L1 = @$_POST['L1'];

$Cust_No = $_POST['CustNo'];
$CustFName = $_POST['CustFName'];
$Cust_Tel = $_POST['CustTN'];
$Cust_Cell = $_POST['CustCN'];
$Cust_Email = $_POST['CustEm'];
$Cust_Addr = $_POST['CustPA'];
$Cust_Dist = $_POST['CustDi'];
$ADSLTel = $_POST['ADSLTel'];
$CustPW = $_POST['CustPW'];
$Important = $_POST['Important'];
//echo "Impo: ".$Important;
$adslinv = $_POST['adslinv'];
$ae = $_POST['ae'];
$invD2 = $_POST['invD2'];
$ae2 = $_POST['ae2'];
$invD3 = $_POST['invD3'];
$ae3 = $_POST['ae3'];
$invD4 = $_POST['invD4'];
$ae4 = $_POST['ae4'];
$invD5 = $_POST['invD5'];
$ae5 = $_POST['ae5'];
$invD6 = $_POST['invD6'];
$ae6 = $_POST['ae6'];
$invD7 = $_POST['invD7'];
$ae7 = $_POST['ae7'];
$invD8 = $_POST['invD8'];
$ae8 = $_POST['ae8'];
$dotdot = $_POST['dotdot'];

$Abbr = $_POST['Abbr'];
$u1 = $_POST['u1'];
$u2 = $_POST['u2'];
$topup = $_POST['topup'];
$CustIDdoc = $_POST['CustIDdoc'];
$CustDetails = $_POST['CustDetails']; //textarea varchar(1300)
$Extra = $_POST['Extra']; //textarea varchar(1300)
$Confid = $_POST['Confid']; //textarea varchar(1300)
//echo "<br>CustDetails1: ".$CustDetails;
//$CustDetails = preg_replace("/;/","SEMICOLONN",$CustDetails);
//$CustDetails = preg_replace("/'/","COLONN",$CustDetails);
$CustDetails = preg_replace("/\x99/"," tm ",$CustDetails);
//$CustDetails = preg_replace("/'/","COLONN",$CustDetails);
$CustDetails = preg_replace("/\xA9/","CopyrightSign",$CustDetails);
//$CustDetails = preg_replace("/\xAE/","RegTrademark",$CustDetails);
$CustDetails = preg_replace("/\x80/","EuroCurrency",$CustDetails);
$CustDetails = preg_replace("/\xA5/","YenCurrency",$CustDetails);
$CustDetails = preg_replace("/\xA3/","PoundCurrency",$CustDetails);
$CustDetails = preg_replace("/\xA2/","centT",$CustDetails);
//$CustDetails = preg_replace("/\xAE/","RegTrademark",$CustDetails);
$CustDetails = preg_replace("/%/","Percent",$CustDetails); // % and _ have special meaning in LIKE clauses.


$Important = preg_replace("/\x99/"," tm ",$Important); //utf8 doesnl;t make a difference u still need it!!!
$Important = preg_replace("/\xA9/","CopyrightSign",$Important);
$Important = preg_replace("/\xAE/","RegTrademark",$Important);
$Important = preg_replace("/\x80/","EuroCurrency",$Important);
$Important = preg_replace("/\xA5/","YenCurrency",$Important);
$Important = preg_replace("/\xA3/","PoundCurrency",$Important);
$Important = preg_replace("/\xA2/","centT",$Important);
$Important = preg_replace("/\xAE/","RegTrademark",$Important);
$Important = str_replace('"', '&quot;', $Important);  //double quotes for mailto: emails.
$Important = str_replace('  ', '&nbsp;', $Important);  //double spaces
$Important = str_replace('\xC2', '&nbsp;', $Important);  //double quotes for mailto: emails.
$Important = preg_replace("/\xC2/","&nbsp;",$Important);  //might prevent spaces
$Important = str_replace('\xA0', '&nbsp;', $Important);  //might prevent spaces increasing
$Important = str_replace("\xA0", '&nbsp;', $Important);   //might prevent spaces increasing
$Important = preg_replace("/\xA0/","&nbsp;",$Important);  //might prevent spaces increasing
$Important = str_replace(' ', '&nbsp;', $Important);  //double quotes for mailto: emails.

//echo "<br>".htmlentities($Important);
	echo html_entity_decode($CustDetails);
   $CustDetails = str_replace("Ã¤","&auml;", $CustDetails);

    $von = array("ä","ö","ü","ß","Ä","Ö","Ü","é");  //to correct double whitepaces as well
    $zu  = array("&auml;","oe","ue","ss","Ae","Oe","Ue","&#233;");
 //  $zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&#233;");

    $Important = str_replace($von, $zu, $Important);
    $CustDetails = str_replace($von, $zu, $CustDetails);
  // $CustDetails = str_replace("\xE9","&#233;", $CustDetails);
//	echo "<br>After vonzu: ";
//echo htmlentities($Important);

$Important = mysqli_real_escape_string($DBConnect, $Important); //header must be UTF 8,

//echo "<br>After escape: ";
//echo htmlentities($Important)."<br>";

$CustDetails = mysqli_real_escape_string($DBConnect, $CustDetails);
$Extra = mysqli_real_escape_string($DBConnect, $Extra);
$Confid = mysqli_real_escape_string($DBConnect, $Confid);

//the following code actualy changes the char set to UTF8 - without it, the tradmark sign give issues.
if (!mysqli_set_charset($DBConnect, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($DBConnect));
} else {
echo "";
   //printf("Current character set: %s\n", mysqli_character_set_name($DBConnect));
}

//then there is still htmlentities() or htmlspecialcharacters()
//etc. for example left and right quote



function changeSoft($v1)
{
//WARNING! DO NOT USE FOR EMAILS ! Function removes the @ sign and the fullstop!

//	$Cust_Addr = strtr($Cust_Addr, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
//	$Cust_Addr = preg_replace('/\s/u', '_', $Cust_Addr);//this baby also does the trick!!!

//$html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
//$v1 = htmlentities( preg_replace( $html_reg, '', $v1 ) );
//echo "<br>after htmlent:".$v1."<br><br><br>";
$v1 = preg_replace("/'/","_",$v1);
$v1 = preg_replace("/‘/","_",$v1);
$v1 = preg_replace("/’/","_",$v1);
$v1 = preg_replace("/&/","and",$v1);
//$v1 = preg_replace("/,/","+",$v1);
//$v1 = preg_replace("/…/",".",$v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);
$v1 = str_replace(' ', '_', $v1);
$v1 = preg_replace("/\xA0\xA0/","_",$v1);

$v1 = strtr($v1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!

$v1 = str_replace(" ","_",$v1);
$v1 = str_replace("&nbsp;","_",$v1);

//echo "<br>afterstreplacec:".$v1."<br><br><br>";

/*
$old_pattern = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
$new_pattern = array("_", "_", "");
$v2 = preg_replace($old_pattern, $new_pattern , $v1);
//All characters but a to z, A to z and 0 to 9 are replaced by an underscore. Multiple connected underscores are reduced to a single underscore and trailing underscores are removed.
*/
return $v1;
}



function changeV($v1)
{
//WARNING! DO NOT USE FOR EMAILS ! Function removes the @ sign and the fullstop!

//	$Cust_Addr = strtr($Cust_Addr, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!
//	$Cust_Addr = preg_replace('/\s/u', '_', $Cust_Addr);//this baby also does the trick!!!

//$html_reg = '/<+\s*\/*\s*([A-Z][A-Z0-9]*)\b[^>]*\/*\s*>+/i';
//$v1 = htmlentities( preg_replace( $html_reg, '', $v1 ) );
//echo "<br>after htmlent:".$v1."<br><br><br>";
$v1 = preg_replace("/'/","_",$v1);
$v1 = preg_replace("/‘/","_",$v1);
$v1 = preg_replace("/’/","_",$v1);
$v1 = preg_replace("/&/","and",$v1);
//$v1 = preg_replace("/,/","+",$v1);
//$v1 = preg_replace("/…/",".",$v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);
$v1 = str_replace(' ', '_', $v1);
$v1 = preg_replace("/\xA0\xA0/","_",$v1);

$v1 = strtr($v1, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))); //this baby does the trick!!!

$v1 = str_replace(" ","_",$v1);
$v1 = str_replace("&nbsp;","_",$v1);

//echo "<br>afterstreplacec:".$v1."<br><br><br>";

$old_pattern = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
$new_pattern = array("_", "_", "");
$v2 = preg_replace($old_pattern, $new_pattern , $v1);
//All characters but a to z, A to z and 0 to 9 are replaced by an underscore. Multiple connected underscores are reduced to a single underscore and trailing underscores are removed.

return $v2;
}
//$CustFName = changeV($CustFName);
$Cust_LName = Str_replace(" ","_", $Cust_LName);
//$Cust_Tel = changeV($Cust_Tel);
//$Cust_Cell = changeV($Cust_Cell);
//$Cust_Email = changeV($Cust_Email); WARNIG! function removes the @ sign and the fullstop!
$Cust_Email = str_replace(' ', '', $Cust_Email);
$Cust_Email = str_replace('&nbsp;', '', $Cust_Email);
$Cust_Email = preg_replace("/\xA0\xA0/","",$Cust_Email);

//$Cust_Addr = changeV($Cust_Addr);
//$Cust_Dist = changeV($Cust_Dist);
//$CustIDdoc = changeV($CustIDdoc);
//$CustDetails = changeV($CustDetails);

//echo "<br>CustDetails2: ".$CustDetails;

$content = nl2br($_POST["CustDetails"]);
$content = trim($content);

//$ADSLTel = changeV($ADSLTel);
$CustPW = changeSoft($CustPW);
//$Important = changeV($Important);
$adslinv = changeV($adslinv);
$invD2 = changeV($invD2);
//$ae = changeV($ae);
$Abbr = changeV($Abbr);
//$topup = changeV($topup);

//echo "Thank you for updating the customer's details: ".$Cust_No." &nbsp;&nbsp; ".$CustFName ." &nbsp;&nbsp; ".$Cust_LName ."."  ;
//echo " ".$L1." ";
    $L1 = str_replace('\\', '/', $L1);
//echo " ".$L1." ";

$Cust_NoInt = intval($Cust_No);
//echo "<br>CustDetails3: ".$CustDetails;

/*echo "<textarea  style='white-space:pre-wrap; height:100px;width:500px'  size = '80' >";
	echo $_POST['CustDetails'];

	echo " ";
	echo "</textarea>";
echo "<br> ";
*/
	/*
echo "<textarea id='CustDetailsTXT' style='white-space:pre-wrap; height:100px;width:500px'  size = '80' name='CustDetailsTXT' >";
echo $_POST['CustDetailsTXT'];
//	echo $CustDetailsTXT;

	echo "</textarea>";
echo "<br> ";
*/
/*
echo "<textarea  style='white-space:pre-wrap; height:100px;width:500px'  size = '80' >";
	echo $CustDetails;
	echo "</textarea>";
echo "<br> ";
echo "<br> ";
*/
//echo "<font size = 6><a href = 'editCust.php'>Edit again</a></font>";

$query="update customer set
custfn = '$CustFName',
custln ='$Cust_LName',
custtel = '$Cust_Tel',
custcell= '$Cust_Cell',
custemail = '$Cust_Email',
custaddr = '$Cust_Addr',
CustIDdoc = '$CustIDdoc',
CustDetails = '$CustDetails',
Extra = '$Extra',
Confid = '$Confid',

CustPW = '$CustPW',
distance = '$Cust_Dist',
ADSLTel = '$ADSLTel',
Important = '$Important',
adslinv = '$adslinv',
ae = '$ae',
invD2 = '$invD2',
ae2 = '$ae2',
invD3 = '$invD3',
ae3 = '$ae3',
invD4 = '$invD4',
ae4 = '$ae4',
invD5 = '$invD5',
ae5 = '$ae5',
invD6 = '$invD6',
ae6 = '$ae6',
invD7 = '$invD7',
ae7 = '$ae7',
invD8 = '$invD8',
ae8 = '$ae8',
dotdot = '$dotdot',
L1 = '$LS',
ABBR = '$Abbr',
u1 = '$u1',
u2 = '$u2',
topup = '$topup'
 where custno = $Cust_NoInt";
//oracle: $query="update customer set custfn = '$CustFName', custln ='$Cust_LName', custtel = '$Cust_Tel', custcell= '$Cust_Cell', custemail = '$Cust_Email', custaddr = '$Cust_Addr', distance = '$Cust_Dist' where custno = :Cust_NoInt";
//echo '</br></br></br></br></br></br></br>';
//echo '</br>';

mysqli_query($DBConnect, $query);
echo "</font>";
if (mysqli_affected_rows($DBConnect) > '-1')
{
echo "update success! ";
//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt'
//echo "<textarea style='white-space:pre-wrap;font-family:arial;font-size: 7pt'  rows='1' cols='110' >";
echo "<textarea style='white-space:pre-wrap;font-family:arial;height:12px;width:300px;font-size: 7pt' cols='110' >";
echo $query."</textarea><br>";
}
if (mysqli_affected_rows($DBConnect) == -1)
{
echo "<font size = 5>update  NOT successfull!!!</font><br>
<input action='action' type='button' value='Back' onclick='history.go(-1);' />
<a href = 'http://localhost/phpMyAdmin-3.5.2-english/index.php?db=kc&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=customer&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b'>
click to launch phpmyAdmin</a>

<br>
<br>";
echo "<textarea style='white-space:pre-wrap;font-family:arial;height:400px;width:300px;font-size: 10pt' cols='110' >";
echo $query."</textarea><br>";

echo '';echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";echo '</br>';
}
else
include 'editCustProcess.php';
//echo "update success! <br>";

//php to sql does not understand semicolon. remove the semicolon!!!
//oracle: $stmt = oci_parse($conn,$query);
//oracle: oci_bind_by_name($stmt, ':Cust_NoInt', $Cust_NoInt);
//oci_bind_by_name($stmt, ':Cust_NoInt', $Cust_NoInt, ':$CustFName', $CustFName, ':$Cust_LName', $Cust_LName);
//editCustProcess

//include 'editCust.php';

//oracle: $rc=oci_execute($stmt);

$Cust_Dist = 0;
$file = "FileWriting/bkp.php";
include 'FileWriting/FileWriting.php';
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>");
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";

?>


<!--
//$query="insert into customer values(5, 'Jn', 'VM', '65', '084', 'johnATv', 'USA', 55)";
//php to sql does not understand semicolon. remove the semicolon!!!
//$stmt = oci_parse($conn,$query);

//$rc=oci_execute($stmt);-->
<?php
/*
//oracle:
if(!$rc)
{
$e=oci_error($stmt);
var_dump($e);
}

oci_commit($conn);

oci_free_statement($stmt);
oci_close($conn);
//}
*/
?>
</body>
</html>
