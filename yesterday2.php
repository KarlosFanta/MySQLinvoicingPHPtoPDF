<header>
<?php //$dd = '10';
 //$mm = '11';
 //$yyyy = '2010';
   $Explastdate = '';

 $myfile = fopen("Explastdate.txt", "r") or die("Unable to open file!");
//echo fread($myfile,filesize("Explastdate.txt"));
 $Explastdate = file_get_contents('./Explastdate.txt');
 //$Explastdate = fread($myfile,filesize("Explastdate.txt"));

 //echo  $Explastdate;
 //ok trick is put it into a date format, then add 1 day
 //29/07/2015
 // if the separator is a slash (/), then the American m/d/y is assumed
 //if the separator is a dash (-) or a dot (.), then the European d-m-y format is assumed
 $str = str_replace('/', '-', $Explastdate);

 $time = strtotime($str. ' +1 day');
 $time2 = strtotime($str. ' +2 day');
$time3 = strtotime($str. ' +3 day');
$time4 = strtotime($str. ' +4 day');
$time5 = strtotime($str. ' +5 day');
$time6 = strtotime($str. ' +6 day');
$time7 = strtotime($str. ' +7 day');

$newformat = date('d-m-Y',$time);
 $newformat = str_replace('-', '/', $newformat);

$newformat2 = date('d-m-Y',$time2);
 $newformat2 = str_replace('-', '/', $newformat2);

$newformat3 = date('d-m-Y',$time3);
 $newformat3 = str_replace('-', '/', $newformat3);

$newformat4 = date('d-m-Y',$time4);
 $newformat4 = str_replace('-', '/', $newformat4);

$newformat5 = date('d-m-Y',$time5);
 $newformat5 = str_replace('-', '/', $newformat5);

$newformat6 = date('d-m-Y',$time6);
 $newformat6 = str_replace('-', '/', $newformat6);
$newformat7 = date('d-m-Y',$time7);
 $newformat7 = str_replace('-', '/', $newformat7);

//echo $newformat;

//$result = mb_substr($myStr, 0, 2);
//$result = mb_substr($myStr, 0, 2);
  ?>
<title>Yester</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<style type="text/css">
$('.ui-autocomplete-input').css({fontSize: '7px', width: '200px'});
</style>
	<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script  type="text/javascript">
	$('.ui-autocomplete-input').css({fontSize: '7px', width: '200px'});

	var Explastdate = '<?php echo $Explastdate ?>';
	var Explastdate2 = '<?php echo $newformat ?>';
	var Explastdate3 = '<?php echo $newformat2 ?>';
	var Explastdate4 = '<?php echo $newformat3 ?>';
	var Explastdate5 = '<?php echo $newformat4 ?>';
	var Explastdate6 = '<?php echo $newformat5 ?>';
	var Explastdate7 = '<?php echo $newformat6 ?>';

 //var last = dd + '/' + mm + '/' + yyyy;
	var currentDt = new Date();
	currentDt.setDate(currentDt.getDate()+1);
    var mm = currentDt.getMonth() + 1;
    var dd = currentDt.getDate();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
    var yyyy = currentDt.getFullYear();
    var tomorrow = dd + '/' + mm + '/' + yyyy;

	var currentDt = new Date();
    var mm = currentDt.getMonth() + 1;
    var dd = currentDt.getDate();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
    var yyyy = currentDt.getFullYear();
    var todaydate = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var yesterday = dd + '/' + mm + '/' + yyyy;

	// alert(yesterday);
	//document.write(todaydate); //required for input or span
	//document.write(yesterday);

	currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var twodaysago = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var threedaysago = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var fourdaysago = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var fivedaysago = dd + '/' + mm + '/' + yyyy;

	currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var sixdaysago = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var sevendaysago = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var eightdaysago = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var ninedaysago = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var tendaysago = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var b = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var c = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var d = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var e = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var f = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var g = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var h = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var i = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var j = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var k = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var l = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var m = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var n = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var o = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var p = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var q = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var r = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var s = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var t = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var u = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var v = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var w = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var x = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var y = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var z = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a1 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a2 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a3 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a4 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a5 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a6 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a7 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a8 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a9 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a10 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a11 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a12 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a13 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a14 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a15 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a16 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a17 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a18 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a19 = dd + '/' + mm + '/' + yyyy;

		currentDt.setDate(currentDt.getDate()-1);
	var dd = currentDt.getDate();
	var mm = currentDt.getMonth()+1;
	var yyyy = currentDt.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	var a20 = dd + '/' + mm + '/' + yyyy;

	$(function() {
		var availableTags = [Explastdate, Explastdate2, Explastdate3, Explastdate4,Explastdate5, Explastdate6, Explastdate7,  tomorrow, todaydate,	yesterday, twodaysago, threedaysago, fourdaysago, fivedaysago, sixdaysago, sevendaysago, eightdaysago, ninedaysago, tendaysago, a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z, a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, a12, a13, a14, a15, a16, a17, a18, a19, a20 ];
		$( "#lst2" ).autocomplete({
		source: availableTags,
		minLength: 0
			}).mouseover(function() {
				$(this).autocomplete("search");
		});
		});
</script>
<!--<span id="date">date</span><br>
<span id="yesterday">yesterday</span>
<input id="date">date
<input id="yesterday">yesterday-->
<?php //$DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
		//$NewFormat = date("d/m/Y");
fclose($myfile);		?>
		<!--	<input type="text"  size="10" id="ProofDate"  name="ProofDate" value="" /> -->

	<!-- selecting too many files above can casue conflicts-->
<!--	<link rel="stylesheet" href="/resources/demos/style.css">-->

