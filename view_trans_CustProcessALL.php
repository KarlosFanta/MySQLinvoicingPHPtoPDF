<?php	
 $page_title = "You seleted a Transomer";
	require_once('header.php');	
		require_once("inc_OnlineStoreDB.php");

?>
<form name="Edit_trans_CustProcess" action="print_statement.php" method="post">


<?php
   @session_start();
/*
How many invoices of transaction  to display on the right:
<input type="text" name="in" value= "2" >
How many invoices descriptions to display on the right:
<input type="text" name="indesc" value= "0" >
Display invPd Status: Y/N
<input type="text" name="DisplayInvPdStatus"  value= "N"  >
Display invPd Status: Y/N
<input type="text" name="InvPdStatus"  value= "N"  >
Display trans priority: Y/N
<input type="text" name="pr" value= "N"   >
Display payment method: Y/N
<input type="text" name="pm" value= "N"   >
Display events: Y/N
<input type="text" name="ev" value= "Y"   >
*/

/////////   Display reconciled invoices and reconciled transactions:
//echo "teeeee1:un:".$un;

//echo "teeeee1:un:".$un."<br><br>";

if (@$pr == '')
    $pr = "20";
$pr = @$_POST['pr']; //inv descriptions
echo "<input type='hidden' name='pr' value='".$pr."'>";
$pm = "20";
$pm = @$_POST['pm']; //inv descriptions
//echo "pm:".$pm;
echo "<input type='hidden' name='pm' value='".$pm."'>";
$ev= "20";
$ev = @$_POST['ev']; //inv descriptions
echo "<input type='hidden' name='ev' value='".$ev."'>";

//!! This is an inbetween form which launches the process_last.php form!!!
//!!here we view the details of the Transomer for updating before we change him on the last form.

$TBLrow = @$_POST['mydropdownEC'];
echo "<input type='hidden' name='TBLrow' value='".$TBLrow."'>";

if (@$in == '')
$in = @$_POST['in'];
echo "<input type='hidden' name='in' value='".$in."'>";

if (@$indesc == '')
$indesc = @$_POST['indesc'];
echo "<input type='hidden' name='indesc' value='".$indesc."'>";
$DisplayInvPdStatus = @$_POST['DisplayInvPdStatus'];
echo "<input type='hidden' name='DisplayInvPdStatus' value='".$DisplayInvPdStatus."'>";



echo "<b>DRAFT STATEMENT </b>&nbsp;&nbsp;This statement may be incomplete  &nbsp;&nbsp;&nbsp;  Date: ".date("j M Y G:i")." <BR />";
//echo "TBLrow: " .$TBLrow."</BR>";
//echo "TBLrow0: " .$TBLrow[0]."</BR>";
//echo "TBLrow1: " .$TBLrow[1]."</BR>";
//echo "TBLrow2: " .$TBLrow[2]."</BR>";
$CustNo = explode('_', $TBLrow );
//echo "strange: ".$CustNo[0];
/*echo "<br> C0:".$CustNo[0];
echo " C1:".$CustNo[1];
echo " C2:".$CustNo[2];
echo " C3:".$CustNo[3]."<br>";
*/

//while ($TBLrow !=NULL) {
//echo "$TransNo</br />";
//$TransNo = strtok(";");
//}
//echo "TransNozERO: ";
//echo $TransNo[0]."</br />";
$CustInt = intval($CustNo[0]);
if ($CustInt == 0)
 $CustInt = intval($_SESSION['CustNo'] );
if ($CustInt == '')
 $CustInt = intval($_SESSION['CustNo'] );
 
 
//echo "<br>CustInt:".$CustInt."</br />";


//  $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");//error control operator @ suppresses the error messages TEST Q


$query =("SELECT * FROM customer where CustNo = $CustInt ");
//echo $query;
if ($result = $DBConnect->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
//$id =  $row_list['id'];
//$name = $row_list['name'];
//$email = $row_list['email'];
$CustNo =  $row['CustNo'];
$CustFN =  $row['CustFN'];
$CustLN =  $row['CustLN'];
$CustEmail =  $row['CustEmail'];
$CustTel =  $row['CustTel'];
$CustCell =  $row['CustCell'];
$Important =  $row['Important'];

$Abbr =  $row['ABBR'];







		}

    /* free result set */
    $result->free();
}


echo "Customer: ";
//echo $CustNo;
//echo " ";
echo $CustLN;
echo " ";
echo $CustFN;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustEmail;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustCell;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustTel;
$Important = str_replace('Â', '', $Important);
echo "<br>Important:";
echo $Important;







echo "<BR />Account No ".$TBLrow."</BR>"   ;

include ("view_trans_by_cust.php");

include  "view_inv_by_cust.php";
//include ("view_inv_by_custADV.php");

echo "<br><table border = 0><tr><th>";
echo "All invoices total to: </th><th align=left>R".number_format($Invsummm, 2, '.', ' ')."</th></tr>";


echo "<tr><th>All transactions total to: </th><th align=right>R".number_format($yo, 2, '.', ' ')."</th></tr>";



if (($Invsummm - $yo) > 0.06)
echo "<tr><th><b>Total Amount outstanding: </th><th align=right>R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
if (($Invsummm - $yo) > -0.01)
echo "<tr><th><b>Balance: </th><th align=right>R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<tr><th><b>Total Amount owing to you: </th><th align=right>R".number_format(-($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
echo "</th></tr></table>";

include ("view_Unpaid_inv_by_cust.php");
//include ("view_inv_by_custPD.php");
echo "<br><b>Click here for more details: <a href= 'view_inv_by_custADV.php'>view_inv_by_custADV.php</a></b>";
include "stmEmail.php";
?>
 
 			
			<!--<dd><input type="submit" name="btn_submit" value="<?php //echo $this->lang->line('submit'); ?>" />--> 
			<input type="submit" name="btn_submit" value="Display statement for printing"  /> 

 
 
 
</form>


<?php
if ($ev == "Y")
{
//echo "<br />view_event_by_cust.php<br />";
include ("view_event_by_cust.php");
}

//echo "teeeee:".$un;

//echo "un:".$un;
//echo "<br />view_inv_by_cust2.php<br />";
//include ("view_inv_by_cust2.php");
echo "<br />";

//echo "<BR />Invoices total to: R".$Invsummm."<br />";
//echo "All transactions total to: R".$yo."<br>";

//check negative value:
//echo "<b>********Total Amount : R".($Invsummm - $yo)."</b><BR />";
/*
if (($Invsummm - $yo) > 0)
echo "<b>Total Amount oustanding: R".($Invsummm - $yo)."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - $yo)."</b><BR />";
*/
include ("view_Unpaid_inv_by_cust.php"); //can;t be moved up -it relies on previous calculations.




?>
