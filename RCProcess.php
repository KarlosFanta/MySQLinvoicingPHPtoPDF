<?php
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
    //$in = $_POST['in']; //for loop amounts
    $ma = array();
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

    //var_dump($ma);
	
echo "<br>ma: <br>";
echo "<br>Sum of array: <br>";
echo array_sum($ma);

print_r($ma);
echo "<br>Sum of ma: ";

echo array_sum($ma);
echo "<br><br>";



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
echo "<br>end of answer (if no answer then values cannot be added up )<br><br>";

echo "<br>thiscombination: <br>";
print_r($thiscombination);
echo "<br> <br>";

echo "<br>Found invoice values: <br>";

foreach($thiscombination as $value){ 
    echo $value;
	echo "<br>";
}
echo "<br>Found invoice y values: (if unidentified y variable then values cannot be added up )<br>";

foreach($y as $value){ 
    echo $value;
	echo "<br>";
}

/*echo "<br>Found invoice values: <br>";

foreach($y as $value){ 
    echo $value;
	echo "<br>";
}
*/
echo "<br> <br>";
$difference = 0;
$difference = $unpaid - $Tot;
echo "<br>difference: $difference<br>";

echo "<br>Sum of thiscombination: <br>";

echo array_sum($y);
echo "<br><br>";

echo "<br>input: $Tot<br>";



/*echo "<br><br><br>0: <br>";
echo $thiscombination[0];
echo "<br>1: <br>";
echo $thiscombination[1];
echo "<br>2: <br>";
echo @$thiscombination[2];
echo "<br>3: <br>";
echo @$thiscombination[3];
echo "<br>4:  <br>";
echo @$thiscombination[4];
echo "<br>5: <br>";
echo @$thiscombination[5];
echo "<br>6: <br>";
echo @$thiscombination[6];
echo "<br>7: <br>";
echo @$thiscombination[7];
echo "<br>8: <br>";
echo @$thiscombination[8];
*/


	?>