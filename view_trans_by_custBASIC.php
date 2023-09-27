<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	
	require_once("inc_OnlineStoreDB.php");
	
$pr = "20";
$pr = @$_POST['pr']; //inv descriptions
//echo "indesc:".$indesc;
if (@$indesc == '')
  $indesc = 8;
  
//  echo "indesc:".$indesc;
$yo = 0;
$loop = 0;
$in = 8;


if (@$_POST['in'] != "")
$in = @$_POST['in'];
if (@$_POST['indesc'] != "")
$indesc = @$_POST['indesc'];
$DisplayInvPdStatus = @$_POST['DisplayInvPdStatus'];

$gfg = '';
$gfg1 = '';
$gfg2 = '';
$gfg1 = @$aDoor[0];
$gfg2 = explode(',', $gfg1);
$gfg = @$gfg2[0];
$ghjbgj = '';
$ghjbgj = @$aDoor[1];
echo "All partial transactions: LIKE '%p%'  ";
//$SQLstring = "select * from transaction where  CustNo = $CustInt and  InvNoA = '$gfg' AND InvNoB = '$ghjbgj' AND  where InvNoB = '$aDoor[0]'  ";
$SQLstring = "select * from transaction where  CustNo = $CN and InvNoA LIKE '%p%'  ";


?>
			</b></font> <font color=#65F5DC size = 1>view_trans_by_custBASIC.php
<?php 	//	echo "SQLLL:".$SQLstring;
//echo "indesc:".$indesc." in: ".$in;


			?>
			
			</font>
			<a href = "edit_transCQ.php">edit_transCQ.php</a>
			<a href = "../phpmyadmin/index.php?db=kc&table=transaction">phpMyAdmin</a>
			

<?php
$summm = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {

echo "";
echo "<br> TransNo ";
echo " TransRecvd ";
echo " AmtPaid ";
echo " Notes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
echo " CustSDR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";

if (@$in >0)
echo " InvNoA ";
if (@$indesc >0)
echo " InvNoA incl VAT \n";
if ($in >1)
echo " InvNoB ";
if ($indesc >1)
echo " InvNoB incl VAT \n";
if ($in >"2")
echo " InvNoC ";
if ($indesc >2)
echo " InvNoC incl VAT \n";
if ($in >"3")
echo " InvNoD ";
if ($indesc >3)
echo " InvNoD incl VAT \n";
if ($in >4)
echo " InvNoE ";
if ($indesc >4)
echo " InvNoE incl VAT \n";
if ($in >5)
echo " InvNoF ";
if ($indesc >5)
echo " InvNoF incl VAT \n";
if ($in > "6")
echo " InvNoG ";
if ($indesc >6)
echo " InvNoG incl VAT \n";
if ($in >7)
echo " InvNoH ";
if ($indesc >7)
echo " InvNoH incl VAT \n";

echo " TMethod ";
//if ($indesc == "1")
echo " Priority <br\>\n";

while ($row = mysqli_fetch_assoc($result)) {

$mmm =  $row['InvNoA'];  //invNoA    
//echo "mmm: ".$mmm;



//if ($mmm >= 0)     //invNoA   if a zero OR if not a number  for exmaple 44p55   part paid.

//if (preg_match('/[A-Za-z]/', $mmm) ||  ($mmm == 0)      )

//{
echo "<br> ";
if ($mmm == '0')
echo "<font color = orange>";

echo "{$row['TransNo']}</font> ";//TransNo

$date_array = explode("-",$row['TransDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo " ".$day."/".$month."/".$year." ";//Date
echo " R{$row['AmtPaid']} ";///TOTAL AmtPaid
$yo = $yo+$row['AmtPaid'];
echo " ".mb_substr($row['Notes'], 0, 22)." \n";//Notes
echo " {$row['CustSDR']} ";//CustSDR

//echo " 24:{$row[24]} ";//ERROR

//echo " R{$row[29]} "; 
$summm = $summm + $row['AmtPaid'];


//echo "<th align = 'left'>{$row[5]} \n</font></p>";//Summary


if ($in >0)
echo " <font color = green>{$row['InvNoA']}</font> \n";//InvNoA  //InvA  from transaction table
if ($indesc >0)
echo " {$row['InvNoAincl']} \n";  //InAincl  from transaction table
//$loop++;



if ($in >1)
echo " {$row['InvNoB']} ";//InvNoB
//$loop++;
if ($indesc >1)
echo " {$row['InvNoBincl']} "; //InvNoBincl



if ($in >2)
echo " {$row['InvNoC']} ";
//$loop++;
if ($indesc >2)
echo " {$row['InvNoCincl']} ";


if ($in >3)
echo " {$row['InvNoD']} ";
//$loop++;
if ($indesc >3)
echo " {$row['InvNoDincl']} ";


if ($in >4)
echo " {$row['InvNoE']} ";
//$loop++;
if ($indesc >4)
echo " {$row['InvNoEincl']} ";



if ($in >5)
echo " {$row['InvNoF']} ";
//$loop++;
if ($indesc >5)
echo " {$row['InvNoFincl']} ";


if ($in >6)
echo " {$row['InvNoG']} ";
//$loop++;
if ($indesc >6)
echo " {$row['InvNoGincl']} ";



 if ($in >7)
echo " {$row['InvNoH']} ";
//$loop++;
if ($indesc >7)
echo " {$row['InvNoHincl']} ";//InvNoHincl  Dont forget to enable invoice descriptions as well





echo " {$row['TMethod']} \n";//EFT TMethod
echo " {$row['Priority']} ";//priority

echo "<br\>\n";


		}
    mysqli_free_result($result);
	
}
echo "";





 
?>

