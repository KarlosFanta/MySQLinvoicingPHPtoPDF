
<?php

//WARNING!!!
//THIS FILE WORKS is included inside a loop of outstanding3.php
$queryC1 =("SELECT * FROM customer where CustNo = $CustInt ");
$Invsummm = 0;
if ($resultC1 = $DBConnect->query($queryC1)) {
    while ($row = $resultC1->fetch_assoc()) {
$CustFN =  $row['CustFN'];
$CustLN =  $row['CustLN'];
$CustEmail =  $row['CustEmail'];
$CustTel =  $row['CustTel'];
$CustCell =  $row['CustCell'];
$PayNotes =  $row['PayNotes'];
	}
    $resultC1->free();
}


$yo = 0;
$SQLstring = "SELECT * FROM transaction WHERE CustNo = $CustInt order by transdate";

if ($resultT1 = $DBConnect->query($SQLstring)) {//from transaction table
while ($row = $resultT1->fetch_row()) {  //from transaction table
$CN = $row[1];   
$yo = $yo+$row[3];
}
$resultT1->close();
	
}
																															 
												   
												
 
							
								 
							  
										  

						
				   
			 
		  
			   

														   
				   
				   
					

$SQLstring = "select * from invoice where CustNo = $CustInt";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
//echo "";
if ($resultI1 = $DBConnect->query($SQLstring)) {
/*echo "<table width='10' border='1'>";
echo "<tr><th>InvNo</th>";
echo "<th>CustNo</th>";
echo "<th>CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>Summary</th>";
if ($DisplayInvPdStatus == 'Y')

echo "<th>Inv Paid Statusss</th>";


  */
    while ($row = $resultI1->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

/*echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";*/

/*echo "<th>{$row[2]}</th>";//invDate
echo "<th>{$row[3]}</th>";
if ($DisplayInvPdStatus == 'Y')
echo "<th>{$row[4]}</th>\n";//invpaidStatuts*/
$Invsummm = $Invsummm + $row[29];

//echo "</tr>\n";
		}
    /* free result set */
    $resultI1->close();
	
}
//echo "</table>";


	
$out  = 0;
$out = $Invsummm - $yo;


if ($out > 1)
{

echo "<BR />Invoices: R".$Invsummm."<br />";
echo "Transactions: R".$yo."<br>";

echo $CustInt;
echo " ";
echo $CustLN;
echo " ";
echo $CustFN;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustEmail;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustCell;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustTel;
echo "<br>";


if ($out > 1000)
echo "<font color = 'red' size = 7><b>Outstanding R". round($out, 0);
else
if ($out > 700)
echo "<font color = 'red' size = 6><b>Outstanding R". round($out, 0);
else

if ($out > 500)
echo "<font color = 'red' size = 5><b>Outstanding R". round($out, 0);
else
if ($out > 300)
echo "<font color = 'red' size = 4><b>Outstanding R". round($out, 0);
else
if ($out > 30)
echo "<font color = 'red'><b>Outstanding R". round($out, 0);
else
if ($out > 0)
echo "<b>Outstanding R". round($out, 0);
else
if ($out > -300)
echo "<b>Credit R".-round($out, 0);
else
if ($out < -300)
{
echo "<font size = 4 color = 'blue'>OLD INVOICES INCOMPLETE";
echo "<b> R".round($out, 0)."</b><BR /><BR /><BR />";
}
echo "</font>";
echo "<a href= 'check.php?CustNo=$CustInt' target=_blank>Check</a> <a href= 'PayNotes.php?CustNo=$CustInt' target=_blank>PayNotes: $PayNotes</a> <br><br>";

}


?>

 