<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnLineStoreDB.php");
?>



<?php
$TBLrow = $_POST['mydropdownEC'];

//echo "TBLrow: " .$TBLrow."</BR>";
$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);
$CustNo = $CustInt;
$queryS = "select * from customer where CustNo = $CustInt";
//echo $queryS."<br>";
@session_start();
// store session data
$_SESSION['CustNo2nd']=$CustNo;

if ($result2 = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($result2)) {
 
$item1b = $row2["CustNo"];
$CustFN = $row2["CustFN"];
$CustLN =  $row2["CustLN"];
$CustEmail =  $row2["CustEmail"];

//print $item2b;
// echo "____".$CustInt;
/* print "_".$item1b;
print "_".$item3b;
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




	}
$result2->free();
	}

$Trans_No = 0;

$TransDate = '';
$AmtPaid = '';
$Notes ='';
$CustSDR ='';
$TMethod = '';
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





$Trans_No = $_POST['TransNo'];
//$CustNo = $_POST['CustNo'];










$D1 = $_POST['TransDate'];
$D2 = explode("/", $D1);
echo $D2[2]."____";

echo $D2[0]."____";
echo $D2[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];






$TransDateCV = $D2[2]."-".$D2[1]."-".$D2[0];

echo "convertedTransDate:".$TransDateCV."<br>";	 
//2012-12-21
$AmtPaid = $_POST['AmtPaid'];
$Notes = $_POST['Notes'];
$CustSDR = $_POST['CustSDR'];
$Notes = preg_replace("/'/","_",$Notes);
//$Notes = preg_replace("/ /","_",$Notes);
$Notes = preg_replace("/&nbsp;/","_",$Notes);
$Notes = str_replace(' ', '_', $Notes);
$CustSDR = preg_replace("/'/","_",$CustSDR);
$AmtPaid = preg_replace("/,/","",$AmtPaid);

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
$InvNoGincl = $_POST['InvNoGincl'];
$InvNoH = $_POST['InvNoH'];
$InvNoHincl = $_POST['InvNoHincl'];
$Priority = $_POST['Priority'];

echo " notes: ".$Notes ;
echo " <br>CustSSDR: ".$CustSDR ;
echo "<br>TransferMethod: ".$TMethod." <br>";
echo "<br>mydropdownEC: ".$TBLrow." <br>";



echo "Thank you for adding the transaction's details: ".$Trans_No." ".$CustNo ." ".$TransDate ."."  ;

$Trans_NoInt = intval($Trans_No);
if ($CustNo == 0)
{
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";
$CustNo = 13; //This is a test customer
echo "This also prevents the insert to be declared. causing a major FAIL!!";
}
else
{
$query="insert into transaction (TransNo, CustNo, TransDate, AmtPaid, Notes, CustSDR, TMethod,  
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
( $Trans_No,  $CustNo, '$TransDateCV', $AmtPaid, '$Notes', '$CustSDR', '$TMethod', 
'$InvNoA', $InvNoAincl ,
 '$InvNoB', $InvNoBincl ,
 '$InvNoC', $InvNoCincl ,
'$InvNoD',  $InvNoDincl ,
 '$InvNoE', $InvNoEincl ,
 '$InvNoF', $InvNoFincl ,
'$InvNoG',  $InvNoGincl ,
'$InvNoH',  $InvNoHincl ,
'$Priority') ";

}
/*(TransNo = $Trans_No, CustNo = $CustNo, TransDate ='$TransDate', AmtPaid = $AmtPaid, Notes = '$Notes', TMethod = '$TMethod', 
InvNoA = '$InvNoA', InvNoAincl = '$InvNoAincl' ,
InvNoB = '$InvNoB', InvNoBincl = '$InvNoBincl' ,
InvNoC = '$InvNoC', InvNoCincl = '$InvNoCincl' ,
InvNoD = '$InvNoD', InvNoDincl = '$InvNoDincl' ,
InvNoE = '$InvNoE', InvNoEincl = '$InvNoEincl' ,
InvNoF = '$InvNoF', InvNoFincl = '$InvNoFincl' ,
InvNoG = '$InvNoG', InvNoGincl = '$InvNoGincl' ,
InvNoH = '$InvNoH', InvNoHincl = '$InvNoHincl' ,
Priority = '$Priority') ";*/
//oracle: $query="update transaction set Transfn = '$CustNo', Transln ='$TransDate', Transtel = '$AmtPaid', Transcell= '$Notes', Transemail = '$TMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :Trans_NoInt";
echo '</br>';

mysqli_query($DBConnect, $query);
//echo mysqli_error(); //error mysqli_error() expects exactly 1 parameter, 
echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";
echo "<br>";
//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><font size = 5 color = red><b><b>insert or update NOT successfull!!!</b></b></font><br><br>";
else
echo "<font size = 4>insert success! </font><br>";


//echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";

//echo "<input type='text' id='CNN'  name='CNN' value=".$CustNo.">";

//include ("addTransCustProcess3.php");





//php to sql does not understand semicolon. remove the semicolon!!!
$TransInt = intval($Trans_NoInt);
$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransInt";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You inserted the transaction:

</br>
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
print "</b>TransNo: ".$item1;
print " CustNo: ".$item2;
print " ".$item3;
print " <b>R".$item4;
print "</b> ".$item5;
print " ".$item6;
print " ".$item7;
print " ".$item8;
print " ".$item9;
print " ".$item10;
}
$result->free();
}
	

echo "</b></font>";
$file = "FileWriting/bkp.php";
include("FileWriting/FileWriting.php");
//$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
//fwrite($open, "<br><br><b>Register:</b> " .$query . "<br/>"); 
//fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
//fclose($open); // you must ALWAYS close the opened file once you have finished.
//echo "<br /><br />Check log file: <a href = '.$file.'><br />";
	
//$file = "logaddtrans.php";
/*$open = fopen($file, "a+"); //open the file, (e.g.log.htm).
fwrite($open, "<br><br><b>Add transaction:</b> <br>" .$query. ";<br/><br/><br/>"); 
fwrite($open, "<b>Date & Time:</b>". date("d/m/Y"). "<br/>"); //print / write the date and time they viewed the log.
fclose($open); // you must ALWAYS close the opened file once you have finished.
echo "<br /><br /><a href = '$file.'><b>FILE WRITTEN </B>Check log file:</a> <br />";
	*/
?>


<form name="Editcust" action="edit_trans_CustProcessC2_2nd.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustInt ?>">

<input type = "hidden" name="TransDate" value="<?php echo $TransDate ?>">
<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">

<a href = "add_trans.php"> Click to add another transaction</a>	<br><br>
	
	<!--<input type = "submit" value = "Click to add another transaction">-->
	<br><br>

	
	
<br><br><br><br><a href='http://localhost/ACS/add_trans2.php'>LINK_OnLY_Click to add transaction for new cust</a><br><br>

<?php
echo $query;
$ttttt = 0;

echo "<br><br>";
echo "Details: <br>";

echo "</b><table>";
echo "<tr><th align = 'left' >if table empty show this line.";
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
echo "<th align = 'left'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> ".$InvD;
echo "</th>";
echo "<th align = 'left'> Sumr: ".$Sumr;
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
echo "<th align = 'left'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> ".$InvD;
echo "</th>";
echo "<th align = 'left'> Sumr: ".$Sumr;
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
echo "<tr><th >InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'left'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> ".$InvD;
echo "</th>";
echo "<th align = 'left'> Sumr: ".$Sumr;
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
echo "<tr><th >InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'left'> R ".$TotA;
echo "</th>";
echo "<th align = 'left'> ".$InvD;
echo "</th>";
echo "<th align = 'left'> Sumr: ".$Sumr;
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
echo "<tr><th >InvNo: ".$InvNumber;
echo "</th>";
echo "<th align = 'left'> R ".$TotA;
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> ".$InvD;
echo "</th>";
echo "<th align = 'left'> Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}

}


echo "</table>";
echo "Total: ".$ttttt."<br>";


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

$body = "Thank you for payment of ".$Notes. " Invoice No ".@$InvNoA." ".$b5k.".".$nL.$nL.$TMethod." Receipt ".$nL;
$b1 =  "Date: ".$D1;
$b2 = "Transaction Number: ". $Trans_No;
$b3 = "Paid by: ". $CustLN.", ".$CustFN;
$b4 = "Amount: R". $AmtPaid;


$b5b = "Customer statement: ".$CustSDR;
$b6 = "Received by: Karl ";
$b7 = "Payment method: ". $TMethod;
$b8 = "Thank you";
$b9 = "Karl";
//$ba = "PC and Notebook Sales & Advanced I.T. Support";
$ba = "PC and Notebook Sales and Advanced I.T. Support";
$bb = "Karl's Fast Internet and Webhosting Solutions";
$bc = "www.kconnect.co.za";
$bd = "Email: cyberkarl3@gmail.com";

$be = "Fax: 0865492415(faxes only)";
$bf = "Skype: cyberkarl3";
$bg = "Sales terms: www.k-connect.co.za/terms";
$bh = "Internet and Email Support: www.karl.co.za/support";


$nL = "%0D%0A"; //new line
echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php echo $TMethod ?> Receipt&body=
<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$bd.$nL.$bf.$nL.$nL.$bg.$nL.$nL.$bh ?>">
Click to EMail Receipt to customer</a><br>
<br></font>
<br>
<br>











<a href = "edit_trans_CustProcessC_2ndsession.php">edit_trans_CustProcessC_2ndsession</a>



<?php
































include "edit_trans_CustProcessC_2ndsession.php";
?>








