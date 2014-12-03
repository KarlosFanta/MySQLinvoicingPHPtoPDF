<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete SUPPLIER CODE
    $(".clSC").autocomplete({
        source: "searchSC.php",
        minLength: 0
		
			
			//	}).mouseover(function() {
			//	$(this).autocomplete("search");
				
				}).onselect(function() {
				$(this).autocomplete("close");
				
				//Other pointing-device-related events: mouseleave, mousedown, mousemove, mouseout, mouseover, mouseup, click and dblclick.
				//maybe onseslct?
				
	
    });











   //autocomplete attempt for next input
    $(".clCN").autocomplete({
        source: "searchCN.php",
        minLength: 0
		
			
				}).click(function() {
				$(this).autocomplete("search");
	
    });


	//clAmt searchinv3.php
	
	
	
	
	
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
