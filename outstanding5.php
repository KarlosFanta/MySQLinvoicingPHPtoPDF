<?php	//this is "edit_trans_CustProcess.php"
 $page_title = "Outstanding payments of ALL customers";
	require_once('header.php');	
	require_once("inc_OnlineStoreDB.php");
$pr = "N";
//$pr = $_POST['pr']; //inv descriptions
$pm = "N";
//$pm = $_POST['pm']; //inv descriptions
$ev= "N";
$in= "N";
//$ev = $_POST['ev']; //inv descriptions
$DisplayInvPdStatus  = "N";
$Invsummm = 0;
?>
<form name="Edit_trans_process" action="edit_trans_process_last.php" method="post">


<?php

echo "<b>ALL outstanding CUSTOMERS</b>    Date: ".date("j M Y")." <BR />";

/*
SELECT * FROM customer where CustNo = $CustInt "
SELECT * FROM transaction WHERE CustNo = $CustInt order by transdate
$CN = $row[1];   CustNo
$yo = $yo+$row[3];  AmtPaid
$SQLstring = "select * from invoice where CustNo = $CustInt";
$Invsummm = $Invsummm + $row[29];  >> TotAmt
*/


$queryS = "Select c.custno, tr.CustNo, tr.AmtPaid, i.TotAmt from customer c, transaction tr, invoice i where ( c.custno = tr.CustNo = i.CustNo)";
if ($resultS = mysqli_query($DBConnect, $queryS)) {
  while ($row2 = mysqli_fetch_assoc($resultS)) {
 
$item1b = $row2["c.CustNo"];
//$item2b =  $row2["tr.AmtPaid"];
//$item3b = $row2["i.TotAmt"];
//print "<option value='$item1b'>$item2b";

echo "<option  value='";
//echo $item1."@ ";
echo $item1b;
echo "'>";
//echo $item2b;

// echo "____".$CNN; //selected customer of current session
 print "_".$item1b;
//echo "kjbjkbkjb";
//print "_".$item3b;


print " </option>"; 
	}
mysqli_free_result($resultS);
}


?>

