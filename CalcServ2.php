<?php



/*if ($_REQUEST["manipulator"] == "multiply")
  {
    $value3 = $_REQUEST["value1"] * $_REQUEST["value2"];
    $sign = " x ";
    $eq = " = ";
  }

elseif ($_REQUEST["manipulator"] == "divide")
  {
    $value3 = $_REQUEST["value1"] / $_REQUEST["value2"];
    $sign = " / ";
    $eq = " = ";
  }
*/

    $value3 = $_REQUEST["ex1"] * $_REQUEST["Q1"];
    $value4 = $_REQUEST["ex1"] * $_REQUEST["Q1"] * 1.15;
   // $eq = " = ";

 // $response = $_REQUEST["value1"] . $sign . $_REQUEST["Q1"] . $eq . $value3;
  $response = $value3;
  $response2 = $value4;

echo $response2;
?>
