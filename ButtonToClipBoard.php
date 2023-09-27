
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script>
$(function() {
	$('.copy-to-clipboard input').click(function() {
	$(this).focus();
	$(this).select();
	document.execCommand('copy');
	$(".copied").text("Copied to clipboard").show().fadeOut(600);
    });
});
</script>


<div class='copied'></div>

<div class="copy-to-clipboard">
	<input readonly type="text" value="Click Me To Copy42">
</div>