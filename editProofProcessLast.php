<?php	//this is "process_Trans.php"
 $page_title = "You edit a proof";
	include('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
require_once('inc_OnlineStoreDB.php');//mysql connection and database selection
?>



<?php
$ProofNo = 0;
$CustNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';
$CustSDR ='';
$PMethod = '';
$InvNoA = 0;
$InvNoAincl = 0;
$InvNoB = 0;
$InvNoBincl = 0;
$InvNoC = 0;
$InvNoCincl = 0;
$InvNoD = 0;
$InvNoDincl = 0;
$InvNoE = 0;
$InvNoEincl = 0;
$InvNoF = 0;
$InvNoFincl = 0;
$InvNoG = 0;
$InvNoGincl = 0;
$InvNoH = 0;
$InvNoHincl = 0;

$ProofNo = $_POST['ProofNo'];
$CustNo = $_POST['CustNo'];
$ProofDate = $_POST['ProofDate'];
$TransNo = $_POST['TransNo'];
$Amt = $_POST['Amt'];
$Notes = $_POST['Notes'];
$CustSDR = $_POST['CustSDR'];
$PMethod = $_POST['PMethod'];
$InvNoA = $_POST['InvNoA'];

if ($InvNoA == "")
$InvNoA = 0;
$InvNoAincl = $_POST['InvNoAincl'];
$InvNoB = $_POST['InvNoB'];
$InvNoBincl = $_POST['InvNoBincl'];
$InvNoC = $_POST['InvNoC'];
$InvNoCincl = $_POST['InvNoCincl'];
$InvNoD = $_POST['InvNoD'];
$InvNoDincl = $_POST['InvNoDincl'];
$InvNoE = $_POST['InvNoE'];
$InvNoEincl = $_POST['InvNoEincl'];
$InvNoF = $_POST['InvNoF'];
$InvNoFincl = $_POST['InvNoFincl'];
$InvNoG = $_POST['InvNoG'];
$InvNoGincl = $_POST['InvNoGincl'];
$InvNoH = $_POST['InvNoH'];
$InvNoHincl = $_POST['InvNoHincl'];
$Priority = $_POST['Priority'];

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
$v1 = preg_replace("/,/","+",$v1);
$v1 = preg_replace("/…/",".",$v1);

$v1 = preg_replace("/&nbsp;/","_",$v1);
$v1 = preg_replace("/ /","_",$v1);
$v1 = str_replace(' ', '_', $v1);
$v1 = preg_replace("/\xA0\xA0/","_",$v1);
$v1 = str_replace(' ', '_', $v1);

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
$Notes = changeV($Notes);
$CustSDR = changeV($CustSDR);
$PMethod = changeV($PMethod);
$InvNoA = changeV($InvNoA);
$InvNoB = changeV($InvNoB);
$InvNoC = changeV($InvNoC);
$InvNoD = changeV($InvNoD);
$InvNoE = changeV($InvNoE);
$InvNoF = changeV($InvNoF);
$InvNoG = changeV($InvNoG);
$InvNoH = changeV($InvNoH);
$Priority = changeV($Priority);


echo "Thank you for changing the aproof's details: ".$ProofNo." ".$CustNo ." ".$ProofDate .".<br>"  ;

//$ProofNoInt = intval($ProofNo);
$query="update aproof set CustNo = '$CustNo', ProofDate ='$ProofDate',TransNo ='$TransNo', Amt = '$Amt', 
Notes = '$Notes', PMethod = '$PMethod', 
CustSDR = '$CustSDR', 
InvNoA = '$InvNoA', InvNoAincl = '$InvNoAincl' ,
InvNoB = '$InvNoB', InvNoBincl = '$InvNoBincl' ,
InvNoC = '$InvNoC', InvNoCincl = '$InvNoCincl' ,
InvNoD = '$InvNoD', InvNoDincl = '$InvNoDincl' ,
InvNoE = '$InvNoE', InvNoEincl = '$InvNoEincl' ,
InvNoF = '$InvNoF', InvNoFincl = '$InvNoFincl' ,
InvNoG = '$InvNoG', InvNoGincl = '$InvNoGincl' ,
InvNoH = '$InvNoH', InvNoHincl = '$InvNoHincl' ,
Priority = '$Priority' 
where ProofNo = '$ProofNo'";
//oracle: $query="update aproof set Transfn = '$CustNo', Transln ='$ProofDate', Transtel = '$Amt', Transcell= '$Notes', Transemail = '$PMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where ProofNo = :ProofNoInt";
//echo '</br></br></br></br></br></br></br>';

mysqli_query($DBConnect, $query);
echo $query;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '5' color = 'red'><br><b>NOT successfull  :-(</b></FONT>";
echo " <a href = 'http://localhost/phpMyAdmin-3.5.2-english/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=invoice&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4 color = green>whoppeee SUCCESS!!! :-)</font>";

echo ";<br>";

echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";




echo '</br>';echo '</br>';
//php to sql does not understand semicolon. remove the semicolon!!!
//$TransInt = intval($ProofNoInt);
$SQLString = "SELECT * FROM aproof WHERE ProofNo = '$ProofNo'";
//$SQLString = "SELECT * FROM aproof WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Edited aproof:</b></font>
</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ProofNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["ProofDate"];
$item4 = $row["Amt"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["PMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];
print "$item1";
print "_".$item2;
print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
print "_".$item10;
}
$result->free();
}	echo "<br>";
//$mysqli->close();
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
?>
<form name="sdd" action="editProof.php" method="post">
<input type="hidden" name="CustNo" value="<?php echo $CustNo; ?>" /> 

<input type="submit" name="btn_submit" value="Update next aproof" /> 
</form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!--
//$query="insert into aproof values(5, 'Jn', 'VM', '65', '084', 'johnATv', 'USA', 55)";
//php to sql does not understand semicolon. remove the semicolon!!!
//$stmt = oci_parse($conn,$query);

//$rc=oci_execute($stmt);-->
<?php


































/*

$ProofNo = 0;
$CustNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';
$CustSDR ='';
$PMethod = '';
$InvNoA = 0;
$InvNoAincl = 0;
$InvNoB = 0;
$InvNoBincl = 0;
$InvNoC = 0;
$InvNoCincl = 0;
$InvNoD = 0;
$InvNoDincl = 0;
$InvNoE = 0;
$InvNoEincl = 0;
$InvNoF = 0;
$InvNoFincl = 0;
$InvNoG = 0;
$InvNoGincl = 0;
$InvNoH = 0;
$InvNoHincl = 0;
$ProofNo = '_';

//$CustNo" 
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";


*/
$ProofToPay ='_';
$ProofToPay = @$_POST['ProofNo'];
$ProofNo = @$_POST['ProofNo'];
echo "pppProofNo:".$ProofNo;
if ($ProofNo == '')
$ProofNo = '_';
echo "pppProofNo:".$ProofNo;
$PMethod = $_POST['PMethod'];
$InvNoA = $_POST['InvNoA'];
$InvNoAincl = $_POST['InvNoAincl'];
$InvNoB = $_POST['InvNoB'];
$InvNoBincl = $_POST['InvNoBincl'];
$InvNoC = $_POST['InvNoC'];
$InvNoCincl = $_POST['InvNoCincl'];
$InvNoD = $_POST['InvNoD'];
$InvNoDincl = $_POST['InvNoDincl'];
$InvNoE = $_POST['InvNoE'];
$InvNoEincl = $_POST['InvNoEincl'];
$InvNoF = $_POST['InvNoF'];
$InvNoFincl = $_POST['InvNoFincl'];
$InvNoG = $_POST['InvNoG'];
$InvNoGincl = $_POST['InvNoGincl'];
$InvNoH = $_POST['InvNoH'];
$InvNoHincl = $_POST['InvNoHincl'];
$Priority = $_POST['Priority'];




//$ProofNo = $_POST['ProofNo'];
//$CustNo = $_POST['CustNo'];
if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";
$CC = "SELECT * FROM customer WHERE CustNo = $CustNo";
if ($resultC = mysqli_query($DBConnect, $CC)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
$CustFN = $row["CustFN"];
$CustLN = $row["CustLN"];
$CustEmail = $row["CustEmail"];

}
$resultC->free();
}

$CustEmail = str_replace(';', '; ', $CustEmail);
	
$D1 = $_POST['ProofDate'];
$D2 = explode("/", $D1);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

//$ProofDate = $D2[2]."-".$D2[1]."-".$D2[0];

//echo $ProofDate;	 


$CustSDR = $_POST['CustSDR'];



$Amt = $_POST['Amt'];
$Notes = $_POST['Notes'];
$EEmail = $Notes;
//echo " notes:".$Notes ;
//$str = htmlentities('$Notes'); //causes a blank!
//$Notes = htmlspecialchars($Notes);
$charset = mysqli_character_set_name($DBConnect);
printf ("%s\n",$charset);
//$Notes = htmlspecialchars("$Notes", ENT_QUOTES);

//header( "Content-Type: text/html; charset=utf-8" );
/*$body = "begrüßen zu dürfen";
$g = "ben zu fen";
echo htmlentities( $body );
echo htmlentities( $g );
*/

/*htmlXspecialchars($Notes);
htmlXentities($Notes);
htmlX_entity_decode($Notes);
*/
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.
$EEmail = $Notes;  

$Notes = htmlentities( $Notes, ENT_SUBSTITUTE );  //and also header: charset=UTF-8"   WORKS LIKE A CHARM 2014



$von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é","\xA0");
$zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&nbsp;","&#233;","&nbsp;");
$Notes = str_replace($von, $zu, $Notes);  
$CustSDR = str_replace($von, $zu, $CustSDR);  
//echo " specNotes:".$Notes."<br>" ;
$Notes = mysqli_real_escape_string($DBConnect, $Notes); 
$CustSDR = mysqli_real_escape_string($DBConnect, $CustSDR); 
//dbl  backsl\and&hash# space (){}[]?//\\$%ö
//$Notes = preg_replace("/ö/","\xF6",$Notes); not working
//$Notes = preg_replace("/ö/","oe",$Notes); //WORKS!
$CustSDR = preg_replace("/ö/","oe",$CustSDR); //WORKS!
//iconv("UTF-8", "ISO-8859-1", $Notes); 
//$Notes = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $Notes); //  not working
//$Notes = addslashes($_POST[$Notes]);

//$Notes = mb_convert_encoding($Notes, 'ISO-8859-15', 'UTF-8'); //causes question marks for umlaute!



/*$Notes = preg_replace("/'/","_",$Notes);
///////$Notes = preg_replace("/ /","_",$Notes);
$Notes = preg_replace("/&nbsp;/","_",$Notes);
$Notes = str_replace(' ', '_', $Notes);
*/$CustSDR = preg_replace("/'/","_",$CustSDR);
$Amt = preg_replace("/,/","",$Amt);
$CustSDR = preg_replace("/,/","",$CustSDR);


$Notes = mysqli_real_escape_string($DBConnect, $Notes);
//echo " notes:".$Notes ;
//echo " CustSSDR:".$CustSDR ;
//echo "TransferMethod:".$PMethod." ";




//echo "Thank you for adding the aproof's details: ".$ProofNo." ".$CustNo ." ".$D1 ."."  ;

$ProofNoInt = intval($ProofNo);



echo "pppProofNo:".$ProofNo;




/*


$queryPPR="update aproof set ProofNo = '$ProofNo' where ProofNo = '$ProofNo'";
echo '</br>';

mysqli_query($DBConnect, $queryPPR);

 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>update aproof NOT successfull!!!</b>!!</b></font><br>$queryPPR<br>";
else
echo "<font size = 4>update aproof success!$queryPPR </font><br>";
*/













//php to sql does not understand semicolon. remove the semicolon!!!
$TransInt = intval($ProofNoInt);
$SQLString = "SELECT * FROM aproof WHERE ProofNo = $TransInt";
//$SQLString = "SELECT * FROM aproof WHERE WHERE CustNo = $item2;
?>

</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ProofNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["ProofDate"];
$item4 = $row["Amt"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["PMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];
print "$item1";
print "_".$item2;
print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
print "_".$item10;
}
$result->free();
}
	






echo $query;
$ttttt = 0;
echo "pppProofNo:".$ProofNo;
echo "<br><br>";
echo "Details: <br>";

echo "</b><table>";
echo "<tr><th align = 'left' >.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "</th></tr>";


if ($InvNoA != '0')
{

$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoA";


if ($result = mysqli_query($DBConnect, $SQLINV)) {
 echo "<tr>";

 while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<th align = 'left'>InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";

}
$result->free();
}
echo "</tr>";

}


if ($InvNoB != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoB";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<tr><th align = 'left' >InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}

}

if ($InvNoC != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoC";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<tr><th align = 'left'>InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}

}



if ($InvNoD != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoD";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;

echo "<tr><th align = 'left'>InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}

}

if ($InvNoE != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoE";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}

}



if ($InvNoF != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoF";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}

}

if ($InvNoG != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoG";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}

}

if ($InvNoH != '0')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoH";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}

}


echo "</table>";
echo "Total: ".$ttttt."<br>";



$ProofInvA= "";
$ProofDate= "";
$ProofAmt = "";
$ProofNotes= "";
$ProofMethod = "";
$ProofCustSDR = "";
echo @ProofCustSDR; //Use of undefined constant ProofCustSDR - assumed 'ProofCustSDR'  i think i need to restart :-(
$sptp = 'w';
//echo sptp;

$sptp = "SELECT * FROM aproof WHERE ProofNo = '$ProofToPay' AND CustNo = $CustNo";
echo "sptp:" .$sptp;
if ($ProofToPay == '_')
{

if ($resultPTP = mysqli_query($DBConnect, $sptp)) {
  while ($rowPTP = mysqli_fetch_assoc($resultPTP)) {
//$ProofNo= $rowPTP["ProofNo"];
$ProofInvA= $rowPTP["InvNoA"];
$ProofDate= $rowPTP["ProofDate"];
$ProofAmt = $rowPTP["ProofAmt"];
$ProofNotes= $rowPTP["Notes"];
$ProofMethod = $rowPTP["PMethod"];
$ProofCustSDR = $rowPTP["CustSDR"];
/*
echo "<tr><th align = 'left'>InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
*/
}
	mysqli_free_result($resultPTP);
}
}






$nL = "%0D%0A"; //new line

$b5 = "For Payment of: ".$Notes. " Invoice No ".@$InvNoA." ";
$b5k = "";
if ($InvNoB != '0')
$b5k = " , ".@$InvNoB;
if ($InvNoC != '0')
$b5k = $b5k." , ".@$InvNoC;
if ($InvNoD != '0')
$b5k = $b5k." , ".@$InvNoD;
if ($InvNoE != '0')
$b5k = $b5k." , ".@$InvNoE;
if ($InvNoF != '0')
$b5k = $b5k." , ".@$InvNoF;
if ($InvNoG != '0')
$b5k = $b5k." , ".@$InvNoG;
if ($InvNoH != '0')
$b5k = $b5k." , ".@$InvNoH;
$NN = $EEmail;
If ($Notes == ".")
$NN = "";
$body = "Thank you for payment of ".$NN." Invoice No ".@$InvNoA." ".$b5k.".".$nL.$nL.$PMethod." Receipt (This email is the receipt, there is no attachment in this email)".$nL;
$b1 =  "Date: ".$D1;
$b2 = "Transaction Number: ". $Trans_No;
$b3 = "Paid by: ". $CustLN.", ".$CustFN;
$b4 = "Amount: R". $Amt;


$b5b = "Customer reference: ".$CustSDR;
$b6 = "Received by: CompanyName ";
$b7 = "Payment method: ". $PMethod ;
echo "proofnno: >".$ProofNo. "< ";
if ($ProofNo == '')
{
$b7g = '';
echo "jjj";
}
else
{
$b7g = $nL."Proof No.: ". $ProofNo ;
echo "nnnnlll";
}



if ($ProofToPay == '_')
$b77 = "Related Proof Of Payment: ". $ProofToPay . " &nbsp;&nbsp;[ ".$ProofInvA . " &nbsp;&nbsp; ".$ProofDate . " &nbsp;&nbsp; ".$ProofAmt. " &nbsp;&nbsp; ".$ProofNotes . " &nbsp;&nbsp; ".$ProofMethod . " &nbsp;&nbsp; ".$ProofCustSDR. " ]";
else
$b77 = "";
$b8 = "Thank you";
$b9 = "CompanyName";
$ba = "CompanyLogo1";
$bb = "CompanyLogo2";
$bc = "CompanyWebsite";
$bd = "CompanyContactNos)";
$be = "Fax: FaxNo";
$bf = "Skype: SkypeName";
$bg = "Sales terms: TermsWebpage";
$bh = "Support: SupportWebpage";
echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php echo $PMethod ?> Receipt&body=
<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh ?>">
Click to EMail Receipt to customer <?php echo $CustFN." ".$CustLN; ?></a><br>
<br></font>
<br>
<br>









<?php

$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
?>

