<?php	//this is "editCustProcess.php"
 $page_title = "You seleted fileds";
	//require_once('header.php');	
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection

?>
<!DOCTYPE html>
<html>
<head>
<title>View invoices</title>
<meta charset="UTF-8">
</head>

<body>

<?php
$mix='';
///$mydropdownEC ='';
$aDoor = $_POST['formDoor'];
$mydropdownEC = $_POST['mydropdownEC'];

if ($mydropdownEC == 'all')
{
	$SQLquery="SELECT $mix from invoice order by InvDate desc";

}
else
	$SQLquery="SELECT $mix from invoice where CustNo = $mydropdownEC order by InvDate desc";

echo $SQLquery;
	


$aDoor = $_POST['formDoor'];
  if(empty($aDoor))
  {
    echo("You didn't select any columns.");
  }
  else
  {
    $N = count($aDoor);
 
    echo("<br>You selected $N columns(s): ");
    for($i=0; $i < $N; $i++)
    {
      echo($aDoor[$i] . " ");
	  
	  
$mix = $mix.$aDoor[$i].", ";
	  
	  
    }
  }
$mix = rtrim($mix, ", ") ;
$mix = trim($mix, ", ");


if ($mydropdownEC == 'all')
	$SQLquery="SELECT $mix from invoice order by InvDate desc";
else
	$SQLquery="SELECT $mix from invoice where CustNo = $mydropdownEC order by InvDate desc";
echo "<br>SQLquery: ".$SQLquery;
echo "<br>i:$i";
  
  
   
echo "<br><br>";



if ($result = mysqli_query($DBConnect, $SQLquery)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
       // printf ("%s (%s)\n", $row[0], $row[1]);
		echo "";
    }

    /* free result set */
    mysqli_free_result($result);
}

















$i = 0;
if ($result = $DBConnect->query($SQLquery)) {
echo "<table border='1'>\n";
echo "<tr>";
   for($i=0; $i < $N; $i++)
    {
	echo "<th>";
      echo($aDoor[$i] . " ");
	echo "</th>";
	  
	  
	  
	  
    }

echo "</tr>\n";


     while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr>";



    for($i=0; $i < $N; $i++)
  {
      //echo($aDoor[$i] . " ");
echo "<th>{$row["$i"]}</th>";
    }
echo "</tr>\n";
//echo "<td>{$row[5]}</td></tr>\n";
		}
    /* free result set */
    $result->close();
	
}
echo "</table>";


?>





</body>

</html> 