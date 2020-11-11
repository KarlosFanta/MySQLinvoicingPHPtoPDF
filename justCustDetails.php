<?php
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';
?>
<html>
<meta charset="UTF-8">
<?php
    @session_start();
	$_SESSION['sel'] = "editCust";
	$CustInt = '';
if(isset($_GET["mydropdownEC"]))
{
$CustInt = $_GET["mydropdownEC"];
}
	else
	$CustInt = intval($_SESSION['CustNo'] );
$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  while ($row = mysqli_fetch_assoc($result)) { //assoc cannot handle spaces!!

echo "CustNo: <b>";
echo $row['CustNo'];
echo "";
?>
<button  onclick="window.open('acceptCustNo.php?CustNo=<?php echo $CustInt; ?>','_blank');"; type="button">
     Accept CustNo into session</button>
<?php
echo" <a href = 'paynotes.php?CustNo=$CustInt' target=_blank>Edit PayNotes: </a>";
echo $row['PayNotes'];
echo "<br>";

echo $row['CustFN'];
echo " ";
echo $row['CustLN'];
echo "<head><title>";
echo $row['ABBR'];
echo " Jobcard</title></head>";
	$RU1 = "_";
$RU2 = "_";
$RU1 = $row["u1"];
$RU2 = $row["u2"];
$CLN = "_";
$CLN = $row['CustLN'];

//echo "<a href = 'http://www.karl.co.za/karllo0/combo.php?account_username=$RU1&cmb_company_realm=$RU2&btnAccountStatus=Submit+Query' target=_blank><b>Combo</b></a> ";
$CustPW = $row['CustPW'];
//echo " <a href = 'UsageCS.php?account_username=$RU1&cmb_company_realm=$RU2&pwd=$CustPW' target=_blank>UsageCS</a> ";
//echo "<a href = 'AllConn.php' target=_blank><b>ALL</b></a> ";

//echo " <a href = 'http://www.karl.co.za/karllo0/reseller_resetport.php?account_username=$RU1&cmb_company_realm=$RU2&reason=&btnAddUser=Reset+Port' target=_blank>Reset port</a>";
//echo " <a href = 'http://reselldemo.cybersmart.co.za/reseller_resetport.php?account_username=$RU1&cmb_company_realm=$RU2&reason=&btnAddUser=Reset+Port' target=_blank>RPC</a>";

//echo " <a href = 'http://www.karl.co.za/karllo0/reseller_unlock_template.php?account_username=$RU1&cmb_company_realm=$RU2&reason=&btnAddUser=Temporarily+Unlock' target=_blank>Unlock</a>";
$ADSLTel = $row["ADSLTel"];

//echo " <a href = 'http://reselldemo.cybersmart.co.za/reseller_unlock_template.php?account_username=$RU1&cmb_company_realm=$RU2&reason=&btnAddUser=Temporarily+Unlock' target=_blank>UnC</a>";
$ADSLTel = $row["ADSLTel"];

//echo " <a href = 'http://www.karl.co.za/karllo0/reseller_interrogate.php?tel_number=$ADSLTel'  target=_blank>KIntrrogate</a> ";
//echo " <a href = 'http://reselldemo.cybersmart.co.za/reseller_interrogate.php?tel_number=$ADSLTel'  target=_blank>CIntrgt</a> ";
	//echo " <a href = 'interrogate.php' target=_blank>Old</a>";
echo "<br>";
$II = $row['Important'];
$II = str_replace( "&nbsp;&nbsp;", "&nbsp;", $II );
	$II = preg_replace( "/&nbsp;/", " ", $II );

	$II = preg_replace( "/\s+/", " ", $II );

//$II = preg_replace( "&nbsp;&nbsp;", " ", $II );

preg_replace("/[[:blank:]]+/"," ",$II);

$Abbr = $row['ABBR'];
$ABBB = strtr($row['ABBR'], array(' ' => '_')) ;

//echo "decode important: ".html_entity_decode($II)."<br>";
//echo "Important for ".$ABBB.": </b></font>";
echo $II;
echo "<br>";

//echo "<a href = 'http://www.karl.co.za/karllo0/reseller_account_status_template.php?account_username=$RU1&cmb_company_realm=$RU2&btnAccountStatus=Submit+Query' target=_blank><b>Check status</b></a> ";
/*


echo " <a href = 'https://www.cybersmart.co.za/login/?destination=&credential_0=".$RU1."%40".$RU2."&credential_1=adsl&Submit=' target=_blank><b>Usage</b></a> ";
echo " <a href = '../START/Q/superuser.php' target=_blank><b>Usage</b></a> ";

echo " <a href = 'http://www.k-connect.co.za/usage2/index.php?account_username=$RU1&cmb_company_realm=$RU2' target=_blank>Usage2</a>";
echo " <a href = 'http://www.k-connect.co.za/usage/index.php' target=_blank>Usage3</a> ";
echo " <a href = 'http://www.k-connect.co.za/$RU1' target=_blank>Usage4</a> ";

echo "<a href = 'http://www.karl.co.za/karllo0/reseller_account_status_template.php?account_username=$RU1&cmb_company_realm=$RU2&btnAccountStatus=Submit+Query' target=_blank><b>Status</b></a> ";
echo "<a href = 'http://reselldemo.cybersmart.co.za/reseller_usage_template.php?account_username=$RU1&cmb_company_realm=$RU2&btnUsage=Display+Usage' target=_blank><b>CGraph</b></a>";

echo "<!--<a href = 'http://www.karl.co.za/karllo0/reseller_usage_template.php?account_username=$RU1&cmb_company_realm=$RU2&btnUsage=Display+Usage' target=_blank>--><b>KGraph</b></a>";

echo " <a href = 'http://reselldemo.cybersmart.co.za/reseller_account_status_template.php?account_username=$RU1&cmb_company_realm=$RU2&btnAccountStatus=Submit+Query' target=_blank><b>CStatus</b></a>";
//echo "<br>";
echo " <a href = 'http://reselldemo.cybersmart.co.za/reseller_connection_logs_template.php?account_username=$RU1&cmb_company_realm=$RU2&btnAccountStatus=Submit+Query' target=_blank><b>CConnectLogs</b></a>";
echo " <a href = 'http://www.karl.co.za/karllo0/reseller_connection_logs_template.php?account_username=$RU1&cmb_company_realm=$RU2&btnAccountStatus=Submit+Query' target=_blank><b>KCLogs</b></a>";
echo "<br>";

echo "";
echo "Telephone Number:";

$CTT = '';
$CTT = $row['CustTel'];
if (is_numeric ($CTT))
	 {
	// echo "Yes numeric";
	 //check if the zero is missing
 if (substr($CTT, 0, 1) == '0')   // returns first character
{
	//echo 'OK contains a zero';
	echo '';
}
else
{
	//echo 'NOK first letter does not comtina a zero';
	$CTT = "0".$CTT;
	//echo ' CTT:'.$CTT;
}
	 }

echo "<textarea id='CustTN' style='white-space:pre-wrap;font-family:arial;height:20px;width:200px;font-size: 10pt' name='CustTN' >";
echo $CTT;
echo "</textarea>";

	echo " <a href = '../START/progress.html' target = _blank><b>Progress</b></a>";
	echo " <a href = '../START/progress.php' target = _blank><b>Progress</b></a>";
echo "<br>";

echo "";
echo "Cellphone Number:";
$CCEL = '';
$CCEL = $row['ADSLTel'];
echo "<textarea id='CustCN' style='white-space:pre-wrap;font-family:arial;height:20px;width:200px;font-size: 10pt' name='CustCN' >";
echo $row['CustCell'];
  $CustEmail = $row['CustEmail'];
echo "</textarea><a href='assignStk.php?CustNo=".$CustInt."' target=_blank> Add Expense for customer</a> <a href='editExpCQ.php?CustNo=".$CustInt."' target=_blank> Edit Customer's Expenses</a>";
echo "<br>";
$CE = strtr($row['CustEmail'], array(' ' => '&nbsp;')) ;
$CEd = str_replace(';', ';&nbsp;', $CE);

echo "";
echo "<a href = 'mailto:$CEd'>Email Address:</a>";

echo "<input type='text'  style='font-size: 7pt' size = 40 name='CustEm' value='";
//echo $row['CustEmail'];

echo $CE ; //or should this be $CEd ???

echo "'> <a href = 'mailto:";
echo $CEd."'>email</a>";

$u1 = $row["u1"];
$u2 = $row["u2"];
	echo "'> <a href = 'usage.php?CustNo=$CustInt&CustEmail=$CustEmail&u1=$u1&u2=$u2&CustEmail=$CustEmail&";
echo $CEd."'>Usage.php</a>";

echo " <a href = 'mailto:";
echo "$CEd?subject=Usage&body=Hi%0D%0AYou used Gigs%0D%0AYou have Gigs left%0D%0AThank you%0D%0AKL'>emailUsage</a>";

echo " <a href = 'mailto:";
echo $CEd."?subject=Usage&body=Hi%0D%0AYou used Gigs%0D%0AYou have Gigs left%0D%0AThank you%0D%0AKL'>email</a>";

echo "";
echo "<br>Postal Address:";
echo "<textarea id='CustPA' style='white-space:pre-wrap;font-family:arial;height:22px;width:400px;font-size: 10pt' name='CustPA' >";
echo $row['CustAddr'];
echo "</textarea>";
$ad2 = '';
$ad2 = $row['CustAddr'];
$ad2=preg_replace("/ /","+",$ad2);
echo " <a href='https://www.google.co.za/maps/place/".$ad2."+Cape+Town' target='_blank'>GMap</a>";

echo "<br>";

echo "";
echo "ID/Passport Number:";
echo "<textarea id='CustIDdoc' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustIDdoc' >";
echo $row['CustIDdoc'];
echo "</textarea>";

$DDD= $row["CustDetails"];
$FF = urlencode($DDD);
$DDD = str_replace("SEMICOLONN", ";", $DDD);
$DDD = str_replace("COLONN", "'", $DDD);
$DDD = str_replace("CopyrightSign", "©", $DDD);
$DDD = str_replace("RegTrademark", "®", $DDD);
$DDD = str_replace("EuroCurrency", "€", $DDD);
$DDD = str_replace("YenCurrency", "¥", $DDD);
$DDD = str_replace("PoundCurrency", "£", $DDD);
$DDD = str_replace("centT", "¢", $DDD);

echo "<br> ";echo "<textarea id='CustDetails' style='white-space:pre-wrap; font-family:arial;width:500px;font-size: 7pt' rows = '7' size = '100' name='CustDetails' >";

	echo $DDD;echo "</textarea>";

$EEE= $row["Extra"];
$FF = urlencode($EEE);

$EEE = str_replace("SEMICOLONN", ";", $EEE);
$EEE = str_replace("COLONN", "'", $EEE);
$EEE = str_replace("CopyrightSign", "©", $EEE);
$EEE = str_replace("RegTrademark", "®", $EEE);
$EEE = str_replace("EuroCurrency", "€", $EEE);
$EEE = str_replace("YenCurrency", "¥", $EEE);
$EEE = str_replace("PoundCurrency", "£", $EEE);
$EEE = str_replace("centT", "¢", $EEE);

echo "<br> ";echo "<textarea id='Extra' style='white-space:pre-wrap; font-family:arial;width:500px;font-size: 7pt' rows= '6' size = '90' name='Extra' >";

	echo $EEE;echo "</textarea>";

*/




?>
<br>

<?php
 } //moving these might cause form handling erorrs on submit
 mysqli_free_result($result);
}
?>
</font>

</b>

</body>
</html>
