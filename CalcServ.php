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
	$X1i = $X1*1.15;
	@$X2 = $_REQUEST["ex2"] * $_REQUEST["Q2"]; // A non-numeric value encountered
	$X2i = $X2*1.15;
	@$X3 = $_REQUEST["ex3"] * $_REQUEST["Q3"]; // A non-numeric value encountered
	$X3i = $X3*1.15;
	@$X4 = $_REQUEST["ex4"] * $_REQUEST["Q4"]; // A non-numeric value encountered
	$X4i = $X4*1.15;
	@$X5 = $_REQUEST["ex5"] * $_REQUEST["Q5"];
	$X5i = $X5*1.15;
	@$X6 = $_REQUEST["ex6"] * $_REQUEST["Q6"];
	$X6i = $X6*1.15;
	@$X7 = $_REQUEST["ex7"] * $_REQUEST["Q7"];
	$X7i = $X7*1.15;
	@$X8 = $_REQUEST["ex8"] * $_REQUEST["Q8"];
	$X8i = $X8*1.15;
	
    
	$Tx = $X1 + $X2 + $X3 + $X4 + $X5 +  $X6 +  $X7 +  $X8 ;
	$Ti = $Tx * 1.15;
	$Ti14 = $Tx * 0.15;
	
	// $eq = " = ";
  
 // $response = $_REQUEST["v1"] . $sign . $_REQUEST["Q1"] . $eq . $v3;




echo "<table border='1'>";
echo "<tr>";

echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>";

echo "<td>Sub-Total </td>";
echo "<td>R ".$Tx." ex VAT</td>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>";

echo "<td>Plus 15% VAT</td>";
echo "<td>R ".$Ti14." </td>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>";

echo "<td>Invoice Total</td>";
echo "<td> ".number_format($Ti+0.0008, 3, '.', '')." or  <b>R".number_format($Ti+0.0008, 2, '.', '')." incl VAT </b></td>";
$TTTT = number_format($Ti+0.001, 2, '.', '');

echo "<input type = 'hidden' name = 'TTTT' value = $TTTT >";


//function roundnum($num, $nearest = 5){
//    return round($num / $nearest) * $nearest;
//}  
// number_format($number, 2, '.', '');
echo "</tr>";
echo "</table> ";



echo "<br><table border='1'>";
echo "<tr>";


/* echo "<br><br><b>AJAX Total R ";
  echo $Tx;
 echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 echo $Ti;
  echo " incl VAT</b><BR /><BR />";
*/  echo "R ";
  echo $X1;

  echo "ex VAT&nbsp;&nbsp;&nbsp;&nbsp;R ";
 echo $X1i;
  echo "incl VAT<br />";
  
  
  if ($X2 or $X2i!= 0)
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
