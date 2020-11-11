<?php
require_once 'inc_OnlineStoreDB.php';

$InvPdStatus = "N";
$InvPdStatus = @$_POST['InvPdStatus'];
@session_start();
$_SESSION['sel'] = "editCust";

$CustInt = @intval($_SESSION['CustNo'] );
if ($CustInt == '')
$CustInt = $CustNo;
echo "<a href = view_inv_by_custADV2.php>view_inv_by_custADV2.php</a><br>";
include 'monthtables.php';
echo "<a href = view_inv_by_custADV2.php>view_inv_by_custADV2.php</a><br>";
include ("view_trans_by_cust.php");
echo "<br><br><br>";
include 'monthtables.php';
echo "<br>Your Invoices History";
?>

 &nbsp;&nbsp;&nbsp;&nbsp;</font> </b><font color=#F5F5DC>view_inv_by_custADV.php &nbsp;&nbsp;&nbsp;order by InvNo desc</b></font></br>
  <a href = view_inv_by_custADV2.php>view_inv_by_custADV2.php</a><br>
<?php
$SQLstring = "select * from invoice where CustNo = '$CustInt' order by InvNo desc";

if ($resultINV = mysqli_query($DBConnect, $SQLstring)) {
//echo "<table  border='1'>\n";
echo "<table  border='1'>";
$Invsummm = 0;
$UnpaidInvsummm = 0;
$PaidInvsummm = 0;
echo "<tr><th>Inv No</th>";
//echo "<th>CustNo</th>";
//echo "<th>CustLN</th>";
echo "<th>Invoice Date</th>";
echo "<th>&nbsp;&nbsp;Summary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>"; //Summary
echo "<th>TotalAmt</th>";
echo "<th>ProofNo</th>";
echo "<th>ProofDate</th>";
echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reference&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
echo "<th>Payment&nbsp;Received</th>";
if ($InvPdStatus == "Y")
echo "<th>Inv Paid Status</th>";

if ($indesc == "d1")
{
echo "<th>D1</th>";
echo "<th>D2</th>\n";
echo "<th>D3</th>";
}



if ($indesc > "1")
{echo "<th>D1</th>";
echo "<th>Q1</th>\n";
echo "<th>ex1</th>";
echo "<th>in1</th>";
}
if ($indesc > "2")
{echo "<th>D2</th>";
echo "<th>Q2</th>\n";
echo "<th>ex2</th>";
echo "<th>in2</th>";
}
if ($indesc > "3")
{echo "<th>D3</th>";
echo "<th>Q3</th>\n";
echo "<th>ex3</th>";
}
if ($indesc > "4")
{echo "<th>D4</th>";
echo "<th>Q4</th>\n";
echo "<th>ex4</th>";
}
if ($indesc > "5")
{echo "<th>D5</th>";
echo "<th>Q5</th>\n";
echo "<th>ex5</th>";
}
if ($indesc > "6")
{echo "<th>D6</th>";
echo "<th>Q6</th>\n";
echo "<th>ex6</th>";
}
if ($indesc > "7")
{echo "<th>D7</th>";
echo "<th>Q7</th>\n";
echo "<th>ex7</th>";
}
if ($indesc > "8")
{echo "<th>D8</th>";
echo "<th>Q8</th>\n";
echo "<th>ex8</th>";
}

echo "</tr>\n";

 	  while (@$row = mysqli_fetch_assoc($resultINV)) {

			$TrR ="";
			echo "<tr><th>";
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


			if ( $TrR == '')
			echo "<font color = red>{$row['InvNo']}</th>\n";
			else
			echo "<font color = green>{$row['InvNo']}Paid</th>\n";

			$TrR ="";//reset
			$rowPrf['TransNo'] ="";//reset


			$date_array = explode("-",$row['InvDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];
//$day = $day[0].$day[1];
//$ts = mktime(0,0,0,$month, $day, $year);
//$dateVal = date("j-M-y", $ts);
//echo "<br>Date is: ".$dateVal;

echo "<th>".$day."/".$month."/".$year."</th>";//invDate
			echo "<th>{$row['Summary']}</th>"; //summary 3


echo "<th>R{$row['TotAmt']}"; ///TOTAL AMOUNT TotAmt
$TACol = $row['TotAmt'];
//echo "tacol: ".$TACol;
echo "</th>";

$daPrfekse = "";
		$SQLP = "select * from aproof where InvNoA = '$IIII' or  InvNoB = '$IIII'  or  InvNoC = '$IIII'  or  InvNoD = '$IIII'  or  InvNoE = '$IIII'  or  InvNoF = '$IIII'  or  InvNoG = '$IIII'  ";

		echo "<th>";  //forst part ProofNo
if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
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

if ($daPrfekse == "")
echo "-";
echo "</th>";  //ProofNo




		echo "<th>";  //forst part ProofNo
if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			//echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
			$daPrfekse = $rowP['ProofNo'];
			$Pdate = $rowP['ProofDate'];
			$Pdate_array = explode("-",$Pdate);
			$Pyear = $Pdate_array[0];
			$Pmonth = $Pdate_array[1];
			$Pday = $Pdate_array[2];
			echo " ".$Pday."/".$Pmonth."/".$Pyear."";//ProofDate
			}
    $resultP->close();
}
if ($daPrfekse == "")
echo ".";

echo "</th>";  //ProofNo



		echo "<th>";  //forst part ProofNo
if ($resultP = mysqli_query($DBConnect, $SQLP)) {
	  while (@$rowP = mysqli_fetch_assoc($resultP)) {
			//echo "<font color= 'green'>{$rowP['ProofNo']}</font>";  //ProofNo
			$daPrfekse = $rowP['ProofNo'];
			$Notes = $rowP['CustSDR'];
			$Pdate_array = explode("-",$Pdate);
			$Pyear = $Pdate_array[0];
			$Pmonth = $Pdate_array[1];
			$Pday = $Pdate_array[2];
			echo $Notes;			}
    $resultP->close();
}
if ($daPrfekse == "")
echo ".";

echo "</th>";  //ProofNo




			$Tdate= "";
			$transss = 0;
			$InvNoo = $row['InvNo'];
			$trsql = "select * from transaction where InvNoA  = '$InvNoo' || InvNoB = '$InvNoo'  || InvNoC = '$InvNoo'  || InvNoD = '$InvNoo'  || InvNoE = '$InvNoo'  || InvNoF = '$InvNoo'  || InvNoG = '$InvNoo'  || InvNoH = '$InvNoo'   ";
			echo "<th>";

			echo "<font size= 2>";
			//echo $trsql;
			//echo "</th>";

			if ($resultT = mysqli_query($DBConnect, $trsql)) {
				while ($rowT = mysqli_fetch_assoc($resultT)) {
				//echo "<th>";
				$APCol = $rowT['AmtPaid'];

				//if ($rowT['TransNo'] == $rowT['AmtPaid'])
				//echo "APCol:".$APCol;
				//echo "TACol:".$TACol;
				if ($APCol == $TACol)
				echo "<font color = green>";

				echo "Trans ".$rowT['TransNo'];

				echo " (r".$rowT['AmtPaid'].")";
				echo " on ";
				//.$rowT['TransDate']."";
			$Tdate = $rowT['TransDate'];

			$Tdate_array = explode("-",$Tdate);
			$Tyear = $Tdate_array[0];
			@$Tmonth = $Tdate_array[1];
			@$Tday = $Tdate_array[2];
			echo " ".$Tday."/".$Tmonth."/".$Tyear."";//ProofDate
			echo "<br>";

				}
			}

			echo "</font>";
			echo "</th>";

			//echo "<th></th>"; ///TOTAL AMOUNT TotAmt
			if ($InvPdStatus == "Y")
			echo "<th>{$row['InvPdStatus']}</th>\n"; //PDSTATUS 4

			$Invsummm = $Invsummm + $row['TotAmt'];
			$PaidInvsummm = $PaidInvsummm + $row['TotAmt'];
			//echo "<th align = 'left'>{$row[5]}</th>\n</font></p>";//D1
			$iubh = $row['ex1']*1.14;
			$iubh2 = $row['ex2']*1.14;

			if ($indesc > "1")
			{
			echo "<th>{$row['D1']}</th>\n";//D1  5
			echo "<th>{$row['Q1']}</th>\n";//Q1   6
			echo "<th>{$row['ex1']} exVAT</th>\n";  ///     7
			echo "<th>".$iubh."</th>\n";  ///     7
			}
			if ($indesc > "2")
			{
			echo "<th>{$row['D2']}</th>\n";   //8
			echo "<th>{$row['Q2']}</th>\n";   //9
			echo "<th>{$row['ex2']} exVAT</th>\n";   //10
			echo "<th>{$iubh2}</th>\n";  ///     7
			}
			if ($indesc > "3")
			{
			echo "<th>{$row['D3']}</th>\n";   //11
			echo "<th>{$row['Q3']}</th>\n";   //12
			echo "<th>{$row['ex3']} exVAT</th>\n";  //13
			}
			if ($indesc > "4")
			{
			echo "<th>{$row['D4']}</th>\n";  //14
			echo "<th>{$row['Q4']}</th>\n";
			echo "<th>{$row['ex4']} exVAT</th>\n";
			}
			if ($indesc > "5")
			{
			echo "<th>{$row['D5']}</th>\n";   //17
			echo "<th>{$row['Q5']}</th>\n";
			echo "<th>{$row['ex5']} exVAT</th>\n";
			}
			if ($indesc > "6")
			{
			echo "<th>{$row['D6']}</th>\n";   //17
			echo "<th>{$row['Q6']}</th>\n";
			echo "<th>{$row['ex6']}exVAT</th>\n";
			}
			if ($indesc > "7")
			{
			echo "<th>{$row['D7']}</th>\n";   //17
			echo "<th>{$row['Q7']}</th>\n";
			echo "<th>{$row['ex7']}exVAT</th>\n";
			}
			if ($indesc > "8")
			{
			echo "<th>{$row['D8']}</th>\n";   //17
			echo "<th>{$row['Q8']}</th>\n";
			echo "<th>{$row['ex8']}exVAT</th>\n";
			}
if ($indesc == "d1")
{
			echo "<th>{$row['D1']}</th>\n";
echo "<th>{$row['D2']}</th>\n";
echo "<th>{$row['D3']}</th>\n";

}

			echo "</tr></font>\n";
				//else do not display paid invoices

			//}


		//}





	}
    // free result set
    $resultINV->close();

}
echo "</table>";
//echo "Paid invoice total to:
echo "Invoices total to: R ".$Invsummm."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Paid Invoices: R ".$PaidInvsummm."&nbsp;&nbsp;&nbsp;&nbsp;Unpaid Invoices: R ".$UnpaidInvsummm.")<br />";

echo "<BR />Invoices total to: R".$Invsummm."<br />";
echo "All transactions total to: R".$yo."<br>";

if (($Invsummm - $yo) > 0)
echo "<b>_Total Amount oustanding: R".number_format(($Invsummm - $yo), 2, '.', ' ')."</b><BR />";
else
echo "<b>Total Amount owing to you: R".-($Invsummm - $yo)."</b><BR />";
echo "<br /><br />";

include ("view_Unpaid_inv_by_cust.php");

echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";
echo "<br /><br />";

$SQLstring = "SELECT * FROM customer WHERE CustNo = $CustInt" ;

if ($result = $DBConnect->query($SQLstring)) {


  while ($row = mysqli_fetch_assoc($result)) { //assoc cannot handle spaces!!

 		echo "";
			echo "Customer AutoNumber:";
//			echo "<input type='text' size = 4 name='CustNo' value=";
			//echo $row[0];
			echo $row['CustNo'];
	//		echo "> editCustProcess.php calls editCustProcess_last.php";
		echo "<br>";

 		echo "";
			echo "* First Name, / VAT no:";

		//	echo "<textarea id='cust_fn' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustFName' >";
echo $row['CustFN'];
//echo "</textarea>";

		echo "<br>";

 		echo "";
			echo "<label>* Surname:</label></dt>";

//echo "<textarea id='CustLName' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustLName' >";
echo $row['CustLN'];
//echo "</textarea>";
				$RU1 = "_";
			$RU2 = "_";
			$RU1 = $row["u1"];
			$RU2 = $row["u2"];
			$CLN = "_";
			$CLN = $row['CustLN'];

				$ADSLTel = $row["ADSLTel"];

		echo "<br>";

 		echo "";
			echo "Telephone Number:";
	//		echo "<textarea id='CustTN' style='white-space:pre-wrap;font-family:arial;height:20px;width:200px;font-size: 10pt' name='CustTN' >";
echo $row['CustTel'];
//echo "</textarea>";

		echo "<br>";

 		echo "";
			echo "<label>Cellphone Number:</label></dt>";
			echo "<textarea id='CustCN' style='white-space:pre-wrap;font-family:arial;height:20px;width:200px;font-size: 10pt' name='CustCN' >";
echo $row['CustCell'];
echo "</textarea>";
		echo "<br>";

 		echo "";
			echo "<label>Email Address:</label></dt>";
			echo "<input type='text' size = 60 name='CustEm' value=";

			$CE = strtr($row['CustEmail'], array(' ' => '&nbsp;')) ;
			$CEd = str_replace(';', ';&nbsp;', $CE);

			echo $CE ; //or should this be $CEd ???
//			echo $row[5];

			echo "> <a href = 'mailto:";
			echo $CEd."'>email</a>";
		echo "<br>";

 		echo "";
			echo "<label>Postal Address:</label></dt>";
echo "<textarea id='CustPA' style='white-space:pre-wrap;font-family:arial;height:22px;width:700px;font-size: 10pt' name='CustPA' >";
echo $row['CustAddr'];
echo "</textarea>";
		echo "<br>";

 		echo "";
			echo "<label>ID/Passport Number:</label></dt>";
echo "<textarea id='CustIDdoc' style='white-space:pre-wrap;font-family:arial;height:22px;width:300px;font-size: 10pt' name='CustIDdoc' >";
echo $row['CustIDdoc'];
echo "</textarea>";

 		//echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='btn_submit' value='Submit/Save' /> ";
			//echo "<label><br>Details </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			$DDD= $row["CustDetails"];
			//$DDD = $row[8];
			$FF = urlencode($DDD);
			//echo $FF;

//$str = strtr($DDD, array(' ' => '&nbsp;', ',' => ','));
//$str = strtr($DDD, array(' ' => '&nbsp;'));
//echo "<br>";
//echo $DDD;
//echo "<br>";

//$DDD = str_replace("/_/","&nbsp;",$DDD);
//$DDD = preg_replace("/__/","&nbsp;&nbsp;",$DDD);
//why not simply use stripslashes?
$DDD = str_replace("SEMICOLONN", ";", $DDD);
$DDD = str_replace("COLONN", "'", $DDD);
$DDD = str_replace("CopyrightSign", "©", $DDD);
$DDD = str_replace("RegTrademark", "®", $DDD);
$DDD = str_replace("EuroCurrency", "€", $DDD);
$DDD = str_replace("YenCurrency", "¥", $DDD);
$DDD = str_replace("PoundCurrency", "£", $DDD);
$DDD = str_replace("centT", "¢", $DDD);

//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
echo "<br> ";echo "<textarea id='CustDetails' style='white-space:pre-wrap; font-family:arial;width:800px;font-size: 8pt' rows = '5' size = '80' name='CustDetails' >";
	//echo $row["CustDetails"];

	echo $DDD;echo "</textarea>";

			echo "<br>extra: <br>";
			//echo "<label><br>Details </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			$EEE= $row["Extra"];
			//$EEE = $row[8];
			$FF = urlencode($EEE);
			//echo $FF;

//$str = strtr($EEE, array(' ' => '&nbsp;', ',' => ','));
//$str = strtr($EEE, array(' ' => '&nbsp;'));
//echo "<br>";
//echo $EEE;
//echo "<br>";

//$EEE = str_replace("/_/","&nbsp;",$EEE);
//$EEE = preg_replace("/__/","&nbsp;&nbsp;",$EEE);
//why not simply use stripslashes?
$EEE = str_replace("SEMICOLONN", ";", $EEE);
$EEE = str_replace("COLONN", "'", $EEE);
$EEE = str_replace("CopyrightSign", "©", $EEE);
$EEE = str_replace("RegTrademark", "®", $EEE);
$EEE = str_replace("EuroCurrency", "€", $EEE);
$EEE = str_replace("YenCurrency", "¥", $EEE);
$EEE = str_replace("PoundCurrency", "£", $EEE);
$EEE = str_replace("centT", "¢", $EEE);

//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
echo "<br> ";echo "<textarea id='Extra' style='white-space:pre-wrap; font-family:arial;width:800px;font-size: 7pt' rows= '5' size = '80' name='Extra' >";

	echo $EEE;echo "</textarea>";

			echo "<br>Confid: <br>";
			//echo "<label><br>Details </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

			$EEE= $row["Confid"];
			//$EEE = $row[8];
			$FF = urlencode($EEE);
			//echo $FF;

//$str = strtr($EEE, array(' ' => '&nbsp;', ',' => ','));
//$str = strtr($EEE, array(' ' => '&nbsp;'));
//echo "<br>";
//echo $EEE;
//echo "<br>";

//$EEE = str_replace("/_/","&nbsp;",$EEE);
//$EEE = preg_replace("/__/","&nbsp;&nbsp;",$EEE);
//why not simply use stripslashes?
$EEE = str_replace("SEMICOLONN", ";", $EEE);
$EEE = str_replace("COLONN", "'", $EEE);
$EEE = str_replace("CopyrightSign", "©", $EEE);
$EEE = str_replace("RegTrademark", "®", $EEE);
$EEE = str_replace("EuroCurrency", "€", $EEE);
$EEE = str_replace("YenCurrency", "¥", $EEE);
$EEE = str_replace("PoundCurrency", "£", $EEE);
$EEE = str_replace("centT", "¢", $EEE);

//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
echo "<br> ";echo "<textarea id='Confid' style='white-space:pre-wrap; font-family:arial;width:800px;font-size: 7pt' rows= '1' size = '80' name='Confid' >";

	echo $EEE;echo "</textarea>";

?><br>





	<br>




 <input type="submit" name="btn_submit" value="Submit/Save" /> <br>


<?php
echo "<br/> ";

			echo "<label>Abbr</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = '10' name='Abbr' value=";
//echo $row["ABBR"];
//			echo $row[9];

			$ABBB = strtr($row['ABBR'], array(' ' => '_')) ;
			echo $ABBB;
			echo "> ";
		echo "<br> ";

 		echo "";
			echo "<label>ADSL Password:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input style='font-size: 5pt' type='text'  size = 30  name='CustPW' value=";
			//echo $row["CustPW"];
	//echo $row[10];
			echo strtr($row['CustPW'], array(' ' => '&nbsp;')) ;

			echo "> ";
		echo "<br> ";

 		echo "";
			echo "<label>Distance:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='CustDi' value=";
			echo $row["Distance"];
//			echo $row[11];

			echo "> ";
		echo "<br> ";

 		echo "";
			echo "<label>ADSL Tel No:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = '60' name='ADSLTel' value=";
			echo $row["ADSLTel"];
	//echo $row[12];

			echo "> ";
		echo "<br> ";

 		echo "";
			echo "<label>ADSL Username:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' name='u1' style='font-weight: bold;' value=";
			echo $row["u1"];
			echo ">@";

			echo "<input type='text' name='u2' style='font-weight: bold;'  value=";
			echo $row["u2"];
	//echo $row[12];

			echo "> &nbsp;&nbsp;";

			echo $row["u1"];
			echo "@";
			echo $row["u2"];
			echo "&nbsp;&nbsp;";

			echo $row['CustPW'];

		echo "<br> ";

		 		echo "";
			echo "<label><b><font color = red size = 3>Important for ".$ABBB.": </b></label></font></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->

					echo "<textarea id='Important' style='white-space:pre-wrap; height:20px;font-family:Times New Roman;width:750px;font-size: 10pt'  name='Important'  >";
	//echo $row["CustDetails"];

	echo $row['Important'];echo "</textarea>";

			echo "<br> ";

			$newfldr = "1";
			$newfldr = "file:///".$row['L1'] ;
			//$newfldr = "file://///F:/_work/Customers/A/Abel_Jutta";
			//$newfldr = "file:///F:/_work/Customers/A/Abel_Jutta";
			//$newfldr = "file:///F:/_work/Customers/A/Abel_Jutta";
			//file:///F:/_work/Customers/A/Abel_Jutta/JuttaAbel.txt
			//$newfldr = "file:///F|_work/Customers/A/Abel_Jutta";
			//$newfldr = "file:///F:\_work\Customers";
			//echo "<br><br> newfldr: ".$newfldr." <br>";
			//echo "<br> <a href= '".$newfldr."'>OPen newfolder</a>   <br>";

			//echo "<b>Last topup invoiced:<input type='text' name='topup' size = '50' value=";

			//$rt = strtr($row['topup'], array(' ' => '_')) ;

		//	echo $rt;
		//	echo "></b> ";

//strtr($newfldr, array('/' => '\\')) ;
strtr($newfldr, array('\\' => '/')) ;

			//echo "<br><br> newfldr: ".$newfldr." <br>";

	//echo "<br> <a href= 'file:///".$newfldr."'>Open customer folder: ".$newfldr." </a>  <br>";
	echo "<br> <a href= '".$newfldr."' alt= 'Right-click in Ext App'>Open customer folder: ".$newfldr." </a> &nbsp;&nbsp;&nbsp; ";
//	echo "<br> <a href= 'file://".$newfldr."'>Open customer folder: ".$newfldr." </a>  <br>";
//	echo "<br> <a href= 'file://".$row['L1']."'>Open customer folder: file://".$row['L1']." </a>  <br>";
//	echo "<br> <a href= 'file:".$row['L1']."'>Open customer folder: ".$row['L1']." </a>  <br>";

						 		echo "";
			echo "<label>Folder Location L1:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = 53  name='L1' value=";
			//echo $row["L1"];
			echo strtr($row['L1'], array('/' => '\\')) ;

//			$L1 = str_replace('\\', '/', $L1);

		//	echo $row[13];
			echo "> ";
		echo "<br> ";
		//echo "file:///";
			//echo $row['L1'] ;

			echo "<label>adslinv:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = 103  name='adslinv' value=";
			//echo $row["adslinv"];
			echo strtr($row['adslinv'], array(' ' => '&nbsp;')) ;
		//	echo $row[13];
			echo "> ";
		echo "<br> ";

				 		echo "";
			echo "<label>ae:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->

$ae1 = "j";
//echo " h ";
//echo strtr($row['ae'], array(' ' => '&nbsp;')) ;
//strtr($ae1, array(' ' => '&nbsp;')) ;

//$ae1 = strtr($row['ae'], array(' ' => '&nbsp;')) ;

$ae1 = $row['ae'];

//nl2br(preg_replace('#(\\]{1})(\\s?)\\n#Usi', ']', stripslashes($ae1)));
//echo " ae1__: ". $ae1;

		if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae1))
{
    echo " one or more of the 'special characters' found ";
}


		//	echo strtr($row['ae'], array(' ' => '&nbsp;')) ;
		//	echo $row['ae'];
		//echo $ae1;
	//	echo $row['ae'];
		$ae1 = strtr($row['ae'], array(' ' => '_')) ;
		$ae1 = strtr($ae1, array('_' => '&nbsp;')) ;

	//echo " ____spec: ";

		htmlspecialchars($ae1);
	//echo " ent: ";

		htmlentities($ae1);

if ($ae1 > 0.2)
{
		//echo "R".$ae1 * 1.14;
		$ae1 =  $ae1 * 1.14;

		 $ae1 = number_format ($ae1, 2, ".", "");
 //echo "<br>";
 echo "<b>R ".$ae1." inin VAT</b><br>";
//$ae1N = number_format($ae1,1);  //I removed the last cent here
//echo " ".$ae1N;

}

echo "<br />";

echo "ae:R<textarea id='ae' style='white-space:pre-wrap; height:20px;width:350px;font-size: 10pt'  name='ae'  >";
	//echo $row["CustDetails"];
	echo $row['ae'];echo "</textarea>";

echo "<br><label>invD2:</label></dt>";
echo "<input type='text' size = 103  name='invD2' value=";
echo strtr($row['invD2'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae2:</label></dt>";
$ae2 = "j";
$ae2 = $row['ae2'];
//echo " ae2__: ". $ae2;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae2))
{
    echo " one or more of the 'special characters' found ";
}
$ae2 = strtr($row['ae2'], array(' ' => '_')) ;
$ae2 = strtr($ae2, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae2);
//echo " ent: R";
htmlentities($ae2);
echo "<input type='text' size = 13  name='ae2' value=";
echo $ae2;
echo "> ";
if ($ae2 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae2 =  $ae2 * 1.14;
$ae2 = number_format ($ae2, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae2." inin VAT</b><br>";
//$ae2N = number_format($ae2,1);  //I removed the last cent here
//echo " ".$ae2N;
}


echo "<br><label>invD3:</label></dt>";
echo "<input type='text' size = 103  name='invD3' value=";
echo strtr($row['invD3'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae3:</label></dt>";
$ae3 = "j";
$ae3 = $row['ae3'];
//echo " ae3__: ". $ae3;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae3))
{
    echo " one or more of the 'special characters' found ";
}
$ae3 = strtr($row['ae3'], array(' ' => '_')) ;
$ae3 = strtr($ae3, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae3);
//echo " ent: R";
htmlentities($ae3);
echo "<input type='text' size = 13  name='ae3' value=";
echo $ae3;
echo "> ";
if ($ae3 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae3 =  $ae3 * 1.14;
$ae3 = number_format ($ae3, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae3." inin VAT</b><br>";
//$ae3N = number_format($ae3,1);  //I removed the last cent here
//echo " ".$ae3N;
}


echo "<br><label>invD4:</label></dt>";
echo "<input type='text' size = 103  name='invD4' value=";
echo strtr($row['invD4'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae4:</label></dt>";
$ae4 = "j";
$ae4 = $row['ae4'];
//echo " ae4__: ". $ae4;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae4))
{
    echo " one or more of the 'special characters' found ";
}
$ae4 = strtr($row['ae4'], array(' ' => '_')) ;
$ae4 = strtr($ae4, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae4);
//echo " ent: R";
htmlentities($ae4);
echo "<input type='text' size = 13  name='ae4' value=";
echo $ae4;
echo "> ";
if ($ae4 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae4 =  $ae4 * 1.14;
$ae4 = number_format ($ae4, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae4." inin VAT</b><br>";
//$ae4N = number_format($ae4,1);  //I removed the last cent here
//echo " ".$ae4N;
}






echo "<br><label>invD5:</label></dt>";
echo "<input type='text' size = 103  name='invD5' value=";
echo strtr($row['invD5'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae5:</label></dt>";
$ae5 = "j";
$ae5 = $row['ae5'];
//echo " ae5__: ". $ae5;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae5))
{
    echo " one or more of the 'special characters' found ";
}
$ae5 = strtr($row['ae5'], array(' ' => '_')) ;
$ae5 = strtr($ae5, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae5);
//echo " ent: R";
htmlentities($ae5);
echo "<input type='text' size = 13  name='ae5' value=";
echo $ae5;
echo "> ";
if ($ae5 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae5 =  $ae5 * 1.14;
$ae5 = number_format ($ae5, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae5." inin VAT</b><br>";
//$ae5N = number_format($ae5,1);  //I removed the last cent here
//echo " ".$ae5N;
}





echo "<br><label>invD6:</label></dt>";
echo "<input type='text' size = 103  name='invD6' value=";
echo strtr($row['invD6'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae6:</label></dt>";
$ae6 = "j";
$ae6 = $row['ae6'];
//echo " ae6__: ". $ae6;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae6))
{
    echo " one or more of the 'special characters' found ";
}
$ae6 = strtr($row['ae6'], array(' ' => '_')) ;
$ae6 = strtr($ae6, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae6);
//echo " ent: R";
htmlentities($ae6);
echo "<input type='text' size = 13  name='ae6' value=";
echo $ae6;
echo "> ";
if ($ae6 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae6 =  $ae6 * 1.14;
$ae6 = number_format ($ae6, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae6." inin VAT</b><br>";
//$ae6N = number_format($ae6,1);  //I removed the last cent here
//echo " ".$ae6N;
}






echo "<br><label>invD7:</label></dt>";
echo "<input type='text' size = 103  name='invD7' value=";
echo strtr($row['invD7'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae7:</label></dt>";
$ae7 = "j";
$ae7 = $row['ae7'];
//echo " ae7__: ". $ae7;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae7))
{
    echo " one or more of the 'special characters' found ";
}
$ae7 = strtr($row['ae7'], array(' ' => '_')) ;
$ae7 = strtr($ae7, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae7);
//echo " ent: R";
htmlentities($ae7);
echo "<input type='text' size = 13  name='ae7' value=";
echo $ae7;
echo "> ";
if ($ae7 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae7 =  $ae7 * 1.14;
$ae7 = number_format ($ae7, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae7." inin VAT</b><br>";
//$ae7N = number_format($ae7,1);  //I removed the last cent here
//echo " ".$ae7N;
}





echo "<br><label>invD8:</label></dt>";
echo "<input type='text' size = 103  name='invD8' value=";
echo strtr($row['invD8'], array(' ' => '&nbsp;')) ;
echo "> ";
echo "<br> ";
echo "";
echo "<label>ae8:</label></dt>";
$ae8 = "j";
$ae8 = $row['ae8'];
//echo " ae8__: ". $ae8;
if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $ae8))
{
    echo " one or more of the 'special characters' found ";
}
$ae8 = strtr($row['ae8'], array(' ' => '_')) ;
$ae8 = strtr($ae8, array('_' => '&nbsp;')) ;
//echo " ____spec: ";
htmlspecialchars($ae8);
//echo " ent: R";
htmlentities($ae8);
echo "<input type='text' size = 13  name='ae8' value=";
echo $ae8;
echo "> ";
if ($ae8 > 0.2)
{
//echo "R".$ae1 * 1.14;
$ae8 =  $ae8 * 1.14;
$ae8 = number_format ($ae8, 2, ".", "");
//echo "<br>";
echo "<b>R ".$ae8." inin VAT</b><br>";
//$ae8N = number_format($ae8,1);  //I removed the last cent here
//echo " ".$ae8N;
}






		echo "<br> ";

				 		echo "";
			echo "<label>dotdot:</label></dt>";
			//     <!--<input type="text" name="cust_name" id="cust_fn" value="<?php echo $daNextNo; q_mark>" />-->
			echo "<input type='text' size = 103  name='dotdot' value=";
			//echo $row["dotdot"];
			echo strtr($row['dotdot'], array(' ' => '&nbsp;')) ;
		//	echo $row[13];
			echo "> ";
		echo "<br> ";

			echo "<b>Last topup invoiced:<textarea id='topup' style='white-space:pre-wrap; height:20px;width:350px;font-size: 10pt'  name='topup'  >";
	//echo $row["CustDetails"];

	echo $row['topup'];echo "</textarea>";

}}

?>
<br />
<script>
function openfolder()
  {
  window.open('<?php echo $newfldr ?>');
  }
</script>









<?php

//include ("view_event_by_cust.php");

?>
