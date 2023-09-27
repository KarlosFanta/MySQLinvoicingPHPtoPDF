<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Itsmeagain007#');
define('DB_NAME', 'kc');
  @session_start();
  $CustInt = $_SESSION['CustNo']; //amazing how important this line is
  if ($CustInt == '');
		$CustInt = $_SESSION['CustNo'];
  //echo "CustInt:".$CustInt; //if you activate this line, AJAX stops working

if (isset($_GET['term'])){
    $return_arr = array();
 
    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM expenses WHERE CustNo = '$CustInt'");
		
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        while($row = $stmt->fetch()) {
            $addon = "";
		   $allo = "";
			
			if ($row['InvNo'] == '')
			{
				//$addon = '<font color = red>';
				$class = 'newcolor';
				$addon = 'NOT ALLOCATED: ';
			$return_arr[] =  $addon.$row['ExpNo'].'[ '.$row['Category'].'[ '.$row['ExpDesc'].'[ SerialNo:'.$row['SerialNo'].' _ '.$row['SupCode']. ' _ '.$row['PurchDate'].
			' R'.$row['ProdCostExVAT'].'exVAT '.$row['Notes'].' '.$allo.' '.$row['InvNo'];
			}
			else
			{
//////				$addon = ' >assigned<';
/////				$allo= 'InvNo:';
				//$addon = '</font>';
			}


			
			
			
        }
 
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
 
 
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
      // $stmt = $conn->prepare('SELECT summary FROM ajaxsuggest WHERE summary LIKE :term');
		//WARNING THE VARIABLE OF WHERE CLAUSE NEEDS TO BE DECLARWE BEFORE THE javascriptfuntion
		//WARNING THE VARIABLE OF WHERE CLAUSE NEEDS TO BE DECLARWE BEFORE THE javascriptfuntion
		//echo "SELECT * FROM expenses WHERE CustNo = '$CustInt'";
 
?>