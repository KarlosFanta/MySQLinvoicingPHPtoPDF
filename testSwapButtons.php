buttons


<input id="Txt1" type="text" name="Txt1" value="15" autofocus>
<input id="Txt2" type="text" name="Txt2" value="16">
<input id="Txt3" type="text" name="Txt3" value="17">

<script type="text/javascript">
alert("testing code");
const inputs = document.querySelectorAll('input');
inputs.forEach((input, index) => {
input.addEventListener('keypress', function(e) {
const key = e.which || e.keyCode;
if (key === 13) { // 13 is the code for the Enter key
if (index < inputs.length - 1) {
inputs[index + 1].focus();
} else {
inputs[0].focus(); // If the last input is focused, go back to the first input
}
}
});
});
alert("code loaded.  Press Enter a few times to jump to next fields ");

</script>