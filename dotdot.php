
<?php
	
    @session_start();
	@$_SESSION['sel'] = "addInvC";
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = @$_SESSION['CustNo'];
if ($CustInt == '')
	$CustInt = $CustNo;
	$query = "SELECT dotdot FROM customer WHERE CustNo = $CustInt" ;

if ($result = mysqli_query($DBConnect, $query)) {      //I think this is all Cust Details
  while ($row2 = @mysqli_fetch_assoc($result)) {

  $dotstr = $row2['dotdot'];
}
mysqli_free_result($result);
}
$dotdot = ($dotstr);
//echo "dotdot:".$dotdot;
		if (is_numeric ($dotdot)) 
				 {
				 //echo "Yes dotdot is numeric";
				 //check if the zero is missing
					 if (substr($dotdot, 0, 1) == '0')   // returns first character
						{
				//			echo 'OK contains a zero';
							echo '';
						}
						else
						{
					//		echo 'NOK first letter does not contain a zero';
							$dotdot = "0".$dotdot;
					//		echo ' dotdottt:'.$dotdot;
					echo "";
						}
						
						
						
						
					if (strlen($dotdot) > 2)
					{
					//	echo "dotdot longer than 2";
						$dotdot = substr($dotdot, 1);
					}
					else
					//	echo "dotdot correct length";
					echo "";
						
						
				 }
	
	
	
	
	
	
	


?>
