<?php	//this is "del_CustProcess.php"
 $page_title = "You seleted a Transomer";
	require_once('header.php');	
	//require_once ('db.php');//mysqli connection and databse selection
		require_once("inc_OnlineStoreDB.php");
?>
<form name="Del_event_process_lastNEXT" action="del_event_CustProcessC2.php" method="post">


<?php
$CustNo = $_POST['CustNo'];
echo "<input type='text' name='CustNo' value=";
			echo $CustNo;
			echo "> ";
$CustNo = $_POST['CustNo2'];
echo "<input type='text' name='CustNo' value=";
			echo $CustNo;
			echo "> ";
//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for updating before we change him on the last form.

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
$CustInt = intval($CustNo[0]);

echo "<input type='hidden' name='CustNo' value=";
			echo $CustInt ;
			echo "> ";


//echo "<br>CustInt:".$CustInt."</br />";


if ($CustInt ==  0)
$CustInt = $_POST['CustNo'];

/*if ($TBLrow == "*")
{
$item3 = "anyone";
$SQLString = "SELECT * FROM events order by EventNo desc";
}*/
else 
$SQLString = "SELECT * FROM events WHERE CustNo = $CustInt order by EventNo desc";

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


<b><font size = "4" type="arial">Delete <?php echo $item3 ?>'s events</b></font>
</br>
</br>

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select event to be deleted</option>";

<?php
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["EventNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];


$item3 = $row["EDate"];
//$item4 = $row["AmtPaid"];
$item5 = $row["ENotes"];

print "_".$item2;
print "_".$item3;
//print "_R".$item4;
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
/* close connection */
//$mysqli->close();
?>
<input type="submit" name="btn_submit" value="Delete selected event" /> 
	
</select></p>  
























<?php


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
echo "</tr>\n";  //Priority from transaction table
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



?> 



