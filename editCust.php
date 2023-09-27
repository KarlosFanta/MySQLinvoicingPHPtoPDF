<?php
    @session_start();
 $CustNo = '';
		$CustNo = @$_GET['mydropdownEC'];

//$myfile = fopen("recent.txt", "a") or die("Unable to open file!");
//$stack = file("recent.txt"); // read into array
$myfileLineArray = file('recent.txt');


//$CustNoEndLine = "$CustNo\n";
//$CustNoEndLine = "$CustNo\r\n";

$CustNoEndLine = $CustNo.PHP_EOL;

/*echo "<br>CustNoEndLine: ".$CustNoEndLine."<br>";

echo "display file as is:<br>";
echo file_get_contents( "recent.txt" );//display file as is
echo "<br><br>";


*/
$lines = file('recent.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Loop through our array, show HTML source as HTML source; and line numbers too.
/*
foreach ($lines as $line_num => $line) {
    echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
}


echo "<br><br>";
*/
/*$file_handle= fopen("recent.txt", "rb");

 
 while (!feof($file_handle) ) {

$line_of_text = fgets($file_handle);
$parts = explode('=', $line_of_text);

print $parts[0]."<br>";
//print $parts[1]."<BR><br>";

}
fclose($file_handle);

*/
//echo "<br><br>";
//print_r($lines);
/*echo "<br><br>";
echo "start with: <br>";
echo json_encode($lines);

//$fruit = array_shift($lines);
*/
array_unshift($lines,"$CustNo");
//echo "<br><br>unshifted result: <br>";
//echo json_encode($lines);

if (sizeof($lines)>11)//here is the limit
array_pop($lines);
//echo "<br><br>popped result: <br>";
//echo json_encode($lines);



//array_unique($lines);
//echo "<br><br>unique result: <br>";
//echo json_encode($lines);
//print_r ($lines);
$lines = array_unique($lines, SORT_REGULAR);
//echo "<br><br>unique result: <br>";
//echo json_encode($lines);
//print_r ($lines);

//echo "<br><br>";

file_put_contents('recent.txt', implode(PHP_EOL, $lines));

//file_put_contents('recent.txt', print_r($lines, true));


//fclose($lines);



/*

















// The new person to add to the file
// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $CustNoEndLine, FILE_APPEND | LOCK_EX);

//delete first line
//$text = "First line.\nSecond line.\nThird line.";
//echo preg_replace('/^.+\n/', '', $text);
$file = 'recent.txt';

$handle = fopen("recent.txt", "r");
$first = fgets($handle,2048); #get first line.
$outfile="temp";
$o = fopen($outfile,"w");
while (!feof($handle)) {
    $buffer = fgets($handle,2048);
    fwrite($o,$buffer);
}
fclose($handle);
fclose($o);
rename($outfile,$file);

echo "display file as is:<br>";
echo file_get_contents( "recent.txt" );//display file as is

/*
$stack = explode("\n", file_get_contents('recent.txt'));



//fwrite($myfile, $txt);
//$txt = "$CustNo\n";

echo "<br>stack:<br>";

print_r($stack);//a b c d

echo "<br /><br />";

$stack=(array_reverse($stack));


echo "<br /><br />";
print_r($stack);//a b c d
echo "<br /><br />";

//array_unshift($queue, "apple", "raspberry");
//$stack = array("orange", "banana");print_r($stack);//a b c d

$fruit = array_unshift($stack, "$CustNoEndLine"); // unshift: The new array values will be inserted in the beginning of the array. 
echo "<br>fruit:<br>";
print_r($fruit);
echo "<br>stack:<br>";
print_r($stack);
//$a=array("red","green");
echo "<br><br>";

$newfruit = array_pop($stack);
echo "<br>stack:<br>";

print_r($stack);

echo "<br><br>";
echo "<br><br>";


//$arrayfruit = explode('\n', $fruit); //string to array

//echo "<br>arrayfruit:<br>";
//array_push($arrayfruit, $CustNoEndLine);//error
//print_r($arrayfruit);


file_put_contents('recent.txt', implode(PHP_EOL, $stack));


echo "<br><br>";

fwrite($myfile, $fruit);
fclose($myfile);
//echo file_get_contents( "recent.txt" );//display changed file

echo "<br /><br />";
$file = file('recent.txt');
$read_rev = array_reverse($file);
$count=0;
foreach ($read_rev as $dis_line) {
print_r($dis_line);}
echo "<br /><br />";

*/


if ($CustNo!= "")
	{
//		require_once('selectCustprocess.php');	
	include "chkDuplic.php";
	require_once('editCustProcess.php');	
//	$_SESSION['sel'] = "editCust";
	exit();
	}


	require_once('header.php');	

	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
	{
	require_once('selectCust.php');	
	$_SESSION['sel'] = "editCust";
	}
	else
	{
	include "chkDuplic.php";
	//@$_SESSION['CustNo'] = $CustNo;
	require_once('editCustProcess.php');	
	}


?>
