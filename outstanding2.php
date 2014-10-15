
<?php

//






//WARNING!!!
//THIS FILE WORKS TOGHERTER WITH outstanding.php














//echo "<br>Cust Int:".$CustInt."</br />";


//  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q


$queryC1 =("SELECT * FROM customer where CustNo = $CustInt ");
$Invsummm = 0;
if ($resultC1 = $DBConnect->query($queryC1)) {

    /* fetch associative array */
    while ($row = $resultC1->fetch_assoc()) {
        //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
//$id =  $row_list['id'];
//$name = $row_list['name'];
//$email = $row_list['email'];
$CustFN =  $row['CustFN'];
$CustLN =  $row['CustLN'];
$CustEmail =  $row['CustEmail'];
$CustTel =  $row['CustTel'];
$CustCell =  $row['CustCell'];
	}
    $resultC1->free();
}


//echo "Customerrrrr: ";
echo $CustInt;
echo " ";
echo $CustLN;
echo " ";
echo $CustFN;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustEmail;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustCell;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustTel;

if ($ev == "Y")
{
echo "<br />view_event_by_cust.php<br />";
include ("view_event_by_cust.php");
}
//echo "<BR />All past transactions:<BR />" ;

$yo = 0;
$SQLstring = "SELECT * FROM transaction WHERE CustNo = $CustInt order by transdate";

if ($resultT1 = $DBConnect->query($SQLstring)) {//from transaction table
/*echo "<table width='10' border='1'>\n";
echo "<tr><th>Transaction No</th>";
//echo "<th>CustNo</th>";
echo "<th>Transfer Date</th>";
echo "<th>AmtPaid</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

if ($pm == "Y")
echo "<th>Payment Method</th>";

if ($in >0){
echo "<th>InvNoA detail</th>";
echo "<th>InvNoA incl VAT</th>\n";
}
if ($in >1){
echo "<th>InvNoB detail</th>";
echo "<th>InvNoB incl VAT</th>\n";
} if ($in >2){
echo "<th>InvNoC detail</th>";
echo "<th>InvNoC incl VAT</th>\n";
} if ($in >3){
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
} if ($pr == "Y"){
echo "<th>Priority</th>\n";
}
echo "<th>SDR</th>\n";
echo "</tr>\n";

  */  while ($row = $resultT1->fetch_row()) {  //from transaction table
      //  printf ("%s (%s)\n", $row[0], $row[1]);
$CN = $row[1];   
$yo = $yo+$row[3];
/*echo "<tr><th>{$row[0]}</th>";  //TransNo from transaction table
//echo "<th>{$row[1]}</th>";       //CustNofrom transaction table
               //CustNO from transaction table
//$SQLstringLN = "select Summary from invoice where CustNo = $CN";
//$SQLstringLN = "select Summary from invoice where InvNo = $InvN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
//$result2 = $DBConnect->query($SQLstringLN);
//    while ($rowI = $result2->fetch_row()) {     //from invoice table- rowI

//echo "<th>{$rowI[0]}</th>";
//}
//echo "<th>CustNo{$row[1]}</th>";   //CustNO from transaction table
//echo "<th>{$row[2]}</th>";  //TransDate from transaction table
//echo "<th>{$row[3]}</th>";  //AmtPaid from transaction table




//echo "<th>{$row[4]}</th>\n";  //Notesfrom transaction table
if ($pm == "Y")
echo "<th>{$row[5]}</th>\n";  //TMethfrom transaction table
if ($in >1){
echo "<th>{$row[6]}</th>\n";  //Afrom transaction table
echo "<th>{$row[7]}</th>\n";  //Afrom transaction table

echo "<th>{$row[8]}</th>\n";  //Bfrom transaction table

echo "<th>{$row[9]}</th>\n";  //Bfrom transaction table
} if ($in >2){
echo "<th>{$row[10]}</th>\n";  //Cfrom transaction table
echo "<th>{$row[11]}</th>\n";  //Cfrom transaction table
} if ($in >3){
echo "<th>{$row[12]}</th>\n";  //from transaction table
echo "<th>{$row[13]}</th>\n";  //from transaction table
} if ($in >4){
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
} if ($pr == "Y"){
echo "<th>{$row[22]}</th>\n";  //Priority from transaction table
		}
echo "<th>{$row[23]}</th>\n";  //Priority from transaction table
echo "</tr>\n";  //end row transaction table
*/
}
$resultT1->close();
	
}
//echo "</table>";
//echo "All transactions total to: R".$yo."<br>";





$SQLstring = "select * from invoice where CustNo = $CustInt";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
//echo "";
if ($resultI1 = $DBConnect->query($SQLstring)) {
/*echo "<table width='10' border='1'>";
echo "<tr><th>InvNo</th>";
echo "<th>CustNo</th>";
echo "<th>CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>Summary</th>";
if ($DisplayInvPdStatus == 'Y')

echo "<th>Inv Paid Statusss</th>";


  */
    while ($row = $resultI1->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

/*echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";*/

/*echo "<th>{$row[2]}</th>";//invDate
echo "<th>{$row[3]}</th>";
if ($DisplayInvPdStatus == 'Y')
echo "<th>{$row[4]}</th>\n";//invpaidStatuts*/
$Invsummm = $Invsummm + $row[29];

//echo "</tr>\n";
		}
    /* free result set */
    $resultI1->close();
	
}
//echo "</table>";


	
echo "<BR />Invoices: R".$Invsummm."<br />";
echo "Transactions: R".$yo."<br>";
$out  = 0;
$out = $Invsummm - $yo;
if ($out > 30)
echo "<font color = 'red'><b>Outstanding R". round($out, 0);
else
if ($out > 0)
echo "<b>Outstanding R". round($out, 0);
else
if ($out > -300)
echo "<b>Credit R".-round($out, 0);
else
if ($out < -300)
{
echo "<font size = 4 color = 'blue'>OLD INVOICES INCOMPLETE";
echo "<b> R".round($out, 0)."</b><BR /><BR /><BR />";
}
echo "</font><br><br>";



?>

 
















