<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a Transomer";
	require_once 'header.php';
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection
?>
<form name="Edit_trans_process" action="edit_trans_process_last.php" method="post">


<?php

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for updating before we change him on the last form.

$TBLrow = $_POST['mydropdownEC'];

echo "TBLrow: " .$TBLrow."</BR>";
$TransNo = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$TransNo</br />";
//$TransNo = strtok(";");
//}
//echo "TransNozERO: ";
//echo $TransNo[0]."</br />";
$TransInt = intval($TransNo[0]);

echo "<br>Transint:".$TransInt."</br />";

//$sql = "SELECT TransNo, TransFN, TransLN, TransTel, TransCell, TransEmail, TransAddr, Distance FROM Transomer WHERE TransNo = $TransInt" ;
$query = "SELECT * FROM transaction WHERE TransNo = $TransInt" ;
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
echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
echo "Thank you for selecting transaction ".$TBLrow." from your database. You may now change the details:</BR>"   ;

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
 */
// while ($row = mysql_fetch_assoc($objResult)) {
if ($result = mysqli_query($DBConnect, $query)) {
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

 		echo "<dl>";
			echo "<dt><label>Priority</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='Priority' value=";
			echo $row["Priority"];
			echo "> </dd>";
		echo "</dl> ";
 		echo "<dl>";
			echo "<dt><label>CustSDR</label></dt>";
			//     <!--<dd><input type="text" name="InvNoincl" id="Trans_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='CustSDR' value=";
			echo $row["CustSDR"];
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
<div>
		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<dd><input type="submit" name="btn_submit" value="Submit/Save" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>
		</dl>
</div>
</form>






<?php
/*$message = 'You have deleted '.$TBLrow.'  from your Oracle database.';
echo "<SCRIPT>
alert('$message');
</SCRIPT>";

*/
?>



