<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "Customer";
	require_once("inc_OnlineStoreDB.php");
	
$pr = "20";
$pr = @$_POST['pr']; //inv descriptions
//echo "indesc:".$indesc;
if (@$indesc == '')
  $indesc = 8;
  
//  echo "indesc:".$indesc;
$yo = 0;
$loop = 0;
$in = 1;


if (@$_POST['in'] != "")
$in = @$_POST['in'];
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];
$DisplayInvPdStatus = @$_POST['DisplayInvPdStatus'];

echo "<BR />";
echo "All past transactions:";


	if (!empty($_GET["CustNo"])) {
    echo "Yes, mail is set"; 
$CustInt = $_GET['CustNo'];
	
}else{  
    echo "N0, mail is not set";
} 

if(isset($_GET["mail"])) echo "a is set\n";


$SQLstring = "select * from transaction where CustNo = '$CustInt' order by transdate ";


?>
			</b></font> &nbsp; &nbsp;  <font color=#65F5DC>view_trans_by_cust.php   order by transdate desc
			<?php echo $SQLstring;
echo "<br>indesc:".$indesc." in: ".$in;


			?>
			
			</font>
			<a href = "edit_transCQ.php" target= '_blank'>edit_transCQ.php</a>
			<a href = "../phpMyAdmin-3.5.2-english/index.php?db=kc&table=transaction"  target= '_blank'>../phpMyAdmin-3.5.2-english/index.php?db=kc&table=transaction</a>
			
</br>
<?php
$summm = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {

echo "<table  border='1'>";
echo "<tr>";
//echo "<th>TransNo</th>";
echo "<th>TransRecvd</th>";
echo "<th>AmtPaid</th>";
echo "<th length= '120'>Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>CustSDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";

if (@$in >0)
echo "<th>InvNoA</th>";
if (@$indesc >0)
echo "<th>InvNoA incl VAT</th>\n";
if ($in >1)
echo "<th>InvNoB</th>";
if ($indesc >1)
echo "<th>InvNoB incl VAT</th>\n";
if ($in >"2")
echo "<th>InvNoC</th>";
if ($indesc >2)
echo "<th>InvNoC incl VAT</th>\n";
if ($in >"3")
echo "<th>InvNoD</th>";
if ($indesc >3)
echo "<th>InvNoD incl VAT</th>\n";
if ($in >4)
echo "<th>InvNoE</th>";
if ($indesc >4)
echo "<th>InvNoE incl VAT</th>\n";
if ($in >5)
echo "<th>InvNoF</th>";
if ($indesc >5)
echo "<th>InvNoF incl VAT</th>\n";
if ($in > "6")
echo "<th>InvNoG</th>";
if ($indesc >6)
echo "<th>InvNoG incl VAT</th>\n";
if ($in >7)
echo "<th>InvNoH</th>";
if ($indesc >7)
echo "<th>InvNoH incl VAT</th>\n";

echo "<th>TMethod</th>";
//if ($indesc == "1")
echo "<th>Priority</th></tr>\n";

while ($row = mysqli_fetch_assoc($result)) {

$mmm =  $row['InvNoA'];  //invNoA    
//echo "mmm: ".$mmm;



//if ($mmm >= 0)     //invNoA   if a zero OR if not a number  for exmaple 44p55   part paid.

//if (preg_match('/[A-Za-z]/', $mmm) ||  ($mmm == 0)      )

//{
echo "<tr>";
/*echo "<th>";
if ($mmm == '0')
echo "<font color = orange>";

echo "Tr{$row['TransNo']}</font></th>";//TransNo
*/
$date_array = explode("-",$row['TransDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//Date
echo "<th>R{$row['AmtPaid']}</th>";///TOTAL AmtPaid
$yo = $yo+$row['AmtPaid'];
echo "<th>".mb_substr($row['Notes'], 0, 22)."</th>\n";//Notes
echo "<th>{$row['CustSDR']}</th>";//CustSDR

//echo "<th>24:{$row[24]}</th>";//ERROR

//echo "<th>R{$row[29]}</th>"; 
$summm = $summm + $row['AmtPaid'];


//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//Summary


if ($in >0)
echo "<th>Inv{$row['InvNoA']}</font></th>\n";//InvNoA  //InvA  from transaction table
if ($indesc >0)
echo "<th>R{$row['InvNoAincl']}</th>\n";  //InAincl  from transaction table
//$loop++;



if ($in >1)
echo "<th>{$row['InvNoB']}</th>";//InvNoB
//$loop++;
if ($indesc >1)
echo "<th>R{$row['InvNoBincl']}</th>"; //InvNoBincl



if ($in >2)
echo "<th>{$row['InvNoC']}</th>";
//$loop++;
if ($indesc >2)
echo "<th>R{$row['InvNoCincl']}</th>";


if ($in >3)
echo "<th>{$row['InvNoD']}</th>";
//$loop++;
if ($indesc >3)
echo "<th>R{$row['InvNoDincl']}</th>";


if ($in >4)
echo "<th>{$row['InvNoE']}</th>";
//$loop++;
if ($indesc >4)
echo "<th>R{$row['InvNoEincl']}</th>";



if ($in >5)
echo "<th>{$row['InvNoF']}</th>";
//$loop++;
if ($indesc >5)
echo "<th>R{$row['InvNoFincl']}</th>";


if ($in >6)
echo "<th>{$row['InvNoG']}</th>";
//$loop++;
if ($indesc >6)
echo "<th>R{$row['InvNoGincl']}</th>";



 if ($in >7)
echo "<th>{$row['InvNoH']}</th>";
//$loop++;
if ($indesc >7)
echo "<th>R{$row['InvNoHincl']}</th>";//InvNoHincl  Dont forget to enable invoice descriptions as well





echo "<th>{$row['TMethod']}</th>\n";//EFT TMethod
echo "<th>{$row['Priority']}</th>";//priority

echo "</tr>\n";


		}
    mysqli_free_result($result);
	
}
echo "</table>";


//if ($un == 'Y')
echo "Transactions Paid totals to: R ".$summm."<br />";


 
?>

