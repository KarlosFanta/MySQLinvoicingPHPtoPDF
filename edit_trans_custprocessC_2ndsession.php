<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a Transomer";
	require_once 'header.php';
	//require_once ('db.php');//mysqli connection and databse selection
		require_once 'inc_OnlineStoreDB.php';

?>
<form name="Edit_trans_process" action="edit_trans_CustProcessC2_2nd.php" method="post">


<?php
@session_start();

echo "<option value='".$_SESSION['CustNo2nd']."'>".$_SESSION['CustNo2nd']."</option>";

$CustInt = $_SESSION['CustNo2nd'];

//$TBLrow = $_POST['mydropdownEC'];
//$in = $_POST['in'];
//$indesc = $_POST['indesc'];

//echo "TBLrow: " .$TBLrow."</BR>";
//echo "TBLrow: " .$TBLrow[0]."</BR>";
//echo "TBLrow: " .$TBLrow[1]."</BR>";
//echo "TBLrow: " .$TBLrow[2]."</BR>";
//echo "TBLrow: " .$mydropdownEC[0]."</BR>";
//echo "TBLrow: " .$mydropdownEC[1]."</BR>";
//echo "TBLrow: " .$TBLrow[2]."</BR>";
//$CustNo = explode('_', $TBLrow );
//echo "strange: ".$CustNo[0];
/*echo "<br> C0:".$CustNo[0];
echo " C1:".$CustNo[1];
echo " C2:".$CustNo[2];
echo " C3:".$CustNo[3]."<br>";
*/

//while ($TBLrow !=NULL) {
//echo "$TransNo</br />";
//$TransNo = strtok(";");
//}
//echo "TransNozERO: ";
//echo $TransNo[0]."</br />";
//$CustInt = intval($CustNo[0]);

//echo "<br>CustInt:".$CustInt."</br />";
$SQLString = "SELECT * FROM transaction WHERE CustNo = $CustInt order by TransDate desc";
$SQLStringC = "SELECT * FROM customer WHERE CustNo = $CustInt";
//echo $SQLString."B<r>";
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
//$sql = "SELECT TransNo, TransFN, TransLN, TransTel, TransCell, TransEmail, TransAddr, Distance FROM Transomer WHERE TransNo = $TransInt" ;
//$query = "SELECT * FROM transaction WHERE CustNo = $CustInt" ;
//$sql = "DELETE FROM Transomer WHERE TransNo = $TransInt" ;
//$sql = "TRUNCATE TABLE ' . $TBLname . '";   >>> THIS WAS MY PROBLEM!!!
//$stmt = OCIParse($conn, $sql);
//OCIExecute($stmt);
//oci_fetch_all($stmt, $res); multi-dimensional array
//echo "<pre>\n";
//var_dump($res);
//echo "</pre>\n";

//$stid = oci_parse($conn, $sql);
//oci_execute($stid);
//echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
//echo "Account No ".$TBLrow."</BR>"   ;

?>



<b><font size = "4" type="arial">Edit <?php echo $item3 ?>'s transactions</b></font>
</br>
<?php
include 'monthtables.php';
?>


</br>

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select transaction to be updated</option>";

<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];

$item3 = $row["TransDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item8 = $row["InvNoA"];
if ($item8 == 0)
$item8 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//print "_".$item2; //CustNo
print "_".$item8;
print "_".$item3;
print "_R".$item4;
print "_".$item5;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";

print " </option>";

/*    echo $row["InvNo"];//case sensitive!
    echo $row["InvFN"];//case sensitive!
    echo $row["InvLN"];//case sensitive!
*/
	}

$result->free();
//mysql_free_result($result);

}	echo "<br>";
// close connection
//$mysqli->close();
?>
</select><br />
<input type="submit" name="btn_submit" value="Update selected transaction" />


































<?php
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<b>Total Amount oustanding: R".($Invsummm - $yo)."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - $yo)."</b><BR />";

include ("view_event_by_cust.php");
include ("view_trans_by_custM.php");

echo "<br><br><br><br><br><br><br><br><br><br>";

$yo = 0;
echo "sqlstr:".$SQLString;
//echo $SQLString."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLString, $DBConnect);

if ($result = $DBConnect->query($SQLString)) {//from transaction table
echo "<table width='10' border='1'>\n";
echo "<tr><th>Transaction No</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate</th>";
echo "<th>AmtPaid</th>";
echo "<th>Notes</th>";
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

    /* fetch object array */
    while ($row = $result->fetch_row()) {  //from transaction table
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";  //TransNo from transaction table
//echo "<th>{$row[1]}</th>";       //CustNofrom transaction table
$CN = $row[1];                  //CustNO from transaction table
//$SQLStringLN = "select Summary from invoice where CustNo = $CN";
//$SQLStringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLStringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLStringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO from transaction table
echo "<th>{$row[2]}</th>";  //TransDate from transaction table
echo "<th>{$row[3]}</th>";  //AmtPaid from transaction table
$yo = $yo+$row[3];

echo "<th>{$row[4]}</th>\n";  //Notesfrom transaction table
echo "<th>{$row[5]}</th>\n";  //TMethfrom transaction table
echo "<th>{$row[6]}</th>\n";  //Afrom transaction table
echo "<th>{$row[7]}</th>\n";  //Afrom transaction table
//if ($in >1){
echo "<th>{$row[8]}</th>\n";  //Bfrom transaction table

echo "<th>{$row[9]}</th>\n";  //Bfrom transaction table
//} if ($in >2){
echo "<th>{$row[10]}</th>\n";  //Cfrom transaction table
echo "<th>{$row[11]}</th>\n";  //Cfrom transaction table
//} if ($in >3){
echo "<th>{$row[12]}</th>\n";  //from transaction table
echo "<th>{$row[13]}</th>\n";  //from transaction table
/*} if ($in >4){
echo "<th>{$row[14]}</th>\n";  //from transaction table
echo "<th>{$row[15]}</th>\n";  //from transaction table
} if ($in >5){
echo "<th>{$row[16]}</th>\n";  //from transaction table
echo "<th>{$row[17]}</th>\n";  //from transaction table
echo "<th>{$row[18]}</th>\n";  //from transaction table
echo "<th>{$row[19]}</th>\n";  //from transaction table
} if ($in >6){
echo "<th>{$row[20]}</th>\n";  //from transaction table
echo "<th>{$row[21]}</th>\n";  //from transaction table
}*/
echo "<th>{$row[22]}</th></tr>\n";  //Priority from transaction table
		}
    /* free result set */
    $result->close();

//}
echo "</table>";
echo "R".$yo."<br>";
?>
<!--<b><br><font size = "4" type="arial">Customer's Invoices</b></font>
</br>-->
<?php
include ("view_inv_by_cust.php");

$SQLString = "select * from invoice where CustNo = $CustInt";
//echo $SQLString."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLString, $DBConnect);

if ($result = $DBConnect->query($SQLString)) {
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

/*$result=mysql_query($query);
//echo "<br><br>result: ".$result; //the whole content of the table is now require_onced in a PHP array with the name $result.
$num=mysql_numrows($result);//counts the rows

mysql_close();

/*echo "<br><br>";

$i=0;
while ($i < $num) {

$cell1 = mysql_result($result,$i,"productID");
$cell2 = mysql_result($result,$i,"orderID");
$cell3 = mysql_result($result,$i,"quantity");

echo "<b>$cell1
$cell2</b><br>$cell3<br><hr><br>";

$i++;
}
*/

?>


<br />
<p>.</p>







<?php

//$objResult = mysql_query($sql) or die(mysql_error());

//oracle: $objParse = oci_parse($conn, $sql);
//oracle: oci_execute ($objParse,OCI_DEFAULT);

//while (($row = oci_fetch_array($stid, OCI_BOTH))) {
//while (($row = oci_fetch_array($stid, OCI_RETURN_NULLS))) {
//oracle: while($objResult = oci_fetch_array($objParse,OCI_RETURN_NULLS)) {
    // Use the uppercase column names for the associative array indices
 /*   echo $row[0] . $row['TransNo']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[1] . $row['TransFN']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[2] . $row['TransLN']   . " are the same<br>\n"; //i must use capital letters!! make sure that the Transomer has a surname entered!!!
    echo $row[3] . $row['TransTEL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[4] . $row['TransCELL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[5] . $row['TransEMAIL']"</br>";
    echo $row[6] . $row['TransADDR']"</br>";
    echo $row[7] . $row['DISTANCE']"</br>";

	// while ($row = mysql_fetch_assoc($objResult)) {
if ($result = mysqli_query($link, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {


 		echo "<dl>";
			echo "<dt><label>* Transaction Number:</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='TransNo' value=";
			//echo $row[0];
			echo $row['TransNo'];
			//echo $objResult[0];
			//echo 'kkk'.$objResult['TransNo'];
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>* CustNo:</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='CustNo' value=";
			echo $row['CustNo'];
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>TransDate </label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='TransDate' value=";
			echo $row['TransDate'];
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Amount Paid</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='AmtPaid' value=";
			echo $row['AmtPaid'];
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Notes</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='Notes' value=";
			echo $row['Notes'];
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>Transfer Method</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='TMethod' value=";
			echo $row['TMethod'];
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>InvNoA</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoA' value=";
			print $row['InvNoA'];
			echo "> </dd>";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoAincl</label></dt>";
			//     <!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoAincl' value=";
			echo $row["InvNoAincl"];
			echo "> </dd>";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoB</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoB' value=";
			print $row['InvNoB'];
			echo "> </dd>";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoBincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoBincl' value=";
			echo $row["InvNoBincl"];
			echo "> </dd>";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoC</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoC' value=";
			print $row['InvNoC'];
			echo "> </dd>";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoCincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoCincl' value=";
			echo $row["InvNoCincl"];
			echo "> </dd>";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoD</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoD' value=";
			print $row['InvNoD'];
			echo "> </dd>";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoDincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoDincl' value=";
			echo $row["InvNoDincl"];
			echo "> </dd>";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoE</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoE' value=";
			print $row['InvNoE'];
			echo "> </dd>";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoEincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoEincl' value=";
			echo $row["InvNoEincl"];
			echo "> </dd>";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoF</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoF' value=";
			print $row['InvNoF'];
			echo "> </dd>";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoFincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoFincl' value=";
			echo $row["InvNoFincl"];
			echo "> </dd>";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoG</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoG' value=";
			print $row['InvNoG'];
			echo "> </dd>";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoGincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoGincl' value=";
			echo $row["InvNoGincl"];
			echo "> </dd>";
		echo "</dl> ";

 		echo "<dl>";
			echo "<dt><label>InvNoH</label></dt>";
			//     <!--<dd><input type="text" name="InvNo" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoH' value=";
			print $row['InvNoH'];
			echo "> </dd>";
		echo "</dl>";
 		echo "<dl>";
			echo "<dt><label>InvNoHincl</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNoHincl' value=";
			echo $row["InvNoHincl"];
			echo "> </dd>";
		echo "</dl> ";

		//$objResult;
 }

}

//oracle: oci_free_statement($objParse);
//oci_free_statement($stid);
//oracle: oci_close($conn);

		/*<dl>
			<dt><label>* First Name<?php //echo $this->lang->line('Trans_fn'); ?>: </label></dt>
			<!--<dd><input type="text" name="Trans_name" id="Trans_fn" value="<?php //echo $this->mdl_Transs->form_value('Trans_name'); ?>" /></dd>-->
			<dd><input type="text" name="TransFName" /></dd>
		</dl>
*/
?>
<!--
<div>
		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
<!--			<dd><input type="submit" name="btn_submit" value="Submit/Save" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
<!--			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>
</div>
</form>
-->





<?php

/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/

?>



