<?php
require_once("inc_OnlineStoreDB.php");
	
$pr = "20";
$pr = @$_POST['pr']; //inv descriptions
//echo "indesc:".$indesc;
if (@$indesc == '')
  $indesc = 8;
  
//  echo "indesc:".$indesc;
$yo = 0;
$loop = 0;
$in = 8;


if (@$_POST['in'] != "")
$in = @$_POST['in'];
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];
$DisplayInvPdStatus = @$_POST['DisplayInvPdStatus'];

echo "<BR />";
$un = 'N';
echo "<b>Transactions that are overpaid or underpaid</b>";


?>

<?php 	//		echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
		//	echo " ";
		//	echo $row['CustLN'];
?>
			</b></font> &nbsp; &nbsp;  <font color=#F5F5DC>view_trans_by_custUNDERorOVERPAID.php   order by transdate desc</font>
			<a href = "edit_transCQ.php">edit_transCQ.php</a>
			<a href = "../phpMyAdmin-3.5.2-english/index.php?db=kc&table=transaction">../phpMyAdmin-3.5.2-english/index.php?db=kc&table=transaction</a>

dzhg
<!--
OK
SO NOW TO COMPARE THE AmtPaid OF Transaction with the amounts of the induvidual invoices added togehter.

SO one select query adds up all the little invoice amounts:
select TotAmt from invoice where InvNoA = $InvNoA
select TotAmt from invoice where InvNoB = $InvNoB
select TotAmt from invoice where InvNoC = $InvNoC
select TotAmt from invoice where InvNoD = $InvNoD
			
			-->
			
<?php
$InvNoAincl = 0;
$InvNoBincl = 0;
$InvNoCincl = 0;
$InvNoDincl = 0;
$InvNoEincl = 0;
$InvNoFincl = 0;
$InvNoGincl = 0;
$InvNoHincl = 0;
$InvALLAmt  = 0;
$SQLstring = "select * from transaction where CustNo = '$CustInt' order by transdate desc";
echo "<br>fnbnvhnvbn";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$summm = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";

echo "<tr><th>TransNo</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paid&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>TransRecvd</th>";
echo "<th>AmtPaid</th>";
echo "<th length= '120'>Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>CustSDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
//echo "<th>InvNoA</th>";
if (@$in >0)
echo "<th>InvNoA</th>";
if (@$indesc >0)
echo "<th>InvNoA incl VAT</th>\n";
if ($in >1)
echo "<th>InvNoB</th>";
if ($indesc >1)
echo "<th>InvNoB incl VAT</th>\n";
if ($in >"2")
echo "<th>InvNoC</th>";
if ($indesc >2)
echo "<th>InvNoC incl VAT</th>\n";
if ($in >"3")
echo "<th>InvNoD</th>";
if ($indesc >3)
echo "<th>InvNoD incl VAT</th>\n";
if ($in >4)
echo "<th>InvNoE</th>";
if ($indesc >4)
echo "<th>InvNoE incl VAT</th>\n";
if ($in >5)
echo "<th>InvNoF</th>";
if ($indesc >5)
echo "<th>InvNoF incl VAT</th>\n";
if ($in > "6")
echo "<th>InvNoG</th>";
if ($indesc >6)
echo "<th>InvNoG incl VAT</th>\n";
if ($in >7)
echo "<th>InvNoH</th>";
if ($indesc >7)
echo "<th>InvNoH incl VAT</th>\n";
echo "<th>TMethod</th>";
//if ($indesc == "1")
echo "<th>Priority</th></tr>\n";

    // fetch object array 
    while ($row = mysqli_fetch_assoc($result)) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

	echo "<tr><th>";
	
	
		  
$mmm =  $row['InvNoA'];  //invNoA    
//echo "mmm: ".$mmm;



//if ($mmm >= 0)     //invNoA   if a zero OR if not a number  for exmaple 44p55   part paid.

//if (preg_match('/[A-Za-z]/', $mmm) ||  ($mmm == 0)      )

//{

if ($mmm == '0')
echo "<font color = orange>";

echo "{$row['TransNo']}</font></th>";//TransNo


	
	
	
	
	
	
	
	
	echo "<th>";
	
	

	$InvNoA =  $row['InvNoA'];
	$SQLIA = "select TotAmt from invoice where InvNo = '$InvNoA'";
    //echo $SQLIA."<br>";
	  //now we add all the amounts of the invoices of this transaction:
		if ($resultIA = mysqli_query($DBConnect, $SQLIA)) {
		while ($rowIA = mysqli_fetch_assoc($resultIA)) {
		$InvNoAincl= $rowIA['TotAmt'];
		//echo "R".$InvNoAincl;
		//echo "<br>";
		}   mysqli_free_result($resultIA);
		}
		
	$InvNoB =  $row['InvNoB'];
	$SQLIB = "select TotAmt from invoice where InvNo = '$InvNoB'";
    //echo $SQLIB."<br>";
	  //now we add all the amounts of the invoices of this transaction:
		if ($resultIB = mysqli_query($DBConnect, $SQLIB)) {
		while ($rowIB = mysqli_fetch_assoc($resultIB)) {
		$InvNoBincl= $rowIB['TotAmt'];
		//echo "InvNoBincl R".$InvNoBincl;
		}   mysqli_free_result($resultIB);
		}
		
		
	$InvNoC =  $row['InvNoC'];
	$SQLIC = "select TotAmt from invoice where InvNo = '$InvNoC'";
    //echo $SQLIC."<br>";
	  //now we add all the amounts of the invoices of this transaction:
		if ($resultIC = mysqli_query($DBConnect, $SQLIC)) {
		while ($rowIC = mysqli_fetch_assoc($resultIC)) {
		$InvNoCincl= $rowIC['TotAmt'];
		//echo "InvNoCincl R".$InvNoCincl;
		}   mysqli_free_result($resultIC);
		}
		
		
	$InvNoD =  $row['InvNoD'];
	$SQLID = "select TotAmt from invoice where InvNo = '$InvNoD'";
    //echo $SQLID."<br>";
	  //now we add all the amounts of the invoices of this transaction:
		if ($resultID = mysqli_query($DBConnect, $SQLID)) {
		while ($rowID = mysqli_fetch_assoc($resultID)) {
		$InvNoDincl= $rowID['TotAmt'];
		//echo "InvNoDincl R".$InvNoDincl;
		}   mysqli_free_result($resultID);
		}
		
		$InvNoE =  $row['InvNoE'];
	$SQLIE = "select TotAmt from invoice where InvNo = '$InvNoE'";
    //echo $SQLIE."<br>";
	  //now we add all the amounts of the invoices of this transaction:
		if ($resultIE = mysqli_query($DBConnect, $SQLIE)) {
		while ($rowIE = mysqli_fetch_assoc($resultIE)) {
		$InvNoEincl= $rowIE['TotAmt'];
		//echo "InvNoEincl R".$InvNoEincl;
		//echo "<br>";
		}   mysqli_free_result($resultIE);
		}
		
	$InvNoF =  $row['InvNoF'];
	$SQLIF = "select TotAmt from invoice where InvNo = '$InvNoF'";
    //echo $SQLIF."<br>";
	  //now we add all the amounts of the invoices of this transaction:
		if ($resultIF = mysqli_query($DBConnect, $SQLIF)) {
		while ($rowIF = mysqli_fetch_assoc($resultIF)) {
		$InvNoFincl= $rowIF['TotAmt'];
		//echo "InvNoFincl R".$InvNoFincl;
		//echo "<br>";
		}   mysqli_free_result($resultIF);
		}
		
	$InvNoG =  $row['InvNoG'];
	$SQLIG = "select TotAmt from invoice where InvNo = '$InvNoG'";
    //echo $SQLIG."<br>";
	  //now we add all the amounts of the invoices of this transaction:
		if ($resultIG = mysqli_query($DBConnect, $SQLIG)) {
		while ($rowIG = mysqli_fetch_assoc($resultIG)) {
		$InvNoGincl= $rowIG['TotAmt'];
		//echo "InvNoGincl R".$InvNoGincl;
		//echo "<br>";
		}   mysqli_free_result($resultIG);
		}
		
	$InvNoH =  $row['InvNoH'];
	$SQLIH = "select TotAmt from invoice where InvNo = '$InvNoH'";
    //echo $SQLIH."<br>";
	  //now we add all the amounts of the invoices of this transaction:
		if ($resultIH = mysqli_query($DBConnect, $SQLIH)) {
		while ($rowIH = mysqli_fetch_assoc($resultIH)) {
		$InvNoHincl= $rowIH['TotAmt'];
		//echo "InvNoHincl R".$InvNoHincl;
		//echo "<br>";
		}   mysqli_free_result($resultIH);
		}
		
	$InvALLAmt = $InvNoAincl + $InvNoBincl + $InvNoCincl + $InvNoDincl + $InvNoEincl + $InvNoFincl + $InvNoGincl + $InvNoHincl;
		
	//echo "InvALLAmt:"
	$Amtpd = $row['AmtPaid'];
	
	$diff = ($Amtpd - $InvALLAmt);
	$diff2 = ($InvALLAmt - $Amtpd);
	
	if (round($Amtpd,1) > round($InvALLAmt,1))
	echo "<font color = 'darkgreen'>overpaid by ".number_format($diff, 2, '.', '')."<br>";
	
	else 
	if (round($Amtpd,1) < round($InvALLAmt,1))
	echo "<font color = 'purple'>underpaid  by ".number_format($diff2, 2, '.', '')."<br>";
	//else if equal then dont say anything -not overpaid and not underpaid
	
	
	if 
	(number_format($Amtpd, 2, '.', '') > number_format($InvALLAmt, 2, '.', ''))
	echo "<font color = 'blue'>";
	else
	if 
	((number_format($Amtpd, 2, '.', '')) < number_format($InvALLAmt, 2, '.', ''))
	echo "<font color = 'olive'>";
	else
	if 
	((number_format($Amtpd, 2, '.', '')+0.1) < number_format($InvALLAmt, 2, '.', ''))
	echo "<font color = 'red'>";

	else 
	echo "<font color = 'green'>";
	
	
	
	echo "paid: R".number_format($Amtpd, 2, '.', '');
	echo "<br>";
	echo "req : R".number_format($InvALLAmt, 2, '.', '');
	
	echo "</font>";
	echo "</th>";
  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  











$date_array = explode("-",$row['TransDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//Date
echo "<th>R{$row['AmtPaid']}</th>";///TOTAL AmtPaid
$yo = $yo+$row['AmtPaid'];
echo "<th>{$row['Notes']}</th>\n";//Notes
echo "<th>{$row['CustSDR']}</th>";//CustSDR

//echo "<th>24:{$row[24]}</th>";//ERROR

//echo "<th>R{$row[29]}</th>"; 
$summm = $summm + $row['AmtPaid'];


//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//Summary


if ($in >0)
echo "<th>{$row['InvNoA']} </font><br>R".number_format($InvNoAincl, 2, '.', '')."</th>\n";//InvNoA  //InvA  from transaction table
if ($indesc >0)
echo "<th>{$row['InvNoAincl']}</th>\n";  //InAincl  from transaction table

//echo "<th>{$loop}</th>\n";
$loop++;
//$PaidInvs[$loop]=$row['InvNoAincl'];




if ($in >1)
echo "<th>{$row['InvNoB']} </font><br>R".number_format($InvNoBincl, 2, '.', '')."</th>";//InvNoB
$loop++;
//$PaidInvs[$loop]=$row['InvNoB'];

if ($indesc >1)
echo "<th>{$row['InvNoBincl']}</th>"; //InvNoBincl





if ($in >2)
echo "<th>{$row['InvNoC']} </font><br>R".number_format($InvNoCincl, 2, '.', '')."</th>";
if ($indesc >2)
echo "<th>{$row['InvNoEincl']}</th>";
$loop++;
//$PaidInvs[$loop]=$row['InvDincl'];




if ($in >3)
echo "<th>{$row['InvNoD']} </font><br>R".number_format($InvNoDincl, 2, '.', '')."</th>";
 if ($indesc >3)
echo "<th>{$row['InvNoDincl']}</th>";

$loop++;
//$PaidInvs[$loop]=$row['14];

if ($in >4)
echo "<th>{$row['InvNoE']} </font><br>R".number_format($InvNoEincl, 2, '.', '')."</th>";
 if ($indesc >4)
echo "<th>{$row['InvNoEincl']}</th>";
$loop++;
//$PaidInvs[$loop]=$row['InvNoEincl'];



if ($in >5)

echo "<th>{$row['InvNoF']} </font><br>R".number_format($InvNoFincl, 2, '.', '')."</th>";
 if ($indesc >5)
echo "<th>{$row['InvNoFincl']}</th>";
$loop++;
//$PaidInvs[$loop]=$row['InvFincl'];



if ($in >6)
echo "<th>{$row['InvNoG']} </font><br>R".number_format($InvNoGincl, 2, '.', '')."</th>";
 if ($indesc >6)
echo "<th>{$row['InvNoGincl']}</th>";

$loop++;
if ($in >7)
echo "<th>{$row['InvNoH']} </font><br>R".number_format($InvNoHincl, 2, '.', '')."</th>";
if ($indesc >7)
echo "<th>{$row['InvNoHincl']}</th>";//InvNoHincl  Dont forget to enable invoice descriptions as well

//echo "<th>{$row['CustSDR']}</th>";//CustSDR
echo "<th>{$row['TMethod']}</th>\n";//EFT TMethod
echo "<th>{$row['Priority']}</th>";//priority

echo "</tr>\n";


//for resetting:
	$InvNoAincl = 0;
$InvNoBincl = 0;
$InvNoCincl = 0;
$InvNoDincl = 0;
$InvNoEincl = 0;
$InvNoFincl = 0;
$InvNoGincl = 0;
$InvNoHincl = 0;
$InvALLAmt  = 0;

		}
    mysqli_free_result($result);

	$InvNoAincl = 0;
$InvNoBincl = 0;
$InvNoCincl = 0;
$InvNoDincl = 0;
$InvNoEincl = 0;
$InvNoFincl = 0;
$InvNoGincl = 0;
$InvNoHincl = 0;
$InvALLAmt  = 0;

	
	
	
}
echo "</table>";
//echo "Underpaid or overpaid transactions Paid totals to: R ".$summm."<br />";

?>
<br>
