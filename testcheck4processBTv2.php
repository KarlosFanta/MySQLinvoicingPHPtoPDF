<head><title>
V2 is old 









testCheckbank acc
</title>
header("Content-type: text/html; charset=UTF-8");
<meta charset="utf-8">
</head>
<body>
<?php

$CustNo = '';
$EDate = '';
$txtArea ='';
$Priority = '_';
$Destination = '_';

$txtArea = $_POST['txtArea'];


//$TA = $_POST['txtArea']; //ok, so this one bypassed the string replacements.- let's see if it works now


$array = preg_split ('/$\R?^/m', $txtArea);

//depending on how many rows are in the txtArea:
echo "<br>A0: ".$array[0];
echo "<br>A1: ".$array[1];
//echo "<br>A2: ".@$array[2];
//echo "<br>A3: ".@$array[3];



$csv_data1   = $array[0];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data1);
$Cnt = 0;
$Cnt = (count($LA));
echo "csvdATA1: ".$csv_data1."<br><br>";
/*echo "LA0: ".$LA[0]."<br><br>";
echo "LA1: ".@$LA[1]."<br><br>";
echo "LA2: ".@$LA[2]."<br>";
echo "LA3: ".$LA[3]."<br>";
echo "LA4: ".$LA[4]."<br>";
echo "LA5: ".$LA[5]."<br>";
*/
echo "<br><br>";
echo "LA[2]: ".$LA[2]."<br>";
echo "LA[3]: ".$LA[3]."<br>";


$csv_data2   = $array[1];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA2 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data2);
$Cnt = 0;
$Cnt = (count($LA2));
echo "csvdATA2: ".$csv_data2."<br><br>";
/*echo "LA20: ".$LA2[0]."<br><br>";
echo "LA21: ".@$LA2[1]."<br><br>";
echo "LA22: ".@$LA2[2]."<br>";
echo "LA23: ".$LA2[3]."<br>";
*/
echo "<br><br>";
$LA3 = $LA[3];
$LA22 = $LA2[2];
$S1 = $LA3+$LA22;
echo $S1;
echo "LA[3]: ".$LA[3]." PLUS LA[2]: ".$LA2[2]." GIVES YOU: ".$S1."<br>";
echo "<br><br>";

echo "LA2[2]: ".$LA2[2]."<br>";
echo "LA2[3]: ".$LA2[3]."<br>";

if ($LA2[3] !=  $S1)
	echo "error the numbers $LA2[3] and $S1 don;t add up<br><br>";
else
	echo "YES :-) the numbers $LA2[3] and $S1 add up<br><br>";




$csv_data3   = $array[2];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA3 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data3);
$Cnt = 0;
$Cnt = (count($LA3));
echo "csvdATA2: ".$csv_data3."<br><br>";
/*echo "LA30: ".$LA3[0]."<br><br>";
echo "LA31: ".@$LA3[1]."<br><br>";
echo "LA32: ".@$LA3[2]."<br>";
echo "LA33: ".$LA3[3]."<br>";
*/
echo "<br><br>";
$LA23 = $LA2[3];
$LA32 = $LA3[2];
$S2 = $LA23+$LA32;
//echo $S2;
echo "<br>LA2[3]: ".$LA2[3]." PLUS LA3[2]: ".$LA3[2]." GIVES YOU: ".$S2."<br>";
echo "<br><br>";

echo "LA3[2]: ".$LA3[2]."<br>";
echo "LA3[3]: ".$LA3[3]."<br>";

if ($LA3[3] !=  $S2)
	echo "error the numbers $LA3[3] and $S2 don;t add up<br><br>";
else
	echo "YES :-) the numbers $LA3[3] and $S2 add up<br><br>";








$csv_data4   = $array[3];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA4 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data4);
$Cnt = 0;
$Cnt = (count($LA4));
echo "csvdATA2: ".$csv_data4."<br><br>";
/*echo "LA40: ".$LA4[0]."<br><br>";
echo "LA41: ".@$LA4[1]."<br><br>";
echo "LA42: ".@$LA4[2]."<br>";
echo "LA43: ".$LA4[3]."<br>";
*/
echo "<br><br>";


$a = $LA3[3];
$b = $LA4[2];
$S3 = $a+$b;
//echo $S3;
echo "<br>LA3[3]: ".$LA3[3]." PLUS LA4[2]: ".$LA4[2]." GIVES YOU: ".$S3."<br>";
echo "<br><br>";
echo "LA4[2]: ".$LA4[2]."<br>";
echo "LA4[3]: ".$LA4[3]."<br>";


if (number_format($LA4[3], 2) == number_format($S3, 2)) {
    echo 'YYYES :-) the numbers $LA4[3]'.$LA4[3].' and '.$S3.' add up<br><br>';
} else {
    echo 'eeerror the numbers $LA4[3]'.$LA4[3].' and '.$S3.' don;t add up<br><br>';
}






$csv_data5   = $array[4];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA5 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data5);
$Cnt = 0;
$Cnt = (count($LA5));
echo "csvdATA2: ".$csv_data5."<br><br>";
/*echo "LA50: ".$LA5[0]."<br><br>";
echo "LA51: ".@$LA5[1]."<br><br>";
echo "LA52: ".@$LA5[2]."<br>";
echo "LA53: ".$LA5[3]."<br>";
*/
echo "<br><br>";

$a = $LA4[3];
$b = $LA5[2];
$SS = $a+$b;
//echo $S3;
echo "<br>LA4[3]: ".$LA4[3]." PLUS LA5[2]: ".$LA5[2]." GIVES YOU: ".$SS."<br>";
echo "<br><br>";
echo "LA5[2]: ".$LA5[2]."<br>";
echo "LA5[3]: ".$LA5[3]."<br>";

if (number_format($LA5[3], 2) == number_format($SS, 2)) {
    echo 'YES :-) the numbers $LA5[3]: '.$LA5[3].' and '.$SS.' add up<br><br>';
} else {
    echo 'error the numbers $LA5[3]: '.$LA5[3].' and '.$SS.' don;t add up<br><br>';
}




$csv_data6   = $array[5];
echo "<br><br>";
//converting tabular delimited data from a csv file.
$LA6 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data6);
$Cnt = 0;
$Cnt = (count($LA6));
echo "csvdATA6: ".$csv_data6."<br><br>";
/*echo "LA60: ".$LA6[0]."<br><br>";
echo "LA61: ".@$LA6[1]."<br><br>";
echo "LA62: ".@$LA6[2]."<br>";
echo "LA63: ".$LA6[3]."<br>";
*/
echo "<br><br>";

$a = $LA5[3];
$b = $LA6[2];
$SS = $a+$b;
//echo $S3;
echo "<br>LA5[3]: ".$LA5[3]." PLUS LA6[2]: ".$LA6[2]." GIVES YOU: ".$SS."<br>";
echo "<br><br>";
echo "LA6[2]: ".$LA6[2]."<br>";
echo "LA6[3]: ".$LA6[3]."<br>";

if (number_format($LA6[3], 2) == number_format($SS, 2)) {
    echo 'YES :-) the numbers $LA6[3]: '.$LA6[3].' and '.$SS.' add up<br><br>';
} else {
    echo 'error the numbers $LA6[3]: '.$LA6[3].' and '.$SS.' don;t add up<br><br>';
}




$csv_data7   = $array[6];
echo "<br><br>";
$LA7 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data7);
$Cnt = 0;
$Cnt = (count($LA7));
echo "csvdATA7: ".$csv_data7."<br><br>";
/*echo "LA70: ".$LA7[0]."<br><br>";
echo "LA71: ".@$LA7[1]."<br><br>";
echo "LA72: ".@$LA7[2]."<br>";
echo "LA73: ".$LA7[3]."<br>";
*/
echo "<br><br>";
$a = $LA6[3];
$b = $LA7[2];
$SS = $a+$b;
echo "<br>LA6[3]: ".$LA6[3]." PLUS LA7[2]: ".$LA7[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA7[2]: ".$LA7[2]."<br>";
echo "LA7[3]: ".$LA7[3]."<br>";

if (number_format($LA7[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA7[3]: '.$LA7[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA7[3]: '.$LA7[3].' and '.$SS.' don;t add up<br><br>';




$csv_data8   = $array[7];
echo "<br><br>";
$LA8 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data8);
$Cnt = 0;
$Cnt = (count($LA8));
echo "csvdATA8: ".$csv_data8."<br><br>";
/*echo "LA80: ".$LA8[0]."<br><br>";
echo "LA81: ".@$LA8[1]."<br><br>";
echo "LA82: ".@$LA8[2]."<br>";
echo "LA83: ".$LA8[3]."<br>";
*/
echo "<br><br>";
$a = $LA7[3];
$b = $LA8[2];
$SS = $a+$b;
echo "<br>LA7[3]: ".$LA7[3]." PLUS LA8[2]: ".$LA8[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA8[2]: ".$LA8[2]."<br>";
echo "LA8[3]: ".$LA8[3]."<br>";

if (number_format($LA8[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA8[3]: '.$LA8[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA8[3]: '.$LA8[3].' and '.$SS.' don;t add up<br><br>';




$csv_data9   = $array[8];
echo "<br><br>";
$LA9 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data9);
$Cnt = 0;
$Cnt = (count($LA9));
echo "csvdATA9: ".$csv_data9."<br><br>";
/*echo "LA90: ".$LA9[0]."<br><br>";
echo "LA91: ".@$LA9[1]."<br><br>";
echo "LA92: ".@$LA9[2]."<br>";
echo "LA93: ".$LA9[3]."<br>";
*/
echo "<br><br>";
$a = $LA8[3];
$b = $LA9[2];
$SS = $a+$b;
echo "<br>LA8[3]: ".$LA8[3]." PLUS LA9[2]: ".$LA9[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA9[2]: ".$LA9[2]."<br>";
echo "LA9[3]: ".$LA9[3]."<br>";

if (number_format($LA9[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA9[3]: '.$LA9[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA9[3]: '.$LA9[3].' and '.$SS.' don;t add up<br><br>';



$csv_data10   = $array[9];
echo "<br><br>";
$LA10 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data10);
$Cnt = 0;
$Cnt = (count($LA10));
echo "csvdATA10: ".$csv_data10."<br><br>";
/*echo "LA100: ".$LA10[0]."<br><br>";
echo "LA101: ".@$LA10[1]."<br><br>";
echo "LA102: ".@$LA10[2]."<br>";
echo "LA103: ".$LA10[3]."<br>";
*/
echo "<br><br>";
$a = $LA9[3];
$b = $LA10[2];
$SS = $a+$b;
echo "<br>LA9[3]: ".$LA9[3]." PLUS LA10[2]: ".$LA10[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA10[2]: ".$LA10[2]."<br>";
echo "LA10[3]: ".$LA10[3]."<br>";

if (number_format($LA10[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA10[3]: '.$LA10[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA10[3]: '.$LA10[3].' and '.$SS.' don;t add up<br><br>';



$csv_data11   = $array[10];
echo "<br><br>";
$LA11 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data11);
$Cnt = 0;
$Cnt = (count($LA11));
echo "csvdATA11: ".$csv_data11."<br><br>";
/*echo "LA11_0: ".$LA11[0]."<br><br>";
echo "LA11_1: ".@$LA11[1]."<br><br>";
echo "LA11_2: ".@$LA11[2]."<br>";
echo "LA11_3: ".$LA11[3]."<br>";
*/
echo "<br><br>";
$a = $LA10[3];
$b = $LA11[2];
$SS = $a+$b;
echo "<br>LA10[3]: ".$LA10[3]." PLUS LA11[2]: ".$LA11[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA11[2]: ".$LA11[2]."<br>";
echo "LA11[3]: ".$LA11[3]."<br>";

if (number_format($LA11[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA11[3]: '.$LA11[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA11[3]: '.$LA11[3].' and '.$SS.' don;t add up<br><br>';



$csv_data12   = $array[11];
echo "<br><br>";
$LA12 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data12);
$Cnt = 0;
$Cnt = (count($LA12));
echo "csvdATA12: ".$csv_data12."<br><br>";
/*echo "LA12_0: ".$LA12[0]."<br><br>";
echo "LA12_1: ".@$LA12[1]."<br><br>";
echo "LA12_2: ".@$LA12[2]."<br>";
echo "LA12_3: ".$LA12[3]."<br>";
*/
echo "<br><br>";
$a = $LA11[3];
$b = $LA12[2];
$SS = $a+$b;
echo "<br>LA11[3]: ".$LA11[3]." PLUS LA12[2]: ".$LA12[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA12[2]: ".$LA12[2]."<br>";
echo "LA12[3]: ".$LA12[3]."<br>";

if (number_format($LA12[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA12[3]: '.$LA12[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA12[3]: '.$LA12[3].' and '.$SS.' don;t add up<br><br>';





$csv_data13   = $array[12];
echo "<br><br>";
$LA13 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data13);
$Cnt = 0;
$Cnt = (count($LA13));
echo "csvdATA13: ".$csv_data13."<br><br>";
/*echo "LA13_0: ".$LA13[0]."<br><br>";
echo "LA13_1: ".@$LA13[1]."<br><br>";
echo "LA13_2: ".@$LA13[2]."<br>";
echo "LA13_3: ".$LA13[3]."<br>";
*/
echo "<br><br>";
$a = $LA12[3];
$b = $LA13[2];
$SS = $a+$b;
echo "<br>LA12[3]: ".$LA12[3]." PLUS LA13[2]: ".$LA13[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA13[2]: ".$LA13[2]."<br>";
echo "LA13[3]: ".$LA13[3]."<br>";

if (number_format($LA13[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA13[3]: '.$LA13[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA13[3]: '.$LA13[3].' and '.$SS.' don;t add up<br><br>';



$csv_data14   = $array[13];
echo "<br><br>";
$LA14 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data14);
$Cnt = 0;
$Cnt = (count($LA14));
echo "csvdATA14: ".$csv_data14."<br><br>";
/*echo "LA14_0: ".$LA14[0]."<br><br>";
echo "LA14_1: ".@$LA14[1]."<br><br>";
echo "LA14_2: ".@$LA14[2]."<br>";
echo "LA14_3: ".$LA14[3]."<br>";
*/
echo "<br><br>";
$a = $LA13[3];
$b = $LA14[2];
$SS = $a+$b;
echo "<br>LA13[3]: ".$LA13[3]." PLUS LA14[2]: ".$LA14[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA14[2]: ".$LA14[2]."<br>";
echo "LA14[3]: ".$LA14[3]."<br>";

if (number_format($LA14[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA14[3]: '.$LA14[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA14[3]: '.$LA14[3].' and '.$SS.' don;t add up<br><br>';





$csv_data15   = $array[14];
echo "<br><br>";
$LA15 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data15);
$Cnt = 0;
$Cnt = (count($LA15));
echo "csvdATA15: ".$csv_data15."<br><br>";
/*echo "LA15_0: ".$LA15[0]."<br><br>";
echo "LA15_1: ".@$LA15[1]."<br><br>";
echo "LA15_2: ".@$LA15[2]."<br>";
echo "LA15_3: ".$LA15[3]."<br>";
*/
echo "<br><br>";
$a = $LA14[3];
$b = $LA15[2];
$SS = $a+$b;
echo "<br>LA14[3]: ".$LA14[3]." PLUS LA15[2]: ".$LA15[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA15[2]: ".$LA15[2]."<br>";
echo "LA15[3]: ".$LA15[3]."<br>";

if (number_format($LA15[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA15[3]: '.$LA15[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA15[3]: '.$LA15[3].' and '.$SS.' don;t add up<br><br>';



$csv_data16   = $array[14];
echo "<br><br>";
$LA16 = preg_split('/\t[ \r\n]*(?=([^"]*"[^"]*")*[^"]*$)/', $csv_data16);
$Cnt = 0;
$Cnt = (count($LA16));
echo "csvdATA16: ".$csv_data16."<br><br>";
/*echo "LA16_0: ".$LA16[0]."<br><br>";
echo "LA16_1: ".@$LA16[1]."<br><br>";
echo "LA16_2: ".@$LA16[2]."<br>";
echo "LA16_3: ".$LA16[3]."<br>";
*/
echo "<br><br>";
$a = $LA14[3];
$b = $LA16[2];
$SS = $a+$b;
echo "<br>LA14[3]: ".$LA14[3]." PLUS LA16[2]: ".$LA16[2]." GIVES YOU: ".$SS."<br><br><br>";
echo "LA16[2]: ".$LA16[2]."<br>";
echo "LA16[3]: ".$LA16[3]."<br>";

if (number_format($LA16[3], 2) == number_format($SS, 2)) 
    echo 'YES :-) the numbers $LA16[3]: '.$LA16[3].' and '.$SS.' add up<br><br>';
 else 
    echo 'error the numbers $LA16[3]: '.$LA16[3].' and '.$SS.' don;t add up<br><br>';








?>

</body>
