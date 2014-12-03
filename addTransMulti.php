<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add a transaction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
?>


<?php
$TotA = 0;
$InvD = '';
$Sumr ='';
$TransNo = 0;
$CustNo = '';
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
$ProofNo = '_';

$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";


$TMethod = $_POST['TMethod'];

$InvNoA = $_POST['InvNoA'];
$InvNoA = explode(",", $InvNoA);
$InvNoA = $InvNoA[0];

$InvNoB = $_POST['InvNoB'];
$InvNoB = explode(",", $InvNoB);
$InvNoB = $InvNoB[0];


$InvNoC = $_POST['InvNoC'];
$InvNoC = explode(",", $InvNoC);
$InvNoC = $InvNoC[0];

$InvNoD = $_POST['InvNoD'];
$InvNoD = explode(",", $InvNoD);
$InvNoD = $InvNoD[0];


$InvNoE = $_POST['InvNoE'];
$InvNoE = explode(",", $InvNoE);
$InvNoE = $InvNoE[0];


$InvNoF = $_POST['InvNoF'];
$InvNoF = explode(",", $InvNoF);
$InvNoF = $InvNoF[0];

$InvNoG = $_POST['InvNoG'];
$InvNoG = explode(",", $InvNoG);
$InvNoG = $InvNoG[0];

$InvNoH = $_POST['InvNoH'];
$InvNoH = explode(",", $InvNoH);
$InvNoH = $InvNoH[0];

//$Priority = $_POST['Priority'];
$Priority = '.';




$TransNo = $_POST['TransNo'];
$CustNo = $_POST['CustNo'];
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
$TransDate = $_POST['TransDate'];
//$D1 = $_POST['TransDate'];
//$D2 = explode("/", $D1);
//$TransDate = $D2[2]."-".$D2[1]."-".$D2[0];
$CustSDR = $_POST['CustSDR'];
$AmtPaid = $_POST['AmtPaid'];
$charset = mysqli_character_set_name($DBConnect);
printf ("%s\n",$charset);
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.
$EEmail = $Notes;  
$Notes = htmlentities( $Notes, ENT_SUBSTITUTE );  //and also header: charset=UTF-8"   WORKS LIKE A CHARM 2014

$von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é","\xA0");
$zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&nbsp;","&#233;","&nbsp;");
$Notes = str_replace($von, $zu, $Notes);  
$CustSDR = str_replace($von, $zu, $CustSDR);  
$CustSDR = str_replace('%20', ' ', $CustSDR);  
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
echo "test cusstsdr: ". $CustSDR;

?>

<form name="Editcust" action="addTransMulti2.php" method="post">

<!--<input type = "hidden" name="mydropdownEC" value="<?php //echo $CustInt ?>">-->
<input type = "hidden" name="CustNo" id="CustNo" value="<?php echo $CustNo ?>">


<table>
<?

echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate";
//echo date("d/m/Y");
echo "</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CustSDR&nbsp;&nbsp;</th>";
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
			<textarea id="CustSDR"  name="CustSDR"  ><?php echo $CustSDR; ?></textarea>
			
			
		</th>

		<th>
			<!--<label>&nbsp; AmtPaid:</label></dt>-->
			<!--<input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" />-->
			<input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="<?php echo $AmtPaid; ?>" />
		</th>
	
	
		<th>
			<select name="TMethod"  id="TMethod"  >
                <option value="<?php echo $TMethod ?>"><?php echo $TMethod ?></option><!-- the javascript function requires phrase Please Choose -->
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
echo "<br><br>";
echo "Details: <br>";

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
$ttttt = $ttttt+$TotA;


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
echo "<br>InvvNoA=".$InvNoA."<br>";
echo "<th align = 'left'>InvNo: <input type='text' id='InvNoA' size = '6' name='InvNoA' value='$InvNoA' >";

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
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.$Sumr;
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
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.$Sumr;
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
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.$Sumr;
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
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.$Sumr;
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
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.$Sumr;
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
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.$Sumr;
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
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;".$InvD;
echo "</th>";
echo "<th align = 'left'> &nbsp;&nbsp;Sumr: ".$Sumr;
echo "</th>";
echo "</tr>";
}
$result->free();
}
$TS = $TS.$Sumr;

}
echo "</table>";

//echo "<br>final ts: ".$TS."<br>";
echo "Total: ".$ttttt."  COMPARE TO: $AmtPaid<br>";

if ($ttttt != $AmtPaid)
echo "<b><font color = red>NB The total does not equal to AmtPaid";
else
echo "<font color = green>NB The total does equal to AmtPaid";

echo "</font><b>Notes: <br></b>";


echo "<input type='text' id='Notes' size = '68' name='Notes' value='$TS' >";


echo "<br>InvNoA=".$InvNoA."<br>";

?>
<input type='submit' value="Create transaction"   style="width:300px;height:30px" /> 
<!--onclick="return confirm('Is the Invoice number AND Date correct? Did you copy the total amount from AJAX to the invoice total?')"/>  
<!--<input type="button" value="Submit" onclick="formValidator()" />--> 

<input type="submit" value="Submit/Save"  onsubmit='return formValidator()'  style="width:300px;height:30px" /> 




<br><br>
<font size = 4><b>customer <?php echo $CustFN." ".$CustLN; ?></a><br>
<br></font>
<br>
<br>






	<br><br>
	

	<br><br>

	</form>








