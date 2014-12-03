<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Itsmeagain007#');
define('DB_NAME', 'kc');
  @session_start();
		$CustInt = $_SESSION['CustNo'];

if (isset($_GET['term'])){
    $return_arr = array();
 
    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM expenses WHERE CustNo = '$CustInt'");
		
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        while($row = $stmt->fetch()) {
            $return_arr[] =  $row['ExpNo'].'[ '.$row['Category'].'[ '.$row['ExpDesc'].'[ SN:'.$row['SerialNo'].' '.$row['SupCode']. ' '.$row['PurchDate'].
			' R'.$row['ProdCostExVAT'].'ex VAT _ Notes:'.$row['Notes'];

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
