<?php
//OBJECT ORIENTED:
// $DBConnect = new mysqli("localhost", "root","myPasswrd#", "myDBname");
//PROCEDURAL 
 $DBConnect = mysqli_connect("localhost", "root", "myPasswrd#", "myDBname");

 if($DBConnect->connect_errno)
$ErrorMsgs[] = "Unable to connect to the database server"." Error code " . $DBConnect->connect_errno . ": " . $DBConnect->connect_error;
else
{
	echo "<p>Database connection up and running ";
}
	
	if (mysqli_connect_errno())
  die(sprintf("[%d] %s\n", mysqli_connect_errno(), mysqli_connect_error()));
	if ($DBConnect->connect_error) {
    die('Connect Error (' . $DBConnect->connect_errno . ') '
            . $DBConnect->connect_error);
}
if ($result = $DBConnect->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
      printf("Default database is %s.\n", $row[0]);
    $result->close();
}

$SQLstring = "select * from expenses  order by PurchDate";
echo $SQLstring."<br><br>"; 
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
    printf("You have %d rows of data.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>ProdCostExVAT</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 

echo "<th>".$row['ExpNo']."</th>";
echo "<th>".$row['ExpDesc']."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
echo "<th>".$row['Notes']."</th>";
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 
$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];
}}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
echo "<th>".$row['SerialNo']."</th>";
echo "</tr>";
}
echo "</table >";
mysqli_free_result($result);
}
