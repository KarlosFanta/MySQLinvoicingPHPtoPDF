<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<div id="calculator">
  <FORM name="Keypad" action="">
    <input name="ReadOut" onKeyPress="return isNumberKey(event)" class="c-input" type="Text" size=8 value="0">
    <input name="btnPercent" type="Button" class="c-button" value="%" onClick="Percent()">
    <input name="btnNeg" type="Button" class="c-button" value="+/-" onClick="Neg()">
    <input name="btnClearEntry" type="Button" class="c-button" value="CE" onClick="ClearEntry()">
    <input name="btnClear" type="Button" class="c-button" value="C" onClick="Clear()">
    <input name="btnOne" type="Button" class="c-button" value="1" onClick="NumPressed(1)">
    <input name="btnTwo" type="Button" class="c-button" value="2" onClick="NumPressed(2)">
    <input name="btnThree" type="Button" class="c-button" value="3" onClick="NumPressed(3)">
    <input name="btnDivide" type="Button" class="c-button" value="/" onClick="Operation('/')">
    <input name="btnFour" type="Button" class="c-button" value="4" onClick="NumPressed(4)">
    <input name="btnFive" type="Button" class="c-button" value="5" onClick="NumPressed(5)">
    <input name="btnSix" type="Button" class="c-button" value="6" onClick="NumPressed(6)">
    <input name="btnMultiply" type="Button" class="c-button" value="*" onClick="Operation('*')">
    <input name="btnSeven" type="Button" class="c-button" value="7" onClick="NumPressed(7)">
    <input name="btnEight" type="Button" class="c-button" value="8" onClick="NumPressed(8)">
    <input name="btnNine" type="Button" class="c-button" value="9" onClick="NumPressed(9)">
    <input name="btnMinus" type="Button" class="c-button" value="-" onClick="Operation('-')">
    <input name="btnZero" type="Button" class="c-button" value="0" onClick="NumPressed(0)">
    <input name="btnDecimal" type="Button" class="c-button" value="." onClick="Decimal()">
    <input name="btnEquals" type="Button" class="c-button" value="=" onClick="Operation('=')">
    <input name="btnPlus" type="Button" class="c-button" value="+" onClick="Operation('+')">
  </form>
</div>
<script type="text/javascript">
function NumPressed(a){if(FlagNewNum){FKeyPad.ReadOut.value=a;FlagNewNum=false}else{if(FKeyPad.ReadOut.value=="0"){FKeyPad.ReadOut.value=a}else{FKeyPad.ReadOut.value+=a}}}function Operation(b){var a=FKeyPad.ReadOut.value;if(FlagNewNum&&PendingOp!="="){}else{FlagNewNum=true;if("+"==PendingOp){Accumulate+=parseFloat(a)}else{if("-"==PendingOp){Accumulate-=parseFloat(a)}else{if("/"==PendingOp){Accumulate/=parseFloat(a)}else{if("*"==PendingOp){Accumulate*=parseFloat(a)}else{Accumulate=parseFloat(a)}}}}FKeyPad.ReadOut.value=Accumulate;PendingOp=b}}function Decimal(){var a=FKeyPad.ReadOut.value;if(FlagNewNum){a="0.";FlagNewNum=false}else{if(a.indexOf(".")==-1){a+="."}}FKeyPad.ReadOut.value=a}function ClearEntry(){FKeyPad.ReadOut.value="0";FlagNewNum=true}function Clear(){Accumulate=0;PendingOp="";ClearEntry()}function Neg(){FKeyPad.ReadOut.value=parseFloat(FKeyPad.ReadOut.value)*-1}function Percent(){FKeyPad.ReadOut.value=parseFloat(FKeyPad.ReadOut.value)/100*parseFloat(Accumulate)}function isNumberKey(b){var a=b.which?b.which:event.keyCode;if(a!=46&&a>31&&(a<48||a>57)){return false}return true}var FKeyPad=document.Keypad;var Accumulate=0;var FlagNewNum=false;var PendingOp="";$(document).ready(function(){$("#calculator").draggable()});
</script>
<!--<footer class="footer">Powered by <a href="http://cragglist.uphero.com/">Cragglist</a></footer>-->
