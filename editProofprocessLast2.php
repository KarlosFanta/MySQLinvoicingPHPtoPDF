<?php	//this is "edit_ProofNo_CustProcessC2.php"
 $page_title = "You seleted a Proof";
require_once 'header.php';
require_once 'inc_OnlineStoreDB.php';

?>
<form name="editProofprocessLast2" action="editProofProcessLast.php" method="post">


<?php
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Proofomer for updating before we change him on the last form.

$TBLrow = $_POST['mydropdownEC'];
$CustNo = $_POST['CustNo'];
//$indesc = $_POST['indesc'];
$ProofNoT = explode('_', $TBLrow );
//$ProofNoInt = intval($ProofNo[0]);
$ProofNo = $ProofNoT[0];
//echo "<br>ProofNoInt:".$ProofNoInt."</br />";
$SQLString = "SELECT * FROM aproof WHERE ProofNo = '$ProofNo'";
echo $SQLString."<br>";
//$SQLString = "SELECT * FROM aproof WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">Edit aproof (processC2)</b></font>calling edit_ProofNo_process_last.php

</br>
<?php
//include 'monthtables.php';
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ProofNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["ProofDate"];
$TransNo = $row["TransNo"];
$item4 = $row["Amt"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
print "$item1";
print "_".$item2;
print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
}
$result->free();
}	//echo "<br>";
//$mysqli->close();

$SQLStringC = "SELECT * FROM customer WHERE CustNo = $CustNo";
//echo $SQLStringC."<br>";
if ($result = mysqli_query($DBConnect, $SQLStringC)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustFN"];
$item3 = $row["CustLN"];
$item4 = $row["Important"];

print "&nbsp;&nbsp;&nbsp;&nbsp;".$item2;
print "&nbsp;&nbsp;&nbsp;&nbsp;".$item3;
print "&nbsp;&nbsp;&nbsp;&nbsp;".$item4;

}
	mysqli_free_result($result);
}

?>
<?php
 echo "<table width='10' border='0'>";
		echo "<tr>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
 		echo "<th>";
			echo "<dt><label>No:</label></dt>";
			//     <!--<dd><input type="text" name="ProofNo_name" id="ProofNo_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='ProofNo' size = '10' value=";
			//echo $row[0];
			echo $row['ProofNo'];
			echo "> </dd>";
		echo "</th>";

 	//	echo "<th>";
	//		echo "<dt><label>CustNo<br></label></dt>";
			//     <!--<dd><input type="text" name="ProofNo_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='hidden' name='CustNo' size = '10' value=";
			echo $row['CustNo'];
			echo ">";
//			echo "</dd>";
//		echo "</th>";

 		echo "<th>";
			echo "<dt><label>Date <br></label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='ProofDate' size = '8' value=";
			echo $row['ProofDate'];
			$ddd = $row['ProofDate'];
			echo "> </dd>";
			$dr = explode( '-', $ddd);
			$dP = $dr[2].'/'.$dr[1].'/'.$dr[0];
			echo "<input type='text'  size = '8' value='$dP'>";
		echo "</th>";

		echo "<th>";
			echo "<dt><label>TransNo</label></dt>";
			echo "<dd><input type='text' name='TransNo' size='6' value=";
			echo $row['TransNo'];
			echo "> </dd>";
		echo "</th>";

 		echo "<th>";
			echo "<dt><label>Amt</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='Amt' size='6' value=";
			echo $row['Amt'];
			echo "> </dd>";
		echo "</th>";

 		echo "<th>";
			echo "<dt><label>Notes</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='Notes'size='12' value=";
			echo strtr($row['Notes'], array(' ' => '&nbsp;')) ;
//			echo $row['Notes'];
			echo "> </dd>";
		echo "</th>";

  		echo "<th>";
			echo "<dt><label>CustSDR</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='CustSDR' size='28' value=";
			echo strtr($row['CustSDR'], array(' ' => '&nbsp;')) ;
//			echo $row['Notes'];
			echo "> </dd>";
		echo "</th>";

$grrr = 0;
$grrr = $row['InvNoA'];
if ($grrr == 0)
$grrr = "";

		echo "<th>";
			echo "<dt><label>InvNoA</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoA' value=";
			print $grrr;
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoAincl</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoAincl' value=";
			echo $row["InvNoAincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<dt><label>InvNoB</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 5 name='InvNoB' value=";
			print $row['InvNoB'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoBincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 4 name='InvNoBincl' value=";
			echo $row["InvNoBincl"];
			echo "> </dd>";
		echo "</th> ";

			echo "<th>";
			echo "<dt><label>InvNoC</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoC' value=";
			print $row['InvNoC'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoCincl</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoCincl' value=";
			echo $row["InvNoCincl"];
			echo "> </dd>";
		echo "</th> ";

			echo "<th>";
			echo "<dt><label>InvNoD</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoD' value=";
			print $row['InvNoD'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoDincl</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoDincl' value=";
			echo $row["InvNoDincl"];
			echo "> </dd>";
		echo "</th> ";

				echo "<th>";
			echo "<dt><label>InvNoE</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoE' value=";
			print $row['InvNoE'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoEincl</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoEincl' value=";
			echo $row["InvNoEincl"];
			echo "> </dd>";
		echo "</th> ";

		echo "<th>";
			echo "<dt><label>InvNoF</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoF' value=";
			print $row['InvNoF'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoFincl</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoFincl' value=";
			echo $row["InvNoFincl"];
			echo "> </dd>";
		echo "</th> ";

		echo "<th>";
			echo "<dt><label>InvNoG</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoG' value=";
			print $row['InvNoG'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoGincl</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='InvNoGincl' value=";
			echo $row["InvNoGincl"];
			echo "> </dd>";
		echo "</th> ";

		echo "<th>";
			echo "<dt><label>InvNoH</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoH' value=";
			print $row['InvNoH'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoHincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoHincl' value=";
			echo $row["InvNoHincl"];
			echo "> </dd>";
		echo "</th> ";

		echo "<th>";
			echo "<dt><label>TM</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 5 name='PMethod' value=";
echo strtr($row['PMethod'], array(' ' => '&nbsp;')) ;
			//			echo $row['PMethod'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>Priority</label></dt>";
			//     <!--<dd><input type="text" name="Priority" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' size = 6 name='Priority' value=";
echo strtr($row['Priority'], array(' ' => '&nbsp;')) ;
					//	echo $row["Priority"];
			echo "> </dd>";
		echo "</th> ";

/*
 		echo "<th>";
			echo "<dt><label>InvNoC</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4  name='InvNoC' value=";
			print $row['InvNoC'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoCincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoCincl' value=";
			echo $row["InvNoCincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<dt><label>InvNoD</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4  name='InvNoD' value=";
			print $row['InvNoD'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoDincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoDincl' value=";
			echo $row["InvNoDincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<dt><label>InvNoE</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoE' value=";
			print $row['InvNoE'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoEincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoEincl' value=";
			echo $row["InvNoEincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<dt><label>InvNoF</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoF' value=";
			print $row['InvNoF'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoFincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoFincl' value=";
			echo $row["InvNoFincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<dt><label>InvNoG</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoG' value=";
			print $row['InvNoG'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoGincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoGincl' value=";
			echo $row["InvNoGincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<dt><label>InvNoH</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoH' value=";
			print $row['InvNoH'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<dt><label>InvNoHincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text'  size = 4 name='InvNoHincl' value=";
			echo $row["InvNoHincl"];
			echo "> </dd>";
		echo "</th> ";
*/
 		echo "<th>";
			echo "<dt><label>CustNo: This is required when proof is in wrong Customer</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='CustNo' value=";
			echo $row["CustNo"];
			echo "> </dd>";
		echo "</th> ";

		//$objResult;
 }

}
		echo "</tr> ";
		echo "</table> ";

?>

<div>
		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<dd><input type="submit" name="btn_submit" value="Submit/Save" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
<!--			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>-->
		</dl>
</div>
</form>





<?php



/*
$yo = 0;
$SQLStringYO = "SELECT * FROM proof WHERE CustNo = $CustInt";
echo $SQLStringYO."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLString, $DBConnect);

if ($result = $DBConnect->query($SQLStringYO)) {//from proof table
echo "<table width='10' border='1'>\n";
echo "<tr><th>proof No</th>";
//echo "<th>CustNo</th>";
echo "<th>ProofDate</th>";
echo "<th>Amt</th>";
echo "<th>Notes</th>";
echo "<th>CustSDR</th>";
echo "<th>Payment Method</th>";
//if ($in >0){
echo "<th>InvNoA detail</th>";
echo "<th>InvNoA incl VAT</th>\n";
//}
//if ($in >1){
echo "<th>InvNoB detail</th>";
echo "<th>InvNoB incl VAT</th>\n";
//} if ($in >2){
echo "<th>InvNoC detail</th>";
echo "<th>InvNoC incl VAT</th>\n";
}
/* if ($in >3){
echo "<th>InvNoD detail</th>";
echo "<th>InvNoD incl VAT</th>\n";
} if ($in >4){
echo "<th>InvNoE detail</th>";
echo "<th>InvNoE incl VAT</th>\n";
} if ($in >5){
echo "<th>InvNoF detail</th>";
echo "<th>InvNoF incl VAT</th>\n";
} if ($in >6){
echo "<th>InvNoG detail</th>";
echo "<th>InvNoG incl VAT</th>\n";
} if ($in >7){
echo "<th>InvNoH detail</th>";
echo "<th>InvNoH incl VAT</th>\n";
}

echo "<th>Priority</th></tr>\n";

echo "</table>";
//echo "R".$yo."<br>";
*/
?>
<!--<b><br><font size = "4" type="arial">Customer's Invoices</b></font>
</br>-->
<?php
//include ("view_inv_by_cust.php");

/*
$SQLStringI = "select * from invoice where CustNo = $CustInt";
//echo $SQLString."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLString, $DBConnect);

if ($result = $DBConnect->query($SQLStringI)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo</th>";
echo "<th>CustNo</th>";
echo "<th>CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>Inv Paid Status</th>";
//if ($indesc >0){

echo "<th>D1</th>";
echo "<th>ex1</th></tr>\n";
//}


    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
$CN = $row[1];
$SQLStringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLStringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLStringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>\n";
//if ($indesc >0){
echo "<th>{$row[5]}</th>\n";
echo "<th>{$row[6]}</th>\n";
echo "<th>{$row[7]}</th>\n";
echo "<th>{$row[8]}</th>\n";

echo "<th>{$row[9]}</th>\n";
//echo "<th>{$row[10]}</th>\n";
//echo "<th>{$row[11]}</th>\n";
//echo "<th>{$row[12]}</th>\n";
//}
echo "</tr>\n";
		}
    $result->close();

}
echo "</table>";

*/


include ("view_inv_by_custADV.php");

include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<b>Total Amount oustanding: R".($Invsummm - $yo)."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - $yo)."</b><BR />";
echo "<br /><br />";
include ("view_event_by_cust.php");
/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>



