<?php
echo "view_inv_amt start<br>";
	require_once("inc_OnlineStoreDB.php");

if (@$CustInt == '')
{
	    @session_start();
 
	$CustInt = intval(@$_SESSION['CustNo'] );
}
else echo "CustInt is $CustInt";


$SQLstring = "select * from invoice where TotAmt = $AA order by invdate desc";
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
echo "<th>TotAmt</th>";
echo "<th>CustSDR</th>";

echo "<th>D1</th>";
echo "<th>ex1</th></tr>\n";


    /* fetch object array */
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";


//echo "<th>{$row[1]}</th>";
$CN = $row[1];



//   $shortened = substr($row2[0], 0, 6);
  //    $shortenedFN = substr($row2[1], 0, 3);
	  //echo "<font size = 4><a href= 'selectCustTrans1b.php?SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate'>if incorrect customer please click here</a></font><br><br>";
   echo "<th><a href = 'selectCustTrans1b.php?CustNo=$CN&SDR=$arraySDR&AmtPaid=$AA&DA=$TransDate'>$CN</a></th>";//CustLN
//short version of firstname and Surname









$SQLstringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
echo "<th>{$row[2]}</th>";//invDate
echo "<th>{$row[3]}</th>";
echo "<th>{$row[29]}</th>\n";//TotAmt
echo "<th>{$row[30]}</th>\n";//CustSDR


echo "<th>{$row[5]}</th>\n";
echo "<th>{$row[6]}</th>\n";
echo "<th>{$row[7]}</th>\n";
echo "<th>{$row[8]}</th>\n";

echo "<th>{$row[9]}</th>\n";
echo "<th>{$row[10]}</th>\n";
echo "<th>{$row[11]}</th>\n";

echo "<th>{$row[12]}</th>\n";

echo "</tr>\n";
		}
    /* free result set */
    $result->close();
	
}
echo "</table>";


echo "view_inv_amt end<br>";
	
?>