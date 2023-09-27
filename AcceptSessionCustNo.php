<?php
    @session_start();
$CustNo = 0;
	//echo "GETTER  Getter: ". $_GET['link']."<br />";
	$ETT = 	$_GET['link'];

	require_once ('inc_OnlineStoreDB.php');//mysqli connection and databse selection

	
	$SQLstring = "SELECT CustNo FROM customer WHERE  CustNo = '$ETT'" ;
	//echo "GSQLstring: ". $SQLstring."<br />";

if ($result = $DBConnect->query($SQLstring)) {
  while ($row = mysqli_fetch_assoc($result)) { //assoc cannot handle spaces!!

			//echo $row['CustNo'];
			$CustNo = $row['CustNo'];
			
}
}	
	
	
	
	
	
	$_SESSION['CustNo'] = $CustNo ;
		//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";

	
	
	
	
	
	
	

//	if(isset($_GET['link'])){$_SESSION['CustNo'] = $_GET['link'];}
	

//	echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";


	$page_title = "Select a customer";
	require_once('header.php');	
	//require_once('db.php');	

	if (@$_SESSION['CustNo'] == "")  //works if session was destroyed
	{
	//echo "no session<br />";
	require_once('selectCust.php');	
	$_SESSION['sel'] = "editCust";
	}
	else
	{
	//echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	require_once('editCustProcess.php');	
	}
	
	
	//require_once('view_cust.php');	

	
	
?>
