 <?php	//this is "process_Trans.php"
 $page_title = "You added a transaction";
	include 'header.php';
require_once 'inc_OnlineStoreDB.php';
?>


<?php
$InvNoA = '0';
$InvNoB = '0';
$InvNoC = '0';
$InvNoD = '0';
$InvNoE = '0';
$InvNoF = '0';
$InvNoG = '0';
$InvNoH = '0';
$InvNoI = '0';
$InvNoJ = '0';
$InvNoK = '0';
$InvNoL = '0';
$InvNoM = '0';
$InvNoN = '0';

$InvNoA = $_POST['InvNoA'];
$InvNoB = $_POST['InvNoB'];
$InvNoC = $_POST['InvNoC'];
$InvNoD = $_POST['InvNoD'];
$InvNoE = $_POST['InvNoE'];
$InvNoF = $_POST['InvNoF'];
$InvNoG = $_POST['InvNoG'];
$InvNoH = $_POST['InvNoH'];
$InvNoI = $_POST['InvNoI'];
$InvNoJ = $_POST['InvNoJ'];
$InvNoK = $_POST['InvNoK'];
$InvNoL = $_POST['InvNoL'];
$InvNoM = $_POST['InvNoM'];
$InvNoN = $_POST['InvNoN'];

echo "1x $InvNoA <br>";
echo "1x $InvNoB <br>";
echo "1x $InvNoC <br>";
echo "1x $InvNoD <br>";
echo "1x $InvNoE <br>";
echo "1x $InvNoF <br>";
echo "1x $InvNoG <br>";
echo "1x $InvNoH <br>";
echo "1x $InvNoI <br>";
echo "1x $InvNoJ <br>";
echo "1x $InvNoK <br>";
echo "1x $InvNoL <br>";
echo "1x $InvNoM <br>";
echo "1x $InvNoN <br>";
echo '</br>';
include '../1streetLights/import4HTMLtoExcel.php';
?>
