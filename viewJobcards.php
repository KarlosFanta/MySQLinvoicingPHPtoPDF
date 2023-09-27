<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Expenses H & Exp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<?php
	require_once("inc_OnlineStoreDB.php");
			
?>
<!--<b><br><font size = "4" type="arial">View Expenses H & Exp</b></font>&nbsp;&nbsp;&nbsp;&nbsp;viewExpHEandExp.php
</br>
<a href = 'viewExpHEandExpD.php'>viewExpHEandExpD by Date</a></br>
<a href = 'viewExp.php'>viewExp only</a></br>
<a href = 'viewExpHEandExp.php'>viewExpHEandExp</a></br>
<a href = 'viewExpmyedit.php'>viewExpmyedit</a></br>
<a href = 'viewExpEmyedit.php'>viewExpEmyedit</a></br>
<a href = 'viewExpHmyedit.php'>viewExpHmyedit</a></br>
<a href = 'UnassignedCustStk.php'>UnassignedCustStk</a></br>
<a href = 'viewExpSelectCatg.php'>viewExpSelectCatg</a></br>

<a href = '../phpmyadmin/#PMAURL-3:sql.php?db=kc&table=expensese&server=1&target='>phpMyadmin</a></br>
-->
<?php

/*
$SQLstring = "select * from jobcards  order by ExpNo  desc";

$SQLstring = "select * from jobcards";
$SQLstring ="select DISTINCT CustNo, id, message  from jobcards group by CustNo;";

$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>id</th>";
echo "<th>CustNo</th>";
echo "<th>message</th>";
echo "<th>Customer</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) 
{
echo "<th>".$row['id']."</th>";
echo "<th>".$row['CustNo']."</th>";
echo "<th>".$row['message']."";
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 
$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];
}
}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);

}
*/


$SQLstring ="SELECT CustNo, max(CustNo) as id,  message FROM jobcards GROUP by CustNo ORDER by id ASC";

$SQLstring ="Select min(CustNo) as min,  id, message from jobcards group by CustNo, Message;";
$SQLstring ="select DISTINCT CustNo, max(id) as max, message  from jobcards group by CustNo;";
$SQLstring ="select  DISTINCT CustNo  , max(id) as max, message  from jobcards group by CustNo;";
$SQLstring ="select DISTINCT CustNo  from jobcards group by CustNo;";


$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>id</th>";
echo "<th>CustNo</th>";
echo "<th>message</th>";
echo "<th>Customer</th>";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
{

//echo "<th>".$row['id']."</th>";
//echo "<th>".$row['max']."</th>";
echo "<th>".$row['CustNo']."</th>";
//echo "<th>".$row['message']."";
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 
$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];
}
}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";

$SQLstringD ="select max(id) as maxi, message from jobcards where CustNo = $CCCC desc id;";
$SQLstringD ="select  message from jobcards where CustNo = $CCCC order by desc id;";
$SQLstringD ="select id, message from jobcards where CustNo = '$CCCC' order by id desc limit 1 ;";

//echo "<th>".$SQLstringD."";


if ($resultD = mysqli_query($DBConnect, $SQLstringD)) {
while ($rowD = mysqli_fetch_assoc($resultD)) 
{
//echo "<th>".$rowD['maxi']."</th>";
//echo "<th>".$rowD['CustNo']."</th>";
//echo "<th>".$rowD['message']."";
$MM = $rowD['message'];
$MM = str_replace("\n", '<br>', $MM);
echo "<th align = left>".($MM)."";
}
mysqli_free_result($resultD);
}

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}
//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
echo "<br><br><br><br><br>$SQLstring<br>";
$SQLstring = "select * from jobcards  order by CustNo";

//$SQLstring = "select * from jobcards";
//$SQLstring ="select DISTINCT CustNo, id, message  from jobcards group by CustNo;";
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>id</th>";
echo "<th>CustNo</th>";
echo "<th>message</th>";
echo "<th>Customer</th>";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
{

echo "<th>".$row['id']."</th>";
echo "<th>".$row['CustNo']."</th>";
echo "<th>".$row['message']."";
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 
$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];
}
}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}







  
?>
<br>
<br><a href = 'viewExpEmyedit.php'>viewExpEmyedit</a></br>
<br><a href = 'viewExpEmyeditbasic.php'>viewExpEmyeditbasic.php</a></br>
<br>

</body>
</html>

<?php
//	require_once('footer.php');		
?>