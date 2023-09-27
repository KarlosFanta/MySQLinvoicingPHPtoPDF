<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a Transomer";
	require_once('header.php');	
	//require_once ('db.php');//mysqli connection and databse selection
		require_once("inc_OnlineStoreDB.php");

?>
<head>
<meta charset="UTF-8">
</head>

<form name="Edit_trans_process" action="edit_trans_CustProcessC2.php" method="post">


<?php

include "monthtables.php";
$First = '';
isset($_SESSION);
isset($_SESSION['CustNo']);
session_status() == PHP_SESSION_ACTIVE;
@session_start();
if (isset($_SESSION['CustNo']))  //works if session was destroyed
{
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";

$CustInt = $_SESSION['CustNo'];
include "monthtablesdropdown.php";



$SQLStringC = "SELECT * FROM customer WHERE CustNo = $CustInt";
//echo $SQLString."B<r>";
if ($result = mysqli_query($DBConnect, $SQLStringC)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
print "$item1";
$item2 =  $row["CustFN"];



$item3 = $row["CustLN"];
$item4 = $row["Important"];

print "&nbsp;&nbsp;&nbsp;&nbsp;".$item2;
print "&nbsp;&nbsp;&nbsp;&nbsp;".$item3;
$item4 = str_replace("Â", " ", $item4); //removesÂ
$item4 = str_replace("  ", " ", $item4); //removesdouble spaces
$item4 = str_replace("&nbsp;&nbsp;", "&nbsp;", $item4); //removes%20
//$b = html_entity_decode($item4);
print "<br>IMPORTANT: &nbsp;&nbsp;&nbsp;&nbsp;".$item4.""; //$b;

}}
?>



<b><font size = "4" type="arial">Edit <?php echo $item3 ?>'s transactions</b></font>
</br>


</br>
<select name="Fbjk4" onchange='this.form.submit()'>

<option value="_no_selection_">Select transaction to be updated</option>";

<?php

$SQLString = "SELECT * FROM transaction WHERE CustNo = $CustInt order by TransDate desc";
if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["TransNo"];
print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];


$item3 = $row["TransDate"];
$item4 = $row["AmtPaid"];
$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$InvA = $row["InvNoA"];
$InvNoB = $row["InvNoB"];
$InvNoC = $row["InvNoC"];
$item6 = str_replace("%20", " ", $item6); //removes%20


$item8 = $row["InvNoA"];
if ($item8 == 0)
$item8 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//print "_".$item2; //CustNo
print "_".$item8;
print "_R".$item4;
print "_".$item3;

print "_".$item6;
print "_".$item5;

print "_".$InvA;
print "_".$InvNoB;
print "_".$InvNoC;


print " </option>"; 

	}

mysqli_free_result($result);

}

?>
</select>

	<br>
<input type="submit" name="btn_submit" value="Update selected transaction" /> 
	
</p>  
<a href= "edit_trans_CustProcessCunresolved.php">Only Show unresolved</a>

































<?php
$indesc = 0;
$ShowDraft = "N";
include "view_Underpaid_inv_by_cust2b.php";
include "view_Unpaid_inv_by_cust2bATb.php";
include "view_Overpaid_inv_by_cust2b.php";
include ("view_trans_by_cust.php");
include ("view_inv_by_cust.php");





echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";
$outst = $Invsummm - $yo;
if (($Invsummm - $yo) > 0)
echo "<b>Total Amount oustanding: R".number_format((float)$outst, 2, '.', '')."</b><BR />";
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
    $result->close();
	
}
echo "</table>";

?>


<br />
<p>.</p>






<?php


}
else
{
//echo "<option value='_no_selection_'>Select Customer</option>";
//include ('selectCust.php');
echo "no session selected";
echo "<font size = 3><br><a href= 'selectCust.php'>Click here to select the customer: selectCust.php'</a></font>";

}


?> 



