<?php	//this is "edit_trans_CustProcess.php"
 $page_title = "You seleted a Transomer";
	//require_once('header.php');	
	//require_once ('db.php');//mysqli connection and databse selection
		require_once("inc_OnlineStoreDB.php");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>

	<TITLE>Statement<?php  echo "-".date("j_M_Y_G:i");?></TITLE>
	<meta charset="UTF-8">
<!--<link rel="stylesheet" type="text/css" href="invoice.css" />-->

<?php
$pr = "20";
$pr = $_POST['pr']; //inv descriptions
echo "<input type='hidden' name='pr' value='".$pr."'>";
$pm = "20";
$pm = $_POST['pm']; //inv descriptions
//echo $pm;
echo "<input type='hidden' name='pm' value='".$pm."'>";
$ev= "20";
$ev = $_POST['ev']; //inv descriptions
echo "<input type='hidden' name='ev' value='".$ev."'>";

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for updating before we change him on the last form.
$TBLrow = "0";
$TBLrow = $_POST['TBLrow'];
echo "<input type='hidden' id='TBLrow'  name='TBLrow' value=".$TBLrow;
$in = "0";
$in = $_POST['in'];
echo "<input type='hidden' name='in' value='".$in."'>";
$un = @$_POST['un'];
echo "<input type='hidden' name='un' value='".$un."'>";
//echo "uuuun:".$un;
$indesc = $_POST['indesc'];
echo "<input type='hidden' name='indesc' value='".$indesc."'>";
$DisplayInvPdStatus = $_POST['DisplayInvPdStatus'];
echo "<input type='hidden' name='DisplayInvPdStatus' value='".$DisplayInvPdStatus."'>";



echo "<b>DRAFT STATEMENT </b>&nbsp;&nbsp;This statement may be incomplete  &nbsp;&nbsp;&nbsp;  Date: ".date("j M Y G:i")." <BR />";
//echo "TBLrow: " .$TBLrow."</BR>";
//echo "TBLrow0: " .$TBLrow[0]."</BR>";
//echo "TBLrow1: " .$TBLrow[1]."</BR>";
//echo "TBLrow2: " .$TBLrow[2]."</BR>";
$CustNo = explode('_', $TBLrow );
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
$CustInt = intval($CustNo[0]);

//echo "<br>CustInt:".$CustInt."</br />";


//  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q


$query =("SELECT * FROM customer where CustNo = $CustInt ");

if ($result = $DBConnect->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
//$id =  $row_list['id'];
//$name = $row_list['name'];
//$email = $row_list['email'];
$CustNo =  $row['CustNo'];
$CustFN =  $row['CustFN'];
$CustLN =  $row['CustLN'];
$CustEmail =  $row['CustEmail'];
$CustTel =  $row['CustTel'];
$CustCell =  $row['CustCell'];

$Abbr =  $row['ABBR'];







		}

    // free result set
    $result->free();
}


echo "Customer: ";
//echo $CustNo;
//echo " ";
echo $CustLN;
echo " ";
echo $CustFN;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustEmail;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustCell;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustTel;







echo "<BR />Account No ".$TBLrow."</BR>"   ;
/*if ($ev == "Y")
{
//echo "<br />view_event_by_cust.php<br />";
include ("view_event_by_cust.php");
}
*/
include ("view_trans_by_cust.php");


?> 
<!--<b><br><font size = "4" type="arial">Customer's Invoices</b></font>
</br>-->
<?php


//echo "<br />view_inv_by_cust.php<br />";
include ("view_inv_by_cust.php");

echo "<table border = 0><tr><th>";
echo "All invoices total to: </th><th align=left>R".number_format($Invsummm, 2, '.', ' ')."</th></tr>";
echo "<tr><th>All transactions total to: </th><th align=right>R".number_format($yo, 2, '.', ' ')."</th></tr>";

if (($Invsummm - $yo) > 0)
echo "<tr><th><b>Total Amount outstanding: </th><th align=right>R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b>";
else
echo "<tr><th><b>Total Amount owing to you: </th><th align=right>R".number_format(-($Invsummm - $yo), 2, '.', ' ')."</b>";

echo "</th></tr></table>";



?>
 
 			
 
 
 
 
 
<BR />Please view the above draft statement and kindly arrange for payment.<BR />
 <BR />
Recommended statement description (DR): <?php //echo  "acc ".$TBLrow.","; 
echo $Abbr ?> stm<BR />
Beneficiary statement description (CR): <?php //echo  "acc ".$TBLrow.","; 
echo $Abbr  ?> stm<BR />
 <BR />
NB: For cash payments please make sure you have a receipt with my signature.<BR />
 <BR />
<BR />
(EFT) Banking details:<BR />
 Account holder: KARL<BR />
 Bank: Nedbank Limited(/Nedcor)<BR />
 Account Number: 1230583114<BR />
 Branch No: 198765(universal)<BR />
( Branch: Go Banking CT Gardens Centre(South Western Cape) )<BR />
 Type of Account: Current cheque account<BR />
 <BR />
Proof of payment can be sent to: cyberkarl3@gmail.com<BR />
 <BR />

(other branch codes:  19876500,123009, 12300900 )<BR />
<BR />
VAT no  4390243923  as from 1.3.2008<BR />
 <BR />
Thank you<BR />
Karl<BR />
PC and Notebook Sales  & Advanced I.T. Support<BR />
Karl's Fast Internet and Webhosting Solutions<BR />
www.kconnect.co.za<BR />

Fax: 0865492415<BR />
Skype: cyberkarl3 <BR />
 <BR />














































<?php

//echo "<br />view_inv_by_cust2.php<br />";
//include ("view_inv_by_cust2.php");

/*echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

//check negative value:
//echo "<b>********Total Amount : R".($Invsummm - $yo)."</b><BR />";

if (($Invsummm - $yo) > 0)
echo "<b>Total Amount oustanding: R".($Invsummm - $yo)."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - $yo)."</b><BR />";

*/









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



