<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {

    //autocomplete
    $(".clInvNoA").autocomplete({
        source: "searchinv.php",
        minLength: 0


				}).mouseover(function() {
				$(this).autocomplete("search");

    });

    //autocomplete attempt for next input
    $(".clNotes").autocomplete({
        source: "searchinv2.php",
        minLength: 0


				}).mouseover(function() {
				$(this).autocomplete("search");

    });

   //autocomplete attempt for next input
    $(".clAmt").autocomplete({
        source: "searchinv3.php",
        minLength: 0


				}).mouseover(function() {
				$(this).autocomplete("search");

    });

});
</script>




<!---
   //autocomplete
    $(".auto").autocomplete({
        source: "searchinv.php",
        minLength: 0
    });
});

	$(function() {
		var availableTags = [todaydate,	yesterday, twodaysago, threedaysago, fourdaysago, fivedaysago, sixdaysago, sevendaysago];
		$( "#lst" ).autocomplete({
		source: availableTags,
		minLength: 0
			}).mouseover(function() {
				$(this).autocomplete("search");
		});
		});
-->
