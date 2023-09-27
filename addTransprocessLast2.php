<html>
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
</head>

<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
?>


<?php
//$PayNotes= "";
$PayNotes = @$_POST['PayNotes'];
$PayNotes = mysqli_real_escape_string($DBConnect, $PayNotes); 
$Trans_No = 0;
$CustNo = '';
$TransDate = '';
$AmtPaid = '';
$Notes ='';
$CustSDR ='';
$TMethod = '';
$InvNoA = '';
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
$ProofNo = @$_POST['ProofNo'];
echo "pppProofNo:".$ProofNo;
$ProofToPay ='_';
$ProofToPay = @$_POST['ProofNo'];
if ($ProofNo == '')


$ProofNo = '_';
echo "pppProofNo:".$ProofNo;



$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";



$TMethod = $_POST['TMethod'];
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

echo "problem: $InvNoG ";

$InvNoGincl = $_POST['InvNoGincl'];
$InvNoH = $_POST['InvNoH'];
$InvNoHincl = $_POST['InvNoHincl'];
$Priority = $_POST['Priority'];





$Trans_No = $_POST['TransNo'];
$CustNo = $_POST['CustNo'];
if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";

echo "CustNo: ".$CustNo;

$CC = "SELECT * FROM customer WHERE CustNo = $CustNo";
if ($resultC = mysqli_query($DBConnect, $CC)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
$CustFN = $row["CustFN"];
$CustLN = $row["CustLN"];
$CustLN = $row["CustLN"];
$Abbr = $row['ABBR'];
$CustEmail = $row["CustEmail"];

}
mysqli_free_result($resultC);
}

$CustEmail = str_replace(';', '; ', $CustEmail);
	
$D1 = $_POST['lst']; //TransDate

$D2 = explode("/", $D1);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$TransDate = $D2[2]."-".$D2[1]."-".$D2[0];

//echo $TransDate;	 




































$CustSDR = $_POST['CustSDR'];




$AmtPaid = $_POST['AmtPaid'];
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
$AmtPaid = preg_replace("/,/","",$AmtPaid);
$CustSDR = preg_replace("/,/","",$CustSDR);


$Notes = mysqli_real_escape_string($DBConnect, $Notes);
//echo " notes:".$Notes ;
//echo " CustSSDR:".$CustSDR ;
//echo "TransferMethod:".$TMethod." ";




//echo "Thank you for adding the transaction's details: ".$Trans_No." ".$CustNo ." ".$D1 ."."  ;

$Trans_NoInt = intval($Trans_No);



echo "pppProofNo:".$ProofNo;



if ($InvNoAincl == '')
$InvNoAincl = 0;
if ($InvNoBincl == '')
$InvNoBincl = 0;
if ($InvNoCincl == '')
$InvNoCincl = 0;
if ($InvNoDincl == '')
$InvNoDincl = 0;
if ($InvNoEincl == '')
$InvNoEincl = 0;
if ($InvNoFincl == '')
$InvNoFincl = 0;
if ($InvNoGincl == '')
$InvNoGincl = 0;
if ($InvNoHincl == '')
$InvNoHincl = 0;
$query="insert into transaction (TransNo, CustNo, TransDate, AmtPaid, Notes, CustSDR, TMethod,  
InvNoA,InvNoAincl, InvNoB, InvNoBincl , InvNoC, InvNoCincl ,
InvNoD, InvNoDincl , InvNoE, InvNoEincl , InvNoF, InvNoFincl,
InvNoG , InvNoGincl , InvNoH , InvNoHincl, Priority )
VALUES
( $Trans_No,  $CustNo, '$TransDate', $AmtPaid, '$Notes', '$CustSDR', '$TMethod', 
'$InvNoA', $InvNoAincl ,  '$InvNoB', $InvNoBincl ,  '$InvNoC', $InvNoCincl ,
'$InvNoD',  $InvNoDincl ,  '$InvNoE', $InvNoEincl ,  '$InvNoF', $InvNoFincl ,
'$InvNoG',  $InvNoGincl , '$InvNoH',  $InvNoHincl , '$Priority') ";


echo '</br>';


mysqli_query($DBConnect, $query);

 echo "<font size = 2 color = red><b>".mysqli_error($DBConnect)."</b></font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 2  color = red> Insert into transaction NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 2>Insert into transaction success! </font><br> $query;";







$queryPPR="update aproof set TransNo = '$Trans_No' where ProofNo = '$ProofNo'";
//echo '</br>';

mysqli_query($DBConnect, $queryPPR);

 echo "<font size = 2 color = red>".mysqli_error($DBConnect)."</font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 2  color = red><b><b>update aproof NOT successfull!!!</b>!!</b></font><br>$queryPPR<br>";
else
echo "<font size = 2>update aproof success!$queryPPR </font><br>";















//php to sql does not understand semicolon. remove the semicolon!!!
$TransInt = intval($Trans_NoInt);
$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransInt";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>



<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["TransDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
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
mysqli_free_result($result);
}
	






$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
	
//$file = "logaddtrans.php";
/*$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
fwrite($open, "<br><br><b>Add transcaction:</b> <br>" .$query. ";<br/><br/><br/>"); 
fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
echo "<br /><br /><a href = '$file.'><b>FILE WRITTEN </B>Check log file:</a> <br />";
*/	
?>


<!--<form name="Editcust" action="addTransCustProcess2sess.php" method="post">-->
<form name="Editcust" action="addTrans.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustInt ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">
<input type = "hidden" name="TransDate" value="<?php echo $TransDate ?>">
<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">


<a href = "add_trans.php"> Click to add another transaction</a>	<br><br>
	
	<!--<input type = "submit" value = "Click to add another transaction">-->



	

<?php
//echo $query;
$ttttt = 0;

echo "pppProofNo:".$ProofNo;
echo "<br><br>";
echo "Details:";

echo "</b><table>";
//echo "<tr>";
//<th align = 'left' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "</th></tr>";


if ($InvNoA != '0')
{

$SQLINVA = "SELECT * FROM invoice WHERE InvNo = $InvNoA";


if ($result = mysqli_query($DBConnect, $SQLINVA)) {
 echo "<tr>";

 while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<th align = 'left'>InvNoA: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";

}
mysqli_free_result($result);
}
echo "</tr>";

}


if ($InvNoB != '0')
{
$SQLINVB = "SELECT * FROM invoice WHERE InvNo = $InvNoB";
if ($result = mysqli_query($DBConnect, $SQLINVB)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<tr><th align = 'left' >InvNoB: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}

if ($InvNoC != '0')
{
$SQLINVC = "SELECT * FROM invoice WHERE InvNo = $InvNoC";
if ($result = mysqli_query($DBConnect, $SQLINVC)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;
echo "<tr><th align = 'left'>InvNoC: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}



if ($InvNoD != '0')
{
$SQLINVD = "SELECT * FROM invoice WHERE InvNo = $InvNoD";
if ($result = mysqli_query($DBConnect, $SQLINVD)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $ttttt+$TotA;

echo "<tr><th align = 'left'>InvNoD: ".$InvNumber;
echo "</th>";
echo "<th align = 'right'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
mysqli_free_result($result);
}

}

if ($InvNoE != '0')
{
$SQLINVE = "SELECT * FROM invoice WHERE InvNo = $InvNoE";
if ($result = mysqli_query($DBConnect, $SQLINVE)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNoE: ".$InvNumber;
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
mysqli_free_result($result);
}

}



if ($InvNoF != '0')
{
$SQLINVF = "SELECT * FROM invoice WHERE InvNo = $InvNoF";
if ($result = mysqli_query($DBConnect, $SQLINVF)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNoF: ".$InvNumber;
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
mysqli_free_result($result);
}

}

if ($InvNoG != '0')
{
$SQLINVG = "SELECT * FROM invoice WHERE InvNo = $InvNoG";
if ($result = mysqli_query($DBConnect, $SQLINVG)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNoG: ".$InvNumber;
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
mysqli_free_result($result);
}

}

if ($InvNoH != '0')
{
$SQLINVH = "SELECT * FROM invoice WHERE InvNo = $InvNoH";
if ($result = mysqli_query($DBConnect, $SQLINVH)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNoH: ".$InvNumber;
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
mysqli_free_result($result);
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
$plural = ''; //for invoice or invoices
$b5 = "For Payment of: ".$Notes. " Invoice No ".@$InvNoA." ";
$b5k = "";
if ($InvNoB != '')
{
$plural = 's';
$b5k = " , ".@$InvNoB;
}
if ($InvNoC != '')
$b5k = $b5k." , ".@$InvNoC;
if ($InvNoD != '')
$b5k = $b5k." , ".@$InvNoD;
if ($InvNoE != '')
$b5k = $b5k." , ".@$InvNoE;
if ($InvNoF != '')
$b5k = $b5k." , ".@$InvNoF;
if ($InvNoG != '')
$b5k = $b5k." , ".@$InvNoG;
if ($InvNoH != '')
$b5k = $b5k." , ".@$InvNoH;
$NN = $EEmail;
If ($Notes == ".")
$NN = "";
$body = "Thank you for payment of ".$NN." Invoice".$plural." No ".@$InvNoA." ".$b5k.".".$nL.$nL.$TMethod." Receipt (This email is the receipt, there is no attachment in this email)".$nL;
$b1 =  "Date: ".$D1;
$b2 = "Transaction Number: ". $Trans_No;
$b3 = "Paid by: ". $CustLN.", ".$CustFN;
$b4 = "Amount: R". $AmtPaid;


$b5b = "Customer reference: ".$CustSDR;
$b6 = "Received by: Karl ";
$b7 = "Payment method: ". $TMethod ;
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
$b9 = "Karl";
$ba = "PC and Notebook Sales and Advanced I.T. Support";
$bb = "Karl's Fast Internet and Webhosting Solutions";
$bc = "www.kconnect.co.za";
$bd = "Email: cyberkarl3@gmail.com";
$be = "Fax: 0865492415";
$bf = "Skype: cyberkarl3";
$bg = "Sales terms: www.k-connect.co.za/terms";
$bh = "Internet and Email Support: www.karl.co.za/support";
echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php echo $TMethod ?> Receipt&body=
<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh ?>">
Click to EMail Receipt to customer <?php echo $CustFN." ".$CustLN; ?></a><br>
<br></font>
<br>
<br>


 
<font size= 2><b>
<a href='selectCustTrans.php'>Click to add transaction for another customer</a>
<br> or 
<form name="same" action="addTrans.php" method="post">
<input type = "submit" value = "Click to add transaction for the same customer">
<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
</form>

</font></b>



<?php
echo $SQLINVA.' &nbsp;&nbsp;&nbsp;&nbsp;'.$SQLINVB.' &nbsp;&nbsp;&nbsp;&nbsp;'.$SQLINVC.' &nbsp;&nbsp;&nbsp;&nbsp;'.$SQLINVD.' &nbsp;&nbsp;&nbsp;&nbsp;'.$SQLINVE.' &nbsp;&nbsp;&nbsp;&nbsp;'.$SQLINVF.' &nbsp;&nbsp;&nbsp;&nbsp;'.$SQLINVG.' &nbsp;&nbsp;&nbsp;&nbsp;'.$SQLINVH;
?>
	<br><br>
	

	<br><br>



	<br><br>
	<a href='edit_trans_CustProcessC2.php'></a>
<form name="EditTrans" action="edit_trans_CustProcessC2.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $Trans_No ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">
<input type = "hidden" name="TransDate" value="<?php echo $TransDate ?>">
<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">
<input type = "hidden" name="PayNotes" value="<?php echo $PayNotes ?>">

	
	<input type = "submit" value = "Click to edit this transaction">
</form>






<br><br>
<script type="text/javascript">
function myFunction()
{

location.href = "mailto:<?php echo $CustEmail ?>?subject=<?php echo $TMethod ?> Receipt&body=<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh ?>";
//var x = location.href;
//document.getElementById("demo").innerHTML=x;
}
</script>

<body onload="javascript:myFunction()">
	



<br><br><br><br>
<?php





//include "view_trans_by_cust.php";
/*
echo "<font zize = 4><b>";
echo $TMethod.' ';
echo " Receipt (This email is the receipt; there is no attachment on this email)";
echo "</b></font><br><br>";
echo "Date: ";
echo $D1 ;
echo "&nbsp;&nbsp;&nbsp;";
echo "Transaction Number:";
echo $Trans_No;
echo "<br><br>Received From: ";
echo $CustLN;
echo ", ".$CustFN;
echo "<br><br>Amount: R";
echo $AmtPaid;

echo "<br><br>";
echo "For Payment of: ";
echo $Notes;
echo "<br><br>";
echo "Received by Karl";
echo "<br><br>Method: ";
echo $TMethod;
echo "<br><br>";


echo "<br><br><br>".$query;


echo ";<br><br>";
*/










include "view_inv_by_custADV3.php"; //gives only totals

$indesc = 0;
$ShowDraft = "N";
include "view_Underpaid_inv_by_cust2b.php"; //2b is the one with checkboxes
include "view_Unpaid_inv_by_cust2b.php"; //2b is the one with checkboxes

echo "<br><br>";



















echo ";<br>";
echo "<br><br>";
include "invEmailstatement.php";
echo "<br><br>";


$indesc = 9;
$ShowDraft = "Y";
include "view_Unpaid_inv_by_cust2.php";
echo "<br><br>";





//include "view_trans_by_custUNDERorOVERPAID.php";
//include "view_inv_by_custADV2.php";
//include "view_inv_by_custADVnoTrans.php";
include "view_inv_by_custADVnoTransOVerPaidUnderPaid.php";

 echo "<br>";
echo "<a href = 'view_inv_PAIDinvoicesBOTH.php'>Click here to view only PAID invoices </a>";
echo "<br><br>";
echo "<a href = 'view_inv_by_cust.php'>Click here to view customer's invoices </a>";
echo "<br><br>";
echo "<a href = 'view_inv_by_cust2.php'>Click here to view customer's invoices </a>";
echo "<br><br>";


//$un= 'N';
//$indesc = '1';
//$in = '1';
//echo "indesc:".$indesc;
//fecho "<br><br>";
$indesc = 'd1';
include "edit_trans_CustProcess.php";
echo "<br><br>";

include "view_trans_by_cust.php";


?>








