<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Invoice</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
    session_start();
 


	$page_title = "Select a customer";
	require_once('header.php');	
	//require_once('db.php');	
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";

	if (@$_SESSION['CustNo'] == "" or @$_SESSION['CustNo'] == "NotYet")  //works if session was destroyed
	{
	//echo "no session<br />";
	//$_SESSION['sel'] = "addInvC";
	require_once('selectCust.php');	
	}
	else
	{
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	require_once('edit_inv_processC1.php');	
	}
	
	
//	require_once('view_cust.php');	

	
	
?>







<?php	/*$page_title = "Edit invoice";
	require_once('header.php');	
	require_once('inc_OnlineStoreDB.php');	
	
	
/*$conn = oci_connect('system', '1234', 'localhost/xe');
//$queryA = "SELECT Q.PRODID, Q.CUSTNO FROM QUOTATION Q, ORDER1 O WHERE Q.QUOTENO = O.QUOTENO AND Q.QUOTENO = $CustInt";

$query_term = "select O.orderno ||'; '||Q.PRODID from QUOTATION Q, order1 O WHERE Q.QUOTENO = O.QUOTENO order by orderno";
$stid_term = OCIParse($conn, $query_term); 
OCIExecute($stid_term,OCI_DEFAULT);


echo "<b><font size = '4' type='arial'>Select customer to Edit his/her Invoice</b></font>
</br></br></br></br>
</br>";

$daNextNo = 1; //default when table is empty.
$query = "SELECT  MAX(InvNo)  AS MAXNUM FROM invoice";

//$result=mysql_query($query);
//echo "<br>".$result."<br>";
//echo "<br>".intval($result)."<br>";
//while($row=mysql_fetch_array($result))


//$result = mysql_query($query) or die(mysql_error());
$result = $DBConnect->query($query);

// Print out result

$daNextNo = 1; //forces a 1 if table is completely empty.
while($row = mysqli_fetch_array($result)){
//	echo "The max no InvNo in customer table is:  ". $row[0] . "&nbsp;";
$daNextNo = intval($row[0])+1;
}
//	echo "Add 1 = ". $daNextNo;





//echo "<form name='AddInv' action='addInvprocess.php' method='post' target='_blank'>";
//echo "<select name='mydropdownDC' onclick='hi'>";
//echo "<option value='_no_selection_'>Select Customer to be invoiced</option>";



// If submitted, check the value of "select". If its not blank value, get the value and put it into $select.
/*if(isset($select)&&$select!="")
{
$select = $_GET['select'];
}


//echo "<form name='AddInv' action='addInvprocess.php' onsubmit='return formValidator();' method='post'>";
echo "<form action='edit_inv_processC1.php'  onsubmit='return formValidator()'  method='post' >";

//	echo"	<dl>
//			<dt><label>* Invoice AutoNumber: (!! Different for internet invoices!)</label></dt>
//			<!--<dd><input type='text' name='cust_name' id='cust_fn' value='<?php //echo $daNextNo; ?>
<?/*' /></dd>
//			<dd><input type='text' id='InvNo'  name='InvNo' value='<?php echo $daNextNo;?>' /></dd>
//		</dl>

//		<dl>
//			<dt><label>* Customer:<dd>
<!--<select name='mydropdownDC' onclick='hi'>-->
<select name='mydropdownDC' id='mydropdownDC' onchange='this.form.submit()'>
<?php
@session_start();
if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
$yo3 = "gggg";
//echo "<option value='_no_selection_'>Select Customer</option>";
//else
//echo "<option value='$yo3".$yo3.$_SESSION['CustNo']."'>".$yo3.$_SESSION['CustNo']."hhhh</option>";
//echo "<option value='$_SESSION['CustNo']."'>."hhhh</option>";
//echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";
echo "<option value='".$_SESSION['CustNo']."'>".$_SESSION['CustNo']."</option>";


?>
<!--<option>Please Choose Customer</option><!--if it does not say Please choose then javascript does nto work-->
<?php
// Get records from database (table "name_list").
$list = mysql_query("SELECT * FROM customer ORDER BY CustLN");

// Show records by while loop.
while($row_list=mysql_fetch_assoc($list)){
//$id =  $row_list['id'];
//$name = $row_list['name'];
//$email = $row_list['email'];
$CustNo =  $row_list['CustNo'];
$CustFN =  $row_list['CustFN'];
$CustLN =  $row_list['CustLN'];

echo "<option value='$CustNo' >";
// if($CustNo == $select){
//echo "selected";

echo $CustLN;

echo "$";
echo $CustNo;
echo "#";
/*echo $CustFN;

echo "</option>";
} 

?>
</select> 
<?php //echo $this->lang->line('cust_fn'); ?> </label></dt>
			<!--<dd><input type="text" id="cust_name" id="cust_fn" value="<?php //echo $this->mdl_custs->form_value('cust_name'); ?>" /></dd>-->
			</dd>
		</dl>

		
<!--
		<dl>
			<dt><label>&nbsp; Summary:</label> (no spaces!)</dt>
			<!--<dd><input type="text" name="cust_name" id="cust_fn" value="<?php //echo $daNextNo; ?>" /></dd>
			<dd><input type="text" id="Summary"  name="Summary" value="." /></dd>
		</dl>
	
-->		

<!--<input type="submit" value="Select customer for viewing his invoices" onclick="return confirm('Are you sure about the date?');" /> -->
<br>
<br><br>
<br><br>
<br><br>
<font size = 4><input type="submit" value="CLICK THIS BUTTON TO CONTINUE" /> </font>

<!--<input type="button" value="Submit" onclick="formValidator()" />--> 
	<br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>
</form>

<?php 
$SQLstring = "select * from invoice order by invno desc";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.


//mysql_close($DBConnect);
//$QueryResult = @mysql_query($SQLstring, $DBConnect);
//require_once("inc_OnlineStoreDB.php");
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo</th>";
echo "<th>CustNo</th>";
echo "<th>CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>InvPdStatus</th>";
echo "<th>D1</th>";
echo "<th>ex1</th></tr>\n";


    // fetch object array
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>\n";
echo "<th>{$row[5]}</th></tr>\n";
		}
    //free result set 
    $result->close();
	
}
echo "</table><br><br>";

$SQLstring = "select invoice.invno, customer.custNo, customer.custLN, invoice.invdate, invoice.invpdstatus,invoice.D1, invoice.Q1 from customer, invoice where customer.custno = invoice.custno";
//echo $SQLstring."<br><br>"; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.


//mysql_close($conn);
//$QueryResult = @mysql_query($SQLstring, $DBConnect);
require_once("inc_OnlineStoreDB.php");
if ($result = $DBConnect->query($SQLstring)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>InvNo</th>";
echo "<th>CustNo</th>";
echo "<th>CustLN</th>";
echo "<th>InvDate</th>";
echo "<th>InvPdStatus</th>";
echo "<th>D1</th>";
echo "<th>ex1</th></tr>\n";


    //fetch object array 
    while ($row = $result->fetch_row()) {
      //  printf ("%s (%s)\n", $row[0], $row[1]);

echo "<tr><th>{$row[0]}</th>";
echo "<th>{$row[1]}</th>";
$CN = $row[1];
$SQLstringLN = "select CustLN from customer where CustNo = $CN";
//echo $SQLstringLN.""; //the whole content of the table is now require_onced in a PHP array with the name $QueryResult.
$result2 = $DBConnect->query($SQLstringLN);
    while ($row2 = $result2->fetch_row()) {

echo "<th>{$row2[0]}</th>";
}
echo "<th>{$row[2]}</th>";
echo "<th>{$row[3]}</th>";
echo "<th>{$row[4]}</th>\n";
echo "<th>{$row[5]}</th></tr>\n";
		}
    //free result set
    $result->close();
	
}
echo "</table>";




*/

?>
</p>  
