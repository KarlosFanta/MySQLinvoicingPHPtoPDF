<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Itsmeagain007#');
define('DB_NAME', 'kc');

if (isset($_GET['term'])){
    $return_arr = array();

    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       // $stmt = $conn->prepare('SELECT summary FROM ajaxsuggest WHERE summary LIKE :term');
        $stmt = $conn->prepare('SELECT * FROM expenses order by category');
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));

        while($row = $stmt->fetch()) {
            $return_arr[] =  $row['Category'].'[ '.$row['ExpDesc'].'[ ExpNo::'.$row['ExpNo'].':: SN:'.$row['SerialNo'].' '.$row['SupCode']. ' '.$row['PurchDate'].
			' R'.$row['ProdCostExVAT'].'ex VAT _ Notes:'.$row['Notes'];

        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}

?>
