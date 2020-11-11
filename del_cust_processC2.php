<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a Invomer";
require_once 'header.php';
	//require_once 'db.php';//mysqli connection and databse selection
	require_once 'inc_OnlineStoreDB.php';

?>
<form name="Del_CustProcessC2" action="del_CustProcess_last.php" method="post">


<?php
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the invomer for deleting before we change him on the last form.

$TBLrow = $_POST['mydropdownEC'];
//$in = $_POST['in'];
//$indesc = $_POST['indesc'];
$CustNo = explode('_', $TBLrow );
$CustInt = intval($CustNo[0]);
//echo "<br>InvInt:".$InvInt."</br />";
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustInt";
//$SQLString = "SELECT * FROM invoice WHERE WHERE CustNo = $item2;
?>
<b><font size = "4" type="arial">DELETE customer (processC2)</b></font>
</br>
</br>
<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$item2 =  $row["CustNo"];
$CustInt =  $row["CustNo"];
/*$item3 = $row["InvDate"];
$item4 = $row["TotAmt"];
$item5 = $row["Summary"];
$item6 = $row["SDR"];*/
print "$item1";
print "_".$item2;
/*print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
*/}
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
			echo "<dt><label>* Customer Number:</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNo' size = '5' value=";
			//echo $row[0];
			echo $row['CustNo'];
			echo "> </dd>";
		echo "</th>";

 	//	echo "<th>";
	//		echo "<dt><label>CustNo<br></label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='hidden' name='CustNo' size = '10' value=";
			echo $row['CustNo'];
			echo ">";
//			echo "</dd>";
//		echo "</th>";

/*
 		echo "<th>";
			echo "<dt><label>invoice Date <br></label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvDate' size = '10' value=";
			echo $row['InvDate'];
			echo "> </dd>";
		echo "</th>";

 		echo "<th>";
			echo "<dt><label>Amount Paid</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='TotAmt' size='6' value=";
			echo $row['TotAmt'];
			echo "> </dd>";
		echo "</th>";

 		echo "<th>";
			echo "<dt><label>Summary</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='Summary' value=";
			echo strtr($row['Summary'], array(' ' => '&nbsp;')) ;
//			echo $row['Summary'];
			echo "> </dd>";
		echo "</th>";

  		echo "<th>";
			echo "<dt><label>CustSDR</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='SDR' value=";
			echo strtr($row['SDR'], array(' ' => '&nbsp;')) ;
//			echo $row['Summary'];
			echo "> </dd>";
		echo "</th>";
		echo "<th>";
			echo "<dt><label>Invfer Method</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvPdStatus' value=";
echo strtr($row['InvPdStatus'], array(' ' => '&nbsp;')) ;
			//			echo $row['InvPdStatus'];
			echo "> </dd>";
		echo "</th>";

  		echo "<th>";
			echo "<dt><label>D1</label></dt>";
			//     <!--<dd><input type="text" name="D1" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='D1' value=";
echo strtr($row['D1'], array(' ' => '&nbsp;')) ;
					//	echo $row["D1"];
			echo "> </dd>";
		echo "</th> ";

*/


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
$SQLStringYO = "SELECT * FROM customer WHERE CustNo = $CustInt";
echo $SQLStringYO."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLString, $DBConnect);

if ($result = $DBConnect->query($SQLStringYO)) {//from invoice table
echo "<table width='10' border='1'>\n";
echo "<tr><th>invoice No</th>";
//echo "<th>CustNo</th>";
echo "<th>InvDate</th>";
echo "<th>TotAmt</th>";
echo "<th>Summary</th>";
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
echo "<th>D1</th></tr>\n";

    /*
    while ($row = $result->fetch_row()) {  //from invoice table
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";  //InvNo from invoice table
//echo "<th>{$row[1]}</th>";       //CustNofrom invoice table
$CN = $row[1];                  //CustNO from invoice table
//$SQLStringLN = "select Summary from invoice where CustNo = $CN";
//$SQLStringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLStringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLStringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO from invoice table
echo "<th>{$row[2]}</th>";  //InvDate from invoice table
echo "<th>{$row[3]}</th>";  //TotAmt from invoice table
$yo = $yo+$row[3];

echo "<th>{$row[4]}</th>\n";  //Summaryfrom invoice table
echo "<th>{$row[5]}</th>\n";  //TMethfrom invoice table
echo "<th>{$row[6]}</th>\n";  //Afrom invoice table
echo "<th>{$row[7]}</th>\n";  //Afrom invoice table
//if ($in >1){
echo "<th>{$row[8]}</th>\n";  //Bfrom invoice table

echo "<th>{$row[9]}</th>\n";  //Bfrom invoice table
//} if ($in >2){
echo "<th>{$row[10]}</th>\n";  //Cfrom invoice table
echo "<th>{$row[11]}</th>\n";  //Cfrom invoice table
//} if ($in >3){
echo "<th>{$row[12]}</th>\n";  //from invoice table
echo "<th>{$row[13]}</th>\n";  //from invoice table
/*} if ($in >4){
echo "<th>{$row[14]}</th>\n";  //from invoice table
echo "<th>{$row[15]}</th>\n";  //from invoice table
} if ($in >5){
echo "<th>{$row[16]}</th>\n";  //from invoice table
echo "<th>{$row[17]}</th>\n";  //from invoice table
echo "<th>{$row[18]}</th>\n";  //from invoice table
echo "<th>{$row[19]}</th>\n";  //from invoice table
} if ($in >6){
echo "<th>{$row[20]}</th>\n";  //from invoice table
echo "<th>{$row[21]}</th>\n";  //from invoice table
}*/
/*echo "<th>{$row[22]}</th></tr>\n";  //D1 from invoice table
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



