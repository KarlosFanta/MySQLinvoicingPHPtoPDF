<html>
<head>
<title>Add a proof</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 


<?php	//this is "process_Trans.php"

	include('header.php');	
require_once("inc_OnlineStoreDB.php");
?>


<?php
$ProofNo = '';
$CustNo = '';
$TransNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';
$CustSDR ='';
$PMethod = '';
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

$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";


$ProofNo = $_POST['ProofNo'];
/*$CustNo = $_POST['CustNo'];
if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";

echo "CustNO: ".$CustNo;

$CC = "SELECT * FROM customer WHERE CustNo = $CustNo";
if ($resultC = mysqli_query($DBConnect, $CC)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
$CustFN = $row["CustFN"];
$CustLN = $row["CustLN"];
$CustEmail = $row["CustEmail"];

}
$resultC->free();
}
*/
$charset = mysqli_character_set_name($DBConnect);//chek for UTF-8

$query="DELETE FROM aproof where ProofNo like '$ProofNo'";

echo '</br>';

mysqli_query($DBConnect, $query);

 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>delete from aproof NOT successfull!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = 4>delete success! </font><br>";















//php to sql does not understand semicolon. remove the semicolon!!!

$SQLString = "SELECT * FROM aproof WHERE ProofNo = $ProofNo";
//$SQLString = "SELECT * FROM aproof WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Added the proof:</b></font>

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


<form name="Editcust" action="addProof.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">
<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">

<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">
<input type = "hidden" name="ProofDate" value="<?php echo $ProofDate ?>">
<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">

<a href = "addTrans.php"> Click to add another proof</a>	<br><br>
	
	<!--<input type = "submit" value = "Click to add another proof">-->


	

<?php
echo $query;
$ttttt = 0;

echo "<br><br>";
echo "Details: <br>";

echo "</b><table>";
//echo "<tr><th align = 'left' >.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "</th></tr>";


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
if ($Notes == '0')
$Notes ='';

$b5 = "For Proof of: ".$Notes. " Invoice No ".@$InvNoA." ";
$b5k = "";
if ($InvNoB != '')
$b5k = " , ".@$InvNoB;
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
$body = "Thank you for Proof of ".$NN." Invoice No ".@$InvNoA." ".$b5k.".".$nL.$nL.$PMethod." Proof Receipt (This email is the receipt of proof of payment, there is no attachment in this email)".$nL;
$b7b = "This email does not confirm the payment. This email only indicates the receiving of the proof of payment via email.";
$b1 =  "Date: ".$D1;
$b2 = "Proof Number: ". $ProofNo;
$b3 = "From: ". $CustLN.", ".$CustFN;
$b4 = "Amount: R". $Amt;


$b5b = "Customer reference: ".$CustSDR;
$b6 = "Received by: Karl ";
$b7 = "Proof method: ". $PMethod ;
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



if (@$ProofToPay == '_')
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
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php echo $PMethod ?> Proof Receipt&body=
<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh ?>">
Click to EMail Receipt to customer <?php echo $CustFN." ".$CustLN; ?></a><br>
<br></font>
<br>
<br>


 
<font size= 2><b>
<a href='selectCustTrans.php'>Click to add proof for another customer</a> or <input type = "submit" value = "Click to add proof for the same customer">
</font></b>

</form>



	<br><br>
Or edit the existing proofs:<br>


	<form name="Editcust" target="_blank"  action="editProof.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">
<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
<input type = "submit"  value="edit customer's proofs">


</form>		

<form name="QEPr" target="_blank"  action="edit_proofsCQ2.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
<input type = "text" name="CustNo" value="<?php echo $CustNo ?>">
<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
<input type = "submit"  value="Quickedit customer's proofs">


</form>	


	<form name="DPr" target="_blank"  action="delProof.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
<input type = "text" name="CustNo" value="<?php echo $CustNo ?>">
<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
<input type = "text" name="ProofNo" value="<?php echo $ProofNo ?>">
<input type = "submit"  value="Delete freshly created proof">


</form>	

	
	

	<br><br>

	
	

<br><br><br><br>

