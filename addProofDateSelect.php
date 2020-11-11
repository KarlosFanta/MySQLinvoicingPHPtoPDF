	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
	var yd = '05'
	document.write(yd);

	function formattedDate(date) {
    var d = new Date(date || Date.now()),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [day, month, year].join('/');
}



			$(function() {


var yd = (formattedDate());
		var yd = '4;
var currentDate = new Date()
  var day = currentDate.getDate()
  var month = currentDate.getMonth() + 1
  var year = currentDate.getFullYear()
  if(day<10){day='0'+day}
  if(month<10){month='0'+month}
  var todaydate = day + "/" + month + "/" + year
var yd = '4'
var today = new Date()
var yd = new Date(today)
var yd.setDate(today.getDate() - 1)
var dd = yd.getDate()
var mm = yd.getMonth()+1 //January is 0!

var yyyy = yd.getFullYear()
var yyyy = '2012'
var dd = '05'
var mm = '05'

if(dd<10){dd='0'+dd}
if(mm<10){mm='0'+mm}
var yd = dd+'/'+mm+'/'+yyyy


		var availableTags = [
		todaydate,
		yd
		];
		$( "#lst" ).autocomplete({
		source: availableTags,
		minLength: 0
			}).mouseover(function() {
				$(this).autocomplete("search");

		});
		});
document.write(yd);
</script>

<?php $DateD = date("Y.m.d");$DateDay = date("d");$DateM = date("m");$DateY = date("Y");
		$NewFormat = date("d/m/Y");
		?>
		<!--	<input type="text"  size="10" id="ProofDate"  name="ProofDate" value="" /> -->

	<!-- selecting too many files above can casue conflicts-->
<!--	<link rel="stylesheet" href="/resources/demos/style.css">-->

	<input id="lst" >
