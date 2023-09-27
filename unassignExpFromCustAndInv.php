 <?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
$CustNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';

//$CustNo" 
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";


$CustNo = $_POST['CustNo'];

if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT>";



$clExp = $_POST['mydropdownEC'];
echo "mydropdownEC:";
echo $clExp;
echo " ";

$clExp2 = explode('_', $clExp);
echo "clExp2[0]:";
echo $clExp2[0];
echo " ";
$clExp3= $clExp2[0];

$CustFN = $_POST['CustFN'];
$CustLN = $_POST['CustLN'];
$CustEmail = $_POST['CustEmail'];

$CustEmail = str_replace(';', '; ', $CustEmail);


//$ProofNo = $_POST['ProofNo'];


echo "CustNo ".$CustNo ." ExpNo ".$clExp ."."  ;

/*
$query="update expenses set InvNo = '$InvNo'  where ExpNo = $clExp3";


/*(TransNo = $ProofNo, CustNo = $CustNo, ProofDate ='$ProofDate', Amt = $Amt, Notes = '$Notes', PMethod = '$PMethod', 
InvNoA = '$InvNoA', InvNoAincl = '$InvNoAincl' ,
InvNoB = '$InvNoB', InvNoBincl = '$InvNoBincl' ,
InvNoC = '$InvNoC', InvNoCincl = '$InvNoCincl' ,
InvNoD = '$InvNoD', InvNoDincl = '$InvNoDincl' ,
InvNoE = '$InvNoE', InvNoEincl = '$InvNoEincl' ,
InvNoF = '$InvNoF', InvNoFincl = '$InvNoFincl' ,
InvNoG = '$InvNoG', InvNoGincl = '$InvNoGincl' ,
InvNoH = '$InvNoH', InvNoHincl = '$InvNoHincl' ,
Priority = '$Priority') ";*/
//oracle: $query="update transaction set Transfn = '$CustNo', Transln ='$ProofDate', Transtel = '$Amt', Transcell= '$Notes', Transemail = '$PMethod', Transaddr = '$InvNoA', distance = '$InvNoAincl' where Transno = :ProofNoInt";
//echo '</br>';

/*mysqli_query($DBConnect, $query);

 echo "<font size = 3 color = red><b>".mysqli_error($DBConnect)."<br></font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 3  color = red><b><b>update NOT successfull!!!<br> $query</b>!!</b></font><br><br></b>";
else
echo "<font size = 3>update success! </font><br>$query<br>";


//echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";

//echo "<input type='text' id='CNN'  name='CNN' value=".$CustNo.">";

//include ("addTransCustProcess3.php");


*/


//php to sql does not understand semicolon. remove the semicolon!!!
//$ProofInt = intval($ProofNoInt);


$SQLString = "SELECT * FROM expenses WHERE CustNo = $CustNo";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>

 <?php
/*if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["ExpNo"];
//$item2 =  $row["CustNo"];
//$CustInt =  $row["CustNo"];
$item3 = $row["Category"];
$item4 = $row["ExpDesc"];
$item5 = $row["SerialNo"];
$item6 = $row["SupCode"];
$item7 = $row["ProdCostExVAT"];
$item8 = $row["Notes"];
$item9 = $row["CustNo"];
print "$item1";

print "_".$item3;
print "_R".$item4;
print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
}
$result->free();
}
	*/
	
	
	
	$SQLstring = "select * from expenses where ExpNo = $clExp3";
//$SQLstring = "select * from transaction  where TransNo >  (select Max(TransNo) from transaction) -88 order by TransDate";
//echo "&nbsp;&nbsp;&nbsp;&nbsp;All expenses of 88 days ago:";
//$SQLstring = "select * from transaction  where TransDate between date_sub(now(),INTERVAL 1 WEEK) and now();  ";

//where date between date_sub(now(),INTERVAL 1 WEEK) and now();
echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $SQLstring)) {
  //  printf("TheSelect returned %d rows.\n", mysqli_num_rows($result));

echo "<table  border='1' >\n";
echo "<tr><th>ExpNo</th>";
echo "<th>ExpDesc&nbsp;&nbsp;</th>";
echo "<th>SupCode</th>";
echo "<th>PurchDate</th>";
echo "<th>ExVAT</th>";
echo "<th>inVAT</th>";

echo "<th>Inv</th>";
echo "<th>Notes</th>\n";
echo "<th>CustNo</th>\n";
echo "<th>Serial</th>\n";
echo "</tr>\n";


while ($row = mysqli_fetch_assoc($result)) 
//while($row = $result->fetch_array())
{


echo "<th>".$row['ExpNo']."</th>";
echo "<th>".$row['ExpDesc']."</th>";
echo "<th>".$row['SupCode']."</th>";
echo "<th>".$row['PurchDate']."</th>";
//echo "<th>testss</th>";
echo "<th>".$row['ProdCostExVAT']."</th>";
$PEX= $row['ProdCostExVAT'];
$PIV = number_format($PEX*1.15 , 2, '.', '');
echo "<th>".$PIV."</th>";

echo "<th>".$row['InvNo']."</th>";
echo "<th>".$row['Notes']."</th>";
$CCCC = $row['CustNo'];
$s = "SELECT * from customer where CustNo = '$CCCC'";
if ($resultCC = mysqli_query($DBConnect, $s)) {
while ($rowCC = mysqli_fetch_assoc($resultCC)) 
{ 

$NN = $rowCC['CustLN'];
$NNN = $rowCC['CustFN'];

}}
echo "<th>".$row['CustNo'].$NN.$NNN."</th>";
echo "<th>".$row['SerialNo']."</th>";

echo "</tr>";

}
echo "</table >";

mysqli_free_result($result);


}

//mysqli_close($DBConnect); //wqarning! causes mysqli_query(): Couldn't fetch mysqli in other files
//include "edit_invCQ.php";
//echo "<br>";
//include "view_inv_by_custBasic.php";
 
	
	
	
echo "Confirm that this expense gets removed from the customer: <br>";

?>
<form name="EditInv" action="unassignExpFromCustProcess.php" method="post">
<?php
echo "<br>ExpNo: <input type = text value='$clExp3' name= clExp3 id=clExp3><br>";
?>
<!--<form name="EditInv" action="print_invoice.php" method="post">-->


<?php
/*$query = "select * from invoice where CustNo = $CustNo ORDER BY Invno DESC";

echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["InvNo"];

print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];
$item5 = $row["InvDate"];
echo " ".$item5;

$item3 =  $row["Summary"];
//echo " ".$item2;
echo " ".$item3;
$item4 = $row["TotAmt"];
echo " R".$item4;
echo " ".$row["D1"];
echo " ".$row["D2"];
echo " ".$row["D3"];
echo " ".$row["D4"];
echo " ".$row["D5"];
echo " ".$row["D6"];
echo " ".$row["D7"];
echo " ".$row["D8"];



if ($CustNo == 0)
{
if ($resultC = mysqli_query($DBConnect, $queryC)) {
  while ($rowC = mysqli_fetch_assoc($resultC)) {
$item1C = $rowC["CustNo"];
$item2C =  $rowC["CustFN"];
$item3C = $rowC["CustLN"];
print "_".$item1C;
//print "_CNo: ".$item2C;
print "_".$item3C." ";

}}
}


print " </option>"; 

	}

mysqli_free_result($result);

}
else


	echo $queryC;
/* close connection */
//$mysqli->close();
?>
<br>
<input type="submit" name="btn_submit" value="Confirm expense to be unassigned" /> 

</select></p>  

<a href = "edit_invCQ.php">Search through customer's invoices here</a>

<?php


$SQLstring = "select * from invoice where CustNo = $CustNo  order by InvDate desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;</th>";

echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>Draft</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>ex2</th>";
echo "<th>D3</th>";
echo "<th>ex3</th>";
echo "<th>D4</th>";
echo "<th>ex4</th>";
echo "<th>D5</th>";
echo "<th>ex5</th>";
echo "<th>D6</th>";
echo "<th>ex6</th>";
echo "<th>D7</th>";
echo "<th>ex7</th>";
echo "<th>D8</th>";
echo "<th>ex8</th>";

echo "</tr>\n";


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];



	  echo "<tr><th>";
	  
	   echo $x;
echo "</th></FONT>";

echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";
echo "<th>".$row["Draft"]."</th>\n";

$str = chunk_split($row["D1"], 37, "\n\r");
echo "<th>".$str."</th>\n";
echo "<th>".chunk_split($row["ex1"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex2"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex3"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex4"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex5"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex6"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex7"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["D8"], 37, "\n\r")."</th>\n";
echo "<th>".chunk_split($row["ex8"], 37, "\n\r")."</th>\n";
//echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();
	
}
echo "</table>";
echo "<br><br>Exclude ADSL invoices:<br>";

	
	
	
	
	
	
	
	
	
	
	
	
	
?>


<!--<form name="Editcust" action="addProofCustProcess2sess.php" method="post">-->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form name="Editcust" action="addProof.php" method="post">

<!--<input type = "hidden" name="mydropdownEC" value="<?php //echo $CustNo ?>">-->
<input type = "hidden" name="CustNo" value="<?php echo $CustNo ?>">

<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">
<input type = "hidden" name="ProofDate" value="<?php echo $ProofDate ?>">
<input type = "hidden" name="Amt" value="<?php echo $Amt ?>">

<a href = "editExpCQ.php"> Edit customer's expense</a>	<br><br>
<a href = "add_proof.php"> Click to add another proof</a>	<br><br>
<a href = "add_trans.php"> Click to add another transaction</a>	<br><br>

	<!--<input type = "submit" value = "Click to add another transaction">-->


	

<?php
//echo $query;
$ttttt = 0;

echo "<br><br>";



?>
<a href='selectCustProof.php'>Click to add email proof for another customer</a> or <input type = "submit" value = "Click to add email proof for the same customer">
</font></b>





	<br><br>
	

	<br><br>

	
	

<br><br><br><br>
<?php








?>








