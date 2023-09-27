view JobcardCurrentCust.php
<?php
$SQLstring ="select id, message from jobcards where CustNo = '$CustNo' order by id desc limit 4 ;";
echo $SQLstring;

if ($result = mysqli_query($DBConnect, $SQLstring)) {

echo "<table  border='1' >\n";
echo "<tr><th>id</th>";
echo "<th>CustNo</th>";
echo "<th>message</th>";
echo "<th>Customer</th>";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
{

echo "<tr><th>".$row['id']."</th>";
//echo "<th>".$row['max']."</th>";
echo "<th>".$CustNo."</th>";
echo "<th>".$row['message']."";
//$CustNo = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CustNo'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 
$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];
}
}
echo "<th>".$CustNo.$NN.$NNN."</th>";

/*$SQLstringD ="select max(id) as maxi, message from jobcards where CustNo = $CCCC desc id;";
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
*/
}
mysqli_free_result($result);
}

echo "</tr>";


echo "</table >";

//mysqli_free_result($result);


//}
//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files

 
echo "<br><br><br><br>latest 2x jobcards<br>$SQLstring<br>";
$SQLstring = "select * from jobcards  order by id limit 2";
echo $SQLstring;
//$SQLstring = "select * from jobcards";
//$SQLstring ="select DISTINCT CustNo, id, message  from jobcards group by CustNo;";
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
    printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

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