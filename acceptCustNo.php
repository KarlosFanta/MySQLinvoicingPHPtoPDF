<?php
    @session_start();
//$CustNo = 0;
	//echo "GETTER  Getter: ". $_GET['link']."<br />";
	echo "GETTER  Getter: ". @$_GET['CustNo']."<br />";
	if(isset($_GET["CustNo"]))
			$CustInt = 	$_GET['CustNo'];
else
	$CustInt = 	$_POST['CustNo'];

$_SESSION['CustNo'] = $CustInt;
echo $CustInt;
echo "<br>";
$file = fopen("sessCustNo.txt","w");
echo fwrite($file,"$CustInt");
fclose($file);


	?>
<script language="javascript" type="text/javascript"> 
	function myFunction() {
    setTimeout(function(){ close(); }, 	50);
}
myFunction();
//close();
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}

</script>

<!--<a href="javascript:close_window();">close</a>
or:
<a href="#" onclick="close_window();return false;">close</a>
<a href="javascript:window.open('','_self').close();">close</a>-->