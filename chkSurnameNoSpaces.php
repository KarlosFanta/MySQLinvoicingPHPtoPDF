<?php

$SQLstringTR = "";

/*

if (preg_match("/\b$searchitem\b/", $str)) {
    echo "<br><br>fOUND<br>";
}
*/

echo "<br>chkSurnameNoSPAcesss: ";
//echo $array[1];
echo "<br>"; //sdr  

preg_match_all('/(\d{1,})/', $arraySDR, $matches); //extract exact 0 digit numbers or greater from a given string
$M1 = $array[1];
$M1 = strtolower($M1);
$M1 = strtr($M1, array(' ' => ' ', ',' => ' ')); //replace kommas with spaces
$M1 = trim(preg_replace('/\t+/', ' ', $M1));  //replace tabs
$M1 = mb_substr($M1, 0, 4);

//$M1 = "eter";
echo "M1:".$M1."<br>";

//load surnames into an array - but only first 4 letters
//search tranactinoSDR for surname.
//strpos() function to check whether a string contains a specific word

$AllCustSurnames = array("Peters", "Test");

$queryC = "select CustLN from customer ORDER BY custLN";
echo $queryC;
$row_cnt = 0;
if ($resultC = mysqli_query($DBConnect, $queryC)) {

while ($row = mysqli_fetch_assoc($resultC)) {
//$AllCustSurnames = $row["CustLN"]."";//CustLN is case senSitiVe

array_push($AllCustSurnames, $row["CustLN"]);

$row_cnt = mysqli_num_rows($resultC);
//echo "</tr>\n";

}
mysqli_free_result($resultC);
}

 

echo "<br>mmmmm<br>";




$AllCustSurnames = array_map('strtolower', $AllCustSurnames); //forces array to lowercase
 //print_r($AllCustSurnames);

$chksrnm = "";
for($i = 0;$i < count($AllCustSurnames);$i++)
{
		//echo $AllCustSurnames[$i]."\n";
$chksrnm = $AllCustSurnames[$i];
		//echo "chksrnm:".$chksrnm."\n";

 /* if(strstr($M1, $chksrnm) !== false){
	  	//echo "FoundFound2";

   echo "Surname FoundFound1: $M1 in <b>$chksrnm</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
} else{
    //echo "Surname Not Found!$word in $chksrnm<br>";
	echo "";
}
*/


 if(strstr($chksrnm, $M1) !== false){
	  	//echo "FoundFound2";

   echo "Surname FoundFound2: $M1 in <b>$chksrnm</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
} else{
    //echo "Surname Not Found!$word in $chksrnm<br>";
	echo "";
}



/*  if(strpos($word, $chksrnm) !== false){
    echo "Surname FoundFound: $word <b>in</b> $chksrnm<br>";
} else{
    //echo "Surname Not Found!$word in $chksrnm<br>";
	echo "";
}

*/

}


echo "<br>finito<br>";


?>