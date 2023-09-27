	<title>All invoices of customer</title>
<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "All invoices all customers";
	//require_once('header.php');	
	//require_once('db.php');	
	require_once("inc_OnlineStoreDB.php");
			

?> 
<?php //require_once "header.php"; ?>
<b><br><font size = "4" type="arial">View Invoices</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;view_inv.php
<br>
<a href= view_invD.php>view_invD.php by Date</a><br>
<a href= view_inv2.php>view_inv2.php</a>
<br><a href= view_invonlysummary.php>view_invonlysummary.php</a>
<br><a href= view_invCost.php>view_invCost.php</a>
</br>




<b><font size = "4" type="arial">View Invoices</b></font>
</br>
<form name="selField" onsubmit="return formValidator()" action="selectVCinv.php" method="post">

<?php
$CustNo = '';
//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";
if(isset($_GET["CustNo"])) echo "GET CustNo:".$CustNo."<br>";
	if (!empty($_POST["CustNo"])) {
		$CustNo = @$_POST['CustNo'];
    echo "Yes, CustNo is Post";    
}else  
	if (!empty($_GET["CustNo"])) {
		$CustNo = @$_GET['CustNo'];
    echo "Yes, CustNo is GET";    
}else{  
    //echo "No, CustNo is not set";
	@session_start();
	$CustNo = @$_SESSION['CustNo'];
echo $_SESSION['CustNo'];

} 

$queryS = "select CustNo, CustFN, CustLN, u1 from customer where CustNo = $CustNo";

$query = "select CustNo, CustFN, CustLN, u1 from customer ORDER BY custLN";
?>
<b><font size = "4" type="arial">invoices</b></font></font>

</br>
</br>





<b><br><font size = "4" type="arial">View Invoices</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;view_inv.php
<a href= view_inv2.php>view_inv2.php</a>
<a href= view_invonlydetails.php>view_invonlydetails.php</a>
</br>



<?php

$queryC = "select CustNo,CustFN,CustLN from customer where CustNo = $CustNo";
echo $queryC;
$row_cnt = 0;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultC)) {
echo "<tr>";
echo "<th>".$row["CustNo"]."</th>";//CustNo is case senSitiVe
echo "<th>".$row["CustFN"]."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";//CustFN is case senSitiVe
echo "<th>".$row["CustLN"]."";//CustLN is case senSitiVe
$row_cnt = mysqli_num_rows($resultC);
echo "</tr>\n";

}
mysqli_free_result($resultC);
}

echo "</table>";
echo "<br><br>Exclude ADSL invoices:<br><br>";











$SQLstring = "select * from invoice where CustNo = $CustNo and  Summary not like '%adsl' order by InvDate desc";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>ex2</th>";
echo "<th>D3</th>";
echo "<th>ex3</th>";
echo "<th>D4</th>";
echo "<th>ex4</th>";
echo "<th>D5</th>";
echo "<th>ex5</th>";
echo "<th>D6</th>";
echo "<th>ex6</th>";
echo "<th>D7</th>";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>ex8</th>";

echo "</tr>\n";


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];



	  echo "<tr><th>";
	  
	   echo $x;
echo "</th></FONT>";

echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";

$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."</th>\n";
echo "<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
//echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();
	
}
echo "</table>";


/*$ttt = range(4500,4569);
echo $ttt;
var_dump($ttt);
print_r($ttt);
*/
$SQLstring = "select * from invoice where CustNo = $CustNo  and  Summary like '%adsl'  order by InvDate desc";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>ex2</th>";
echo "<th>D3</th>";
echo "<th>ex3</th>";
echo "<th>D4</th>";
echo "<th>ex4</th>";
echo "<th>D5</th>";
echo "<th>ex5</th>";
echo "<th>D6</th>";
echo "<th>ex6</th>";
echo "<th>D7</th>";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>ex8</th>";

echo "</tr>\n";


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];



	  echo "<tr><th>";
	  
	   echo $x;
echo "</th></FONT>";

echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";

$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."<br>";


$queryE = "select * from expenses where InvNo = $x";
//echo $queryE;
$row_cnt = 0;
if ($resultE = mysqli_query($DBConnect, $queryE)) {
/*echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";
*/
while ($row = mysqli_fetch_assoc($resultE)) {
//echo "<tr><th>";
echo "<font color= green>ExpNo".$row["ExpNo"]." ";//CustNo is case senSitiVe
echo "".$row["ExpDesc"]."<br> ";//."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";//CustFN is case senSitiVe
//echo "<th>".$row["CustLN"]."";//CustLN is case senSitiVe
//$row_cnt = mysqli_num_rows($resultE);
//echo "</tr>\n";

}
mysqli_free_result($resultE);
}


echo "</th>\n";
echo "<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
//echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();
	
}
echo "</table>";















$SQLstring = "select * from invoice where CustNo = $CustNo  order by InvDate desc";
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>ex2</th>";
echo "<th>D3</th>";
echo "<th>ex3</th>";
echo "<th>D4</th>";
echo "<th>ex4</th>";
echo "<th>D5</th>";
echo "<th>ex5</th>";
echo "<th>D6</th>";
echo "<th>ex6</th>";
echo "<th>D7</th>";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>ex8</th>";

echo "</tr>\n";


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];



	  echo "<tr><th>";
	  
	   echo $x;
echo "</th></FONT>";

echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";

$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."<br>";


$queryE = "select * from expenses where InvNo = $x";
//echo $queryE;
$row_cnt = 0;
if ($resultE = mysqli_query($DBConnect, $queryE)) {
/*echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";
*/
while ($row = mysqli_fetch_assoc($resultE)) {
//echo "<tr><th>";
echo "<font color= green>ExpNo".$row["ExpNo"]." ";//CustNo is case senSitiVe
echo "".$row["ExpDesc"]."<br> ";//."<a href = '{$row["CustLN"]}?='{$row["CustLN"]}'></a></th>";//CustFN is case senSitiVe
//echo "<th>".$row["CustLN"]."";//CustLN is case senSitiVe
//$row_cnt = mysqli_num_rows($resultE);
//echo "</tr>\n";

}
mysqli_free_result($resultE);
}


echo "</th>\n";
echo "<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
//echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();
	
}
echo "</table>";


?>



</body>
</html>

