
<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include 'header.php';
require_once 'inc_OnlineStoreDB.php';
?>


<?php
$ProofNo = 0;
$CustNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';
$Notes1 ='';
$Notes2 ='';
$Notes3 ='';
$Notes4 ='';
$Notes5 ='';
$Notes6 ='';
$Notes7 ='';
$Notes8 ='';

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

//$CustNo"
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";

//$CustNo = $_POST['CustNo'];

$CustFN = $_POST['CustFN'];
$CustLN = $_POST['CustLN'];
$CustEmail = $_POST['CustEmail'];

$CustEmail = str_replace(';', '; ', $CustEmail);

//$ProofNo = $_POST['ProofNo'];

$Numb = "ProofNo1"; //default when table is empty.
//$query = "SELECT MAXNUM(ProofNo)  AS MAXNUM FROM aproof order by ProofNo";
//$query = "select ProofNo from aproof order by ProofNo desc limit 1"; // gives Proofno9 instead of Proofno11
//$query = "select ProofNo from aproof asc limit 1";
//$query = "select ProofNo from aproof order by SUBSTRING(ProofNo, 2) desc limit 1"; // gives Proofno9 instead
//$query = "select ProofNo from aproof order by ProofDate desc limit 1";
$query = "SELECT ProofNo,CONVERT(SUBSTRING_INDEX(ProofNo,'ProofNo',-1),UNSIGNED INTEGER) AS num
FROM aproof ORDER BY num desc limit 1;  ";
 //http://stackoverflow.com/questions/5960620/convert-text-into-number-in-mysql-query
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());

while($row = mysqli_fetch_array($result)){
	echo "<br>The max no ProofNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = $row[0];
$Numb = substr($daNextNo, 7);
$Numb++;
}
echo "<br><br>";
$ProofNo = "ProofNo".$Numb;

$CustNo = $_POST['CustNo'];
$CustInt = $CustNo;
if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";

$D1 = $_POST['ProofDate'];
$D2 = explode("/", $D1);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$ProofDate = $D2[2]."-".$D2[1]."-".$D2[0];

//echo $ProofDate;

$CustSDR = $_POST['CustSDR'];

$Amt = $_POST['Amt'];
$Notes = $_POST['Notes'];
$N2 = $_POST['Notes2'];
$N3 = $_POST['Notes3'];
$N4 = $_POST['Notes4'];
$N5 = $_POST['Notes5'];
$N6 = $_POST['Notes6'];
$N7 = $_POST['Notes7'];
$N8 = $_POST['Notes8'];
$Notes =  $Notes + $N2 + $N3 + $N4 + $N5+ $N6 + $N7 + $N8;
$EEmail = $Notes;
echo " notes:".$Notes ;
//$str = htmlentities('$Notes'); //causes a blank!
//$Notes = htmlspecialchars($Notes);
$charset = mysqli_character_set_name($DBConnect);
printf ("Current character set is %s\n",$charset);
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

$von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é");
$zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&nbsp;","&#233;");
$Notes = str_replace($von, $zu, $Notes);
echo " specNotes:".$Notes."<br>" ;
$Notes = mysqli_real_escape_string($DBConnect, $Notes); //Note, that if no connection is open, mysqli_real_escape_string() will return an empty string!
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

$PMethod = $_POST['PMethod'];
$InvNoA = $_POST['InvNoA'];

$InvNoAincl = $_POST['InvNoAincl'];
$InvNoAincl = str_replace(',', '', $InvNoAincl);

$InvNoB = $_POST['InvNoB'];

$InvNoBincl = $_POST['InvNoBincl'];
$InvNoBincl = str_replace(',', '', $InvNoBincl);

$InvNoC = $_POST['InvNoC'];

$InvNoCincl = $_POST['InvNoCincl'];
$InvNoCincl = str_replace(',', '', $InvNoCincl);

$InvNoD = $_POST['InvNoD'];

$InvNoDincl = $_POST['InvNoDincl'];
$InvNoDincl = str_replace(',', '', $InvNoDincl);

$InvNoE = $_POST['InvNoE'];

$InvNoEincl = $_POST['InvNoEincl'];

$InvNoF = $_POST['InvNoF'];

$InvNoFincl = $_POST['InvNoFincl'];

$InvNoG = $_POST['InvNoG'];

$InvNoGincl = $_POST['InvNoGincl'];
$InvNoH = $_POST['InvNoH'];
$InvNoHincl = $_POST['InvNoHincl'];
$Priority = $_POST['Priority'];

echo " notes:".$Notes ;
echo " CustSSDR:".$CustSDR ;
echo "ProofMethod:".$PMethod." ";

echo "Thank you for adding the proof's details: ".$ProofNo." ".$CustNo ." ".$D1 ."."  ;

//$ProofNoInt = intval($ProofNo);

if ($InvNoBincl  == '')
$InvNoBincl = 0;

$query="insert into aproof (ProofNo, CustNo, ProofDate, Amt, TransNo, Notes, CustSDR, PMethod,
InvNoA,InvNoAincl,
InvNoB, InvNoBincl ,
InvNoC, InvNoCincl ,
InvNoD, InvNoDincl ,
InvNoE, InvNoEincl ,
InvNoF, InvNoFincl,
InvNoG , InvNoGincl ,
InvNoH , InvNoHincl,
Priority )
VALUES
( '$ProofNo',  $CustNo, '$ProofDate', '$Amt', '', '$Notes', '$CustSDR', '$PMethod',
'$InvNoA', '$InvNoAincl' ,
 '$InvNoB', '$InvNoBincl' ,
 '$InvNoC', $InvNoCincl ,
'$InvNoD',  $InvNoDincl ,
 '$InvNoE', $InvNoEincl ,
 '$InvNoF', $InvNoFincl ,
'$InvNoG',  $InvNoGincl ,
'$InvNoH',  $InvNoHincl ,
'$Priority') ";

/*(TransNo = $ProofNo, CustNo = $CustNo, ProofDate ='$ProofDate', Amt = $Amt, Notes = '$Notes', PMethod = '$PMethod',
InvNoA = '$InvNoA', InvNoAincl = '$InvNoAincl' ,
InvNoB = '$InvNoB', InvNoBincl = '$InvNoBincl' ,
InvNoC = '$InvNoC', InvNoCincl = '$InvNoCincl' ,
InvNoD = '$InvNoD', InvNoDincl = '$InvNoDincl' ,
InvNoE = '$InvNoE', InvNoEincl = '$InvNoEincl' ,
InvNoF = '$InvNoF', InvNoFincl = '$InvNoFincl' ,
InvNoG = '$InvNoG', InvNoGincl = '$InvNoGincl' ,
InvNoH = '$InvNoH', InvNoHincl = '$InvNoHincl' ,
Priority = '$Priority') ";*/
//oracle: $query="update transaction set Transfn = '$CustNo', Transln ='$ProofDate', Transtel = '$Amt', Transcell= '$Notes', Transemail = '$PMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :ProofNoInt";
echo '</br>';

mysqli_query($DBConnect, $query);

 echo "<font size = 3 color = red><b>".mysqli_error($DBConnect)."<br></font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 3  color = red><b><b>insert or update NOT successfull!!!<br> $query</b>!!</b></font><br><br></b>";
else
echo "<font size = 4>insert success! </font><br><br> $query</b><br>";

//echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";

//echo "<input type='text' id='CNN'  name='CNN' value=".$CustNo.">";

//include ("addTransCustProcess3.php");

//php to sql does not understand semicolon. remove the semicolon!!!
//$ProofInt = intval($ProofNoInt);

$SQLString = "SELECT * FROM aproof WHERE ProofNo = $ProofNo";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You inserted the proof:</b></font>

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



$file = "FileWriting/bkp.php";
include 'FileWriting/FileWriting.php';
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


<!--<form name="Editcust" action="addProofCustProcess2sess.php" method="post">-->
<form name="Editcust" action="addProof.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustInt ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">
<input type = "hidden" name="ProofDate" value="<?php echo $ProofDate ?>">
<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">

<a href = "add_proof.php"> Click to add another proof</a>	<br><br>
<a href = "add_trans.php"> Click to add another transaction</a>	<br><br>

	<!--<input type = "submit" value = "Click to add another transaction">-->




<?php
//echo $query;
$ttttt = 0;

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

$nL = "%0D%0A"; //new line

$b5 = "For Proof of: ".$Notes. " Invoice No ".@$InvNoA." ";
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
$body = "Thank you for Proof of ".$NN." Invoice No ".@$InvNoA." ".$b5k.".".$nL.$nL.$PMethod." Receipt (This email is the receipt, there is no attachment in this email)".$nL;
$b7b = "This email does not confirm the payment. This email only indicates the receiving of the proof of payment via email.";
$b1 =  "Date: ".$D1;
$b2 = "Proof Number: ". $ProofNo;
$b3 = "From: ". $CustLN.", ".$CustFN;
$b4 = "Amount: R". $Amt;

$b5b = "Customer statement: ".$CustSDR;
$b6 = "Received by: CompanyName ";
$b7 = "Proof method: ". $PMethod;

$b8 = "Thank you";
$b9 = "CompanyName";
//$ba = "PC and Notebook Sales & Advanced I.T. Support";
$ba = "CompanyLogo1";
$bb = "CompanyLogo1";
$bc = "CompanyWebsite";
$bd = "CompanyContact";
$be = "Fax: CompanyFax";
$bf = "Skype: SkypeName";
$bg = "Sales terms: TermsWebpage";
$bh = "Support: SupportPage";

//echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$nL.$b6.$nL.$b7.$nL.$nL.$b8.$nL.$nL.$b9.$nL.$nL.$ba.$nL.$nL.$bb.$nL.$nL.$bc.$nL.$nL.$bd.$nL.$nL.$be.$nL.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh;

echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php echo $PMethod ?> Receipt&body=
<?php echo $body.$nL.$b7b.$nL.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$nL.$b5b.$nL.$b6.$nL.$b7.$nL.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh ?>">
Click to EMail Receipt to customer</a><br>
<br></font>
<br>
<br>
<!--  bold and styles dont work in mailto
<a href="mailto:me@test.co.za?subject=testReceipt&body=
<a style="font-weight: bold;"  href="mailto:anybody@somewhere.com">">werfwgrg</a>
-->








<font size= 2><b>

<a href='selectCustProof.php'>Click to add email proof for another customer</a> or <input type = "submit" value = "Click to add email proof for the same customer">
</font></b>





	<br><br>


	<br><br>




<br><br><br><br>
<?php




























include ("view_proof_by_cust.php");
include ("view_inv_by_custADV2.php");
include ("view_proof_by_cust2.php");
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");

echo "<b>";
echo $PMethod.' ';
echo " Receipt (This email is the proof; there is no attachment on this email)";
echo "</b></font><br><br>";
echo "Date: ";
echo $D1 ;
echo "&nbsp;&nbsp;&nbsp;";
echo "Proof Number:";
echo $ProofNo;
echo "<br><br>Received From: ";
echo $CustLN;
echo ", ".$CustFN;
echo "<br><br>Amount: R";
echo $Amt;

echo "<br><br>";
echo "For Proof of: ";
echo $Notes;
echo "<br><br>";
echo "Received by CompanyName T/A CompanyName2";
echo "<br><br>Method: ";
echo $PMethod;
echo "<br><br>";

echo "<br><br><br>".$query;

echo ";<br><br></form>";
?>
Test mailto: <?php echo $CustEmail.$PMethod."<br>".$body."<br><br>".$nL.$b7b.$nL.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$nL.$b5b.$nL.$b6.$nL.$b7.$nL.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh;

//$body = "Thank you for Proof of ".$NN." Invoice No ".@$InvNoA." ".$b5k.".".$nL.$nL.$PMethod." Receipt (This email is the receipt, there is no attachment in this email)".$nL;

//$body = "testing";
?>
<br><br>
<script type="text/javascript">
function redirect()
{
window.location.href = "mailto:<?php echo $CustEmail; ?>?subject=<?php echo $PMethod; ?> Receipt&body=<?php echo $body.$nL.$b7b.$nL.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$nL.$b5b.$nL.$b6.$nL.$b7.$nL.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh; ?>";
}
</script>

<body onload="javascript: redirect();">
body
</body>


