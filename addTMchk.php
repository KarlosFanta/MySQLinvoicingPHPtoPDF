<html>
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>


function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
 // alert("Copied the text: " + copyText.value);
} 

</script>
<!-- jquery required for copyToClipbrd -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<?php
$TransNo = 0; 
$TransNo = $_POST['TransNo'];

include('header.php');	
require_once("inc_OnlineStoreDB.php");
?>

<input type="text" value="Tr<?php echo $TransNo; ?>" id="myInput" size =3>
<button onclick="myFunction()">Copy TransNo <?php echo $TransNo; ?> to clipboard memory</button><br>

<form name="Editcust" action="addTransMulti2.php" method="post">
<?php
$CustNo = ''; $CustNo = $_POST['CustNo']; 
$_SESSION['CustNo'] = $CustNo;

if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";
$Flag = ''; $Flag = @$_POST['Flag'];
if($Flag == 'Fast')
echo "Flag: <input type = 'text' name= 'Flag' name='Flag' value = 'Fast'>";
$CustSDR =''; $CustSDR = $_POST['CustSDR']; //echo "CustSDR: $CustSDR";

if (isset($_POST['updSDR'])) 
{
$query="update customer set CommonSDR = '$CustSDR' where CustNo = $CustNo";
mysqli_query($DBConnect, $query);
printf(" %s\n", mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) == -1)
 {echo "<FONT size = '5'><b>NOT successfull chk addInvCsessDchkval.php  :-(</b></FONT>";
echo " <a href = 'phpmyadmin/index.php?db=kc&table=customer&where_clause=%60expenses%60.%60InvNo%60+=+532&sql_query=SELECT+*+FROM+%60expenses%60&target=tbl_change.php&token=fa26c9c2a497c1b738f45aa45d71025b#PMAURL:db=kc&table=expenses&target=tbl_sql.php&token=fa26c9c2a497c1b738f45aa45d71025b' target = _blank>open PHPAdmin</a>";
 }else
 echo "success: $query"; echo ";";
}
else echo ""; //echo "updSDR not checked";
$PayNotes= ""; $PayNotes = $_POST['PayNotes'];
$AP = ''; $AP = $_POST['AP']; //echo "AP: " .$AP."</BR>";
//echo "name AP: <input type = 'text' name= 'AP' id='AP' value = '$AP'>";
echo "<input type = 'hidden' name= 'AP' id='AP' value = '$AP'>";
if($AP == 'AddAProof' or $AP == 'AddAProofSAMEDATE')
	echo "<br>proof provided check line ...<br><br>";
else
	echo "";	//echo "<br>no AP: no proof provided<br>";
$TransDate = ''; $TransDate = $_POST['TransDate'];

function validateDate($date, $format = 'd/m/Y')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}
if (validateDate($TransDate) == true)
	echo "date is ok";
else
		echo "<br><br><br><br><br><br><br><font size = 5>error! date is WRONG! </font><br><br><br>";



$queryTD = "select * from transaction where CustNo = $CustNo and TransDate = $TransDate";
//echo $queryTD;
$row_cnt = 0;
echo "yy";

if ($resultTD = mysqli_query($DBConnect, $queryTD)) {
	$row_cnt = mysqli_num_rows($resultTD);
	echo $row_cnt;
	if ($row_cnt > 0)
	{
//echo "<table width='10' border='1'>\n";
echo "<tr><th>transactions have already been done by the customer during this time:</th></tr>";
echo "<tr><th>TransNo</th>";
echo "<th>TransDate</th>";
echo "<th>AmtPaid</th>";
echo "<th>Notes</th>";
echo "</tr>\n";
 	}
while ($row = mysqli_fetch_assoc($resultTD)) {
echo "<tr>";
echo "<th>".$row["TransNo"]."</th>";
echo "<th>".$row["TransDate"]."</th>";
$AMTP = $row["AmtPaid"];
$first_char = mb_substr($AMTP, 0, 1);
if ($first_char == 'R')
	$AMTP = substr($AMTP, 1);

echo "<th>".$row["AmtPaid"]."</th>";
echo "<th>".$row["Notes"]."</th>";
echo "</tr>\n";
 
}
mysqli_free_result($resultTD);

}
//echo "</table>";
echo "yy";


$TotA = 0; $InvD = ''; $Sumr ='';  $AmtPaid = ''; $Notes ='';
$CustSDR =''; $TMethod = '';
$InvNoA = 0; $InvNoAincl = 0;
$InvNoB = 0; $InvNoBincl = 0;
$InvNoC = 0; $InvNoCincl = 0;
$InvNoD = 0; $InvNoDincl = 0;
$InvNoE = 0; $InvNoEincl = 0;
$InvNoF = 0; $InvNoFincl = 0;
$InvNoG = 0; $InvNoGincl = 0;
$InvNoH = 0; $InvNoHincl = 0; 
$ProofNo = ''; $CustFN ="_"; $CustLN ="_"; $CustEmail = "_";
//$TMethod = $_POST['TMethod'];
$InvNoA = $_POST['InvNoA']; $InvNoA = explode(",", $InvNoA); $InvNoA = $InvNoA[0];
$InvNoB = @$_POST['InvNoB']; $InvNoB = explode(",", $InvNoB); $InvNoB = $InvNoB[0];
$InvNoC = @$_POST['InvNoC']; $InvNoC = explode(",", $InvNoC); $InvNoC = $InvNoC[0];
$InvNoD = @$_POST['InvNoD']; $InvNoD = explode(",", $InvNoD); $InvNoD = $InvNoD[0];
$InvNoE = @$_POST['InvNoE']; $InvNoE = explode(",", $InvNoE); $InvNoE = $InvNoE[0];
$InvNoF = @$_POST['InvNoF']; $InvNoF = explode(",", $InvNoF); $InvNoF = $InvNoF[0];
$InvNoG = @$_POST['InvNoG']; $InvNoG = explode(",", $InvNoG); $InvNoG = $InvNoG[0];
$InvNoH = @$_POST['InvNoH']; $InvNoH = explode(",", $InvNoH); $InvNoH = $InvNoH[0];
$Priority = '.'; //$Priority = $_POST['Priority']; 

$CC = "SELECT * FROM customer WHERE CustNo = $CustNo";
if ($resultC = mysqli_query($DBConnect, $CC)) {
  while ($row = mysqli_fetch_assoc($resultC)) {
$CustFN = $row["CustFN"];
$CustLN = $row["CustLN"];
$CommonSDR = $row["CommonSDR"];  //will be compared
$CommonSDR = str_replace(" ","SPACE" , $CommonSDR);  

$CustEmail = $row["CustEmail"];
}
$resultC->free();
}
$CustEmail = str_replace(';', '; ', $CustEmail); $CustSDR = $_POST['CustSDR']; $CustSDR = str_replace(" ","SPACE" , $CustSDR);  

//now to check for the word cash in CustSDR
//if cash then the Payment Method will be changed to cash
$FoundCash= '';
if (strpos($CustSDR,'cash') !== false) {
echo '[cash found in SDR]';
$FoundCash= 'y';
}
else
{
	//echo '[no cash found in SDR]';
echo "";
}

//echo " comparing CustSDR $CustSDR with CommonSDR $CommonSDR ";
if ($CustSDR == $CommonSDR)
echo "<br><b><font color = orange size = 3>NB CUSTSDR IS SAME AS COMMONSDR</font></b>";

$AmtPaid = $_POST['AmtPaid'];

$first_char = mb_substr($AmtPaid, 0, 1);
if ($first_char == 'R')
	$AmtPaid = substr($AmtPaid, 1);


$charset = mysqli_character_set_name($DBConnect);
printf ("%s\n",$charset);
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.
$EEmail = $Notes;  
$Notes = htmlentities( $Notes, ENT_SUBSTITUTE );  //and also header: charset=UTF-8"   WORKS LIKE A CHARM 2014
echo "This form does a check.";
$von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é","\xA0");
$zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&nbsp;","&#233;","&nbsp;");
$Notes = str_replace($von, $zu, $Notes);  
$CustSDR = str_replace($von, $zu, $CustSDR);  
$CustSDR = str_replace('%20', ' ', $CustSDR);  
$Notes = mysqli_real_escape_string($DBConnect, $Notes); 
$CustSDR = mysqli_real_escape_string($DBConnect, $CustSDR); 
$PayNotes = mysqli_real_escape_string($DBConnect, $PayNotes); 
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
//echo "test cusstsdr: ". $CustSDR;
//echo "CSRspecial:".htmlspecialchars($CustSDR);
//echo "CSRhtmlentities:".htmlentities($CustSDR);

?>



<!--<input type = "hidden" name="mydropdownEC" value="<?php //echo $CustInt ?>">-->
<input type = "hidden" name="CustNo" id="CustNo" value="<?php echo $CustNo ?>">

			
			
		
<table>
<?php

echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate";
//echo date("d/m/Y");
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cust SDR&nbsp;&nbsp;</th>";

echo "<th>AmtPaid</th>";
echo "<th>Payment Method</th>";
echo "</tr>\n";
?>
		<tr>
			<!--<th><label>* Transaction AutoNumber: (!! Different for internet transactions!)</label>
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<th><input type="text" size="2"  id="TransNo"  name="TransNo" value="<?php echo $TransNo;?>" />
		</th>

		<?php //$DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
		//$NewFormat = date("d/m/Y");
		?>
		
		<th>	
			<input  id="TransDate" size="10" name="TransDate"  value="<?php echo $TransDate; ?>"  >
		</th>

		<th>

<?php
$bgcol = 'white';
$col = 'black';
if ($CustSDR == $CommonSDR)
{
$bgcol = 'orange';

}//echo "<b><font color = red >";


?>

<textarea = style="color: <?php echo $col; ?>; background-color: <?php echo $bgcol; ?>"
		<textarea id="CustSDR"  name="CustSDR"  ><?php echo $CustSDR; ?></textarea></font>
			
		</th>

		<th>
			<!--<label>&nbsp; AmtPaid:</label></dt>-->
			
			<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php //$AmtPaid = floatval($AmtPaid); 
			echo $AmtPaid; ?>" />
		</th>
	
	
		<th>
<?php
if ($FoundCash== 'y')
{
	$TMethod = 'Cash';
	//echo "FoundCash".$TMethod."hhhh";
}


$TMethod1 = '';
$TMethod2 = '';
$TMethod3 = '';
//$TMethod1 = $_POST['TMethod1'];
//$TMethod2 = $_POST['TMethod2'];
//$TMethod3 = $_POST['TMethod3'];
//$TMethod = $TMethod1.$TMethod2.$TMethod3;
//$name = $_POST['TMethod'];
//$name = $_GET['TMethod'];

// optional
// echo "You chose the following color(s): <br>";
/*
foreach ($name as $color){ 
    echo $color;
}
*/
$TMethodR = $_POST['TMethodR'];
echo "<br> CCCCCCCCCCCC: ".$TMethodR;

?>
			<select name="TMethod"  id="TMethod"  >
                <option value="<?php  echo $TMethodR; ?>"><?php      echo $TMethodR;
 ?></option><!-- the javascript function requires phrase Please Choose -->
				<!--VERY IMPORTANT THAT value must equal to please choose as well!!!-->

                <option value="EFT">EFT</option>
                <option value="Cash">Cash</option>
                <option value="Cash Bank Deposit">Cash Bank Desposit</option>
                <option value="Stop-order">Stop-order</option>
                <option value="Debit">Debit</option>
                <option value="Cheque">Cheque</option>	
                <option value="Mixed">Mixed</option>	
                <option value="-">-</option>	
</select>
			
		</th>
		</tr>
		</table>




	

<?php
$TS = '';
$ttttt = 0;
echo "";


echo "</b><table>";
echo "<tr><th align = 'left' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "</th></tr>";


if ($InvNoA != '')
{

$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoA";


if ($result = mysqli_query($DBConnect, $SQLINV)) {
 echo "<tr>";

 while ($row = mysqli_fetch_assoc($result)) {
//$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
$ttttt = $TotA;


}
$result->free();
}


echo "<th align = 'left'>InvNo: <input type='text' id='InvNoA' size = '6' name='InvNoA' value='$InvNoA' >";
echo "</th>";
echo "<th align = 'right'> R <input type='text' id='InvNoAincl' size = '8' name='InvNoAincl' value='$TotA' >";
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: <input type='text' id='Sumr' size = '18' name='Sumr' value='$Sumr' >";
echo "</th>";








echo "</tr>";
//echo "<br>InvvNoA=".$InvNoA."<br>";
//echo "<th align = 'left'>InvNo: <input type='text' id='InvNoA' size = '6' name='InvNoA' value='$InvNoA' >";

$TS = $Sumr;
//echo "<br>ts: ".$TS."<br>";
}


if ($InvNoB != '')
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
echo "<tr><th align = 'left' >InvNo: <input type='text' id='InvNoB' size = '6' name='InvNoB' value='$InvNumber' >";
echo "</th>";
echo "<th align = 'right'> R <input type='text' id='InvNoBincl' size = '8' name='InvNoBincl' value='$TotA' >";
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo " SubtotalB:$ttttt";

echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.'+'.$Sumr;
//echo "<br>ts: ".$TS."<br>";

}

if ($InvNoC != '')
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
echo "<tr><th align = 'left'>InvNo: <input type='text' id='InvNoC' name='InvNoC' value='$InvNumber' >";
echo "</th>";
echo "<th align = 'right'> R <input type='text' id='InvNoCincl' size = '8' name='InvNoCincl' value='$TotA' >";
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo " SubtotalC:$ttttt";
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.'+'.$Sumr;
//echo "<br>ts: ".$TS."<br>";

}



if ($InvNoD != '')
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

echo "<tr><th align = 'left'>InvNo: <input type='text' id='InvNoD' name='InvNoD' value='$InvNumber' >";
echo "</th>";
echo "<th align = 'right'> R <input type='text' id='InvNoDincl' size = '8' name='InvNoDincl' value='$TotA' >";
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo " SubtotalD:$ttttt";
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.'+'.$Sumr;
//echo "<br>ts: ".$TS."<br>";

}

if ($InvNoE != '')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoE";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNo: <input type='text' id='InvNoE' name='InvNoE' value='$InvNumber' >";
echo "</th>";
echo "<th align = 'right'> R <input type='text' id='InvNoEincl' size = '8' name='InvNoEincl' value='$TotA' >";
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo " SubtotalE:$ttttt";
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.'+'.$Sumr;
//echo "<br>ts: ".$TS."<br>";

}



if ($InvNoF != '')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoF";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNo: <input type='text' id='InvNoF' name='InvNoF' value='$InvNumber' >";
echo "</th>";
echo "<th align = 'right'> R <input type='text' id='InvNoFincl' size = '8' name='InvNoFincl' value='$TotA' >";
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo " SubtotalF:$ttttt";
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.'+'.$Sumr;
//echo "<br>ts: ".$TS."<br>";

}

if ($InvNoG != '')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoG";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNo: <input type='text' id='InvNoG' name='InvNoG' value='$InvNumber' >";
echo "</th>";
echo "<th align = 'right'> R <input type='text' id='InvNoGincl' size = '8' name='InvNoGincl' value='$TotA' >";
$ttttt = $ttttt+$TotA;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo " SubtotalG:$ttttt";
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.'+'.$Sumr;
//echo "<br>ts: ".$TS."<br>";

}

if ($InvNoH != '')
{
$SQLINV = "SELECT * FROM invoice WHERE InvNo = $InvNoH";
if ($result = mysqli_query($DBConnect, $SQLINV)) {
  while ($row = mysqli_fetch_assoc($result)) {
$InvNumber= $row["InvNo"];
$TotA = $row["TotAmt"];
$InvD= $row["InvDate"];
$Sumr = $row["Summary"];
$SD = $row["SDR"];
echo "<tr><th align = 'left'>InvNo: <input type='text' id='InvNoH' name='InvNoH' value='$InvNumber' >";
echo "</th>";
echo "<th align = 'right'> R <input type='text' id='InvNoHincl' size = '8' name='InvNoHincl' value='$TotA' >";
$ttttt = $ttttt+$TotA;
echo " SubtotalH:$ttttt";
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.'+'.$Sumr;

}
echo "</table>";

//echo "<br>final ts: ".$TS."<br>";

$AmtPaid2 = round($AmtPaid);
$ttttt2 = round($ttttt);


//$AmtPaid = floatval($AmtPaid);
//$ttttt = floatval($ttttt);
//settype($ttttt, "integer"); 
//settype($AmtPaid, "integer"); 
echo "AP encoding: ".mb_detect_encoding($AmtPaid)."<br>";
echo "tt encoding: ".mb_detect_encoding($ttttt)."<br>";


$dip =0;
$dip = $AmtPaid2-$ttttt2;

//echo " AmtPaid: $AmtPaid ";
echo "<font size = '3'>Total required: ".$ttttt."  compare to <br>Amount Paid: $AmtPaid</font><br>";
//$dip = $ttttt-$AmtPaid;
if ($dip != 0)
echo "<font size = '3'>missing is: R ".$dip."</font><br>";

//if ($ttttt != $AmtPaid)


if ($dip < 0)
{
   echo "<font size = '4'  color=red><br><b>Underpaid is: R ".$dip."</b></font><br>";
}
else
	if ($dip > 0)
	echo "<font size = '4' color=green><br><b>Overpaid is: R ".$dip."</B></font><br>";
else
echo "<font color = green>The total does equal to AmtPaid<br>";


if ($dip != 0)
echo "<b><font size = 3 color = red>NB The total does not equal to AmtPaid<br>";

echo "</font><b>Notes: <br></b>";


echo "<input type='text' id='Notes' size = '68' name='Notes' value='$TS' >";


echo "<br>InvNoA=".$InvNoA."<br>";



if($AP == 'AddAProof' or $AP == 'AddAProofSAMEDATE')

{
	echo "<b>You want to add a proof or payment with the transaction:</b><br>";
	
	
	$query = "SELECT MAX( CAST( SUBSTRING( ProofNo, 8 ) AS UNSIGNED ) ) AS num FROM aproof";
	//echo $query."<br>";
$result = mysqli_query($DBConnect, $query);// or die(mysql_error());
//SELECT MAX( (CAST(SUBSTRING( ProofNo FROM 8 )) AS INT ) AS MAXNUM FROM aproof2
while($rowQ = mysqli_fetch_array($result)){
	 $MxNum = $rowQ[0];
	 $MxNum = $MxNum + 1;
	 echo "<input type = 'text' name='ProofNo' value= 'ProofNo". $MxNum . "'>";
	
echo "<br>";

echo "<!--<th>-->ProofDate<br>Hover and wait";
echo "<!--</th>-->";
echo "<!--<th>-->&nbsp;&nbsp;&nbsp;&nbsp;CustSDR+Common TODO or Bank Ref<!--</th>-->";

$DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y"); 
$NewFormat = date("d/m/Y");
include 'yesterday.php';
$PPD = '';
if ( $AP == 'AddAProofSAMEDATE')
$PPD = $TransDate;


echo "<input type='text' id='lst'   name='ProofDate' value='$PPD' required><!--</th>--><!--<th>-->";
echo "<textarea size='19' name='ProofCustSDR' size = '20' required>";
// if ($Prof == 'ChequeToBeDeposited') 
//	 echo 'Received a Cheque'; 
 echo "</textarea><!--</th>--><!--<th>-->";
}
echo "<br>";
}
else
{
	$ProofNo = @$_POST['ProofNo']; //if proof is preselected
echo "<input type='hidden' name='ProofNo' value= '$ProofNo'>";
}




?>



<?php
if ($dip != 0)
echo "<input type='submit' value='OK, maybe reference it'  onsubmit='return formValidator()'   style='font-size:8px;width:138px;height:17px' /> ";
else
echo "<span class='blink_text'><b>>>></span> <input type='submit' value='Create transaction'  onsubmit='return formValidator()'   style='width:300px;height:30px' /> <span class='blink_text'><<<</span></b> ";

?>

<style type="text/css"> 
.blink_text { 

        -webkit-animation-name: blinker;
 -webkit-animation-duration: 1s;
 -webkit-animation-timing-function: linear;
 -webkit-animation-iteration-count: infinite;

 -moz-animation-name: blinker;
 -moz-animation-duration: 1s;
 -moz-animation-timing-function: linear;
 -moz-animation-iteration-count: infinite;
 animation-name: blinker;
 animation-duration: 1s;
 animation-timing-function: linear; 
    animation-iteration-count: infinite; color: red; 
} 

@-moz-keyframes blinker {
    0% { opacity: 1.0; }

    50% { opacity: 0.0; }

    100% { opacity: 1.0; } 
}

@-webkit-keyframes blinker {  
    0% { opacity: 1.0; }

    50% { opacity: 0.0; }

    100% { opacity: 1.0; } 
} 

@keyframes blinker {  
    0% { opacity: 1.0; } 

    50% { opacity: 0.0; }      

    100% { opacity: 1.0; } 
} 
</style> 
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>  
<!--<input type="button" value="Submit" onclick="formValidator()" />--> 

<!--<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:300px;height:30px" /> -->
<br>
General PaymentNotes for Customer: 
			<textarea id="PayNotes"  name="PayNotes"  ><?php echo $PayNotes; ?></textarea><br>



<br><br>
<font size = 4><b>Customer: <?php echo $CustFN." ".$CustLN; ?></a>
</font>
<br>
<?php
include "edit_trans_CustProcess.php";
mysqli_close($DBConnect);
?>





	<br><br>
	

	<br><br>

	</form>








