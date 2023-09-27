<html>


<head>

<title>Edit Invoice Process</title>


</head>
<body>

<?php	//this is "edit_inv_process.php"
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection
?>

<form name="EditInv" onsubmit="return formValidator();" action="editExpLast.php" method="post" >


<?php
$CustNo = $_POST['CustNo'];
$item3 = $_POST['CustLN'];
$item4 = $_POST['CustEmail'];

$TBLrow = $_POST['mydropdownEC'];

echo "TBLrow: " .$TBLrow."</BR>";
$Invno = explode(';', $TBLrow );
//while ($TBLrow !=NULL) {
//echo "$Invno</br />";
//$Invno = strtok(";");
//}
//echo "InvnozERO: ";
//echo $Invno[0]."</br />";
$InvNo = intval($Invno[0]);

echo "<br>InvNo: <b>".$InvNo." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>edit_inv_processE.php</b> opens editExplast.php</b><br/>";
?>
<input type="hidden" id="CustNo"  name="CustNo" value="<?php echo $CustNo;?>">
<input type="hidden" id="InvNo"  name="InvNo" value="<?php echo $InvNo;?>">
<input type="hidden" id="CustLN"  name="CustLN" value="<?php echo $item3;?>">
<input type="hidden" id="CustEmail"  name="CustEmail" value="<?php echo $item4;?>">
<?php
$query = "SELECT * FROM expenses WHERE CustNo = '$CustNo'";
echo $query;
echo "<br>yo<br>";
		
 ?>
<select name="mydropdownEC" onchange='this.form.submit()'>

<option value="_no_selection_">Select Expense</option>";
<?php


  
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$ExpNo = $row["ExpNo"];
$ExpDesc = $row["ExpDesc"];
$Category =  $row["Category"];
$SerialNo = $row["SerialNo"];
$SupCode = $row["SupCode"];
$PurchDate = $row["PurchDate"];
$ProdCostExVAT = $row["ProdCostExVAT"];
$Notes = $row["Notes"];
$InvNo2 = $row["InvNo"];
print "<option value='$ExpNo'>$ExpNo";
print "_".$ExpDesc;
print "_".$Category;
print "_".$SerialNo;
print "_".$SupCode;
print "_".$PurchDate;
print "_".$ProdCostExVAT;
print "_".$Notes;
print "_assigned to Invno:".$InvNo2;

//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




print " </option>"; 

/*    echo $row["CustNo"];//case sensitive!
    echo $row["CustFN"];//case sensitive!
    echo $row["CustLN"];//case sensitive!
*/
			}
		 mysqli_free_result($result);
}


echo "</select><br><br>";
echo "<input type='submit' name='btn_submit' value='select product' /></form> ";


  echo "<br>";
  
  
  
  
  
  
  
  
  
  
$ExpString = "select * from expenses  where InvNo = $InvNo";
echo $ExpString."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($ExpString, $DBConnect);
$NN = '';
$NNN = '';

if ($result = mysqli_query($DBConnect, $ExpString)) {
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

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
$SQLstring = "SELECT * FROM invoice WHERE InvNo = $InvNo" ;
//$sql = "DELETE FROM invoice WHERE InvNo = $InvNo" ;
//$sql = "TRUNCATE TABLE ' . $TBLname . '";   >>> THIS WAS MY PROBLEM!!!
//$stmt = OCIParse($conn, $sql);
//OCIExecute($stmt); 
//oci_fetch_all($stmt, $res); multi-dimensional array
//echo "<pre>\n";
//var_dump($res);
//echo "</pre>\n";

//$stid = oci_parse($conn, $sql);
//oci_execute($stid);
echo $SQLstring."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
echo "Thank you for selecting invoice ".$TBLrow." from your database. You may now change its details.</BR>"   ;


//$objResult = mysql_query($sql) or die(mysql_error());

//oracle: $objParse = oci_parse($conn, $sql);
//oracle: oci_execute ($objParse,OCI_DEFAULT);

//while (($row = oci_fetch_array($stid, OCI_BOTH))) {
//while (($row = oci_fetch_array($stid, OCI_RETURN_NULLS))) {
//oracle: while($objResult = oci_fetch_array($objParse,OCI_RETURN_NULLS)) {
    // Use the uppercase column names for the associative array indices
 /*   echo $row[0] . $row['InvNO']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[1] . $row['InvFN']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[2] . $row['InvLN']   . " are the same<br>\n"; //i must use capital letters!! make sure that the invoice has a surname entered!!!
    echo $row[3] . $row['InvTEL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[4] . $row['InvCELL']   . " are the same<br>\n"; //i must use capital letters!!
    echo $row[5] . $row['InvEMAIL']"</br>";
    echo $row[6] . $row['InvADDR']"</br>";
    echo $row[7] . $row['DISTANCE']"</br>";
 */
// while ($row = mysql_fetch_assoc($objResult)) {



//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.

//$QueryResult = @mysql_query($SQLstring, $DBConnect);
if ($result = mysqli_query($DBConnect, $SQLstring)) {

/////////if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>CustNo";
echo "CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>InvPdStatus</th>";
echo "</tr>\n";


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
    //////////while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);


	  ////$x = $row[0];
	  $x = $row["InvNo"];
//	  echo "<th>".$row["CustNo"]."</th>";
//echo "<th>".$row["CustFN"]."</th>";



	  echo "<tr><th>";
	  echo "</th>";
echo "<th>".$row['CustNo'];
$CN = $row["CustNo"];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

//echo " {$row2[0]."</th>";
//echo " {substr('$row2[0]', 0, 4)."</th>";
echo substr($row2[0], 0, 7)."</th>";

//substr('abcdef', 0, 4);
}
echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";
echo "<th>".$row["D1"]."</th>\n";
echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();
	
}
echo "</table>";






 echo "<br>";
$SQLstring2 = "SELECT * FROM invoice WHERE CustNo = $CustNo" ;
echo $SQLstring2."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF

if ($result = mysqli_query($DBConnect, $SQLstring2)) {

echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>CustNo";
echo "CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>Summary</th>";
echo "<th>TotAmt</th>";
echo "<th>D1</th>";
echo "<th>ex1</th>";
echo "<th>D2</th>";
echo "<th>D3</th>";
echo "<th>D4</th>";
echo "<th>D5</th>";
echo "<th>D6</th>";
echo "<th>D7</th>";
echo "<th>D8</th>";
echo "<th>InvPdStatus</th>";
echo "</tr>\n";


    // fetch object array 
	  while ($row = mysqli_fetch_assoc($result)) {
    //////////while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);


	  ////$x = $row[0];
	  $x = $row["InvNo"];
//	  echo "<th>".$row["CustNo"]."</th>";
//echo "<th>".$row["CustFN"]."</th>";



	  echo "<tr><th>";
	  echo "</th>";
echo "<th>".$row['CustNo'];
$CN = $row["CustNo"];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

//echo " {$row2[0]."</th>";
//echo " {substr('$row2[0]', 0, 4)."</th>";
echo substr($row2[0], 0, 7)."</th>";

//substr('abcdef', 0, 4);
}
echo "<th>".$row["InvDate"]."</th>";
echo "<th>".substr($row["Summary"], 0, 15)."</th>";
echo "<th>".$row["TotAmt"]."</th>\n";
echo "<th>".$row["D1"]."</th>\n";
echo "<th>".$row["D2"]."</th>\n";
echo "<th>".$row["D3"]."</th>\n";
echo "<th>".$row["D4"]."</th>\n";
echo "<th>".$row["D5"]."</th>\n";
echo "<th>".$row["D6"]."</th>\n";
echo "<th>".$row["D7"]."</th>\n";
echo "<th>".$row["D8"]."</th>\n";
echo "<th>".$row["InvPdStatus"]."</th>\n";
echo "</tr>\n";
		}
    //
    $result->close();
	
}
echo "</table>";























if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {


 		echo "<dl>";
			echo "<dt><label>* invoice AutoNumber:</label>Invoice Number can only be changed using phpMyAdmin</dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='InvNo'  value=";
			//echo $row[0];
			echo $row['InvNo'];
			//echo $objResult[0];
			//echo 'kkk'.$objResult['InvNo'];
			echo "> </dd>";
			
			
			
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//			<?php
			
			$CustInt = $row['CustNo'];

$queryFL = "SELECT L1 FROM customer WHERE CustNo = $CustInt" ;
//echo "queryFL:".$queryFL."<br>";

if ($resultFL = mysqli_query($DBConnect, $queryFL)) {      //I think this is to determine the MAX invoice number
  while ($rowFL = mysqli_fetch_assoc($resultFL)) {
  $FL = $rowFL['L1'];
//echo "Folder Location: ".$FL."&nbsp;&nbsp;"; //filelocation
}}
if ($FL == "")
{
echo "<br><font size = 5 color = red><b>NO CUSTOMER FOLDER FOUND</b></font><br>";
$FL= "F:/_work/Customers";
}
//echo "<input type='text' name='L1' size = 35 value=";
			//echo $FL;
//			echo ">";
			//echo "<br>";
			$newfldr = $FL;
			
//strtr($newfldr, array('/' => '\\')) ;
strtr($newfldr, array('\\' => '/')) ;

			
			//echo "<br><br> newfldr: ".." <br>";
			
			echo "<a href= 'file:///".$newfldr."'  >$newfldr</a>   <br>";



			
			
			
			
			
			
			
			
		echo "</dl>";

 		echo "<dl>";
			echo "<dt><label>* CustNo:</label></dt>";
			//     <!--<dd><input type="text" name="Inv_name" id="Inv_fn" value="<?php echo $daNextNo; q_mark>" /></dd>-->
			echo "<dd><input type='text' name='CustNo' value=";
	echo $row['CustNo'];}}
?>			
		
</form>




