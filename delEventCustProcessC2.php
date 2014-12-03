<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a Transomer";
	require_once('header.php');	
	//require_once ('db.php');//mysqli connection and databse selection
		require_once("inc_OnlineStoreDB.php");

?>
<form name="Del_event_processC2" action="delEventProcessLast.php" method="post">


<?php
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for deleting before we change him on the last form.

$TBLrow = $_POST['mydropdownEC'];
$CustNo = $_POST['CustNo'];
echo "<input type='hidden' name='CustNo' value=";
			echo $CustNo;
			echo "> ";

?>
<input type= "hidden" id = "mydropdownEC" name = "mydropdownEC" value = "<?php echo $TBLrow;?>">

<?php

//$in = $_POST['in'];
//$indesc = $_POST['indesc'];
$EventNo = explode('_', $TBLrow );
$eventInt = intval($EventNo[0]);
//echo "<br>eventInt:".$eventInt."</br />";
$SQLString = "SELECT * FROM events WHERE EventNo = $eventInt";
//$SQLString = "SELECT * FROM events WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">DELETE event (processC2)</b></font>
</br>
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
}	echo "<br>";
//$mysqli->close();


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
 echo "<table>";
		echo "<tr>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
 		echo "<th>";
			echo "<dt><label>* event Number:</label></dt>";
			//     <!--<dd><input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='EventNo' size = '5' value=";
			//echo $row[0];
			echo $row['EventNo'];
			echo "> </dd>";
		echo "</th>";


 	//	echo "<th>";
	//		echo "<dt><label>CustNo<br></label></dt>";
			//     <!--<dd><input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='hidden' name='CustNo' size = '10' value=";
			echo $row['CustNo'];
			echo ">";
//			echo "</dd>";
//		echo "</th>";


 		echo "<th>";
			echo "<dt><label>event Date <br></label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='EDate' size = '10' value=";
			echo $row['EDate'];
			echo "> </dd>";
		echo "</th>";


 		echo "<th>";
			echo "<dt><label>Notes</label></dt>";
			//     <!--<dd><input type="text" name="event_name" id="event_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='ENotes' value=";
			echo strtr($row['ENotes'], array(' ' => '&nbsp;')) ;
//			echo $row['Notes'];
			echo "> </dd>";
		echo "</th>";

/*  		echo "<th>";
			echo "<dt><label>CustSDR</label></dt>";
			//     <!--<dd><input type="text" name="event_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='CustSDR' value=";
			echo strtr($row['CustSDR'], array(' ' => '&nbsp;')) ;
//			echo $row['Notes'];
			echo "> </dd>";
		echo "</th>";*/
/*		echo "<th>";
			echo "<dt><label>Transfer Method</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='TMethod' value=";
echo strtr($row['TMethod'], array(' ' => '&nbsp;')) ;
			//			echo $row['TMethod'];
			echo "> </dd>";
		echo "</th>";
*/
  		echo "<th>";
			echo "<dt><label>Priority</label></dt>";
			//     <!--<dd><input type="text" name="Priority" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='Priority' value=";
echo strtr($row['Priority'], array(' ' => '&nbsp;')) ;
					//	echo $row["Priority"];
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
			<dd><input type="submit" name="btn_submit" value="Confirm Deletion" /> 
			
			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
<!--			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>-->
		</dl>
</div>
</form>


<?php


$yo = 0;
$SQLStringYO = "SELECT * FROM events WHERE CustNo = $CustInt";
echo $SQLStringYO."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLString, $DBConnect);

if ($result = $DBConnect->query($SQLStringYO)) {//FROM eventsaction table
echo "<table width='10' border='1'>\n";
echo "<tr><th>eventaction No</th>";
//echo "<th>CustNo</th>";
echo "<th>eventDate</th>";
echo "<th>AmtPaid</th>";
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
*/
echo "<th>Priority</th></tr>\n";

    /* 
    while ($row = $result->fetch_row()) {  //FROM eventsaction table
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";  //EventNo FROM eventsaction table
//echo "<th>{$row[1]}</th>";       //CustNoFROM eventsaction table
$CN = $row[1];                  //CustNO FROM eventsaction table
//$SQLStringLN = "select Summary from invoice where CustNo = $CN";
//$SQLStringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLStringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLStringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO FROM eventsaction table
echo "<th>{$row[2]}</th>";  //eventDate FROM eventsaction table
echo "<th>{$row[3]}</th>";  //AmtPaid FROM eventsaction table
$yo = $yo+$row[3];




echo "<th>{$row[4]}</th>\n";  //NotesFROM eventsaction table
echo "<th>{$row[5]}</th>\n";  //TMethFROM eventsaction table
echo "<th>{$row[6]}</th>\n";  //AFROM eventsaction table
echo "<th>{$row[7]}</th>\n";  //AFROM eventsaction table
//if ($in >1){
echo "<th>{$row[8]}</th>\n";  //BFROM eventsaction table

echo "<th>{$row[9]}</th>\n";  //BFROM eventsaction table
//} if ($in >2){
echo "<th>{$row[10]}</th>\n";  //CFROM eventsaction table
echo "<th>{$row[11]}</th>\n";  //CFROM eventsaction table
//} if ($in >3){
echo "<th>{$row[12]}</th>\n";  //FROM eventsaction table
echo "<th>{$row[13]}</th>\n";  //FROM eventsaction table
/*} if ($in >4){
echo "<th>{$row[14]}</th>\n";  //FROM eventsaction table
echo "<th>{$row[15]}</th>\n";  //FROM eventsaction table
} if ($in >5){
echo "<th>{$row[16]}</th>\n";  //FROM eventsaction table
echo "<th>{$row[17]}</th>\n";  //FROM eventsaction table
echo "<th>{$row[18]}</th>\n";  //FROM eventsaction table
echo "<th>{$row[19]}</th>\n";  //FROM eventsaction table
} if ($in >6){
echo "<th>{$row[20]}</th>\n";  //FROM eventsaction table
echo "<th>{$row[21]}</th>\n";  //FROM eventsaction table
}*/
/*echo "<th>{$row[22]}</th></tr>\n";  //Priority FROM eventsaction table
		}
    /* free result set */
//    $result->close();
	
//}
echo "</table>";
//echo "R".$yo."<br>";
?> 
<!--<b><br><font size = "4" type="arial">Customer's Invoices</b></font>
</br>-->
<?php
include ("view_inv_by_cust.php");



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

    /* fetch object array */
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
    /* free result set */
    $result->close();
	
}
echo "</table>";




?>


<br />









<?php

/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?> 



