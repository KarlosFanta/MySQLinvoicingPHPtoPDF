<?php



/*if ($_REQUEST["manipulator"] == "multiply")
  {
    $v3 = $_REQUEST["v1"] * $_REQUEST["v2"];
    $sign = " x ";
    $eq = " = ";
  }

elseif ($_REQUEST["manipulator"] == "divide")
  {
    $v3 = $_REQUEST["v1"] / $_REQUEST["v2"];
    $sign = " / ";
    $eq = " = ";
  }
*/

    $X1 = $_REQUEST["ex1"] * $_REQUEST["Q1"];
	//$X1i = $X1*1.15;
    
	$Tx = $X1;
	$Ti = $Tx / 1.15;
	//$Ti14 = $Tx / 0.14;
	
	// $eq = " = ";
  
 // $response = $_REQUEST["v1"] . $sign . $_REQUEST["Q1"] . $eq . $v3;





echo "";
//echo "".number_format($Ti+0.0008, 3)." or  ";
echo "<b>R ".number_format($Ti+0.0008, 2, '.', '')." ex VAT </b>";
$TTTT = number_format($Ti+0.001, 2, '.', '');

//echo "<input type = 'hidden' name = 'TTTT' value = $TTTT >";


//function roundnum($num, $nearest = 5){
//    return round($num / $nearest) * $nearest;
//}  
// number_format($number, 2, '.', '');




  
  
 /* if ($X2 or $X2i!= 0)
  {  
  echo "R ";
  echo $X2;
 echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 echo $X2i;
  echo "incl VAT<br />";
  }
  
 if ($X3 != 0)
{
 
  echo "R ";
  echo $X3;
 echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 echo $X3i;
  echo "incl VAT<br />";
  }

  if ($X4 != 0)
{
   echo "R ";
  echo $X4;
 echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 echo $X4i;
  echo "incl VAT<br />";
}
if ($X5 != 0)
{
  echo $X5;
 echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 echo $X5i;
  echo "incl VAT<br />";
}

if ($X6 != 0)
{
  echo $X6;
 echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 echo $X6i;
 echo "incl VAT<br />";
 }
 
 if ($X7 != 0)
{
  echo $X7;
 echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 echo $X7i;
  echo "incl VAT<br />";
}
 
if ($X8 != 0)
{
 echo $X8;
 echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 
 echo $X8i;
  echo "incl VAT<br />";
 } 
  
 
 /*		<TH><input type='text' name='D8' size='45'  v='0'>
		</TH>
		<TH ><input type='text' name='Q8'  size='5' v='0'>
		</TH>
		<TH >
			<input type='text' name='ex8' size='5'  v='0'>
		</TH>
*/
 
 ?>
