</font></b><font color=green>view_inv_by_custADV3.php &nbsp;&nbsp;(noEcho)&nbsp;order by InvNo desc</b></font><?php
require_once("inc_OnlineStoreDB.php");
//$CustInt = 1;
$InvPdStatus = "N";
$InvPdStatus = @$_POST['InvPdStatus'];

	if (!empty($_GET["CustNo"])) 
    $CustInt = intval($_GET['CustNo']);


$iubh2ERRORpossiblyNotUsed = 0;
echo "CustInt: ".$CustInt;
if ($CustInt == '')
{
@session_start();
$_SESSION['sel'] = "editCust";
$CustInt = intval($_SESSION['CustNo'] );
}
$rCF ='';
$rCL = '';
$queryC1 = "select CustFN, CustLN from customer where CustNo = $CustInt" ;
//echo $queryC1;
if ($resultC1 = mysqli_query($DBConnect, $queryC1)) {

while ($rowC1 = mysqli_fetch_assoc($resultC1)) {
$rCF = $rowC1["CustFN"];
$rCL = $rowC1["CustLN"];
}
mysqli_free_result($resultC1);
}

include ("view_trans_by_custNoEcho.php");

echo "<br>Your Invoices History &nbsp;&nbsp; [$rCF $rCL]  ";
?>

 
 
<?php
$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvNo desc";

if ($resultINV = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>";
$Invsummm = 0;
$UnpaidInvsummm = 0;
$PaidInvsummm = 0;
 	  while (@$row = mysqli_fetch_assoc($resultINV)) {
			
			$TrR ="";
			
			$IInv = $row['InvNo'];
			$IIII = $row['InvNo'];
$SS = "select TransNo from transaction where InvNoA = '$IInv' or  InvNoB = '$IInv'  or  InvNoC = '$IInv'  or  InvNoD = '$IInv'  or  InvNoE = '$IInv'  or  InvNoF = '$IInv'  or  InvNoG = '$IInv'  ";
//echo $SS;
	if ($resultSS = mysqli_query($DBConnect, $SS)) {
	  while (@$rowPrf = mysqli_fetch_assoc($resultSS)) {
			//echo "TransNo: {$rowPrf['TransNo']}";  //TransNo
			$TrR = $rowPrf['TransNo'];
					}
    $resultSS->close();
				}		

			$TrR ="";//reset
			$rowPrf['TransNo'] ="";//reset
			
			
			$date_array = explode("-",$row['InvDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];

/*echo "<th>".$day."/".$month."/".$year."</th>";//invDate
			echo "<th>{$row['Summary']}</th>"; //summary 3
			

echo "<th>R{$row['TotAmt']}"; ///TOTAL AMOUNT TotAmt
*/$TACol = $row['TotAmt'];
//echo "tacol: ".$TACol;
//echo "</th>";

$daPrfekse = "";
		$SQLP = "select * from aproof where InvNoA = '$IIII' or  InvNoB = '$IIII'  or  InvNoC = '$IIII'  or  InvNoD = '$IIII'  or  InvNoE = '$IIII'  or  InvNoF = '$IIII'  or  InvNoG = '$IIII'  ";

	//	echo "<th>";  //forst part ProofNo
if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
		//	echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
			$daPrfekse = $rowP['ProofNo'];
			$Pdate = $rowP['ProofDate'];
			$Pdate_array = explode("-",$Pdate);
			$Pyear = $Pdate_array[0];
			$Pmonth = $Pdate_array[1];
			$Pday = $Pdate_array[2];
			//echo " ".$Pday."/".$Pmonth."/".$Pyear."";//ProofDate
			}
    $resultP->close();
}		

if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			//echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
			$daPrfekse = $rowP['ProofNo'];
			$Pdate = $rowP['ProofDate'];
			$Pdate_array = explode("-",$Pdate);
			$Pyear = $Pdate_array[0];
			$Pmonth = $Pdate_array[1];
			$Pday = $Pdate_array[2];
			}
    $resultP->close();
}	
if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			//echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
			$daPrfekse = $rowP['ProofNo'];
			$Notes = $rowP['CustSDR'];
			$Pdate_array = explode("-",$Pdate);
			$Pyear = $Pdate_array[0];
			$Pmonth = $Pdate_array[1];
			$Pday = $Pdate_array[2];
			//echo $Notes;	
			}
    $resultP->close();
}	
$Tdate= "";
if ($daPrfekse == "")
echo "";
//echo ".";
	
//echo "</th>";  //ProofNo
			
			
			
			
			
			$transss = 0;
			$InvNoo = $row['InvNo'];
			$trsql = "select * from transaction where InvNoA  = '$InvNoo' || InvNoB = '$InvNoo'  || InvNoC = '$InvNoo'  || InvNoD = '$InvNoo'  || InvNoE = '$InvNoo'  || InvNoF = '$InvNoo'  || InvNoG = '$InvNoo'  || InvNoH = '$InvNoo'   ";

			if ($resultT = mysqli_query($DBConnect, $trsql)) {
				while ($rowT = mysqli_fetch_assoc($resultT)) {
				//echo "<th>";
				$APCol = $rowT['AmtPaid'];
				
				if ($APCol == $TACol)
			$Tdate = $rowT['TransDate'];
				
			$Tdate_array = explode("-",$Tdate);
			$Tyear = $Tdate_array[0];
			@$Tmonth = $Tdate_array[1];
			@$Tday = $Tdate_array[2];
				
				}
			}	  
		
			$Invsummm = $Invsummm + $row['TotAmt'];
			$PaidInvsummm = $PaidInvsummm + $row['TotAmt'];
			//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//D1
			$iubhERRORpossiblyNotUSed = $row['ex1']*1.15;
			@$iubh2ERRORpossiblyNotUsed = @$row['ex2']*1.15;


	}
    $resultINV->close();
	
}

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<font size = 1>Total Amount outstanding: R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<font size = 1>Total Amount owing to you: R".number_format((-($Invsummm - $yo)), 2, '.', ' ')."</b> inv summm: $Invsummm minus yo $yo equals to: ".number_format(($Invsummm - $yo), 2, '.', ' ')."</font><BR />";
//echo "<br /><br />";
/*
$ShowDraft = "Y";
echo "view_Unpaid_inv_by_cust2.php";
include ("view_Unpaid_inv_by_cust2.php");
include ("view_inv_by_custADVnoTrans.php");


echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
*/
?>