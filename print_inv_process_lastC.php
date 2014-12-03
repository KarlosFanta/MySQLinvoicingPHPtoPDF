<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>print</title>

<?php	//this is "process_Inv.php"
 $page_title = "You loadng an invoice";
	//include_once('header.php');	
//oracle: $conn = oci_connect("system", "1234", "localhost/XE");
//require_once('db.php');//mysql connection and database selection
require_once('logprog.php');//mysql connection and database selection
	require_once("inc_OnlineStoreDB.php");//page567
	require_once("header.php");//page567

?>



<?php


$TBLrow = $_POST['mydropdownEC'];


echo "TBLrow: " .$TBLrow."</BR>";
$Invno = explode('_', $TBLrow );
$InvNo2 = $Invno[0];

$queryI = "SELECT * FROM invoice WHERE InvNo = $InvNo2" ;

//echo $query."</BR>";

if ($resultI = mysqli_query($DBConnect, $queryI)) {
  while ($rowI = mysqli_fetch_assoc($resultI)) {
$CustInt = $rowI["CustNo"];
echo "CustInt: ".$CustInt;

$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;
//echo $SQLstring;
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='90%' border='0'>\n";
echo "<tr><th>CustNo</th>";
echo "<th>CustFn</th>";
echo "<th>Surname</th>";
echo "<th>CustTel</th>";
echo "<th>CustCell</th>";
echo "<th>CustEmail</th>";
echo "<th>CustAddr</th>";
echo "<th>Distance</th>";
echo "<th>LastLogin</th>";
echo "<th>CustPW</th></tr>\n";


    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>";
echo "<th>{$row[5]}</th>";
echo "<th>{$row[6]}</th>";
echo "<th>{$row[7]}</th>";
echo "<th>{$row[11]}</th>";
echo "<th>{$row[10]}</th>";
echo "<th>{$row[13]}</th>";
$Abbr = $row[13];
echo "<th>{$row[8]}</th>";
echo "<th>{$row[8]}</th>";
echo "<th>{$row[8]}</th>";
echo "<th>{$row[8]}</th>";
echo "<th>{$row[9]}</th>\n";
echo "</tr>\n";
//echo "<td>{$row[5]}</td></tr>\n";
		}
    /* free result set */
    $result->close();
	
}
echo "</table>";




echo $InvNo2; 
echo "&nbsp;";
echo " ".$rowI['Summary'];
$Summary = $rowI['Summary'];
echo "&nbsp;";
$Dt1 = explode("-", $rowI['InvDate']);
//echo $Dt1[2]."____";

//echo $Dt1[0]."____";
//echo $Dt1[1]."____";
//$Dt2 = $_POST['Date1'];

//$Dt3 = $_POST['Date1'];

$TransDate = $Dt1[2]."/".$Dt1[1]."/".$Dt1[0];

echo $TransDate;	
echo "&nbsp;";

$SDR = $rowI['SDR'];
echo "&nbsp;";
$TAmt = $rowI['TotAmt'];
 //$TAmt = number_format ($TAmt, 2, ".", "");
 echo $TAmt; 

$Inv_NoInt = intval($InvNo2);
$InvNo = $InvNo2;


$earlySDR = "_";
//$earlySDR = $Abbr.',acc'.$CustNo.',inv'.$InvNo.','.$Summary;

?>
<form name="PL" action="print_invoice.php" method="post">
<?php

//echo "<br>InvNo:".$InvNo."</br />";

echo "<input type='hidden' name='InvNo'  value=";
			echo "'$Inv_NoInt'";
		?>

		<br />
			<dd><input type="text"  size = "30" value="maxtotlengthForSDR is30chars" /></dd>
		</dd>
			<dd><input type="text" name="SDR" id="SDR" size = "100" value="<?php echo $SDR; ?>" /></dd>
		</dd>
	</dl>
	
	<dl>
			
			<dd><input type="text" name="TAmt" id="TAmt" size = "100" value="<?php echo $TAmt; ?>" /></dd>
		</dd>
	</dl>
	
	<dl>
			
			<dd>Swap Surname with First Name:<input type="text" name="Swap" id="Swap" size = "2" value="N" /></dd>
		</dd>
	</dl>

	<dl>
			
			<dd><input type="hidden" name="Summary" id="Summary" size = "100" value="<?php echo $Summary; ?>" /></dd>
		</dd>
	</dl>
		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />--> 
			<dd><input type="submit" name="btn_submit" value="Display Invoice" /> 
			
			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>
</div>


<input type='hidden' name='Abbr'  value="<?php echo $Abbr; ?>">

</form>

<?php
$querySDR = "UPDATE invoice SET SDR = '$SDR', Summary = '$Summary', TotAmt = $TAmt WHERE InvNo = $InvNo";
//echo "<br>".$querySDR;
if (mysqli_query($DBConnect, $querySDR) === TRUE) {   

	//echo '<script //type="text/javascript">alert("SDR,TAmt successfully updated  $querySDR ")</script>';
}
else 
{
//	echo '<script type="text/javascript">alert("ERROR SDR,TAmt NOT updated .$querySDR.")</script>';
}	
include "invEmail.php";
echo "Customer's Email Address: <br><a href='mailto:".$CustEmail."?Subject=Invoice'>".$CustEmail."</a>&nbsp;&nbsp;" .$CustEmail."<br><br>";

include ("signature.php");
}}
?>
