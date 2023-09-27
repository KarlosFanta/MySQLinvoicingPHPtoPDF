<?php

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

$SQLstring = "select * from transaction where CustNo = '$CustInt' order by transdate desc";

?>
view_trans_by_custNoEcho.php
<!--<b><font size = "3" type="arial">Your Transactions History </font>-->
<?php 	//		echo $row['CustFN'];
//			echo "> <input type='text' name='CustLN' value=";
		//	echo " ";
		//	echo $row['CustLN'];
?>
			</b></font> &nbsp; &nbsp;  
			<?php //echo $SQLstring; ?>
			
			</font>

<?php
$summm = 0;
if ($result = mysqli_query($DBConnect, $SQLstring)) {
while ($row = mysqli_fetch_assoc($result)) {
$mmm =  $row['InvNoA'];  //invNoA    
//echo "mmm: ".$mmm;
$date_array = explode("-",$row['TransDate']);
$year = $date_array[0];
$month = $date_array[1];
$day = $date_array[2];

$yo = $yo+$row['AmtPaid'];
$summm = $summm + $row['AmtPaid'];


		}
    mysqli_free_result($result);
	
}

?>