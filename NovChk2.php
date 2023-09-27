<?php
//now to check whter the Nov invoice has been created
//so we slect all invoices containing summary part saying Nov
$end_date = date('MY', strtotime('+1 month'));
//$done_date = date('MY') minus a monthhh;


//$queryChk = "select Summary from invoice where CustNo = $item1 AND MAX(InvNo)";
//$queryChk = "select MAX(InvNo) as mxi, Summary from invoice where CustNo = $item1";
//$queryChk = "select Summary from invoice where CustNo = $item1 AND Summary LIKE '%Jan2016%' AND summary LIKE '%adsl%'";
$queryChk = "select InvNo, Summary, InvDate from invoice where CustNo = $item1 order by InvNo desc Limit 1 " ;
//$queryChk = "SELECT TOP 1 invNum, summary FROM invoice WHERE custNum = $item1 ORDER BY invNum ASC/DESC " ;
echo "&nbsp; &nbsp;&nbsp;&nbsp;";
//echo $queryChk;
//	$CNN = @$_SESSION['CustNo'];
echo " ";

if ($resultChk = mysqli_query($DBConnect, $queryChk)) {
  while ($rowChk = mysqli_fetch_assoc($resultChk)) {
$su = "_";
$su = $rowChk["Summary"];

if (strpos($su, 'Jun') !== false) {
    echo $su." ";
echo "".$rowChk["InvDate"];
}
else
    echo "DO_THIS_ONE__".$su." ";
echo $rowChk["InvDate"];

/*if (preg_match('/\bJun\b/', $su)) {
    echo '-JunNovChk2.php-';
}
else

echo $su;
*/
	}
mysqli_free_result($resultChk);
	}
	
//	echo "end";
//else 
//echo "TODOOOOOOOOOOOOOOOOO";

?>
