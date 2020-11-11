<?php
require_once 'inc_OnlineStoreDB.php';//page567
require_once 'header.php';//page567


// $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q
//$result = mysql_query($query) or die(mysql_error());
$daNextNo = 1; //default if table is completely empty.
$query = "SELECT MAX(InvNo)  AS MAXNUM FROM invoice"; ///CORRECT!! DO NOT REMOVE!!!!
$result = $DBConnect->query($query);

/*while($row = mysqli_fetch_array($result)){
//	echo "The max no InvNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}*/
$row = $result->fetch_array(MYSQLI_NUM);
//printf ("%s (%s)\n", $row[0], $row[0]);
$InvNo = $row[0];
$InvNo = $InvNo+1;

//echo "The max no InvNo in customer table is:  ". $row[0] . "&nbsp;";

	//$InvDate = $_POST['Date1'];
	//$Summary = $_POST['Summary'];

	//$CustInt = intval($Custno[0]);
	//echo "Make sure an invoice is selected.<br>";
	$TBLrow = $_POST['mydropdownDC'];
	//echo $TBLrow;
	//echo " 0: ".$TBLrow[0]."<br>";
	//$Custno = explode( "_", $TBLrow);
	//echo "___:".$CustInt."   ";

$Custno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Custno</br />";
//$Custno = strtok(";");
//}
//echo "CustnozERO: ";
//echo $Custno[0]."</br />";
$CustInt = intval($Custno[0]);

//echo "<br>Custint:".$CustInt."</br />";
//	echo " Selected Customer : ". $CustInt ."<br>";

//$query = "SELECT CustNo, CustFN, CustLN, CustTel, CustCell, CustEmail, CustAddr, Distance FROM customer WHERE CustNo = $CustInt" ;
//$query = "SELECT CustNO, CustLN FROM customer WHERE CustNo = $CustInt" ;
$query = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

//echo "Q:".$query;
	  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q

if ($result2 = $DBConnect->query($query)) {

    while ($row2 = $result2->fetch_assoc()) {
       // printf ("%s (%s)\n", $row2['CustNo'], $row2['CustFN']);
	///	$TransNo_Check = $row[0];

			//echo "selected CustomerNo: ".$row2['CustNo']."<br>";
			//echo "selected CustomerLN: ".$row2['CustLN']."<br>";
echo "<table width='10' border='1'>\n";
echo "<tr><th>CustNo</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "<th>Tel</th>";
echo "<th>Cell</th>";
echo "<th>Email</th>";
echo "<th>Address</th>";
echo "<th>Distance</th>";
//echo "<th>LastLogin</th>";
//echo "<th>CustPW</th></tr>\n";

echo "<tr><th>{$row2['CustNo']}</th>";
echo "<th>{$row2['CustFN']}</th>";
echo "<th>{$row2['CustLN']}</th>";
echo "<th>{$row2['CustTel']}</th>";
echo "<th>{$row2['CustCell']}</th>";
echo "<th>{$row2['CustEmail']}</th>";
echo "<th>{$row2['CustAddr']}</th>";
echo "<th>{$row2['Distance']} km</th>";
//echo "<th>{$row2['LastLogin']}</th>";
//echo "<th>{$row2['CustPW']}</th></tr>\n";
//echo "<td>{$row[5]}</td></tr>\n";

    /* free result set */
    $result->close();

}
echo "</table>";

	}









	$OrdPd = "_";

//$D1 = explode("/", $InvDate);
/*echo $D1[2]."____";

echo $D1[0]."____";
echo $D1[1]."____";
*/
//$InvSQLDate = $D1[2]."-".$D1[1]."-".$D1[0];

//echo "<br>InvSQLdate: ".$InvSQLDate." ___<br>";

?>
<form name="AddInv" action="addInvprocess_lastC.php" method="post">


<?php

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the invoice before we change him on the last form.


//echo "TBLrow: " .$TBLrow."</BR>";

//while ($TBLrow !=NULL) {
//echo "$Invno</br />";
//$Invno = strtok(";");
//}
//echo "InvnozERO: ";
//echo $Invno[0]."</br />";
//$InvNo = intval($Invno[0]);

//echo "<br>InvNo:".$InvNo."</br />";

//$sql = "SELECT InvNo,  FROM invoice WHERE InvNo = $InvNo" ;
//$query = "SELECT * FROM invoice WHERE InvNo = $InvNo" ;
//$sql = "DELETE FROM invoice WHERE InvNo = $InvNo" ;
//$sql = "TRUNCATE TABLE ' . $TBLname . '";   >>> THIS WAS MY PROBLEM!!!
//$stmt = OCIParse($conn, $sql);
//OCIExecute($stmt);
//oci_fetch_all($stmt, $res); multi-dimensional array
//echo "<pre>\n";
//var_dump($res);
//echo "</pre>\n";

//$stid = oci_parse($conn, $sql);
//oci_execute($stid);
///echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
//echo "Thank you for selecting ".$TBLrow." from your database. You may now change its details.</BR>"   ;

//$objResult = mysql_query($sql) or die(mysql_error());

//oracle: $objParse = oci_parse($conn, $sql);
//oracle: oci_execute ($objParse,OCI_DEFAULT);

//while (($row = oci_fetch_array($stid, OCI_BOTH))) {
//while (($row = oci_fetch_array($stid, OCI_RETURN_NULLS))) {
//oracle: while($objResult = oci_fetch_array($objParse,OCI_RETURN_NULLS)) {
    // Use the uppercase column names for the associative array indices
// while ($row = mysql_fetch_assoc($objResult)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {


 		echo "<dl><label>InvoiceNo: </label>";
			echo "<input type='text' name='InvNo'  value=";
			echo $InvNo;
			echo "> </dt></dd>";
		echo "</dl>";

 		echo "<dl>";
			echo "Customer: ";
			echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
			echo " ";
			echo $row['CustLN'];
	//		echo "&nbsp;&nbsp;Account No: ";
	//		echo $row['CustNo'];

			// DO NOT DISABLE!!! addInvprocess_lastC needs to know which customer got selected!!
			//There is no inserting here yet!!!
			echo " <input type='text' name='CustNo' value=";
			echo " ";
			echo $row['CustNo'];
			echo "> ";
		echo "</dl>";

 		echo "<dl><label>InvDate:&nbsp;&nbsp;&nbsp;&nbsp;</label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='InvDate' value=";
			echo $InvDate;
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>Summary: &nbsp;</label>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='Summary' size='45'  value=";
			echo "_";
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>Total Amount incl VAT</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='TotAmt' value=";
			echo "0";
			echo "> </dd>";
		echo "</dl>";

 		echo "<dl>Inv Sent or Paid? (InvPdStatus)</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<input type='text' name='InvPdStatus' value=";
			echo "_";
			echo "> </dd>";
		echo "</dl>";

echo"<TABLE WIDTH=90% BORDER=1 CELLPADDING=2 CELLSPACING=0>";
echo "<COL WIDTH=40*>		<COL WIDTH=57*>		<COL WIDTH=30*>";
echo"<TR>
		<TH WIDTH=52%><label>Description1</label>
		</th>
		<TH WIDTH=11%><label>Qty1</label>
		</th>
		<TH WIDTH=23%><label>Price ex VAT</label>
		</th>
	</TR>
	<TR>
		<th><input type='text' name='D1' size='45'  value='0'>
		</th>
		<th><input type='text' name='Q1'  size='5' value='0'>
		</th>
		<th>
			<input type='text' name='ex1'  size='5' value='0'>
		</th>
	</TR>
	<TR>
		<th><input type='text' name='D2' size='45'  value='0'>
		</th>
		<th><input type='text' name='Q2'  size='5' value='0'>
		</th>
		<th>
			<input type='text' name='ex2'  size='5' value='0'>
		</th>
	</TR>

	<TR>
		<th><input type='text' name='D3' size='45'  value='0'>
		</th>
		<th><input type='text' name='Q3' size='5'  value='0'>
		</th>
		<th>
			<input type='text' name='ex3'  size='5' value='0'>
		</th>
	</TR>

	<TR>
		<th><input type='text' name='D4' size='45'  value='0'>
		</th>
		<th><input type='text' name='Q4' size='5' value='0'>
		</th>
		<th>
			<input type='text' name='ex4'  size='5' value='0'>
		</th>
	</TR>

	<TR>
		<th><input type='text' name='D5' size='45'  value='0'>
		</th>
		<th><input type='text' name='Q5'  size='5' value='0'>
		</th>
		<th>
			<input type='text' name='ex5'  size='5' value='0'>
		</th>
	</TR>

	<TR>
		<th><input type='text' name='D6' size='45'  value='0'>
		</th>
		<th><input type='text' name='Q6'  size='5' value='0'>
		</th>
		<th>
			<input type='text' name='ex6'  size='5'   value='0'>
		</th>
	</TR>

	<TR>
		<th><input type='text' name='D7' size='45'  value='0'>
		</th>
		<th><input type='text' name='Q7'  size='5' value='0'>
		</th>
		<th>
			<input type='text' name='ex7'  size='5' value='0'>
		</th>
	</TR>

	<TR>
		<th><input type='text' name='D8' size='45'  value='0'>
		</th>
		<th><input type='text' name='Q8'  size='5' value='0'>
		</th>
		<th>
			<input type='text' name='ex8' size='5'  value='0'>
		</th>
	</TR>




	</table>";
	}
	}
	?>


<div>
		<dl>
			<dt></dt>
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />-->
			<dd><input type="submit" name="btn_submit" value="Submit/Save" onclick="return confirm('SURE ABOUT INVOICE NUMBER??? Did u copy the total amount to the invoice total?')" />

			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
			<!--<input type="reset" name="btn_reset" value="Cancel/Reset" /></dd>-->
		</dl>
</div>
</form>
<?php
include ("view_inv_by_cust.php");

//require_once 'view_inv_one.php';

?>

</body>
</html>

