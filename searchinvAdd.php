<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Itsmeagain007#');
define('DB_NAME', 'kc');
//
/* @session_start();
	///echo "SESSION CustNo: ". $_SESSION['CustNo'] ."<br />";
	$CustInt = $_SESSION['CustNo'];
//echo "sg: ".$sg;
//$dotdot = 51;

	$query = "SELECT dotdot FROM customer WHERE CustNo = $CustInt" ;
require_once 'inc_OnlineStoreDB.php';//page567
if ($result = mysqli_query($DBConnect, $query)) {      //I think this is all Cust Details
  while ($row2 = @mysqli_fetch_assoc($result)) {

  $dotstr = $row2['dotdot'];
}
mysqli_free_result($result);
}
$dor = intval($dotstr);
echo "dor:".$dor;

$dotstr=0;

*/
if (isset($_GET['term'])){
    $return_arr = array();
    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   		$stmt = $conn->prepare('SELECT * FROM jqinv');
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        while($row = $stmt->fetch()) {
            $return_arr[] =  $row['invsugg'];
        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
//$stmt = $conn->prepare('SELECT summary FROM ajaxsuggest');  // WORKS!!! if $row['summary']
//$stmt = $conn->prepare('SELECT summary FROM ajaxsuggest WHERE summary LIKE :term');
//SELECT inv.InvNo FROM invoice inv, transaction trn WHERE inv.InvNo = trn.InvNoA  and CustNo = $CustInt
//$stmt = $conn->prepare("SELECT InvNo FROM invoice where CustNo = '$CustInt'");
//$stmt = $conn->prepare("SELECT MAX(InvNo)  AS MAXNUM FROM invoice where InvNo < $sg");	   //The $sg is the problem here.
//$stmt = $conn->prepare("SELECT MAX(InvNo)  AS MAXNUM FROM invoice");
//$stmt = $conn->prepare("(SELECT MAX(InvNo)+1  AS MAXNUM FROM invoice  where InvNo < 5898) UNION (SELECT MAX(InvNo)+1  AS MAXNUM FROM invoice )");
//$stmt = $conn->prepare("SELECT dotdot AS MAXNUM FROM customer  where CustNo = '$CustInt'");
//$stmt = $conn->prepare("(SELECT MAX(InvNo)+1  AS MAXNUM FROM invoice  where InvNo < 5898)");

?>
