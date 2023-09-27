<?php 
$Tot = $_POST['Tot'];
//$in = $_POST['in']; //for loop amounts
$R1 = $_POST['R1'];
$R2 = $_POST['R2'];
$R3 = $_POST['R3'];
$R4 = $_POST['R4'];
$R5 = $_POST['R5'];
$R6 = $_POST['R6'];
$R7 = $_POST['R7'];
$R8 = $_POST['R8'];
$R9 = $_POST['R9'];
$R10 = $_POST['R10'];
echo "<br>Tot: $Tot";
//echo "<br>in: $in<br>";
echo "<br>R1: $R1";
echo "<br>R2: $R2";
echo "<br>R3: $R3";
echo "<br>R4: $R4";
echo "<br>R5: $R5";
echo "<br>R6: $R6";
echo "<br>R7: $R7";
echo "<br>R8: $R8";
echo "<br>R9: $R9";
echo "<br>R10: $R10<br><br>";
$ma = [$R1, $R2, $R3, $R4, $R5, $R6, $R7, $R8, $R9, $R10 ];

var_dump($ma);
for ($x = 0; $x < 10; $x++) {
//	echo "<br>MA: ";
//echo $ma[0];
//	echo "<br>T1: ";
$GG = 0;
$T1 = $R1 + $ma[$x];
/*echo $T1;
echo "<br>";
echo $ma[$x];
echo "<br>";
*/
$GG = $ma[$x];
/*echo $ma[$x];
$GG = $ma[$x];
echo "<br>GG: ";
echo $GG;
echo "<br>";
*/
//parseInt() to convert a string to an integer.
echo "<br>R1 $R1 + $GG = $T1<br>";
if ($T1 == $Tot ) 
	echo "<br>hooray! $R1 + $ma[$x] = $Tot<br><br>";
} 

echo "<br>sum of 2 random numbers:<br>";
for ($x = 0; $x < 350; $x++) //loop 200 times
	{
$H1 = 0;
$H1 = (rand(0,9));
$M1 = $ma[$H1];

$N1 = 0;
$N1 = (rand(0,9));
$P1 = $ma[$N1];

$T2 = $M1 + $P1;
	//echo "<br>h$MM + $PP = $T2<br><br>";

if ($T2 == $Tot ) 
	echo "<br>hooray! $MM + $PP = $Tot<br><br>";
}



echo "<br><br><br>sum of 3 random numbers:<br>";
for ($x = 0; $x < 350; $x++) //loop 200 times
	{
$H1 = 0;
$H1 = (rand(0,9));
$M1 = $ma[$H1];

$H2 = 0;
$H2 = (rand(0,9));
$M2 = $ma[$H2];

$H3 = 0;
$H3 = (rand(0,9));
$M3 = $ma[$H3];

$T2 = $M1 + $M2 + $M3;
	//echo "<br>$M1 + $M2 +$M3 = $T2<br><br>";

if ($T2 == $Tot ) 
	echo "<br>hooray! $M1 + $M2 + $M3 = $Tot<br><br>";
}


echo "<br><br><br>sum of 4 random numbers:<br>";
for ($x = 0; $x < 370; $x++) //loop 200 times
	{
$H1 = 0;
$H1 = (rand(0,9));
$M1 = $ma[$H1];

$H2 = 0;
$H2 = (rand(0,9));
$M2 = $ma[$H2];

$H3 = 0;
$H3 = (rand(0,9));
$M3 = $ma[$H3];

$H4 = 0;
$H4 = (rand(0,9));
$M4 = $ma[$H4];

$T4 = $M1 + $M2 + $M3 + $M4;
	//echo "<br>$M1 + $M2 +$M3 + $M4= $T4<br><br>";

if ($T4 == $Tot ) 
	echo "<br>hooray! $M1 + $M2 +$M3 + $M4 = $Tot<br><br>";
}



echo "<br><br><br>sum of 5 random numbers:<br>";
for ($x = 0; $x < 370; $x++) //loop 200 times
	{
$H1 = 0;
$H1 = (rand(0,9));
$M1 = $ma[$H1];

$H2 = 0;
$H2 = (rand(0,9));
$M2 = $ma[$H2];

$H3 = 0;
$H3 = (rand(0,9));
$M3 = $ma[$H3];

$H4 = 0;
$H4 = (rand(0,9));
$M4 = $ma[$H4];

$H5 = 0;
$H5 = (rand(0,9));
$M5 = $ma[$H5];

$T4 = $M1 + $M2 + $M3 + $M4 + $M5;
	//echo "<br>$M1 + $M2 +$M3 + $M4 + $M5 = $T4<br><br>";

if ($T4 == $Tot ) 
	echo "<br>hooray! $M1 + $M2 +$M3 + $M4+ $M5 = $Tot<br><br>";
}

echo "<br><br><br>sum of 6 random numbers:<br>";
for ($x = 0; $x < 370; $x++) //loop 200 times
	{
$H1 = 0;
$H1 = (rand(0,9));
$M1 = $ma[$H1];

$H2 = 0;
$H2 = (rand(0,9));
$M2 = $ma[$H2];

$H3 = 0;
$H3 = (rand(0,9));
$M3 = $ma[$H3];

$H4 = 0;
$H4 = (rand(0,9));
$M4 = $ma[$H4];

$H5 = 0;
$H5 = (rand(0,9));
$M5 = $ma[$H5];

$H6 = 0;
$H6 = (rand(0,9));
$M6 = $ma[$H6];

$T4 = $M1 + $M2 + $M3 + $M4 + $M5 + $M6;
	//echo "<br>$M1 + $M2 +$M3 + $M4 + $M5  + $M6 = $T4<br><br>";

if ($T4 == $Tot ) 
	echo "<br>hooray! $M1 + $M2 +$M3 + $M4+ $M5 + $M6 = $Tot<br><br>";
}



echo "<br><br><br>sum of 7 random numbers:<br>";
for ($x = 0; $x < 370; $x++) //loop 200 times
	{
$H1 = 0;
$H1 = (rand(0,9));
$M1 = $ma[$H1];

$H2 = 0;
$H2 = (rand(0,9));
$M2 = $ma[$H2];

$H3 = 0;
$H3 = (rand(0,9));
$M3 = $ma[$H3];

$H4 = 0;
$H4 = (rand(0,9));
$M4 = $ma[$H4];

$H5 = 0;
$H5 = (rand(0,9));
$M5 = $ma[$H5];

$H6 = 0;
$H6 = (rand(0,9));
$M6 = $ma[$H6];

$H7 = 0;
$H7 = (rand(0,9));
$M7 = $ma[$H7];

$T4 = $M1 + $M2 + $M3 + $M4 + $M5 + $M6  + $M7 ;
	//echo "<br>$M1 + $M2 +$M3 + $M4 + $M5  + $M6  + $M7 = $T4<br><br>";

if ($T4 == $Tot ) 
	echo "<br>hooray! $M1 + $M2 +$M3 + $M4+ $M5 + $M6  + $M7 = $Tot<br><br>";
}



echo "<br><br><br>sum of 8 random numbers:<br>";
for ($x = 0; $x < 370; $x++) //loop 200 times
	{
$H1 = 0;
$H1 = (rand(0,9));
$M1 = $ma[$H1];

$H2 = 0;
$H2 = (rand(0,9));
$M2 = $ma[$H2];

$H3 = 0;
$H3 = (rand(0,9));
$M3 = $ma[$H3];

$H4 = 0;
$H4 = (rand(0,9));
$M4 = $ma[$H4];

$H5 = 0;
$H5 = (rand(0,9));
$M5 = $ma[$H5];

$H6 = 0;
$H6 = (rand(0,9));
$M6 = $ma[$H6];

$H7 = 0;
$H7 = (rand(0,9));
$M7 = $ma[$H7];

$H8 = 0;
$H8 = (rand(0,9));
$M8 = $ma[$H8];

$T4 = $M1 + $M2 + $M3 + $M4 + $M5 + $M6  + $M7 + $M8 ;
	//echo "<br>T4: $M1 + $M2 +$M3 + $M4 + $M5  + $M6  + $M7  + $M8= $T4<br><br>";

if ($T4 == $Tot ) 
	echo "<br>hooray! $M1 + $M2 +$M3 + $M4+ $M5 + $M6  + $M7  + $M8 = $Tot<br><br>";
}




?>