<title>AllTransactions</title>
<?php

	
	//	require_once('login_check.php');
	// -- Nothing Below this line requires editing -- 

	$page_title = "AllTransactions";
	//require_once('header.php');	
	//require_once('db.php');	
	require_once("inc_OnlineStoreDB.php");
			

?> 
<style type="text/css">
    table.form{width:100%}
    td.label{width:7px;white-space:nowrap;}
    td input{width:100%;}
</style>

<table border = 1 class="form">
    <tr>
        <td class="label">My label:</td>
        <td>yello</td>
    </tr>
</table>
<?php //require_once "header.php"; ?>
<b><br><font size = "4" type="arial">View Transactions</b></font>view_trans.php ordered by TransDate

<a href = "view_transASCENDING.php"> CLick here to order by ASCENDING</a>
<a href = "view_transNo.php"> CLick here to order by TransNo</a>
<a href = "view_trans_all.php"> CLick here to order by TransNo</a>
<a href = "view_trans_allNoInvNoA.php"> view_trans_allNoInvNoA.php</a>
<a href = "view_transLatestsortbyTrNo.php"> view_transLatestsortbyTrNo.php  CLick here to order by TransNo</a>
<a href = "view_trans_custALL.php"> CLick here to view_trans_custALL</a>
<a href = "view_transLatest.php"> CLick here to view_transLatest</a>
<a href = "view_transLatest2.php"> CLick here to view_transLatest2</a>
<a href = "view_transLatestsortbyDateAsc.php"> view_transLatestsortbyDateAsc</a>
<a href = "view_transLatestsortbyDateDesc.php"> view_transLatestsortbyDateDesc</a>
<a href = "view_trans2021DateDesc.php"> view_trans2021 BY DATE DESC</a>
<a href = "view_trans2021DateAsc.php"> view_trans2021 BY DATE ASC</a>
<a href = "view_trans2021NoDesc.php"> view_trans2021 BY No DESC</a>
<a href = "view_trans2021NoAsc.php"> view_trans2021 BY No ASC</a>


</br>



<?php

$SQLstring = "select * from transaction order by TransDate asc";
//echo $SQLstring."<br><br>"; 
if ($result = mysqli_query($DBConnect, $SQLstring)) {
echo "<table  class='form' width='100%' border='0'>\n";
echo "<tr><th>TransNo</th>";
//echo "<th>CustNo</th>";
echo "<th>TransDate&nbsp;</th>";
echo "<th align = left>CustSDR</th>";
echo "<th>AmtPaid</th>";
echo "<th align = left >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notes</th>";
echo "<th>Name</th>";
//echo "<th align = left class='label'></th>\n";
echo "<th>InvA</th>\n";
echo "<th>InvB</th>\n";
echo "<th>InvC</th>\n";
echo "<th>InvD</th>\n";
echo "<th>InvE</th>\n";
echo "<th>InvF</th>\n";
echo "<th>InvG</th>\n";
echo "<th>TM</th>\n";
echo "</tr>\n";

		while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["TransNo"];
		echo "<tr><th>";
		echo "Tr".$x."</th>";
	$CN = "";
	$CN = $row["CustNo"];
if ($CN == '')
	$CN = 1;


$D1 = explode("-", $row["TransDate"]);
$EDate = $D1[2]."/".$D1[1]."/".$D1[0];
$DDD =  $D1[2];
$arr2 = str_split($DDD, 1);
echo "<th>";
if ($EDate == "03/01/2012")
echo "<font size = 5 color = orange><b>";
$arr2 = str_split($DDD, 1);
if ($arr2[1]== '2')
{
echo "<font  color = green><b>";
}
if ($arr2[1]== '4')
echo "<font  color = purple><b>";

if ($arr2[1]== '6')
echo "<font  color = blue><b>";

if ($arr2[1]== '8')
echo "<font  color = orange><b>";

if ($arr2[1]== '0')
echo "<font  color = brown><b>";
echo "{$EDate}</b></th>";//TransDate 

$shortenedSDR = substr($row['CustSDR'], 0, 10);
echo "<th align = left>&nbsp;{$shortenedSDR}</th>\n";
echo "<th align = right>R{$row['AmtPaid']}</th>";
$shortenedNotes = substr($row["Notes"], 0, 18);
echo "<th align = left class='label'>&nbsp;&nbsp;&nbsp;{$shortenedNotes}</th>\n";//Notes

$SQLstringC = "select CustFN, CustLN from customer where CustNo = $CN";
if ($resultC = mysqli_query($DBConnect, $SQLstringC)) {
while ($rowC = mysqli_fetch_assoc($resultC)) {
		$unshortenedFN = $rowC["CustFN"];
		$shortenedFN = substr($rowC["CustFN"], 0, 6);
		$unshortenedLN = $rowC["CustLN"];
		$shortened = substr($rowC["CustLN"], 0, 7);
		echo "<th align = left>{$CN}_{$shortenedFN}_{$shortened}</th>";
}
mysqli_free_result($resultC);
}


echo "<th>{$row["InvNoA"]}</th>\n";
//echo "<th>{$row[7]}</th>\n";
echo "<th>{$row["InvNoB"]}</th>\n";
//echo "<th>{$row[9]}</th>\n";
echo "<th>{$row["InvNoC"]}</th>\n";
//echo "<th>{$row[11]}</th>\n";
echo "<th>{$row["InvNoD"]}</th>\n";
//echo "<th>{$row[13]}</th>\n";
echo "<th>{$row["InvNoE"]}</th>\n";
echo "<th>{$row["InvNoF"]}</th>\n";
//echo "<th>{$row[17]}</th>\n";
echo "<th>{$row["InvNoG"]}</th>\n";
echo "<th>{$row["TMethod"]}</th>\n";
echo "<th><font size =1><input type = text value ='{$row["Notes"]}'></font></th>\n";
//echo "<th><font size =1>{$unshortenedLN}<br> {$unshortenedFN}</font></th>\n";
echo "</tr></font>\n";
		}
    mysqli_free_result($result);
	
}
echo "</table>";

?>
















<?php
/*echo "<br><br><br/><br><br><br><br/><br><br><br><br/><br><br><br><br/><br>2-dimensional table example<br>";
$myarray = array("key1"=>array(1,2,3,4),
                 "key2"=>array(2,3,"B",5),
                 "key3"=>array(3,4,5,6),
                 "key4"=>array("Z",5,6,"E")); //Having a key or not doesn't break it

echo "<table>";
foreach($myarray as $key => $element){
    echo "<tr>";
    foreach($element as $subkey => $subelement){
        echo "<td>$subelement</td>";
    }
    echo "</tr>";
}
echo "</table>";
*/



?>

</body>
</html>





<?php
//	require_once('footer.php');		
?>