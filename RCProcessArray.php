<?php

//print_r($ma);
echo "<br>Sum of ma: ".array_sum($ma)."<br>";
echo "<br><br>";




function findcombinations($array)
	{
	$results = array(array( ));

	    foreach ($array as $element)
        {
            if($element>0)
            {
                foreach ($results as $combination)
	                array_push($results, array_merge(array($element), $combination));
            }
        }


	    return $results;
	}

    $Tot = $_POST['Tot'];
	echo "Tot paid: $Tot.<br>";
    $unpaid = @$_POST['unpaid'];
	if ($unpaid == "")
		$unpaid = 0;
    //$in = $_POST['in']; //for loop amounts
 // $ma = array();
  /*    $R1 = $_POST['R1'];
    $R2 = $_POST['R2'];
    $R3 = $_POST['R3'];
    $R4 = $_POST['R4'];
    $R5 = $_POST['R5'];
    $R6 = $_POST['R6'];
    $R7 = $_POST['R7'];
    $R8 = $_POST['R8'];
    $R9 = $_POST['R9'];
    $R10 = $_POST['R10'];
    $R11 = $_POST['R11'];
    $R12 = $_POST['R12'];
    $R13 = $_POST['R13'];
    $R14 = $_POST['R14'];
    $R15 = $_POST['R15'];
    $R16 = $_POST['R16'];
    $R17 = $_POST['R17'];
    $R18 = $_POST['R18'];
    $R19 = $_POST['R19'];
    $R20 = $_POST['R20'];
    $R21 = $_POST['R21'];
   echo "<br>Tot: $Tot";
    echo "<br>unpaid: $unpaid<br>";
    echo "<br>R1: $R1";
    echo "<br>R2: $R2";
    echo "<br>R3: $R3";
    echo "<br>R4: $R4";
    echo "<br>R5: $R5";
    echo "<br>R6: $R6";
    echo "<br>R7: $R7";
    echo "<br>R8: $R8";
    echo "<br>R9: $R9";
    echo "<br>R10: $R10";
    echo "<br>R11: $R11";
    echo "<br>R12: $R12";
    echo "<br>R13: $R13";
    echo "<br>R14: $R14";
    echo "<br>R15: $R15";
    echo "<br>R16: $R16";
    echo "<br>R17: $R17";
    echo "<br>R18: $R18";
    echo "<br>R19: $R19";
    echo "<br>R20: $R20";
    echo "<br>R21: $R21";
    $ma = [$R1, $R2, $R3, $R4, $R5, $R6, $R7, $R8, $R9, $R10, $R11, $R12, $R13, $R14, $R15, $R16, $R17, $R18, $R19, $R20, $R21];
*/
    //var_dump($ma);

    $combinations = findcombinations($ma);
echo "resultt: <br>";
	foreach($combinations as $thiscombination)
	{

	if(array_sum($thiscombination)==$Tot)
		{
        	var_dump($thiscombination);
		$y = $thiscombination;
		}
	}
echo "<br>end of answer  (if no answer then values cannot be added up )<br><br>";

echo "<br>thiscombination: <br>";
print_r($thiscombination);
echo "<br> <br>";

echo "<br>Found invoice y values: (if unidentified y variable then values cannot be added up )<br>";

foreach($y as $value){ 
    echo $value;
	echo "<br>";
}
	
echo "<br> <br>";
$difference = 0;
$difference = $unpaid - $Tot;
echo "<br>difference: $difference<br>";

echo "<br>Sum of thiscombination: <br>";

echo array_sum($y);
echo "<br><br>";

echo "<br>input: $Tot<br>";


	?>