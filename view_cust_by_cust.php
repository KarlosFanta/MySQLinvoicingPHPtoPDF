<?php
$query =("SELECT * FROM customer where CustNo = $CustInt ");
//echo $query;
//echo $CustInt;
if ($result = $DBConnect->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
//$id =  $row_list['id'];
//$name = $row_list['name'];
//$email = $row_list['email'];
$CustNo =  $row['CustNo'];
$CustFN =  $row['CustFN'];
$CustLN =  $row['CustLN'];
$CustEmail =  $row['CustEmail'];
$CustTel =  $row['CustTel'];
$CustCell =  $row['CustCell'];
$CustAddr =  $row['CustAddr'];
$CustIDdoc =  $row['CustIDdoc'];
$CustDetails =  $row['CustDetails'];
$ADSLTel =  $row['ADSLTel'];
$CustPW =  $row['CustPW'];
//$TopupURL =  $row['TopupURL'];
$Important =  $row['Important'];


		}

    /* free result set */
    $result->free();
}


echo "<br><br>view_cust_by_cust.php<br> ";
//echo $CustNo;
//echo " ";
echo "<b><font size = 3 face = arial>";
echo $CustLN;
echo " ";
echo $CustFN;
echo "&nbsp;&nbsp;&nbsp;&nbsp; <a href=mailto:";
echo $CustEmail;
echo "?Subject=>"; 
echo $CustEmail;
echo "</a>&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustCell;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustTel;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustAddr;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustIDdoc;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustDetails;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $ADSLTel;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $CustPW;
echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
//echo $TopupURL;
//echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $Important;
echo "<br><br></font></b>";

?>