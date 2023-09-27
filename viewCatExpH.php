<?php
$queryC = "select distinct Category from expensesh order by Category";
//echo $queryC;
$row_cnt = 0;
if ($resultC = mysqli_query($DBConnect, $queryC)) {
/*echo "<table width='10' border='1'>\n";
echo "<tr><th>No</th>";
echo "<th>Name</th>";
echo "<th>Surname</th>";
echo "</tr>\n";
*/
while ($row = mysqli_fetch_assoc($resultC)) {
//echo "<tr>";
//echo "<th>";
echo $row["Category"];//CustNo is case senSitiVe
echo " ";

}
mysqli_free_result($resultC);
}

//echo "</table>";
//echo " rows: $row_cnt"; //counter
?>