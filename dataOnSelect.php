<?php
include 'dbConnect.php';

try {

    // prepare query
    $query = "select
                InvNo, Summary, TotAmt 
            from 
                invoice 
            where 
                CustNo = ?";
            
    $stmt = $con->prepare( $query );

	
	
	
	
	
	
    // this is the first question mark above
    $stmt->bindParam(1, $_REQUEST['id']);

    // execute our query
    $stmt->execute();
	
	
	
//	print("Fetch all of the remaining rows in the result set:\n");
//$result = $stmt->fetchAll();
//print_r($result);

    // store retrieved row to a variable
 //   $row = $stmt->fetch(PDO::FETCH_ASSOC);

	
/*	$sth->execute(array(150, 'red'));
$red = $sth->fetchAll();
$sth->execute(array(175, 'yellow'));
$yellow = $sth->fetchAll();
 */
    echo "<table border = 0>";
// echo $query;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $InvNo = $row['InvNo'];
    $Summary = $row['Summary'];
    $TotAmt = $row['TotAmt'];

/*	echo "InvNo:".$InvNo ;
  echo "<br>";
  echo $Summary ;
  echo "<br>";
  echo $TotAmt ;
  echo "<br>";
  

 

 // values to fill up our table
    $InvNo = $row['InvNo'];
    $Summary = $row['Summary'];
    $TotAmt = $row['TotAmt'];
*/
    // our table
        echo "<tr>";
            echo "<td>Invoice No: </td>";
            echo "<td>{$InvNo} </td>";
//        echo "</tr>";
//        echo "<tr>";
            echo "<td> Amt: </td>";
            echo "<td>R{$TotAmt}</td>";
//        echo "</tr>";
//        echo "<tr>";
//            echo "<td>Summary: </td>";
            echo "<td>{$Summary}</td>";
        echo "</tr>";
}		
		
		
    echo "</table>";
   
}catch(PDOException $exception){

    // to handle error
    echo "Error: " . $exception->getMessage();
}
?>
