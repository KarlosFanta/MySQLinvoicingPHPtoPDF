<?php



$SQLstring = "select * from invoice where CustNo = $CustInt order by invdate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
echo "";
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>";
echo "<tr><th>InvNo</th>";
echo "<th>CustNo</th>";
echo "<th>CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>Summary</th>";
if ($DisplayInvPdStatus == 'Y')

echo "<th>Inv Paid Statusss</th>";

if ($indesc >0)
{
echo "<th>D1</th>";
echo "<th>ex1</th></tr>\n";
}

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
echo "<th>{$row[2]}</th>";//invDate
echo "<th>{$row[3]}</th>";
if ($DisplayInvPdStatus == 'Y')
echo "<th>{$row[4]}</th>\n";//invpaidStatuts
if ($indesc >0){
echo "<th>{$row[5]}</th>\n";
echo "<th>{$row[6]}</th>\n";
echo "<th>{$row[7]}</th>\n";
echo "<th>{$row[8]}</th>\n";

echo "<th>{$row[9]}</th>\n";
echo "<th>{$row[10]}</th>\n";
echo "<th>{$row[11]}</th>\n";

echo "<th>{$row[12]}</th>\n";
}
echo "</tr>\n";
		}
    /* free result set */
    $result->close();

}
echo "</table>";

?>
