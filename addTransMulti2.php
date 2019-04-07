<html>
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>
<!-- jquery required for copyToClipbrd -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
$subjj2= '';
$subjj='';
$AP = '';
$AP = $_POST['AP'];
$Flag = '';
$Flag = @$_POST['Flag'];


$CustNo = $_POST['CustNo'];
if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";
echo "<font size = 1>CustNo: ".$CustNo;

$PayNotes= "";
$PayNotes = $_POST['PayNotes'];
$PayNotes = mysqli_real_escape_string($DBConnect, $PayNotes); 
$TransNo = 0;
$TransNo = $_POST['TransNo'];

$Priority = '.';
$TransDate = '';
$AmtPaid = '';
$AmtPaid = $_POST['AmtPaid'];
$Notes ='';
$Notes = $_POST['Notes'];
$CustSDR ='';
$TMethod = '';
$TMethod = $_POST['TMethod'];
$ProofCustSDR = '';
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
$InvNoA = @$_POST['InvNoA'];
if ($InvNoA == '')
echo " <b>Please note: no invoice found in the transaction:  Transaction unidentified.</b><br>";

$InvNoAincl = @$_POST['InvNoAincl'];
$InvNoB = @$_POST['InvNoB'];
$InvNoBincl = @$_POST['InvNoBincl'];
$InvNoC = @$_POST['InvNoC'];
$InvNoCincl = @$_POST['InvNoCincl'];
$InvNoD = @$_POST['InvNoD'];
$InvNoDincl = @$_POST['InvNoDincl'];
$InvNoE = @$_POST['InvNoE'];
$InvNoEincl = @$_POST['InvNoEincl'];
$InvNoF = @$_POST['InvNoF'];
$InvNoFincl = @$_POST['InvNoFincl'];
$InvNoG = @$_POST['InvNoG'];
$InvNoGincl = @$_POST['InvNoGincl'];
$InvNoH = @$_POST['InvNoH'];
$InvNoHincl = @$_POST['InvNoHincl'];
//$Priority = $_POST['Priority'];
$Priority = '.';
$ProofNo = '';
$ProofNo = @$_POST['ProofNo']; //sometimes a proof number is preselected.

if($AP == 'AddAProof' or $AP == 'AddAProofSAMEDATE')
{
	$subjj = ' and Proof';
	$subjj2 = ' and Proof ';
	$ProofDate = $_POST['ProofDate'];

$D2 = explode("/", $ProofDate);
//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$ProofDateSQL = $D2[2]."-".$D2[1]."-".$D2[0];
$charset = mysqli_character_set_name($DBConnect);//chek for UTF-8
$ProofCustSDR = $_POST['ProofCustSDR'];
$ProofCustSDR = mysqli_real_escape_string($DBConnect, $ProofCustSDR); 
//mb_convert_encoding($ProofCustSDR, "ISO-8859-1");
echo "$ProofCustSDR &nbsp;&nbsp;&nbsp;";
//echo "CSR:special".htmlspecialchars($ProofCustSDR);
//$ProofCustSDR = str_replace("\xC2","SPACE",$ProofCustSDR);
//$ProofCustSDR = str_replace(" ","SPACE",$ProofCustSDR);
//$ProofCustSDR = str_replace("&nbsp;","SPACE",$ProofCustSDR);
$ProofCustSDR = str_replace("\xC2","_",$ProofCustSDR);
$ProofCustSDR = str_replace(" ","_",$ProofCustSDR);
$ProofCustSDR = str_replace("&nbsp;","_",$ProofCustSDR);
echo "".htmlentities($ProofCustSDR);

	
	echo "<br><br>proof provided same time as transaction:<br>";
	//echo "insert new proof<br>";
	$query="insert into aproof (ProofNo, CustNo, ProofDate, Amt, Notes, CustSDR, PMethod,  
InvNoA, InvNoAincl, InvNoB, InvNoBincl , InvNoC, InvNoCincl ,
InvNoD, InvNoDincl , InvNoE, InvNoEincl , InvNoF, InvNoFincl,
InvNoG , InvNoGincl , InvNoH , InvNoHincl, Priority, TransNo )
VALUES
( '$ProofNo',  $CustNo, '$ProofDateSQL', $AmtPaid, '$Notes', '$ProofCustSDR', '$TMethod', 
'$InvNoA', '$InvNoAincl' ,  '$InvNoB', '$InvNoBincl' ,  '$InvNoC', '$InvNoCincl' ,
'$InvNoD',  '$InvNoDincl' ,  '$InvNoE', '$InvNoEincl' ,  '$InvNoF', '$InvNoFincl' ,
'$InvNoG',  '$InvNoGincl' , '$InvNoH',  '$InvNoHincl' , '$Priority', '$TransNo') ";


//echo '</br>';


mysqli_query($DBConnect, $query);

 echo "<font size = 4 color = red>".mysqli_error($DBConnect)."</font>";






















//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<br><font size = 5  color = red><b>insert into aproof NOT successfull!!!</b>!!</b></font><br>NB if duplicate error then ProofNos are missing: $ProofNo<br><textarea>$query</textarea><br>";
else
echo "<font size = 4>insert success! </font>";















//php to sql does not understand semicolon. remove the semicolon!!!


$SQLString = "SELECT * FROM aproof WHERE ProofNo = $ProofNo";
//$SQLString = "SELECT * FROM aproof WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">You Added the proof:</b> </font>


<?php
echo " <input type='text' name='ProofNo' value= '$ProofNo'>";

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
	

	
	
}
else
{
	echo " &nbsp;&nbsp;&nbsp;no AP: no proof provided except if preselected&nbsp;&nbsp;&nbsp;";
}


$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";









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

$TransDate = $_POST['TransDate'];
$D2 = explode("/", $TransDate);

if ($D2[1] == '01')
	$MMON = 'Jan';
if ($D2[1] == '02')
	$MMON = 'Feb';
if ($D2[1] == '03')
	$MMON = 'Mar';
if ($D2[1] == '04')
	$MMON = 'Apr';
if ($D2[1] == '05')
	$MMON = 'May';
if ($D2[1] == '06')
	$MMON = 'Jun';
if ($D2[1] == '07')
	$MMON = 'Jul';
if ($D2[1] == '08')
	$MMON = 'Aug';
if ($D2[1] == '09')
	$MMON = 'Sep';
if ($D2[1] == '10')
	$MMON = 'Oct';
if ($D2[1] == '11')
	$MMON = 'Nov';
if ($D2[1] == '12')
	$MMON = 'Dec';


$TransDateAPLHA = $D2[0]."-".$MMON."-".$D2[2];
echo " TransDateAPLHA: ".$TransDateAPLHA." " ;



//echo $D1[2]."____";

//echo $D1[0]."____";
//echo $D1[1]."____";
//$D2 = $_POST['Date1'];

//$D3 = $_POST['Date1'];

$TransDateDB = $D2[2]."-".$D2[1]."-".$D2[0];
$tmp = $D2[0];
$tmp = $tmp++;
//$TransDateNext = $tmp."/".$D2[1]."/".$D2[2];
echo " TD: ".$TransDateDB." " ;
$TransDateNext = date('Y-m-d', strtotime($TransDateDB . ' +1 day'));
//echo "<br>TD: ".$TransDateNext."<br>" ;
$TTTD2 = explode("-", $TransDateNext);
$TransDateNext = $TTTD2[2]."/".$TTTD2[1]."/".$TTTD2[0];
//echo "<br>TD: ".$TransDateNext."<br>" ;

//echo $TransDateDB;	 
//$charset = mysqli_character_set_name($DBConnect);//chek for UTF-8

$CustSDR = $_POST['CustSDR'];
echo "the character coding for CustSDR: >"; //sometimes I copy directly from Online Banking HTML
echo mb_detect_encoding($CustSDR). "< ";
//if copied from HTML then convert to UTF8
$CustSDR = iconv('ASCII', 'UTF-8//IGNORE', $CustSDR);
$CustSDR = str_replace(" ","SPACE",$CustSDR);

$CustSDRinsert = str_replace("SPACE"," ",$CustSDR);
$CustSDR = mysqli_real_escape_string($DBConnect, $CustSDR); 
//$CustSDR = mb_substr($CustSDR,0,10,'utf-8');
/*mb_convert_encoding($CustSDR, "ISO-8859-1");
echo "the character coding for CustSDR: ";
echo mb_detect_encoding($CustSDR). " ";

echo "CSR: $CustSDR";
*/
/*echo "CSRspecial:".htmlspecialchars($CustSDR);
echo "CSRhtmlentities:".htmlentities($CustSDR);
$CustSDR = str_replace("\xC2","SPACE",$CustSDR);
$CustSDR = str_replace(" ","SPACE",$CustSDR);
$CustSDR = str_replace("&nbsp;","SPACE",$CustSDR);
*///http://archive.oreilly.com/pub/post/turning_mysql_data_in_latin1_t.html
//ALOT HAPPEND IN addTMchk.php

//echo "CSRspecial:".htmlspecialchars($CustSDR);
//echo "CSRhtmlentities:".htmlentities($CustSDR); //why does this show blank this time

//$CustSDR = ereg_replace("[^A-Za-z0-9\w\ &nbsp;]", "", $CustSDR); //Function ereg_replace() is deprecated  preg_replace() is alternative
//echo "SPCYCSR: $CustSDR";

//$CustSDR = preg_replace("/[\s_]/", "-", $CustSDR);

//mb_convert_encoding($CustSDR, "UTF-8");
if ($Flag == 'Fast')
$CustSDR = str_replace("SPACE"," ",$CustSDR); //for RAMCOPY to work
else
{
$CustSDR = str_replace("SPACE","%20",$CustSDR); //for mailto to 
$CustSDR = str_replace("&","and",$CustSDR); //for mailto to 
//echo " back to whitepace: $CustSDR";
}



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




//echo "<font size = 5>TransNo: ".$TransNo." M/font>CustNo: ".$CustNo ." D1: ".$D1 ."."  ;

$Trans_NoInt = intval($TransNo);



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
InvNoA, InvNoAincl, InvNoB, InvNoBincl , InvNoC, InvNoCincl ,
InvNoD, InvNoDincl , InvNoE, InvNoEincl , InvNoF, InvNoFincl,
InvNoG , InvNoGincl , InvNoH , InvNoHincl, Priority )
VALUES
( $TransNo,  $CustNo, '$TransDateDB', $AmtPaid, '$Notes', '$CustSDRinsert', '$TMethod', 
'$InvNoA', '$InvNoAincl' ,  '$InvNoB', '$InvNoBincl' ,  '$InvNoC', '$InvNoCincl' ,
'$InvNoD',  '$InvNoDincl' ,  '$InvNoE', '$InvNoEincl' ,  '$InvNoF', '$InvNoFincl' ,
'$InvNoG',  '$InvNoGincl' , '$InvNoH',  '$InvNoHincl' , '$Priority') ";


//echo '</br>';


mysqli_query($DBConnect, $query);





















 echo "<br><font size = 4 color = red>".mysqli_error($DBConnect)."<br></font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 5  color = red><b><b>insert into transaction NOT successful!!!</b>!!</b></font><br>$query<br>";
else
echo "<font size = '2' type='arial'><b>You added the transaction: <b>TransNo <input type='text' value = '$TransNo'  size='4'></b></font>
 </font>&nbsp;&nbsp;&nbsp;";















//php to sql does not understand semicolon. remove the semicolon!!!
$TransInt = intval($Trans_NoInt);
$SQLString = "SELECT * FROM transaction WHERE TransNo = $TransInt";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["TransDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
$InvNoAm = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];
//print "_".$item10;
}
mysqli_free_result($result);
}

?>
<p id="p1"><?php echo $TransInt; ?></p>

<button onclick="copyToClipboard('#p1')"  style="height:20px;width:1200px">Copy TransNo to clipboard memory</button><br>

<?php

//print "  $item1";
print " CustNo:".$item2;
print "  ".$item3;//TransDate
print " R".$item4;
//print " Notes:".$item5;
print " CustSDR:<b>".$item6;
//print "".$item7;
print " <font size = 3> InvNoA: ".$InvNoAm;
print "</font></b> InvNoAincl: ".$item9;
	
?>
</font><br><font size = 1>The transaction before was:
<?php
$TransIntprev = intval($Trans_NoInt)-1;
$SQLStringPrevv = "SELECT * FROM transaction WHERE TransNo = $TransIntprev";
//$SQLStringPrevv = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>


</br>
<?php
if ($resultPrevv = mysqli_query($DBConnect, $SQLStringPrevv)) {
  while ($rowPrevv = mysqli_fetch_assoc($resultPrevv)) {
$Prevvitem1 = $rowPrevv["TransNo"];
$Prevvitem2 =  $rowPrevv["CustNo"];
$PrevvCustInt =  $rowPrevv["CustNo"];
$Prevvitem3 = $rowPrevv["TransDate"];
$Prevvitem4 = $rowPrevv["AmtPaid"];
$Prevvitem5 = $rowPrevv["Notes"];
$Prevvitem6 = $rowPrevv["CustSDR"];
$Prevvitem7 = $rowPrevv["TMethod"];
$PrevvInvNoAm = $rowPrevv["InvNoA"];
$Prevvitem9 = $rowPrevv["InvNoAincl"];
$Prevvitem10 = $rowPrevv["Priority"];
print "<b>previous TransNo $Prevvitem1</b></font>";
print "_".$Prevvitem2;
print "_".$Prevvitem3;
print "_R".$Prevvitem4;
print "_".$Prevvitem5;
print "_".$Prevvitem6;
print "_".$Prevvitem7;
print "  invNoA: ".$PrevvInvNoAm;
print "</font>_".$Prevvitem9;
print "_".$Prevvitem10;
}
mysqli_free_result($resultPrevv);
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



<form name="Editcust" action="addTrans.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $CustInt ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">
<input type = "hidden" name="TransDate" value="<?php echo $TransDateDB ?>">
<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">
<input type = "hidden" name="PayNotes" value="<?php echo $PayNotes ?>">

	
	<!--<input type = "submit" value = "Click to add another transaction">-->
</form>


	

<?php
echo "<font size = 1>".$query;

$ttttt = 0;


echo "<br>	</font>";
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
mysqli_free_result($result);
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
mysqli_free_result($result);
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
mysqli_free_result($result);
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
mysqli_free_result($result);
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
mysqli_free_result($result);
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
mysqli_free_result($result);
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
mysqli_free_result($result);
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
mysqli_free_result($result);
}

}


echo "</table>";
echo "Total: ".$ttttt."<br>";










$sptp = 'w';
//echo sptp;

































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
if ($Notes == ".")
	{$NN = "";}
if ($Flag == 'Fast')
{
	$nL = '&#x00A;';
	echo "Flag is Fast";
}
	else 
	{
	$nL = '%0D%0A';
	echo "Flag is not Fast";
	
	}

$body = "Thank you for payment ".$subjj2."of ".$NN." Invoice".$plural." No ".@$InvNoA." ".$b5k.".".$nL.$nL.$TMethod." Receipt (This email is the receipt, there is no attachment in this email)".$nL;
$b1 =  "Date: ".$TransDateAPLHA;
$b2 = "Transaction Number: ". $TransNo;

//preg_replace( "/\r|\n/", "", $CustFN ); // removes new lines from textareas for javascript mailto to work
//preg_replace( "/\r|\n/", "", $CustLN );
$CustFN = str_replace(array("\r", "\n"), '', $CustFN);
$CustLN = str_replace(array("\r", "\n"), '', $CustLN);
$b3 = "Paid by: ". $CustLN.", ".$CustFN;
$b4 = "Amount: R". $AmtPaid;


$b5b = "Customer reference: ".$CustSDR;
$b6 = "Received by: Karl Lompa ";
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



if (@$ProofToPay == '_')
$b77 = "Related Proof Of Payment: ". $ProofToPay . " &nbsp;&nbsp;[ ".$ProofInvA . " &nbsp;&nbsp; ".$ProofDate . " &nbsp;&nbsp; ".$ProofAmt. " &nbsp;&nbsp; ".$ProofNotes . " &nbsp;&nbsp; ".$ProofMethod . " &nbsp;&nbsp; ".$ProofCustSDR. " ]";
else
$b77 = "";

if ($ProofCustSDR != '')
$b77 = $b77.' ProofRef: '.$ProofCustSDR. ' ProofDate: '.$ProofDate;

$b8 = "Thank you";
$b9 = "Karl Lompa";
$ba = "PC and Notebook Sales and Advanced I.T. Support";
$bb = "Karl Lompa's Fast Internet and Webhosting Solutions";
$bc = "www.kconnect.co.za";

//$be = "Fax: 0865492415";
//$bf = "Skype: cyberkarl3";
$bg = "Sales terms: www.k-connect.co.za/terms";
$bh = "Internet and Email Support: www.karl.co.za/support";
echo "<br><br>";
?><font size = 4><b>
<a href="mailto:<?php echo $CustEmail ?>?subject=<?php echo $TMethod ?> Receipt &body=
<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL.$b8.$nL.$b9.$nL.$nL.$ba.$nL.$bb.$nL.$bc.$nL.$nL.$nL.$bg.$nL.$nL.$bh ?>">
Click to EMail Receipt to customer <?php echo $CustFN." ".$CustLN; ?></a><br>
<br><!--RESTART THUNDERBIRD or OUTLOOK if email is incomplete--></font>

 
<font size= 2><b>
<a href='selectCustTrans.php'>Click to add transaction for another customer</a><br>
<a href='selectCustTrans.php?DA=<?php echo $TransDate; ?>'>Click to add transaction for another customer but SAME DATE</a>
<br>
<a href='selectCustTrans.php?DA=<?php echo $TransDateNext; ?>'>Click to add transaction for another customer but NEXT DATE</a>
<br> or 
<form name="same" action="addTrans.php" method="post">
<input type = "submit" value = "Click to add transaction for the same customer">
<input type = "hidden" name="mydropdownEC" value="<?php echo $CustNo ?>">
</form>
</font></b>








	<a href='edit_trans_CustProcessC2.php'>edit_trans_CustProcessC2.php</a><br>
<form name="EditTrans" action="edit_trans_CustProcessC2.php" method="post">

<input type = "hidden" name="mydropdownEC" value="<?php echo $TransNo ?>">
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">
<input type = "hidden" name="TransDate" value="<?php echo $TransDateDB ?>">
<input type = "hidden" name="AmtPaid" value="<?php echo $AmtPaid ?>">
<input type = "hidden" name="PayNotes" value="<?php echo $PayNotes ?>">

	
	<input type = "submit" value = "Click to edit this transaction">
</form>






	<br><br>

	</b>
	
<?php 

//$TMethod= "TyyESTT"; 
echo $TMethod; 
$RRR  = '';
$RRR  = $Notes;  // this is for putting month details into EFT receipt.


?>

<script src="jquery.js"></script>
<script src="dist/jquery.zeroclipboard.min.js"></script>
<script>
  jQuery(document).ready(function($) {
    $("body")
      .on("copy", ".zclip", function(/* ClipboardEvent */ e) {
        e.clipboardData.clearData();
        e.clipboardData.setData("text/plain", $(this).data("zclip-text"));
        e.preventDefault();
      });
  });
</script>
<!-- &#x00A; is a line break. here we can only copy the body over: -->
<button class="zclip" style="height:200px;width:200px" data-zclip-text="<?php echo  $TMethod.' Receipt&#x00A;&#x00A;'.$subjj.'&#x00A;'.$body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL  ;?>">Wait a few seconds, then <br>Click to INTO EMAIL!</button>
<script type="text/javascript">
function myFunction()
{

location.href = "mailto:<?php echo $CustEmail ?>?subject=<?php echo $TMethod; ?> Receipt<?php echo $subjj.' '.$RRR; ?> &body=<?php echo $body.$nL.$b1.$nL.$b2.$nL.$b3.$nL.$b4.$nL.$b5.$b5k.$nL.$b5b.$nL.$b6.$nL.$b7.$b7g.$nL.$nL.$b77.$nL.$nL; ?>";

//if mailto is not loading is because of $b3 if it contains new lines in Name textarea 
}
</script>


<?php
if ($Flag != 'Fast')
echo "<body onload='javascript:myFunction()'>Running mailto javascript";
else
	echo "not running  mailto javascript";
include "view_inv_by_custADV3.php"; //gives only totals

$indesc = 0;
$ShowDraft = "N";
include "view_Underpaid_inv_by_cust2b.php"; //2b is the one with checkboxes
include "view_Unpaid_inv_by_cust2.php"; //2b is the one with checkboxes

echo "<br><br>";



$queryTR="update customer set PayNotes = '$PayNotes' 
where CustNo = $CustNo";

mysqli_query($DBConnect, $queryTR);
echo $queryTR;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '2' color = 'red'><br><b>NOT successful</b></FONT>";
echo " <a href = 'http://localhost/phpMyAdmin/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=invoice&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4 color = green>whoopee update customer's PayNotes SUCCESS!!! :-)</font>";

echo ";<br>";

echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";








$queryAP="update aproof set TransNo= '$TransInt' 
where ProofNo = $ProofNo";

mysqli_query($DBConnect, $queryAP);
echo $queryAP;

//mysqli_query($DBConnect, $isql);
printf(";<br><br>Affected rows isql(UPDATE): %d\n", mysqli_affected_rows($DBConnect));
printf("Check first update: %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '2' color = 'red'><br><b>NOT successful  , maybe no proof submitted</b></FONT>";
echo " <a href = 'http://localhost/phpMyAdmin/index.php?db=kc&table=invoice&where_clause=%60invoice%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60invoice%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=invoice&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
 }else
 echo "<font size = 4 color = green>whoppeee update aproof's TransNo SUCCESS!!! :-)</font>";


echo ";<br>";
echo "<br><br>";

$file = 'Explastdate.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current = "$TransDate";


// Write the contents back to the file
file_put_contents($file, $current); //identical to calling fopen(), fwrite() and fclose()



include "invEmailstatement.php";
echo "<br><br>";


$indesc = 0;
$ShowDraft = "Y";
include "view_Unpaid_inv_by_cust2.php";
echo "<br><br>";



 echo "<br>";
echo "<a href = 'view_inv_PAIDinvoicesBOTH.php'>Click here to view only PAID invoices </a>";
echo "<br><br>";
echo "<a href = 'view_inv_by_cust.php'>Click here to view customer's invoices </a>";
echo "<br><br>";
echo "<a href = 'view_inv_by_cust2.php'>Click here to view customer's invoices </a>";
echo "<br><br>";

$indesc = 'd1';

?>
<a href = "edit_trans_CustProcess.php" target=_blank>edit_trans_CustProcess.php</a>









