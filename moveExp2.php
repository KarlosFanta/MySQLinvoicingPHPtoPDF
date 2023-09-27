<?php	//this is "editCustProcess.php"
 $page_title = "You seleted a Transomer";
	require_once('header.php');	
	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection
?>
<form name="Edit_trans_process" action="moveExp2chk.php" method="post">


<?php

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for updating before we change him on the last form.
$TableNameFrom = '';
$TBLrow = @$_POST['dropdown'];

echo "TBLrow: " .$TBLrow."</BR>";
$TableNameFrom = explode(';', $TBLrow);
echo "2";
echo "2";
	$TNF = $TableNameFrom[0];
if ($TNF == '')
{
	$TNF = $_GET['name'];
     echo "hello ". $_GET['name']. ".";
}
echo "<input type='text' name='TableNameFrom'  value='$TNF'  required/>";



//while ($TBLrow !=NULL) {
//echo "$TransNo</br />";
//$TransNo = strtok(";");
//}
//echo "TransNozERO: ";
//echo $TransNo[0]."</br />";
//$TransInt = intval($TransNo[0]);

//echo "<br>Transint:".$TransInt."</br />";

//$sql = "SELECT TransNo, TransFN, TransLN, TransTel, TransCell, TransEmail, TransAddr, Distance FROM Transomer WHERE TransNo = $TransInt" ;


$query = "SELECT * FROM $TNF order by ExpNo desc " ;
$query = "SELECT * FROM $TNF order by category  " ;
//$query = "SELECT * FROM $TNF where  Category = 'food' " ;






//$sql = "DELETE FROM Transomer WHERE TransNo = $TransInt" ;
//$sql = "TRUNCATE TABLE ' . $TBLname . '";   >>> THIS WAS MY PROBLEM!!!
//$stmt = OCIParse($conn, $sql);
//OCIExecute($stmt); 
//oci_fetch_all($stmt, $res); multi-dimensional array
//echo "<pre>\n";
//var_dump($res);
//echo "</pre>\n";

//$stid = oci_parse($conn, $sql);
//oci_execute($stid);
echo $query."</BR>";   //THIS SOLVED MY PROBLEM, I HAD TO LOOK AT THE QUERY STRING ITSELF
echo "Thank you for selecting transaction ".$TBLrow." from your database. You may now change the details:</BR>"   ;
?>
<form name="EditTrans" action="moveExp3.php" method="post">
<br><br><br><br><br><br><br><br>
<select name="exp" required >

<option value="">Select expense to be moved</option>";

<?php
echo "<br>firstWhile:<br><br>";
//print "<option value='$item'>$item";
  //print " </option>"; 
//while ($row = mysql_fetch_assoc($result)) {
if ($result = mysqli_query($DBConnect, $query)) {
  while ($row = mysqli_fetch_assoc($result)) {
$ExpNo = $row["ExpNo"];
$Category =  $row["Category"];
$ExpDesc =  $row["ExpDesc"];
$SerialNo = $row["SerialNo"];
$SupCode = $row["SupCode"];
$PurchDate = $row["PurchDate"];
$ProdCostExVAT = $row["ProdCostExVAT"];
$Notes = $row["Notes"];
$CustNo = $row["CustNo"];
$InvNo = $row["InvNo"];
$EE= $ExpNo.'_'.$ExpDesc;

print "<option value='$EE'>$ExpNo";
print "_".$Category;
print "_".$ExpDesc;
print "_".$SerialNo;
print "_".$SupCode;
print "_".$PurchDate;
print "_".$ProdCostExVAT;
print "_".$CustNo;
print "_".$InvNo;

print " </option>"; 

	}
$result->free();
}



?>

</select></p>  

<select name="newTable" >

<option value="_no_selection_">Select new table where it must be moved to</option>

<option value='expenses'>expenses</option> 
<option value='expensesH'>expensesH</option> 
<option value='expensesE'>expensesE</option>


</select></p>  

			<dd><input type="submit" name="btn_submit" value="Submit/Save" /> 
			
			<!--<input type="submit" name="btn_cancel" value="<?php //echo $this->lang->line('cancel'); ?>" /></dd>-->
		</dl>
</div>
</form>




