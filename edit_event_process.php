<?php	//this is "edit_event_CustProcessC2.php"
 $page_title = "You seleted a eventomer";
	require_once 'header.php';
	require_once 'inc_OnlineStoreDB.php';

?>
<form name="Edit_event_process" action="edit_event_process_last.php" method="post">


<?php
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the eventomer for updating before we change him on the last form.

$TBLrow = $_POST['mydropdownEC'];
//$in = $_POST['in'];
//$indesc = $_POST['indesc'];
$EventNo = explode('_', $TBLrow );
$eventInt = intval($EventNo[0]);
//echo "<br>eventInt:".$eventInt."</br />";
if ($eventInt == 0)
$eventInt = 1;
$SQLString = "SELECT * FROM events WHERE EventNo = $eventInt";
//echo $SQLString;
//$SQLString = "SELECT * FROM events WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">Edit event</b></font>calling edit_event_process_last.php

</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["EventNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
$item3 = $row["EDate"];
//$item4 = $row["AmtPaid"];
$item5 = $row["ENotes"];
//$item6 = $row["CustSDR"];
print "$item1";
print "_".$item2;
print "_".$item3;
//print "_R".$item4;
print "_".$item5;
//print "_".$item6;
}
$result->free();
}	//echo "<br>";
//$mysqli->close();

//print "_".$item2;
$SQLStringC = "SELECT * FROM customer WHERE CustNo = $item2";
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

}}

?>
<?php
 echo "<table border =1>";
		echo "<tr align = left>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
 		echo "<th>";
			echo "<label>event No:</label>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='EventNo' size = '5' value=";
			//echo $row[0];
			echo $row['EventNo'];
			echo "> </dd>";
		echo "</th>";

 	//	echo "<th>";
	//		echo "<label>CustNo<br></label>";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='hidden' name='CustNo' size = '10' value=";
			echo $row['CustNo'];
			echo ">";
//			echo "</dd>";
//		echo "</th>";

 		echo "<th>";
			echo "<label>event Date</label>:";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='EDate' size = '10' value=";
			echo $row['EDate'];
			echo "> ";
		//echo "</th>";

 		//echo "<th>";
			echo "<label>Priority</label>:";
			//     <!--<input type="text" name="Priority" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' size = 6 name='Priority' value=";
echo strtr($row['Priority'], array(' ' => '&nbsp;')) ;
					//	echo $row["Priority"];
			echo "> </dd>";
		//echo "</th> ";

/*
 		echo "<th>";
			echo "<label>InvNoC</label>:";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4  name='InvNoC' value=";
			print $row['InvNoC'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<label>InvNoCincl</label>:";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoCincl' value=";
			echo $row["InvNoCincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<label>InvNoD</label>:";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4  name='InvNoD' value=";
			print $row['InvNoD'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<label>InvNoDincl</label>:";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoDincl' value=";
			echo $row["InvNoDincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<label>InvNoE</label>:";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoE' value=";
			print $row['InvNoE'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<label>InvNoEincl</label>:";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoEincl' value=";
			echo $row["InvNoEincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<label>InvNoF</label>:";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoF' value=";
			print $row['InvNoF'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<label>InvNoFincl</label>:";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoFincl' value=";
			echo $row["InvNoFincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<label>InvNoG</label>:";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoG' value=";
			print $row['InvNoG'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<label>InvNoGincl</label>:";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoGincl' value=";
			echo $row["InvNoGincl"];
			echo "> </dd>";
		echo "</th> ";

 		echo "<th>";
			echo "<label>InvNoH</label>:";
			//     <!--<input type="text" name="InvNo" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoH' value=";
			print $row['InvNoH'];
			echo "> </dd>";
		echo "</th>";
 		echo "<th>";
			echo "<label>InvNoHincl</label>:";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text'  size = 4 name='InvNoHincl' value=";
			echo $row["InvNoHincl"];
			echo "> </dd>";
		echo "</th> ";
*/
 		//echo "<th>";
			echo "<label>CustNo: </label></b>when wrong Customer:";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='CustNo' value=";
			echo $row["CustNo"];
			echo "> </dd>";
		echo "</th> ";

 		echo "</tr><tr>";
		echo "<th>";
			echo "<label>Destination_</label>:";
			//     <!--<input type="text" name="InvNoincl" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='Destination' value=";
			echo $row["Destination"];
			echo "> </dd>";
		echo "</th> ";

		echo "<th>";
			echo "<label>ENotes</label>:";
			//     <!--<input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='ENotes' size = '120' value=";
			echo strtr($row['ENotes'], array(' ' => '&nbsp;')) ;
//			echo $row['ENotes'];
			echo "> </dd>";
		echo "</th>";

		//$objResult;
 }

}
		echo "</tr> ";
		echo "</table> ";

?>

<div>
		<dl>
			</dt>
			<!--<input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<input type="submit" name="btn_submit" value="Submit/Save" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
<!--			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>-->
		</dl>
</div>
</form>





<?php



/*
$yo = 0;
$SQLStringYO = "SELECT * FROM events WHERE CustNo = $CustInt";
echo $SQLStringYO."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLString, $DBConnect);

if ($result = $DBConnect->query($SQLStringYO)) {//FROM events table
echo "<table width='10' border='1'>\n";
echo "<tr><th>event No</th>";
//echo "<th>CustNo</th>";
echo "<th>EDate</th>";
echo "<th>AmtPaid</th>";
echo "<th>ENotes</th>";
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



include ("view_event_by_cust.php");

$indesc = 1;
$yo = 1;
include ("view_inv_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All events total to: R".$yo."<br>";

echo "<b>Total Amount outstanding: R".($Invsummm - $yo)."</b><BR />";

include ("view_trans_by_cust.php");
/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>



