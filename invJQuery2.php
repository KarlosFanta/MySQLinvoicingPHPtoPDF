<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".clInvNoA").autocomplete({
        source: "searchinvNew.php",
        minLength: 0
		//});  
			
		//		}).mouseover(function() {
		//		$(this).autocomplete("search");
	
		}).click(function() {
				$(this).autocomplete("search");  //the only way to make this faster is to put it onloadpage.
	
    });


				//}).onselect(function() {
			//	$(this).autocomplete("close");
				
				//Other pointing-device-related events: mouseleave, mousedown, mousemove, mouseout, mouseover, mouseup, click and dblclick.
				//maybe onseslct?
			
/*
   $(".auto").autocomplete({
        source: "searchinv.php",
        minLength: 0
    });                
});


	}).click(function() {
				$(this).autocomplete("search");
*/






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
