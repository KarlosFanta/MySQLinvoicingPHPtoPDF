<html>
	<head>

		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Calculator</title>

<script type="text/javascript">

function calc()
{

  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  val1 = document.getElementById("value1").value;
  val2 = document.getElementById("value2").value;
  mani = document.getElementById("manipulator").value;

  if (val1 != "" && val2 != "")
  {

  document.getElementById("resp").innerHTML="Calculating...";
  queryPath = "CalcServ.php?value1="+val1+"&value2="+val2+"&manipulator="+mani;

  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

      document.getElementById("resp").innerHTML=xmlhttp.responseText;

    }
  }

  xmlhttp.open("GET",queryPath);
  xmlhttp.send();

  }
}

</script>

  </head>
<body>
	<div width="320">
	  <center>
	    <form>
		<font size="4"><strong>PHP/AJAX Calculator</strong></font><br/><br/>
		   <input onkeypress="return onlyNumbers()" onkeyup="calc()" id="value1" type="text" name="value1"><br/>
		      <select onchange="calc()" id="manipulator" name="manipulator">
			    <option value="add">SUM</option>
			    <option value="subtract">SUBTRACT</option>
			    <option value="multiply">MULTIPLY</option>
		            <option value="divide">DIVIDE</option>
		       </select><br/>
		    <input id="value2" onkeyup="calc()" type="text" name="value2">
		 </form>

	<strong><font size="4" color="blue"><span id="resp"></span></font></strong>
	</center>
	</div>
	  </body>
</html>

