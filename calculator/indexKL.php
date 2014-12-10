<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<table ><tr><th>


<FORM name="Keypad" action="">
<input name="ReadOut" onKeyPress="return isNumberKey(event)" class="c-input" type="Text" size=8 value="0"></th><th>
 <input name="btnPercent" type="Button" class="c-button" value="%" onClick="Percent()"></th><th>
      <input name="btnNeg" type="Button" class="c-button" value="+/-" onClick="Neg()"></th><th>
      <input name="btnClearEntry" type="Button" class="c-button" value="CE" onClick="ClearEntry()"></th><th>
      <input name="btnClear" type="Button" class="c-button" value="C" onClick="Clear()"></th><th>
      <input name="btnOne" type="Button" class="c-button" value="1" onClick="NumPressed(1)"></th><th>
      <input name="btnTwo" type="Button" class="c-button" value="2" onClick="NumPressed(2)"></th><th>
      <input name="btnThree" type="Button" class="c-button" value="3" onClick="NumPressed(3)"></th><th>
      <input name="btnDivide" type="Button" class="c-button" value="/" onClick="Operation('/')"></th><th>
      <input name="btnFour" type="Button" class="c-button" value="4" onClick="NumPressed(4)"></th><th>
      <input name="btnFive" type="Button" class="c-button" value="5" onClick="NumPressed(5)"></th><th>
      <input name="btnSix" type="Button" class="c-button" value="6" onClick="NumPressed(6)"></th><th>
      <input name="btnMultiply" type="Button" class="c-button" value="*" onClick="Operation('*')"></th><th>
      <input name="btnSeven" type="Button" class="c-button" value="7" onClick="NumPressed(7)"></th><th>
      <input name="btnEight" type="Button" class="c-button" value="8" onClick="NumPressed(8)"></th><th>
      <input name="btnNine" type="Button" class="c-button" value="9" onClick="NumPressed(9)"></th><th>
      <input name="btnMinus" type="Button" class="c-button" value="-" onClick="Operation('-')"></th><th>
      <input name="btnZero" type="Button" class="c-button" value="0" onClick="NumPressed(0)"></th><th>
      <input name="btnDecimal" type="Button" class="c-button" value="." onClick="Decimal()"></th><th>
      <input name="btnEquals" type="Button" class="c-button" value="=" onClick="Operation('=')"></th><th>
      <input name="btnPlus" type="Button" class="c-button" value="+" onClick="Operation('+')">
</form></th></tr></table>
  <script type="text/javascript">
function NumPressed(a){if(FlagNewNum){FKeyPad.ReadOut.value=a;FlagNewNum=false}else{if(FKeyPad.ReadOut.value=="0"){FKeyPad.ReadOut.value=a}else{FKeyPad.ReadOut.value+=a}}}function Operation(b){var a=FKeyPad.ReadOut.value;if(FlagNewNum&&PendingOp!="="){}else{FlagNewNum=true;if("+"==PendingOp){Accumulate+=parseFloat(a)}else{if("-"==PendingOp){Accumulate-=parseFloat(a)}else{if("/"==PendingOp){Accumulate/=parseFloat(a)}else{if("*"==PendingOp){Accumulate*=parseFloat(a)}else{Accumulate=parseFloat(a)}}}}FKeyPad.ReadOut.value=Accumulate;PendingOp=b}}function Decimal(){var a=FKeyPad.ReadOut.value;if(FlagNewNum){a="0.";FlagNewNum=false}else{if(a.indexOf(".")==-1){a+="."}}FKeyPad.ReadOut.value=a}function ClearEntry(){FKeyPad.ReadOut.value="0";FlagNewNum=true}function Clear(){Accumulate=0;PendingOp="";ClearEntry()}function Neg(){FKeyPad.ReadOut.value=parseFloat(FKeyPad.ReadOut.value)*-1}function Percent(){FKeyPad.ReadOut.value=parseFloat(FKeyPad.ReadOut.value)/100*parseFloat(Accumulate)}function isNumberKey(b){var a=b.which?b.which:event.keyCode;if(a!=46&&a>31&&(a<48||a>57)){return false}return true}var FKeyPad=document.Keypad;var Accumulate=0;var FlagNewNum=false;var PendingOp="";$(document).ready(function(){$("#calculator").draggable()});
    </script>
    <!--<footer class="footer">Powered by <a href="http://cragglist.uphero.com/">Cragglist</a></footer>-->
