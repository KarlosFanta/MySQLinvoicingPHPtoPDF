<?php
	require_once("inc_OnlineStoreDB.php");

//$indesc = "9";
if (@$indesc != "")
	echo "NB indesc exists";
//$indesc = @$_POST['indesc'];
$indesc = 1;

$SQLstring = "select D2,D3,D4,D5,D6,D7,D8 from invoice where CustNo = '$CustInt' ";

	$Di8a = $Di7a = $Di6a = $Di5a = $Di4a = $Di3a = $Di2a = 0;


if ($result = mysqli_query($DBConnect, $SQLstring)) {
	while ($row = mysqli_fetch_assoc($result)) {
	$Di2 = $row["D2"];
	$Di3 = $row["D3"];
	$Di4 = $row["D4"];
	$Di5 = $row["D5"];
	$Di6 = $row["D6"];
	$Di7 = $row["D7"];
	$Di8 = $row["D8"];
if (($Di2 != '') && ($Di2 != '0'))
	++$Di2a;
if (($Di3 != '') && ($Di3 != '0'))
	++$Di3a;
if (($Di4 != '') && ($Di4 != '0'))
	++$Di4a;
if (($Di5 != '') && ($Di5 != '0'))
	++$Di5a;
if (($Di6 != '') && ($Di6 != '0'))
	++$Di6a;
if (($Di7 != '') && ($Di7 != '0'))
	++$Di7a;
if (($Di8 != '') && ($Di8 != '0'))
	++$Di8a;



	}
	mysqli_free_result($result);
}

echo "<br>Di8a is $Di8a ";
echo " Di7a is $Di7a ";
echo " Di6a is $Di6a ";
echo " Di5a is $Di5a ";
echo " Di4a is $Di4a ";
echo " Di3a is $Di3a ";
echo " Di2a is $Di2a ";

if ($Di2a > 0)
	$indesc = 2;
if ($Di3a > 0)
	$indesc = 3;
if ($Di4a > 0)
	$indesc = 4;
if ($Di5a > 0)
	$indesc = 5;
if ($Di6a > 0)
	$indesc = 6;
if ($Di7a > 0)
	$indesc = 7;
if ($Di8a > 0)
	$indesc = 8;
	
echo "indesc $indesc<br>";
	
	

?>