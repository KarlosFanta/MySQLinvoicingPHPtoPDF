<header>
<title>Yester</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<style type="text/css">
$('.ui-autocomplete-input').css({fontSize: '7px', width: '200px'});
</style>
	<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script  type="text/javascript">
	$('.ui-autocomplete-input').css({fontSize: '7px', width: '200px'});

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
		var availableTags = [tomorrow, todaydate,	yesterday, twodaysago, threedaysago, fourdaysago, fivedaysago, sixdaysago, sevendaysago, eightdaysago, ninedaysago, tendaysago, a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z, a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, a12, a13, a14, a15, a16, a17, a18, a19, a20 ];
		$( "#lst" ).autocomplete({
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
		?>
		<!--	<input type="text"  size="10" id="ProofDate"  name="ProofDate" value="" /> -->

	<!-- selecting too many files above can casue conflicts-->
<!--	<link rel="stylesheet" href="/resources/demos/style.css">-->


