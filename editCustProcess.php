<?php
	require_once 'header.php';
	require_once ('inc_OnlineStoreDB.php');
?>
<html>
<meta charset="UTF-8">
<?php
    @session_start();
	$_SESSION['sel'] = "editCust";
//chkDuplic.php checks for duplicates


	$CustInt = '';

if(isset($_GET["mydropdownEC"]))
{
	//echo "a is set\n";
$CustInt = $_GET["mydropdownEC"];
}
	else

	$CustInt = intval($_SESSION['CustNo'] );
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the customer before we change him on the last form.

$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

//echo "<form name='Accc' action='acceptCustNo.php' method='post'  target='_blank'>";
//echo "Customer Number:";
//echo "<input type = 'text' name='CustNo' value = '$CustInt' >";
//echo "<input type = 'submit' value = 'Accept CustNo into session' >";

//echo "</form>";

echo "<form name='Addcust' action='editCustProcess_last.php?CustNo=$CustInt' method='post'>";

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  while ($row = mysqli_fetch_assoc($result)) { //assoc cannot handle spaces!!





 $FL = $row['L1'];
 if ($FL == "")
{
echo "<br><font size = 3><b>NO CUSTOMER FOLDER FOUND (Maybe another account is being used?)<br>
<a href = 'createfolder.php' target='_blank'>Click here to create a folder</b></a></font><br><br><br><br><br><br><br><br>"; //target blank is Very important
$FL= "F:/_work/Customers";
}





echo "Customer Number: <b>";
echo $row['CustNo'];
echo "</b> <input type='hidden' name='CustNo' value='";
echo $row['CustNo'];
echo "'>";
?>
<button  onclick="window.open('acceptCustNo.php?CustNo=<?php echo $CustInt; ?>','_blank');"; type="button">
     Accept CustNo into session</button>
<?php
echo" <a href = 'paynotes.php?CustNo=$CustInt'>Edit PayNotes only</a>";
echo " editCustProcess calls editCustProcess_last";
echo "<br>";

echo "";
echo "* First Name, / VAT no:";

echo "<textarea id='cust_fn' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustFName' >";
echo $row['CustFN'];
echo "</textarea>";

	  echo "CommonSDR:";
echo "<input type='text'  style='font-size: 7pt' size = 14 name='CommonSDR' value='";
echo $row['CommonSDR'];
echo "'>";

echo "<br>";

echo "";
echo "* Surname:";

echo "<textarea id='CustLName' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustLName' >";
echo $row['CustLN'];
echo "</textarea>";
echo "<head><title>";
echo $row['ABBR'];
echo "</title></head>";
if ( $row['ABBR'] == '')
	echo "<font size = 5><br>no Abbr in database</font>";

	$RU1 = "_";
$RU2 = "_";
$RU1 = $row["u1"];
$RU2 = $row["u2"];
$CLN = "_";
$CLN = $row['CustLN'];

echo "<a href = 'http://www.karl.co.za/karllo0/combo.php?account_username=$RU1&cmb_company_realm=$RU2&btnAccountStatus=Submit+Query' target=_blank><b>Combo</b></a> ";
$CustPW = $row['CustPW'];
echo " <a href = 'UsageCS.php?account_username=$RU1&cmb_company_realm=$RU2&pwd=$CustPW' target=_blank>UsageCS</a> ";
echo "<a href = 'AllConn.php' target=_blank><b>ALL</b></a> ";

echo " <a href = 'http://www.karl.co.za/karllo0/reseller_resetport.php?account_username=$RU1&cmb_company_realm=$RU2&reason=&btnAddUser=Reset+Port' target=_blank>Reset port</a>";
echo " <a href = 'http://reselldemo.cybersmart.co.za/reseller_resetport.php?account_username=$RU1&cmb_company_realm=$RU2&reason=&btnAddUser=Reset+Port' target=_blank>RPC</a>";

echo " <a href = 'http://www.karl.co.za/karllo0/reseller_unlock_template.php?account_username=$RU1&cmb_company_realm=$RU2&reason=&btnAddUser=Temporarily+Unlock' target=_blank>Unlock</a>";
$ADSLTel = $row["ADSLTel"];

echo " <a href = 'http://reselldemo.cybersmart.co.za/reseller_unlock_template.php?account_username=$RU1&cmb_company_realm=$RU2&reason=&btnAddUser=Temporarily+Unlock' target=_blank>UnC</a>";
$ADSLTel = $row["ADSLTel"];

echo " <a href = 'http://www.karl.co.za/karllo0/reseller_interrogate.php?tel_number=$ADSLTel'  target=_blank>KIntrrogate</a> ";
echo " <a href = 'http://reselldemo.cybersmart.co.za/reseller_interrogate.php?tel_number=$ADSLTel'  target=_blank>CIntrgt</a> ";
	echo " <a href = 'interrogate.php' target=_blank>Old</a>";
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
echo "Important for ".$ABBB.": </b></font>";	echo "<textarea id='Important' style='white-space:pre-wrap; height:20px;color:red;font-family:Times New Roman;width:500px;font-size: 10pt'  name='Important'  >";

	echo $II; echo "</textarea><br>";

echo "<a href = 'http://www.karl.co.za/karllo0/reseller_account_status_template.php?account_username=$RU1&cmb_company_realm=$RU2&btnAccountStatus=Submit+Query' target=_blank><b>Check status</b></a> ";

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
/*echo "<input type='text' size = 70 name='CustPA' value='";
//print $row['CustAddr'];
echo strtr($row['CustAddr'], array(' ' => '&nbsp;')) ;
//	echo $row[6];

echo "> ";
*/
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

?>
<br>
<style>
label.button {
    padding: 0.2em 0.4em;
    -webkit-appearance: button;
}

#customize {
    display: none;
}

#customize + #Confid {
    display: none;
}

#customize:checked + #Confid {
    display: inline-block;
}





</style>

	 <label class="button" for="customize">Confid<br>

    <input type="checkbox" id="customize" />

<?php


$EEE= $row["Confid"];
$FF = urlencode($EEE);

$EEE = str_replace("SEMICOLONN", ";", $EEE);
$EEE = str_replace("COLONN", "'", $EEE);
$EEE = str_replace("CopyrightSign", "©", $EEE);
$EEE = str_replace("RegTrademark", "®", $EEE);
$EEE = str_replace("EuroCurrency", "€", $EEE);
$EEE = str_replace("YenCurrency", "¥", $EEE);
$EEE = str_replace("PoundCurrency", "£", $EEE);
$EEE = str_replace("centT", "¢", $EEE);

// "<textarea id='Confid' style='white-space:pre-wrap; font-family:arial;width:800px;font-size: 7pt' rows= '1' size = '80' name='Confid' >";
echo "<textarea id='Confid'  style='white-space:pre-wrap; font-family:arial;width:500px;font-size: 7pt' rows= '5' size = '80' name='Confid'>";

	echo $EEE;echo "</textarea>";

echo "Abbr";
echo "<input type='text'  style='font-size: 7pt' size = '6' name='Abbr' value='";

echo $ABBB;
echo "'> ";
echo "&nbsp;&nbsp;";

echo "";
echo "Distance:>";
echo "<input type='text'  style='font-size: 7pt' name='CustDi' size = 1 value='";
echo $row["Distance"];
echo "'> ";
echo "&nbsp;";

echo "";
echo "ADSL Tel No:";

$ADT = '';
$ADT = $row['ADSLTel'];
echo "<input type='text'  style='font-size: 7pt' size = '10' name='ADSLTel' value='";

echo $ADT;
echo "'> ";

echo "";
echo "<input type='text'  style='font-size: 7pt' name='u1' style='font-weight: bold;'  size = '5' value='";
echo $row["u1"];
echo "'>@";

echo "<input type='text'  style='font-size: 7pt' name='u2' style='font-weight: bold;'  size = '11'  value='";
echo $row["u2"];

echo "'> &nbsp;&nbsp;";

echo $row["u1"];
echo "@";
echo $row["u2"];
echo "&nbsp;&nbsp;";

echo "";

echo "<input style='font-size: 5pt' type='text'  size = 7  name='CustPW' value='";
echo strtr($row['CustPW'], array(' ' => '&nbsp;')) ;

echo "'> <a href=http://www.karl.co.za/karllo0/reseller_account_status_template.php target=_blank>MyAPI</a>";
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";

echo "<br> ";

echo " ";

$newfldr = "1";
$newfldr = "file:///".$row['L1'] ;
strtr($newfldr, array('\\' => '/')) ;

	//echo "<br> <a href= '".$newfldr."' alt= 'Right-click in Ext App'>Open customer folder: ".$newfldr." </a> &nbsp;&nbsp; ";

echo "Folder Location L1:";
echo "<input type='text'  style='font-size: 7pt' size = 43  name='L1' value='";
echo strtr($row['L1'], array('/' => '\\')) ;
echo "'> ";

echo " dotdot:";

echo "<input type='text'  style='font-size: 7pt' size = 3  name='dotdot' value='";
//echo $row["dotdot"];
echo strtr($row['dotdot'], array(' ' => '&nbsp;')) ;
//	echo $row[13];
echo "'> ";

echo "Last topup invoiced:<textarea id='topup' style='white-space:pre-wrap; height:15px;width:250px;font-size: 7pt'  name='topup'  >";
	//echo $row["CustDetails"];

	echo $row['topup'];echo "</textarea>";

echo "<br> ";
echo "<font size= '1'> Defaults <br> ";

echo "invD1:";
echo "<input type='text'  style='font-size: 7pt'  size = 35  name='adslinv' value='";
echo strtr($row['adslinv'], array(' ' => '&nbsp;')) ;
echo "'> ";
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";

$ae1 = "j";
$ae1 = $row['ae'];

if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae1))
{
    echo " 'special character(s)' found ";
}
$ae1 = strtr($row['ae'], array(' ' => '_')) ;
$ae1 = strtr($ae1, array('_' => '&nbsp;')) ;
htmlspecialchars($ae1);
htmlentities($ae1);

if ($ae1 > 0.2)
{
//echo "R".$ae1 * 1.15;
//echo "error".$ae1."erroer";
@$ae1 =  @$ae1 * 1.15;

 $ae1 = number_format ($ae1, 2, ".", "");
 echo "<b>R ".$ae1." inin VAT</b>&nbsp;&nbsp;&nbsp;&nbsp;";

}

echo "ae:R<input type='text'  style='font-size: 7pt'  size = 13  id='ae' name='ae' value = '";
	echo $row['ae'];echo "'>";

echo "<br>invD2:";
echo "<input type='text'  style='font-size: 7pt' size = 35  name='invD2' value='";
echo strtr($row['invD2'], array(' ' => '&nbsp;')) ;
echo "'> ";
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo "";
echo "ae2:";
$ae2 = "j";
$ae2 = $row['ae2'];
//echo " ae2__: ". $ae2;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae2))
{
    echo " one or more of the 'special characters' found ";
}
$ae2 = strtr($row['ae2'], array(' ' => '_')) ;
$ae2 = strtr($ae2, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae2);
//echo " ent: R";
htmlentities($ae2);
echo "<input type='text'  style='font-size: 7pt' size = 13  name='ae2' value='";
echo $ae2;
echo "'> ";
if ($ae2 > 0.2)
{
//echo "R".$ae1 * 1.15;
$ae2 =  $ae2 * 1.15;
$ae2 = number_format ($ae2, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae2." inin VAT</b><br>";
//$ae2N = number_format($ae2,1);  //I removed the last cent here
//echo " ".$ae2N;
}


echo "<br>invD3:";
//http://stackoverflow.com/questions/4515117/php-parsing-problem-nbsp-and-%C3%82
@$invD3db = $row['invD3'];
echo "<input type='text'  style='font-size: 7pt' size = 35  name='invD3' value='";
//echo $row['invD3'];
echo @$invD3db;
echo "'>"; //what was important is that we forgot to add the quotes of value.












echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "";
echo "ae3:";
$ae3 = "j";
$ae3 = $row['ae3'];
//echo " ae3__: ". $ae3;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae3))
{
    echo " one or more of the 'special characters' found ";
}
$ae3 = strtr($row['ae3'], array(' ' => '_')) ;
$ae3 = strtr($ae3, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae3);
//echo " ent: R";
htmlentities($ae3);
echo "<input type='text'  style='font-size: 7pt' size = 13  name='ae3' value='";
echo $ae3;
echo "'> ";
if ($ae3 > 0.2)
{
//echo "R".$ae1 * 1.15;
$ae3 =  $ae3 * 1.15;
$ae3 = number_format ($ae3, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae3." inin VAT</b><br>";
//$ae3N = number_format($ae3,1);  //I removed the last cent here
//echo " ".$ae3N;
}

echo " <br> ";

echo "invD4:";
echo "<input type='text'  style='font-size: 7pt' size = 35  name='invD4' value='";
//echo strtr($row['invD4'], array(' ' => '&nbsp;')) ;
echo $row['invD4'] ;
echo "'> ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "";
echo "ae4:";
$ae4 = "j";
$ae4 = $row['ae4'];
//echo " ae4__: ". $ae4;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae4))
{
    echo " one or more of the 'special characters' found ";
}
$ae4 = strtr($row['ae4'], array(' ' => '_')) ;
$ae4 = strtr($ae4, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae4);
//echo " ent: R";
htmlentities($ae4);
echo "<input type='text'  style='font-size: 7pt' size = 13  name='ae4' value='";
echo $ae4;
echo "'> ";
if ($ae4 > 0.2)
{
//echo "R".$ae1 * 1.15;
$ae4 =  $ae4 * 1.15;
$ae4 = number_format ($ae4, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae4." inin VAT</b><br>";
//$ae4N = number_format($ae4,1);  //I removed the last cent here
//echo " ".$ae4N;
}






echo "<br>invD5:";
echo "<input type='text'  style='font-size: 7pt' size = 35  name='invD5' value='";
//echo strtr($row['invD5'], array(' ' => '&nbsp;')) ;
echo $row['invD5'];
echo "'> ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "";
echo "ae5:";
$ae5 = "j";
$ae5 = $row['ae5'];
//echo " ae5__: ". $ae5;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae5))
{
    echo " one or more of the 'special characters' found ";
}
$ae5 = strtr($row['ae5'], array(' ' => '_')) ;
$ae5 = strtr($ae5, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae5);
//echo " ent: R";
htmlentities($ae5);
echo "<input type='text'  style='font-size: 7pt' size = 13  name='ae5' value='";
echo $ae5;
echo "'> ";
if ($ae5 > 0.2)
{
//echo "R".$ae1 * 1.15;
$ae5 =  $ae5 * 1.15;
$ae5 = number_format ($ae5, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae5." inin VAT</b><br>";
//$ae5N = number_format($ae5,1);  //I removed the last cent here
//echo " ".$ae5N;
}



//Incorrect string value: '\xA0dude\xA0...' for column 'invD6' at row 1

echo "<br>invD6:";
echo "<input type='text'  style='font-size: 7pt' size = 35  name='invD6' value='";
echo $row['invD6'];
echo "'> ";
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo "";
echo "ae6:";
$ae6 = "j";
$ae6 = $row['ae6'];
//echo " ae6__: ". $ae6;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae6))
{
    echo " one or more of the 'special characters' found ";
}
$ae6 = strtr($row['ae6'], array(' ' => '_')) ;
$ae6 = strtr($ae6, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae6);
//echo " ent: R";
htmlentities($ae6);
echo "<input type='text'  style='font-size: 7pt' size = 13  name='ae6' value='";
echo $ae6;
echo "'> ";
if ($ae6 > 0.2)
{
//echo "R".$ae1 * 1.15;
$ae6 =  $ae6 * 1.15;
$ae6 = number_format ($ae6, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae6." inin VAT</b><br>";
//$ae6N = number_format($ae6,1);  //I removed the last cent here
//echo " ".$ae6N;
}






echo "<br>invD7:";
echo "<input type='text'  style='font-size: 7pt' size = 35  name='invD7' value='";
echo strtr($row['invD7'], array(' ' => '&nbsp;')) ;
echo "'> ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "";
echo "ae7:";
$ae7 = "j";
$ae7 = $row['ae7'];
//echo " ae7__: ". $ae7;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae7))
{
    echo " one or more of the 'special characters' found ";
}
$ae7 = strtr($row['ae7'], array(' ' => '_')) ;
$ae7 = strtr($ae7, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae7);
//echo " ent: R";
htmlentities($ae7);
echo "<input type='text'  style='font-size: 7pt' size = 13  name='ae7' value='";
echo $ae7;
echo "'> ";
if ($ae7 > 0.2)
{
//echo "R".$ae1 * 1.15;
$ae7 =  $ae7 * 1.15;
$ae7 = number_format ($ae7, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae7." inin VAT</b><br>";
//$ae7N = number_format($ae7,1);  //I removed the last cent here
//echo " ".$ae7N;
}





echo "<br>invD8:";
echo "<input type='text'  style='font-size: 7pt' size = 35  name='invD8' value='";
echo strtr($row['invD8'], array(' ' => '&nbsp;')) ;
echo "'> ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "";
echo "ae8:";
$ae8 = "j";
$ae8 = $row['ae8'];
//echo " ae8__: ". $ae8;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae8))
{
    echo " one or more of the 'special characters' found ";
}
$ae8 = strtr($row['ae8'], array(' ' => '_')) ;
$ae8 = strtr($ae8, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae8);
//echo " ent: R";
htmlentities($ae8);
echo "<input type='text'  style='font-size: 7pt' size = 13  name='ae8' value='";
echo $ae8;
echo "'> ";
if ($ae8 > 0.2)
{
//echo "R".$ae1 * 1.15;
$ae8 =  $ae8 * 1.15;
$ae8 = number_format ($ae8, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae8." inin VAT</b><br>";
//$ae8N = number_format($ae8,1);  //I removed the last cent here
//echo " ".$ae8N;
}

















?>
<br />
<script>
function openfolder()
  {
  window.open('<?php echo $newfldr ?>');
  }
</script>


<?php
 } //moving these might cause form handling erorrs on submit
 mysqli_free_result($result);
}
?>
</font>


<input type="submit" name="btn_submit" value="SubmitSave"  style="height:50px; width:550px; background-color: #FFFF70;"/>

<br>
</form>

</b>
<font size= '1'>




<?php
include 'UnassignedStkOfCust.php';
include 'view_inv_by_custADV3.php';  //gives only totals
?>
<a href = "edit_trans_CustProcess.php" target= "_blank">All transactions and invoices edit_trans_CustProcess</a><br>
<?php
include 'unreconciledProofs.php';
$indesc = 0;
$ShowDraft = "N";
include 'view_Unpaid_inv_by_cust2.php';
//include 'view_Unpaid_inv_by_cust3.php';
//view_Unpaid_inv.php

echo "<br><br>";

include 'view_Underpaid_inv_by_cust2b.php'; //2b is the one with checkboxes
//include 'view_Unpaid_inv_by_cust2b.php'; //2b is the one with checkboxes

echo "<br><br>";

include 'invEmailstatement.php';
echo "<br><a href= 'view_inv_by_custADVtopup.php'>Right-Click here to view topup invoices</a><br>";

$indesc = 9;
$ShowDraft = "Y";
include 'view_Unpaid_inv_by_cust2.php';
echo "<br><br>";

//include 'view_trans_by_custUNDERorOVERPAID.php';
//include 'view_inv_by_custADV2.php';
//include 'view_inv_by_custADVnoTrans.php';
//include 'view_inv_by_custADVnoTransOVerPaidUnderPaid.php';
echo "<a href = 'view_inv_by_custADVnoTransOVerPaidUnderPaid.php?CustNo=$CustInt'>Click here to view all invoices with their transactions.</a><br><br>";
echo "<a href = 'view_inv_PAIDinvoicesBOTH.php?CustNo=$CustInt'>Click here to view only PAID invoices </a><br><br>";
echo "<a href = 'view_inv_by_cust.php?CustNo=$CustInt'>Click here to view customer's invoices </a><br><br>";
echo "<a href = 'view_inv_by_cust2.php?CustNo=$CustInt'>Click here to view customer's invoices </a><br><br>";
//$indesc = 'd1';
echo "<a href = 'edit_trans_CustProcess.php?CustNo=$CustInt'>Click here to view STATEMENT </a>";

echo "<br><br>";
$date = date('Y-m-d',time()-(160*86400)); // 51 days ago
$queryE = "SELECT ENotes FROM events WHERE CustNo = $CustInt and   EDate >= '$date' order by EDate desc" ;
//echo " ".$queryE." <br>";
//$queryE = "SELECT * FROM events WHERE CustNo = $CNNo order by EDate desc" ;

	if ($resultE = mysqli_query($DBConnect, $queryE)) {
  while ($rowE = mysqli_fetch_assoc($resultE)) {
echo "&nbsp;{$rowE['ENotes']}&nbsp;&nbsp;<br>";
}
mysqli_free_result($resultE);
}
echo "<a href = 'viewEventcust.php?CustNo=$CustInt'>CustomersEvents</a><br><br>";

//include 'calculator/index.php'; //just adds to the page load memory





mysqli_close($DBConnect);
?>
</body>
</html>
