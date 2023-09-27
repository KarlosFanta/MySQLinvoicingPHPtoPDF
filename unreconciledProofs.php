<?php

	//$page_title = "Customer";
	require_once("inc_OnlineStoreDB.php");
   @session_start();
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
if (@$CustInt == '')
	$CustInt = $_SESSION['CustNo'];

?> 

<?php //require_once "header.php"; ?>
<font color=#F5F5DC>unreconciledProofs.php &nbsp;&nbsp;&nbsp;order by  desc</font>

</br>
<?php
$SQLstring = "select * from aproof where CustNo = '$CustInt' and TransNo = ''";
//$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvDate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryresultPF.
if ($resultPF = mysqli_query($DBConnect, $SQLstring)) {
    
if (mysqli_num_rows($resultPF)> 0)
{
   printf("%d ", mysqli_num_rows($resultPF));
   echo "Unreconciled proofs of customer:";
   echo "<table  border='1'>";
echo "<tr><th>Proof No&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>ProofDate</th>";
echo "<th>Amt</th>";
echo "<th>PMethod</th>";

echo "</tr>\n";

	  while ($row = mysqli_fetch_assoc($resultPF)) {
	
			echo "<th>{$row['ProofNo']}</th>";
			echo "<th>{$row['ProofDate']}</th>";
			echo "<th>R{$row['Amt']}</th>";
			echo "<th>{$row['PMethod']}</th>";
	}
    mysqli_free_result($resultPF);
  echo " </table>";
   
   
   
   }
   
   else
   {
   echo "All proof reconciled<br>";
    mysqli_free_result($resultPF);
}
	
	}   

?>

