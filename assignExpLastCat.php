 <?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include('header.php');	
require_once("inc_OnlineStoreDB.php");
?>


<?php
//$ProofNo = 0;
$CustNo = '';
$ProofDate = '';
$Amt = '';
$Notes ='';
//$mde  = '';
//$mde = @$_POST['mde'];
//echo "<br>mde:".$mde."<<<<br>";
//$mde3 = '';
//$mde3 = @$_POST['mde3'];
//echo "<br>mde3:".$mde3."<<<<br>";
//$mde4  = '';
//$mde4 = @$_POST['mde4'];
//echo "<br>mde4:".$mde4."<<<<br><br><br>";

/*
$mde1 = $_POST['mde1'];
if ($mde1 == '_no_selection_')
{
	echo "no select";
	$mde1 = $_POST['mde'];
}
echo "<br>CCC:".$mde1."<<<<br>";
echo "<br>mde1:";
echo $mde1;
if ($mde1 == '_no_selection_')
$mde1 =  $_POST['mde'];

echo "<br><bR>";
*/

$result = '';




if ($_POST['mde3'] == '_nooooo_selection_')
	echo '<br>mde3 _nooooo_selection_<br>';
else
{	
	$result = $_POST['mde3'];
	echo '<br>mde3 selected '.$result.'<br>';
	
}

if ($_POST['mdeSerial'] == '_nooooo_selection_')
	echo '<br>mdeSerial _nooooo_selection_<br>';
else
{	
	$result = @$_POST['mdeSerial'];
	echo '<br>mdeSerial selected  '.$result.'<br>';
	
}




$clExp2 = explode('_', $result);
echo "clExp2[0]: ";
echo "clExp2[1]: ";
echo "clExp2[2]: ";
echo $clExp2[0];
echo "<br><bR>";
$clExp3= $clExp2[0];

//$CustNo" 
$CustFN ="_";
$CustLN ="_";
$CustEmail = "_";


$CustNo = $_POST['CustNo'];

if ($CustNo == 0)
echo "<font size = '5'>ERROR CUSTNo is zero</FONT><br>";



$CustNo = $_POST['CustNo'];

$SQLString = "SELECT * FROM customer WHERE CustNo = $CustNo" ;
//echo $SQLString."<br>";

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["CustNo"];
$CustFN =  $row["CustFN"];
$CustLN =  $row["CustLN"];
$item4 = $row["CustEmail"];
$Important = $row["Important"];
/*$item5 = $row["Notes"];
$item6 = $row["CustSDR"];
$item7 = $row["TMethod"];
$item8 = $row["InvNoA"];
$item9 = $row["InvNoAincl"];
$item10 = $row["Priority"];*/
print "$item1";
print "<b> <font size = 3>".$CustFN;
print " <b>".$CustLN;
print "</font></b> ".$item4;
echo "..{$row['dotdot']}";
/*print "_".$item5;
print "_".$item6;
print "_".$item7;
print "_".$item8;
print "_".$item9;
print "_".$item10;*/
}
$result->free();
};

//$CustFN = $_POST['CustFN'];
//$CustLN = $_POST['CustLN'];
//$CustEmail = $_POST['CustEmail'];

$CustEmail = str_replace(';', '; ', $CustEmail);


//$ProofNo = $_POST['ProofNo'];

$Numb = "ProofNo1"; //default when table is empty.
//$query = "SELECT  MAXNUM(ProofNo)  AS MAXNUM FROM aproof order by ProofNo";
//$query = "select ProofNo from aproof order by ProofNo desc limit 1"; // gives Proofno9 instead of Proofno11
//$query = "select ProofNo from aproof asc limit 1";
//$query = "select ProofNo from aproof order by SUBSTRING(ProofNo, 2) desc limit 1"; // gives Proofno9 instead 
//$query = "select ProofNo from aproof order by ProofDate desc limit 1";
$query = "SELECT ProofNo,CONVERT(SUBSTRING_INDEX(ProofNo,'ProofNo',-1),UNSIGNED INTEGER) AS num
FROM aproof ORDER BY num desc limit 1;  ";
 //http://stackoverflow.com/questions/5960620/convert-text-into-number-in-mysql-query
//$result = mysqli_query($DBConnect, $query);// or die(mysql_error());


/*while($row = mysqli_fetch_array($result)){
	echo "<br>The max no ProofNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = $row[0];
$Numb = substr($daNextNo, 7);
$Numb++;
}
echo "<br><br>";
$ProofNo = "ProofNo".$Numb;
*/
/*
$D1 = $_POST['ProofDate'];
$D2 = explode("/", $D1);
$ProofDate = $D2[2]."-".$D2[1]."-".$D2[0];
$CustSDR = $_POST['CustSDR'];
$Amt = $_POST['Amt'];
$Notes = $_POST['Notes'];
$EEmail = $Notes;
echo " notes:".$Notes ;
$charset = mysqli_character_set_name($DBConnect);
printf ("Current character set is %s\n",$charset);
$Notes = str_replace('"', '&quot;', $Notes);  //for mailto: emails.
$EEmail = $Notes;  
$von = array("ä","ö","ü","ß","Ä","Ö","Ü"," ","é");
$zu  = array("&auml;","&ouml;","&uuml;","&szlig;","&Auml;","&Ouml;","&Uuml;","&nbsp;","&#233;");
$Notes = str_replace($von, $zu, $Notes);  
echo " specNotes:".$Notes."<br>" ;
$Notes = mysqli_real_escape_string($DBConnect, $Notes); //Note, that if no connection is open, mysqli_real_escape_string() will return an empty string!
$CustSDR = preg_replace("/ö/","oe",$CustSDR); //WORKS!
*/
echo "Thank you for details: CustNo".$CustNo ." ExpNo".@$clExp ."."  ;


$query="update expenses set CustNo = '$CustNo'  where ExpNo = $clExp3";


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
echo '</br>';

mysqli_query($DBConnect, $query);

 echo "<font size = 3 color = red><b>".mysqli_error($DBConnect)."<br></font>";

//printf("Affected rows (UPDATE): %d\n", mysqli_affected_rows($DBConnect));
//echo mysqli_affected_rows($DBConnect);
if (mysqli_affected_rows($DBConnect) == -1)
echo "<font size = 3  color = red><b><b>update NOT successful!!!<br> $query</b>!!</b></font><br><br></b>";
else
echo "<font size = 3>update success! </font><br>$query<br>";


//echo "<a href = 'view_trans_all.php'>view_trans_all.php</a></a><br>";

//echo "<input type='text' id='CNN'  name='CNN' value=".$CustNo.">";

//include ("addTransCustProcess3.php");





//php to sql does not understand semicolon. remove the semicolon!!!
//$ProofInt = intval($ProofNoInt);


$SQLString = "SELECT * FROM expenses WHERE ExpNo = $clExp3";
//$SQLString = "SELECT * FROM transaction WHERE WHERE CustNo = $item2;
?>
<b><font size = "3" type="arial">You updated the expense:<br></b></font>

<?php
//$clExp2 = explode('_', $clExp);
/*echo "<br>GGGclExp[1]: ";
echo $clExp[1];
echo "<br>clExp[2]: ";
echo $clExp[2];
echo "<br><bR>";
*/

if ($result = mysqli_query($DBConnect, $SQLString)) {
  while ($row = mysqli_fetch_assoc($result)) {
$ExpNo = $row["ExpNo"];
//$item2 =  $row["CustNo"];
//$CustInt =  $row["CustNo"];
$Category = $row["Category"];
$ExpDesc = $row["ExpDesc"];
$SerialNo = $row["SerialNo"];
$SupCode = $row["SupCode"];
$ProdCostExVAT = $row["ProdCostExVAT"];
$Notes = $row["Notes"];
$CustNo = $row["CustNo"];
print "ExpNo: $ExpNo";

print "_category: ".$Category;
print "_ExpDesc: ".$ExpDesc;
print "_S/N: ".$SerialNo;
print "_SupCode: ".$SupCode;
print "_<br>R".$ProdCostExVAT;
print "ex VAT_".$Notes;
print "_Notes: ".$CustNo;
}
$result->free();
}

	
echo "<br><br>Select an invoice the expense must be added to: <br>";

?>
<form name="EditInv" action="invAssignProcess.php" method="post">
<?php
echo "<br>ExpNo: <input type = text value='$clExp3' name= clExp3 id=clExp3><br>";
?>
<!--<form name="EditInv" action="print_invoice.php" method="post">-->

<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select invoice</option>";

<?php
$query = "select * from invoice where CustNo = $CustNo ORDER BY InvNo DESC";
echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$item1 = $row["InvNo"];

print "<option value='$item1'>$item1";
$item2 =  $row["CustNo"];
$item3 =  $row["Summary"];
$queryEXP = "select * from expenses where InvNo = $item1";
$ExpNo = '';

if ($resultEXP = mysqli_query($DBConnect, $queryEXP)) {
  while ($rowEXP = mysqli_fetch_assoc($resultEXP)) {
$ExpNo = $rowEXP["ExpNo"];
$ExpDesc =  $rowEXP["ExpDesc"];
//$item3C = $rowEXP["CustLN"];
print "_[".$ExpNo;
//print "_CNo: ".$item2C;
print "_".$ExpDesc."] ";

}
mysqli_free_result($resultEXP);
}
if ($ExpNo == '')
	echo "Not yet Assigned";



//echo " ".$item2;
echo " ".$item3;
$item4 = $row["TotAmt"];
echo " R".$item4;
$item5 = $row["InvDate"];
echo " ".$item5;
echo " ".$row["D1"];
echo " ".$row["D2"];
echo " ".$row["D3"];
echo " ".$row["D4"];
echo " ".$row["D5"];
echo " ".$row["D6"];
echo " ".$row["D7"];
echo " ".$row["D8"];


/*
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

}
mysqli_free_result($resultC);
}
*/
}


print " </option>"; 

/*    echo $row["InvNo"];//case sensitive!
    echo $row["InvFN"];//case sensitive!
    echo $row["InvLN"];//case sensitive!

	}
*/
mysqli_free_result($result);

}
else


	echo $queryC;
/* close connection */
//$mysqli->close();
echo "item2: ".$item2 ."<br>";?>
<br>
<input type="submit" name="btn_submit" value="Select invoice" /> 

</select></p>  


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








