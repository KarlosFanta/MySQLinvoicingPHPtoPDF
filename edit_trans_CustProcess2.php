<?php	//this is "edit_trans_CustProcess.php"
 $page_title = "You seleted a Transomer";
	require_once('header.php');	
	//require_once ('db.php');//mysqli connection and databse selection
		require_once("inc_OnlineStoreDB.php");

?>
<form name="Edit_trans_CustProcess" action="print_statement.php" method="post">


<?php
   @session_start();
/*
Display paid reconciled invoices and reconciled transactions:
<input type="text" name="un" value= "Y" >
How many invoices of transaction  to display on the right:
<input type="text" name="in" value= "2" >
How many invoices descriptions to display on the right:
<input type="text" name="indesc" value= "0" >
Display invPd Status: Y/N
<input type="text" name="DisplayInvPdStatus"  value= "N"  >
Display invPd Status: Y/N
<input type="text" name="InvPdStatus"  value= "N"  >
Display trans priority: Y/N
<input type="text" name="pr" value= "N"   >
Display payment method: Y/N
<input type="text" name="pm" value= "N"   >
Display events: Y/N
<input type="text" name="ev" value= "Y"   >
*/

/////////   Display reconciled invoices and reconciled transactions:
//echo "teeeee1:un:".$un;


echo "<br>";
if (@$un == "Y")
$un = 'Y';
else
if (@$un == "")
$un = @$_POST['un'];
else
  $un = 'N';
//echo "teeeee1:un:".$un."<br><br>";
echo "<input type='hidden' name='un' value='".$un."'>";/////////   Display reconciled invoices and reconciled transactions:

if (@$pr == '')
    $pr = "20";
$pr = @$_POST['pr']; //inv descriptions
echo "<input type='hidden' name='pr' value='".$pr."'>";
$pm = "20";
$pm = @$_POST['pm']; //inv descriptions
//echo "pm:".$pm;
echo "<input type='hidden' name='pm' value='".$pm."'>";
$ev= "20";
$ev = @$_POST['ev']; //inv descriptions
echo "<input type='hidden' name='ev' value='".$ev."'>";

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for updating before we change him on the last form.

$TBLrow = @$_POST['mydropdownEC'];
echo "<input type='hidden' name='TBLrow' value='".$TBLrow."'>";

if (@$in == '')
$in = @$_POST['in'];
echo "<input type='hidden' name='in' value='".$in."'>";

if (@$indesc == '')
$indesc = @$_POST['indesc'];
echo "<input type='hidden' name='indesc' value='".$indesc."'>";
$DisplayInvPdStatus = @$_POST['DisplayInvPdStatus'];
echo "<input type='hidden' name='DisplayInvPdStatus' value='".$DisplayInvPdStatus."'>";



echo "<b>DRAFT STATEMENT </b>&nbsp;&nbsp;.This statement may be incomplete  &nbsp;&nbsp;&nbsp;  Date: ".date("j M Y G:i")." <BR />";
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
if ($CustInt == 0)
 $CustInt = intval($_SESSION['CustNo'] );
if ($CustInt == '')
 $CustInt = intval($_SESSION['CustNo'] );
 
 
//echo "<br>CustInt:".$CustInt."</br />";


//  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q


$query =("SELECT * FROM customer where CustNo = $CustInt ");
//echo $query;
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

    /* free result set */
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
echo "<BR />Account No ".$TBLrow."</BR>"   ;


include ("viewUnReconciledProofsByCust.php");
echo "<br>";
include ("view_trans_by_custUNDERorOVERPAID2.php");
echo "<br>";
include ("view_trans_by_custUNRECONCILED.php");

/*
echo "<BR />All past transactions:<BR />" ;
//echo "in: ".$in."<br>";
//echo "indes: ".$indesc."<br>";

$yo = 0;
$SQLstring = "SELECT * FROM transaction WHERE CustNo = $CustInt order by transdate";
//echo $SQLstring."; <br /><br />";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);

if ($result = $DBConnect->query($SQLstring)) {//from transaction table
echo "<table width='10' border='1'>\n";
echo "<tr><th>Transaction No</th>";
//echo "<th>CustNo</th>";
echo "<th>Transfer_Date</th>";
echo "<th>AmtPaid</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

if ($pm == "Y")
echo "<th>Payment Method</th>";

if ($in >0)
echo "<th>InvNoA</th>";
if ($indesc >0)
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
 if ($pr == "Y"){
echo "<th>Priority</th>\n";
}
echo "<th>SDR</th>\n";
echo "</tr>\n";

    // fetch object array
    while ($row = $result->fetch_row()) {  //from transaction table
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";  //TransNo from transaction table
//echo "<th>{$row[1]}</th>";       //CustNofrom transaction table
$CN = $row[1];                  //CustNO from transaction table
//$SQLstringLN = "select Summary from invoice where CustNo = $CN";
//$SQLstringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLstringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO from transaction table
echo "<th>{$row[2]}</th>";  //TransDate from transaction table
echo "<th>{$row[3]}</th>";  //AmtPaid from transaction table
$yo = $yo+$row[3];






echo "<th>{$row[4]}</th>\n";  //Notesfrom transaction table
if ($pm == "Y")
echo "<th>{$row[5]}</th>\n";  //TMethfrom transaction table




if ($in >0)
echo "<th>{$row[6]}</th>\n";  //InvNoA  from transaction table
if ($indesc >0)
echo "<th>{$row[7]}</th>\n";  //InAincl  from transaction table

if ($in >1)
echo "<th>{$row[8]}</th>\n";  //InvNoB from transaction table
if ($indesc >1)
echo "<th>{$row[9]}</th>\n";  //Binvl from transaction table

 if ($in >2)
echo "<th>{$row[10]}</th>\n";  //InvNoCfrom transaction table
if ($indesc >2)
echo "<th>{$row[11]}</th>\n";  //Cincl from transaction table

 if ($in >3)
echo "<th>{$row[12]}</th>\n";  //from transaction table
if ($indesc >3)
echo "<th>{$row[13]}</th>\n";  //inclfrom transaction table

 if ($in >4)
echo "<th>{$row[14]}</th>\n";  //from transaction table
if ($indesc >4)
echo "<th>{$row[15]}</th>\n";  //inclfrom transaction table

 if ($in >5)
echo "<th>{$row[16]}</th>\n";  //from transaction table
if ($indesc >5)
echo "<th>{$row[17]}</th>\n";  //incl from transaction table

 if ($in >6)
echo "<th>{$row[18]}</th>\n";  //from transaction table
if ($indesc >6)
echo "<th>{$row[19]}</th>\n";  // incl from transaction table

 if ($in >7)
echo "<th>{$row[20]}</th>\n";  //from transaction table
if ($indesc >7)
echo "<th>{$row[21]}</th>\n";  //incl from transaction table
 if ($pr == "Y"){
echo "<th>{$row[22]}</th>\n";  //SDR/Priority from transaction table
		}
echo "<th>{$row[23]}</th>\n";  //SDR/Priority from transaction table
echo "</tr>\n";  //end row transaction table

}
$result->close();
	
}
echo "</table>";
echo "All transactions total to: R".$yo."<br>";

*/
?> 
<!--<b><br><font size = "4" type="arial">Customer's Invoices</b></font>
</br>-->
<?php


//echo "<br />view_inv_by_cust.php<br />";
include ("view_inv_by_custADV.php");





echo "<br><table border = 0><tr><th>";
if ($un == 'Y')
echo "All invoices total to: </th><th align=left>R".number_format($Invsummm, 2, '.', ' ')."</th></tr>";

else
echo "All unpaid invoices total to: </th><th align=left>R".number_format($UnpaidInvsummm, 2, '.', ' ')."</th></tr>";






if ($un == 'Y')
echo "<tr><th>All transactions total to: </th><th align=right>R".number_format($yo, 2, '.', ' ')."</th></tr>";
else
echo "<tr><th>All Unreconciled transactions Paid totals to: </th><th align=right>R".number_format($summm, 2, '.', ' ')."</th></tr>";
//echo "<tr><th>All transactions total to: </th><th align=right>R".number_format($yo, 2, '.', ' ')."</th></tr>";



if ($un == 'Y')
{
if (($Invsummm - $yo) > 0.06)
echo "<tr><th><b>Total Amount outstanding: </th><th align=right>R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
if (($Invsummm - $yo) > -0.01)
echo "<tr><th><b>Balance: </th><th align=right>R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<tr><th><b>Total Amount owing to you: </th><th align=right>R".number_format(-($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
echo "</th></tr></table>";
}
else
{
if (($UnpaidInvsummm - $summm) > 0.06)
echo "<tr><th><b>Total Amount outstanding: </th><th align=right>R".number_format(($UnpaidInvsummm - $summm), 2, '.', ' ')."</b><BR />";
else
if (($UnpaidInvsummm - $summm) > -0.01)
echo "<tr><th><b>Balance: </th><th align=right>R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<tr><th><b>Total Amount owing to you: </th><th align=right>R".number_format(-($UnpaidInvsummm - $summm), 2, '.', ' ')."</b><BR />";
echo "</th></tr></table>";
}


echo "stmEmail";
include "stmEmail.php";
?>
 
 			
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />--> 
			<input type="submit" name="btn_submit" value="Display statement for printing"  /> 

 
 
 <!--
 
 
<BR />Please view the above draft statement and kindly arrange for payment.<BR />
 <BR />
Recommended statement description (DR): <?php //echo  "acc ".$TBLrow.","; 
//echo $Abbr ?> stm<BR />
Beneficiary statement description (CR): <?php //echo  "acc ".$TBLrow.","; 
//echo $Abbr  ?> stm<BR />
 <BR />
NB: For cash payments please make sure you have a receipt with my signature.<BR />
 <BR />
<BR />
(EFT) Banking details:<BR />
 Account holder: KARl<BR />
 Bank: Nedbank Limited(/Nedcor)<BR />
 Account Number: 1230583114<BR />
 Branch No: 198765(universal)<BR />
( Branch: Go Banking CT Gardens Centre(South Western Cape) )<BR />
 Type of Account: Current cheque account<BR />
 <BR />
Proof of payment can be sent to: cyberkarl3@gmail.com (or info@karl.co.za)<BR />
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
084 448 5289  (/021 4244419)<BR />
Fax: 0865492415<BR />
Skype: cyberkarl3 <BR />
 <BR />
-->
</form>


<?php



if ($ev == "Y")
{
//echo "<br />view_event_by_cust.php<br />";
include ("view_event_by_cust.php");
}

//echo "teeeee:".$un;

//echo "un:".$un;
//echo "<br />view_inv_by_cust2.php<br />";
//include ("view_inv_by_cust2.php");
echo "<br />";

//echo "<BR />Invoices total to: R".$Invsummm."<br />";
//echo "All transactions total to: R".$yo."<br>";

//check negative value:
//echo "<b>********Total Amount : R".($Invsummm - $yo)."</b><BR />";
/*
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






