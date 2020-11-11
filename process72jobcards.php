<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
require_once 'inc_OnlineStoreDB.php';
//require_once '../79/inc_OnlineStoreDB.php';
    @session_start();
	if(isset($_SESSION["CustNo"]))
			$CustNo = 	$_SESSION['CustNo'];
else
	$CustNo = 1;
 $message=$_POST["message"];
 $message = str_replace('"', '&quot;', $message);  //double quotes for mailto: emails.
    $von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é");  //to correct double whitepaces as well
    $zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;"," ","&#233;");

    $message = str_replace($von, $zu, $message);

 	// Escape User Input to help prevent SQL Injection
	//$name = mysqli_real_escape_string($DBConnect, $name);
	$message = mysqli_real_escape_string($DBConnect, $message);
//$name = mysql_real_escape_string($name);
//$message = mysql_real_escape_string($message);

 $q1= "SELECT MAX(id)  as max FROM jobcards  where CustNo = $CustNo  LIMIT 1";
//   $rowSQL = mysql_query($q1) or die(mysql_error());
//    $row = mysql_fetch_array( $rowSQL );
//    $largestNumber = $row['max'];

$largestNumber = 222;
if ($result = mysqli_query($DBConnect, "$q1")) {
	while ($row = mysqli_fetch_assoc($result)) {
         $largestNumber = $row["max"];
	}
    mysqli_free_result($result);
}
/*
if ($resulton = mysqli_query($Rlink, "$q1")) {
	while ($rowon = mysqli_fetch_assoc($resulton)) {
         $largestNumberon = $rowon["max"];
	}
    mysqli_free_result($resulton);
}
*/

   $q12= "SELECT message FROM jobcards where id = $largestNumber and CustNo = $CustNo  ";
 echo "q1:".$q1." ____<br>";

 echo "q12:".$q12." ___<br>";

// $rowSQL2 = mysql_query($q12) or die(mysql_error());

//  $row2 = mysql_fetch_array( $rowSQL2 );

if ($result2 = mysqli_query($DBConnect, "$q12")) {
	while ($row2 = mysqli_fetch_assoc($result2)) {
         $m2 = $row2["message"];
	}
    mysqli_free_result($result2);
}

@$m2 = mysqli_real_escape_string($DBConnect, $m2); //not required here?


 // $m2 = $row2['m2'];

   $q1= "SELECT MAX(id)  as max FROM jobcards  LIMIT 1";
//   $rowSQL = mysql_query($q1) or die(mysql_error());
//    $row = mysql_fetch_array( $rowSQL );
//    $largestNumber = $row['max'];

$largestNumber = 122;
if ($result = mysqli_query($DBConnect, "$q1")) {
	while ($row = mysqli_fetch_assoc($result)) {
         $largestNumber = $row["max"];
	}
    mysqli_free_result($result);
}


//echo "<br><bR>message: ".$message. "<br>compared with ";
//echo "<br>m2:".$m2." _____<br>";
//echo "q1:".$q1." _____<br>";
 $largestNumber++;
 $largestNumber++;

if ($message != $m2)
{

  //$qry_result1++;
  //echo "<br>qr1:".$largestNumber;
$qq= "INSERT INTO jobcards(id,CustNo,message) values('$largestNumber','$CustNo','$message')";
 // $query=mysql_query("$qq ");

mysqli_query($DBConnect,"$qq") or die(mysqli_error($DBConnect));
if (mysqli_affected_rows($DBConnect) > 0)
echo "<br>Insert success :-)<br>$qq";
//echo  "<textarea style='white-space:pre-wrap;font-family:arial;font-size: 10pt'  rows='20' cols='80'  >qq:".$qq." <br>";
//echo "</textarea>";

//printf("Local insert: %d\n", mysqli_affected_rows($DBConnect));

/*if(mysqli_num_rows(mysqli_query($DBConnect,"$qq")))
{
 echo "Your jobcards has been sent<br>";
	echo $qq;
  }
  else{
    echo "Error in sending your jobcards";
	 echo $qq;
  }
  */
  }
  else
  echo " message did not change<br>";

  /* $qq= "INSERT INTO jobcards(id,message) values('$largestNumber','$message')";

  mysqli_query($Rlink,"$qq") or die(mysqli_error($Rlink));
//echo  "qq:".$qq." _____<br>";
printf("Online insert: %d\n", mysqli_affected_rows($Rlink));

 /*
  $query = "SELECT * FROM jobcards ORDER BY id DESC LIMIT 1";
//  $query = "SELECT * FROM jobcards ORDER BY id = MAX(id)";
	//Execute query

	//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>Message</th>";
$display_string .= "</tr>";

	// Insert a new row in the table for each person returned
if ($result = mysqli_query($DBConnect, "$query")) {
	while ($row = mysqli_fetch_assoc($result)) {
   //      $name = $row2["m2"];
	$display_string .= "<tr>";
	$display_string .= "<td>$row[name]</td>";
	$display_string .= "<td>$row[message]</td>";
	$display_string .= "</tr>";
	}
    mysqli_free_result($result);
}

echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo $display_string;

  */

  include 'UnassignedStkOfCust.php';
include 'view_inv_by_custADV3.php';  //gives only totals

  mysqli_close($DBConnect);

?>
