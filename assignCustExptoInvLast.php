<?php	//this is "editCustProcess.php"
 $page_title = "You seleted fileds";
	//require_once('header.php');	
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection

?>
<!DOCTYPE html>
<html>
<head>
<title>assignCustStktoInvLast</title>
<meta charset="UTF-8">
</head>

<body>

<?php
$mix='';
$InvNo = $_POST['InvNo'];
$CustNo = $_POST['CustNo'];
$SQLString = "SELECT * FROM customer WHERE CustNo = $CustNo" ;
//echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
echo 'CustNo: ';
$item1 = $row["CustNo"];
$item2 =  $row["CustFN"];
$item3 =  $row["CustLN"];
$item4 = $row["CustEmail"];
$Important = $row["Important"];
print "$item1";
print " ".$item2;
print " <b><Font size = 4>".$item3;
print "</font></b> ".$item4." ".$Important;
echo "..{$row['dotdot']}";
}
$result->free();
};
echo "<br><br>";
$SQLstringb = "SELECT * FROM invoice WHERE InvNo = '$InvNo'";
//echo "SQLstringb: ".$SQLstringb."<br>"; //if no result then this customer never had any invoices
if ($roww = mysqli_query($DBConnect, $SQLstringb)) {
while ($row = mysqli_fetch_assoc($roww)) {
echo 'InvNo: ';
echo $row['InvNo'];
echo '<br>';
echo $row['Summary'];
echo '<br>';
echo '<br>';
echo $row['D1'];
echo '<br>';
if ($row['D2']!='')
echo $row['D2'].'<br>';
if ($row['D3']!='')
echo $row['D3'].'<br>';
if ($row['D4']!='')
echo $row['D4'].'<br>';
if ($row['D5']!='')
echo $row['D5'].'<br>';
if ($row['D6']!='')
echo $row['D6'].'<br>';
if ($row['D7']!='')
{
echo $row['D7'];
echo '<br>';
}
if ($row['D8']!='');
echo $row['D8'];
}
mysqli_free_result($roww);
}
echo '<br>';



//echo "InvNo $InvNo <br>";
$aDoor = $_POST['formDoor'];
  if(empty($aDoor))
  {
    echo("You didn't select any columns.");
  }
  else
  {
    $N = count($aDoor);
 
 //   echo("You selected $N columns(s): ");
    for($i=0; $i < $N; $i++)
    {
//		echo ">>";
//      echo($aDoor[$i] . " <<<<br>");
	  
	$mix = $aDoor[$i];
$strin = strtok($mix, ", ") ;
	  
     // echo($strin . " <<<");  
    }
  }

$i = 0;
//echo "<br>";
   for($i=0; $i < $N; $i++)
    {
$ExpNoR= $aDoor[$i];







echo "<br><br><b>Expense previously belonged to: </b><br> ";

$SQLstringb = "SELECT * FROM expenses WHERE ExpNo = $ExpNoR";
//echo "SQLstringb: ".$SQLstringb."<br>"; //if no result then this customer never had any invoices
if ($roww = mysqli_query($DBConnect, $SQLstringb)) {
while ($row = mysqli_fetch_assoc($roww)) {
echo ' &nbsp;&nbsp;&nbsp;ExpNo:';
echo $row['ExpNo'];
echo ' &nbsp;&nbsp;&nbsp;CustNo:';
echo $row['CustNo'];
echo ' &nbsp;&nbsp;&nbsp;InvNo:';
echo $row['InvNo'];
echo ' &nbsp;&nbsp;&nbsp;';
echo $row['ExpDesc'];
echo ' &nbsp;&nbsp;&nbsp;';
echo ' ';
echo $row['SupCode'];
echo ' &nbsp;&nbsp;&nbsp;';
echo $row['PurchDate'].' &nbsp;&nbsp;&nbsp;R';
if ($row['ProdCostExVAT']!='')
echo $row['ProdCostExVAT'].'&nbsp;&nbsp;&nbsp; ';
if ($row['Notes']!='')
echo $row['Notes'].'<br>';

echo '<br>';
}
mysqli_free_result($roww);
}












$SQLquery = "UPDATE expenses SET InvNo = $InvNo WHERE ExpNo = $ExpNoR";
//echo "".$SQLquery."<br>";

mysqli_query($DBConnect, $SQLquery);

 echo "<font size = 3 color = red><b>".mysqli_error($DBConnect)."<br></font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 3  color = red><b><b>update NOT successful!!!<br> $SQLquery</b>!!</b></font><br><br></b>";
else
echo "<font size = 3>update success! <font color = green>expense assigned</font> to the <b><font color = purple>INVOICE No $InvNo</b> </font><br>$SQLquery ";
	
echo "<br>";
$SQLquery = "UPDATE expenses SET CustNo = $CustNo WHERE ExpNo = $ExpNoR";
//echo "".$SQLquery."<br>";

mysqli_query($DBConnect, $SQLquery);

 echo "<font size = 3 color = red><b>".mysqli_error($DBConnect)."<br></font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 3  color = red><b><b>update NOT successful!!!<br> $SQLquery</b>!!</b></font><br><br></b>";
else
echo "<font size = 3>update success! <font color = green>expense assigned</font> to the <b><font color = blue>CUSTOMER $item2 $item3</font></b><br>$SQLquery ";
	
echo "</b><br><br>";

$SQLstringb = "SELECT * FROM expenses WHERE ExpNo = $ExpNoR";
//echo "SQLstringb: ".$SQLstringb."<br>"; //if no result then this customer never had any invoices
if ($roww = mysqli_query($DBConnect, $SQLstringb)) {
while ($row = mysqli_fetch_assoc($roww)) {
//echo $row['ExpNo'];
echo ' &nbsp;&nbsp;&nbsp;';
echo $row['ExpDesc'];
echo ' &nbsp;&nbsp;&nbsp;';
echo ' ';
echo $row['SupCode'];
echo ' &nbsp;&nbsp;&nbsp;';
echo $row['PurchDate'].' &nbsp;&nbsp;&nbsp;R';
if ($row['ProdCostExVAT']!='')
echo $row['ProdCostExVAT'].'&nbsp;&nbsp;&nbsp; ';
if ($row['Notes']!='')
echo $row['Notes'].'<br>';

echo '<br>';
}
mysqli_free_result($roww);
}





	
	  
    }
/*
echo "</tr>\n";


     while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr>";



    for($i=0; $i < $N; $i++)
  {
      //echo($aDoor[$i] . " ");
echo "<th>{$row["$i"]}</th>";
    }
echo "</tr>\n";
//echo "<td>{$row[5]}</td></tr>\n";
		}
     $result->close();
	
}
echo "</table>";
*/

?>




</body>

</html> 