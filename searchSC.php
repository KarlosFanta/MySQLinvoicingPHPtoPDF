<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Itsmeagain007#');
define('DB_NAME', 'kc');

 @session_start();
	///echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
if (isset($_GET['term'])){
    $return_arr = array();
 
    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       // $stmt = $conn->prepare('SELECT summary FROM ajaxsuggest WHERE summary LIKE :term');
	   //SELECT inv.InvNo FROM invoice inv, transaction trn WHERE inv.InvNo = trn.InvNoA  and CustNo = $CustInt
	   
 // WORKS!!!  $stmt = $conn->prepare("SELECT InvNo FROM invoice where CustNo = '$CustInt'");	   
        $stmt = $conn->prepare("SELECT SupCode FROM suppliers");
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        
        while($row = $stmt->fetch()) {
            $return_arr[] =  $row['SupCode'];
        }
 
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
 
 
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
 
?>
