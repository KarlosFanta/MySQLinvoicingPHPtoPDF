<?php
require_once("inc_OnlineStoreDB.php");
$DisplayInvPdStatus  = 'N';	
if (@$CustInt == '')
{
	$CustInt = $_GET['CustNo'];
}
if (@$CustInt == '')
{
    @session_start();
	$CustInt = intval($_SESSION['CustNo'] );
}
	include "view_invColumnCounter.php";//indesc

$SQLstringLN = "select CustFN, CustLN from customer where CustNo = $CustInt";
if ($result = mysqli_query($DBConnect, $SQLstringLN)) {
	while ($row = mysqli_fetch_assoc($result)) {
	echo $row["CustFN"].' '.$row["CustLN"];
	}
	mysqli_free_result($result);
}

$SQLstring = "select * from invoice where CustNo = $CustInt order by invdate desc";
echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
echo "";
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>";
echo "<tr><th>InvNo</th>";
echo "<th>InvDate</th>";
echo "<th>Draft</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
//echo "<th>CustSDR</th>";
//if ($DisplayInvPdStatus == 'Y')
//echo "<th>Inv Paid Statusss</th>";
//if ($InvPdStatus == "Y")
//echo "<th>Inv Paid Status</th>";

if ($indesc >= "1")
{echo "<th>D1</th>";
echo "<th>Q1</th>\n";
echo "<th>ex1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
//echo "<th>in1</th>";
}
if ($indesc >= "2")
{echo "<th>D2</th>";
echo "<th>Q2</th>\n";
echo "<th>ex2</th>";
}
if ($indesc >= "3")
{echo "<th>D3</th>";
echo "<th>Q3</th>\n";
echo "<th>ex3</th>";
}
if ($indesc >= "4")
{echo "<th>D4</th>";
echo "<th>Q4</th>\n";
echo "<th>ex4</th>";
}
if ($indesc >= "5")
{echo "<th>D5</th>";
echo "<th>Q5</th>\n";
echo "<th>ex5</th>";
}
if ($indesc >= "6")
{echo "<th>D6</th>";
echo "<th>Q6</th>\n";
echo "<th>ex6</th>";
}
if ($indesc >= "7")
{echo "<th>D7</th>";
echo "<th>Q7</th>\n";
echo "<th>ex7</th>";
}
if ($indesc >= "8")
{echo "<th>D8</th>";
echo "<th>Q8</th>\n";
echo "<th>ex8</th>";
}

echo "</tr>\n";



 	while ($row = mysqli_fetch_assoc($result)) {
  
echo "<tr><th>{$row['InvNo']}</th>";


echo "<th>{$row['InvDate']}</th>";
echo "<th>{$row['Draft']}</th>";
echo "<th>{$row['Summary']}</th>";
echo "<th>{$row['TotAmt']}</th>\n";
			if ($indesc >= "1")
			{
			echo "<th>{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>R".round($row['ex1'], 2)."v";
			echo "".@round($row['ex1']*1.15, 2)."</th>\n";
			//echo "<th>".$iubh."</th>\n";  ///     7
			}
			if ($indesc >= "2")
			{
			echo "<th>{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>R".round($row['ex2'], 2)."v";
			echo "".@round($row['ex2']*1.15, 2)."</th>\n";//Warning: A non-numeric value encountered
			//echo "<th>{$iubh2}</th>\n";  ///     7
			}
			if ($indesc >= "3")
			{
			echo "<th>{$row['D3']}</th>\n";   //11
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>R".round($row['ex3'], 2)."v";
			echo "".@round($row['ex3']*1.15, 2)."</th>\n";//Warning: A non-numeric value encountered
			}
			if ($indesc >= "4")
			{
			echo "<th>{$row['D4']}</th>\n";  //14
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>R".round($row['ex4'], 2)."v";
			echo "".@round($row['ex4']*1.15, 2)."</th>\n";
			}
			if ($indesc >= "5")
			{
			echo "<th>{$row['D5']}</th>\n";   //17
			echo "<th>{$row['Q5']}</th>\n";
			echo "<th>R".round($row['ex5'], 2)."v";
			echo "".@round($row['ex5']*1.15, 2)."</th>\n";
			}
			if ($indesc >= "6")
			{
			echo "<th>{$row['D6']}</th>\n";   //17
			echo "<th>{$row['Q6']}</th>\n";
			echo "<th>R".round($row['ex6'], 2)."v";
			echo "".@round($row['ex6']*1.15, 2)."</th>\n";
			}
			if ($indesc >= "7")
			{
			echo "<th>{$row['D7']}</th>\n";   //17
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>R".round($row['ex7'], 2)."v";
			echo "".@round($row['ex7']*1.15, 2)."</th>\n";
			}
			if ($indesc >= "8")
			{
			echo "<th>{$row['D8']}</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>R".round($row['ex8'], 2)."v";
			echo "".@round($row['ex8']*1.15, 2)."</th>\n";
			}

}
echo "</tr>\n";
	mysqli_free_result($result);
}
	

echo "</table>";


	
?>