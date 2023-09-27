<?php
	include('header.php');	
require_once('inc_OnlineStoreDB.php');
$Abbr = '';
$Abbr = $_POST['Abbr'];

?>
<html>

<head><title>
<?php 

if ($Abbr == '')
	echo "no Abbr in database";
echo $Abbr; ?>
</title>



</head>

<!--<meta charset="UTF-8">-->
<body>
<?php
$Cust_No = 0;
$CustNo = 0;
$CustInt = 0;
$Cust_No = $CustNo = $CustInt = $_GET['CustNo'];





$Cust_NoInt = intval($Cust_No);

@session_start();
$_SESSION['CustNo'] = $CustNo; // yup- inverted - force the session to be 
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

$Confid = '';
$CommonSDR = '';


//so we query the db to see what we will update:
$query = "select * from customer where CustNo= $CustNo";
//echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
/*echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "<th>Tel</th>";
echo "<th>Cell</th>";
echo "<th>ADSL Tel</th>";
echo "<th>Email</th>";
echo "<th>Address</th>";
echo "<th>ID Doc/passport</th>";
echo "<th>Cust Details</th>";
echo "<th>Password</th>";
echo "<th>Distance</th>";
echo "<th>Important</th>";
echo "<th>ABBR</th>";
echo "</tr>\n";
*/
  while ($row = mysqli_fetch_assoc($result)) {
/*$CustNo = $row["CustNo"];
$CustLN =  $row["CustLN"];
$CustFn = $row["CustFN"];
print "'$item1'>$item2";
print "_".$item1;
print "_".$item3;
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

/*$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBlink->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}*/
//echo "<tr>";
$C1cn = $row["CustNo"]; echo "'".$C1cn."',";
$C1fn = $row["CustFN"]; echo "'".$C1fn."',";
$C1ln = $row["CustLN"]; echo "'".$C1ln."',";
$C1tl = $row["CustTel"]; echo "'".$C1tl."',";
$C1cc = $row["CustCell"]; echo "'".$C1cc."',";
$C1at = $row["ADSLTel"]; echo "'".$C1at."',";
$C1ce = $row["CustEmail"]; echo "'".$C1ce."',";
$C1ad = $row["CustAddr"]; echo "'".$C1ad."',";
$C1id = $row["CustIDdoc"]; echo "'".$C1id."',";
$C1dt = $row["CustDetails"]; echo "'".$C1dt."',";
$ConfidC1dt = $row["Confid"]; echo "'".$ConfidC1dt."',";
$ExtraC1dt = $row["Extra"]; echo "'".$ExtraC1dt."',";
$C1pw = $row["CustPW"]; echo "'".$C1pw."',";
$C1di = $row["Distance"]; echo "'".$C1di."',";
$C1im = $row["Important"]; echo "'".$C1im."',";
$C1ab = $row["ABBR"]; echo "'".$C1ab."',";
//echo "</tr>\n";

/*    echo $row["CustNo"];//case sensitive!
    echo $row["CustFN"];//case sensitive!
    echo $row["CustLN"];//case sensitive!
*/
			}
		 mysqli_free_result($result);
		}
echo "<head><title>";

echo $C1ab;
echo "</title></head>";

echo "<br>";








$Confid = $_POST['Confid']; //textarea varchar(1300)
$CommonSDR = $_POST['CommonSDR']; //textarea varchar(1300)





$CustFName = $_POST['CustFName'];
$Cust_LName = $_POST['CustLName'];
$Cust_Tel = $_POST['CustTN'];
$Cust_Cell = $_POST['CustCN'];
$Cust_Email = $_POST['CustEm'];
$Cust_Addr = $_POST['CustPA'];
$Cust_Dist = '';
$Cust_Dist = $_POST['CustDi'];
$ADSLTel = '';
$ADSLTel = $_POST['ADSLTel'];
$CustPW = $_POST['CustPW'];
$Important = '';
$Important = $_POST['Important'];
//echo "Impo: ".$Important;
$adslinv = '';
$adslinv = $_POST['adslinv'];
$ae = '';
$ae = $_POST['ae'];
$invD2 = '';
$invD2 = $_POST['invD2'];
$ae2 = '';
$ae2 = $_POST['ae2'];
$invD3 = '';
$invD3 = $_POST['invD3'];
$ae3 = '';
$ae3 = $_POST['ae3'];
$invD4 = $_POST['invD4'];
//$invD4 = ''; //BIG BUG
$ae4 = $_POST['ae4'];
$invD5 = '';
$invD5 = $_POST['invD5'];
$ae5 = '';
$ae5 = $_POST['ae5'];

$invD6 = $_POST['invD6'];
$ae6 = '';                   // OUCH THIS WAS A SERIOUS POSITIONING BUG
$ae6 = $_POST['ae6'];
$invD7 = '';
$invD7 = $_POST['invD7'];
$ae7 = '';
$ae7 = $_POST['ae7'];
$invD8 = '';
$invD8 = $_POST['invD8'];
$ae8 = '';
$ae8 = $_POST['ae8'];
$dotdot = '';
$dotdot = $_POST['dotdot'];
$L1 = '';
$L1 = $_POST['L1'];
$u1 = '';
$u1 = $_POST['u1'];
$u2 = '';
$u2 = $_POST['u2'];
$topup = '';
$topup = $_POST['topup'];

if(isset($_POST) && array_key_exists('topup',$_POST)){
echo "topup index exists";
}else{
echo "error u can lose data force update  to error";
$Cust_NoInt = "This is not an integer force exception on update";

}




$CustIDdoc = '';
$CustIDdoc = $_POST['CustIDdoc'];
$CustDetails = ''; //textarea varchar(1300)
$CustDetails = $_POST['CustDetails']; //textarea varchar(1300)
$CustDetails1 = $_POST['CustDetails']; //textarea varchar(1300)
$Extra = ''; //textarea varchar(1300)
$Extra = $_POST['Extra']; //textarea varchar(1300)
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







//VERY IMPORTANT FOR TESTING JUL2014:
//	echo html_entity_decode($CustDetails);




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
$Cust_LName = Str_replace(" ","_", $Cust_LName);
//$Cust_Tel = changeV($Cust_Tel);
//$Cust_Cell = changeV($Cust_Cell);
//$Cust_Email = changeV($Cust_Email); WARNIG! function removes the @ sign and the fullstop!
$Cust_Email = str_replace(' ', '', $Cust_Email);
$Cust_Email = str_replace('&nbsp;', '', $Cust_Email);
$Cust_Email = preg_replace("/\xA0\xA0/","",$Cust_Email);

$content = nl2br($_POST["CustDetails"]);
$content = trim($content);

$CustPW = changeSoft($CustPW);
$adslinv = changeV($adslinv);
$invD2 = changeV($invD2);
$Abbr = changeV($Abbr);
    $L1 = str_replace('\\', '/', $L1);
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
L1 = '$L1',
ABBR = '$Abbr',
u1 = '$u1',
u2 = '$u2',
topup = '$topup',
CommonSDR = '$CommonSDR'
 where custno = $Cust_NoInt";
 
 
 
require_once './class.Diff.php';
//echo "Warning: require_once(./class.Diff.php): failed to open stream: No such file or directory ";

// compare two strings line by line
//$diff = Diff::compare("line1\nline2", "lineA\nlineB");

// compare two strings character by character
$diff = Diff::compare($CustFName, $C1fn, true);


// this one is red and green colouring for differences:
function get_decorated_diff($old, $new){
    $from_start = strspn($old ^ $new, "\0");        
    $from_end = strspn(strrev($old) ^ strrev($new), "\0");

    $old_end = strlen($old) - $from_end;
    $new_end = strlen($new) - $from_end;

    $start = substr($new, 0, $from_start);
    $end = substr($new, $new_end);
    $new_diff = substr($new, $from_start, $new_end - $from_start);  
    $old_diff = substr($old, $from_start, $old_end - $from_start);

    $new = "$start<ins style='background-color:#ccffcc'>$new_diff</ins>$end";
    $old = "$start<del style='background-color:#ffcccc'>$old_diff</del>$end";
    return array("old"=>$old, "new"=>$new);
}

	$string_old = '';
$string_new = '';



$diffMM = get_decorated_diff($string_old, $string_new);
/* echo "<br><br>CN changed:".strcmp($CustDetails,$C1dt).", ";
echo "<br><br><br>";
echo $diffMM['old'];
echo "<br><br><br>";
echo $diffMM['new'];
 echo "<br>______<br><br>";
// }
  //Comparing all strings for changes:
echo "yoooo <BR><table>
    <tr>
        <td>[]".$diffMM['old']."</td>
        <td>[]".$diffMM['new']."</td>
    </tr>
</table><BR><BR><BR><BR>";
 */
 if (strcmp($CustFName,$C1fn)!= 0) 
 echo "<br><br>CN changed:".strcmp($CustFName,$C1fn).", ";
//diffMM($CustFName,$C1fn);
 if (strcmp($CustFName,$C1fn)!= 0) 
 {
  $string_old = $CustFName;
$string_new = $C1fn;
$diffMM = get_decorated_diff($string_old, $string_new);
 echo "<br><br>CN changed:".strcmp($CustFName,$C1fn).", ";
echo "<br><br><br>";
echo $diffMM['old'];
echo "<br><br><br>";
echo $diffMM['new'];
 echo "<br>______<br><br>";
 }
  if (strcmp($Cust_LName,$C1ln)!= 0) 
 {
  $string_old = $Cust_LName;
$string_new = $C1ln;
$diffMM = get_decorated_diff($string_old, $string_new);
 echo "<br><br>CN changed:".strcmp($Cust_LName,$C1ln).", ";
echo "<br><br><br>";
echo $diffMM['old'];
echo "<br><br><br>";
echo $diffMM['new'];
 echo "<br>______<br><br>";
 }


 echo "<br> CustDetails,C1dt:".strcmp($CustDetails,$C1dt)."<br> ";
$CustDetails = mysqli_real_escape_string($DBConnect, $CustDetails);
//$CustDetails = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $CustDetails); //mac and windows compatible
//$CustDetails = str_replace(array("\\r\\n", "\n\r", "\r", "\n"), "", $CustDetails); //mac and windows compatible
//$CustDetails = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", $CustDetails); //mac and windows compatible
//$CustDetails = str_replace(array("\\r\\n", "\\n\\r", "\\r", "\\n"), "", $CustDetails); //mac and windows compatible

//echo "<br> CustDetails,:".($CustDetails)."<br>";
//echo "<br> CustDetails,:".htmlspecialchars($CustDetails)."<br>";
 
 //echo "<br> C1dt:".($C1dt)."<br>";
// echo "<br> C1dt:".htmlspecialchars($C1dt)."<br>";

 
 
/*   if ((strcmp($CustDetails,$C1dt)< 0))
	    echo "<br> CustDetails,C1dt:more new data<br> ";
  if ((strcmp($CustDetails,$C1dt)> 0))
	    echo "<br> CustDetails,C1dt:more old data<br> ";
*/

 
 
  if ((strcmp($CustDetails1,$C1dt)!= 0))
	 {
 $string_old = $CustDetails1;

$string_old = mysqli_real_escape_string($DBConnect, $CustDetails1);
//$string_old = nl2br($string_old);
//$string_old = preg_replace("/\r\n|\r|\n/",' <br/> ',$string_old);
$string_old = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>", $string_old); //mac and windows compatible

$string_new = $C1dt;
$string_new = mysqli_real_escape_string($DBConnect, $C1dt);
//$string_new = nl2br($string_new);
//$string_new = preg_replace("/\r\n|\r|\n/",' <br/> ',$string_new);
$string_new = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>", $string_new); //mac and windows compatible
//echo "<textarea style='white-space:pre-wrap; font-family:arial;width:500px;font-size: 7pt' rows = '7' size = '100' name='CustDetails' >";
//echo $C1dt;echo "</textarea>";
//echo "<input type = 'text' value='";
//echo $C1dt;
//echo "'> ";
	




$diffMM = get_decorated_diff($string_old, $string_new);
// echo "<br><br>CN changed:".strcmp($CustDetails,$C1dt).": ";
echo "<br>";
//echo $diffMM['old'];
//echo "<br>";echo "<br>";
$me ='';
$me = $diffMM['old'];
$me = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>SPACE", $me); //mac and windows compatible
//$me = str_replace(("\r\n", "\n\r", "\r", "\n"), " <br>_", $me); //mac and windows compatible
//echo "<br>me:".$me;
//$order   = array("\r\n", "\n", "\r");
//$replace = '<br />ddd';
//$newstr = str_replace($order, $replace, $me);
$oldstr=str_replace('\r\n','<br>',$me);
//echo "<br><br>oldstr: MYSQL: ".$oldstr;


$oldstr=str_replace('r','yyy',$oldstr);





//echo "<br><textarea style='white-space:pre-wrap; font-family:arial;width:500px;font-size: 7pt' rows = '7' size = '100' >";
//echo $diffMM['old'];echo "</textarea>";

//echo "<br><br><br>";
//echo $diffMM['new'];
$newstr=str_replace('\r\n','<br>',$diffMM['new']);
//echo "<br><br>newstr:".$newstr;

//echo "<br><textarea style='white-space:pre-wrap; font-family:arial;width:500px;font-size: 7pt' rows = '7' size = '100' >";
//echo $diffMM['new'];echo "</textarea>";
// echo "<br>______<br><br>";



echo "<BR><table>
    <tr>
        <td>[]".$oldstr."</td>
        <td>[]".$newstr."</td>
    </tr>
</table><BR><BR>";




 }

 
 


 
mysqli_query($DBConnect, $query);
echo "</font>";
if (mysqli_affected_rows($DBConnect) > '-1')
{
echo "update success! ";
echo "<textarea style='white-space:pre-wrap;font-family:arial;height:27px;width:300px;font-size: 8pt'  >";
echo $query."</textarea><br>";
}
if (mysqli_affected_rows($DBConnect) == -1)
{
echo "<font size = 5>update  NOT successfull!!!</font><br>
<input action='action' type='button' value='Back' onclick='history.go(-1);' />
<a href = 'phpmyadmin/index.php?db=kc&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=customer&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b'>
click to launch phpmyAdmin</a>

<br>
<br>";
echo "<textarea style='white-space:pre-wrap;font-family:arial;height:400px;width:300px;font-size: 10pt' cols='110' >";
echo $query."</textarea><br>";

echo '';echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";echo '</br>';
}
/*else
{
echo "tt";
*/


/*echo "</form><form name='A' action='editCust.php?mydropdownEC=$CustInt' method='get'>";

	echo "<input type='submit' value='NOW'  />";
	echo "editCust.php?mydropdownEC=$CustInt'";

	echo "</form>";
	echo "<input type='button' onclick='location.href='editCust.php?mydropdownEC=$CustInt';' value='Go to Google' />";
	echo "<input type='button' onclick='location.href='editCust.php?mydropdownEC=$CustInt';' value='NOW' />";
//}
*/

//include("editCustProcess.php");

$Cust_Dist = 0;
$file = "FileWriting/bkp.php";
//include("FileWriting/FileWriting.php");
?>
<input type="button" onclick="location.href='editCust.php?mydropdownEC=<?php echo $CustInt; ?>';" value="NOW" style="height: 200px; width: 400px; left: 10; top: 20;" />

<?php

 echo "<br> Confid,ConfidC1dt:".strcmp($Confid,$ConfidC1dt)."<br> ";
$Confid = mysqli_real_escape_string($DBConnect, $Confid);
$Confid1 = $Confid;

if ((strcmp($Confid1,$ConfidC1dt)!= 0))
 {
$string_old = $Confid1;
$string_old = mysqli_real_escape_string($DBConnect, $Confid1);
$string_old = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>", $string_old); //mac and windows compatible

$string_new = $ConfidC1dt;
$string_new = mysqli_real_escape_string($DBConnect, $ConfidC1dt);
$string_new = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>", $string_new); //mac and windows compatible

$diffMM = get_decorated_diff($string_old, $string_new);
// echo "<br><br>CN changed:".strcmp($Confid,$ConfidC1dt).": ";
echo "<br>";
//echo $diffMM['old'];
$me ='';
$me = $diffMM['old'];
$me = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>SPACE", $me); //mac and windows compatible
$oldstr=str_replace('\r\n','<br>',$me);
$newstr=str_replace('\r\n','<br>',$diffMM['new']);
echo "<BR><table>
    <tr>
        <td>[]".$oldstr."</td>
        <td>[]".$newstr."</td>
    </tr>
</table><BR><BR>";
}


 echo "<br> Extra,ExtraC1dt:".strcmp($Extra,$ExtraC1dt)."<br> ";
$Extra = mysqli_real_escape_string($DBConnect, $Extra);
$Extra1 = $Extra;

if ((strcmp($Extra1,$ExtraC1dt)!= 0))
 {
$string_old = $Extra1;
$string_old = mysqli_real_escape_string($DBConnect, $Extra1);
$string_old = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>", $string_old); //mac and windows compatible

$string_new = $ExtraC1dt;
$string_new = mysqli_real_escape_string($DBConnect, $ExtraC1dt);
$string_new = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>", $string_new); //mac and windows compatible

$diffMM = get_decorated_diff($string_old, $string_new);
// echo "<br><br>CN changed:".strcmp($Extra,$ExtraC1dt).": ";
echo "<br>";
//echo $diffMM['old'];
$me ='';
$me = $diffMM['old'];
$me = str_replace(array("\r\n", "\n\r", "\r", "\n"), " <br>SPACE", $me); //mac and windows compatible
$oldstr=str_replace('\r\n','<br>',$me);
$newstr=str_replace('\r\n','<br>',$diffMM['new']);
echo "<BR><table>
    <tr>
        <td>[]".$oldstr."</td>
        <td>[]".$newstr."</td>
    </tr>
</table><BR><BR>";
}













?>

</body>
</html>
