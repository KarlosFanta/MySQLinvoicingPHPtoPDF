<html>
<head>
<title>Multi Select Boxes</title>
<script type="text/javascript">
/* This script and many more are available free online at
The JavaScript Source!! http://javascript.internet.com
Created by: Kiran Pai | http://www.codecoffee.com/ 

Modified From: http://javascript.internet.com/forms/multi-value-drop-down-list-2.html
Modified for : http://www.webdeveloper.com/forum/showthread.php?t=190015
*/

var YearSelections   = new Array('2005:','2006:','2007:','2008:');

// format of array is ('value:comment',....)
// where 'value' is value of option and 'comment' is optional information user sees in selectbox options
// examples of both with and without options follows

var QtrSelections    = new Array('Qtr0:Qtr 1','Qtr1:Qtr 2','Qtr2:Qtr 3','Qtr3:Qtr 4');
var Qtr0 = new Array('Jan:January','Feb:February','Mar:March');
var Qtr1 = new Array('Apr:','May:','Jun:');
var Qtr2 = new Array('Jul:','Aug:','Sep:');
var Qtr3 = new Array('Oct:October','Nov:November','Dec:December');

var genre_style = new Array('bluesplayers:Blues','rockplayers:Rock');
var bluesplayers= new Array("B.B. King:", "Muddy Waters:", "Stevie Ray Vaughan:", "George Thorogood:");
var rockplayers = new Array("Alvin Lee:", "David Gilmour:", "Pete Townshend:", "Jeff Beck:");

function set_Selections(selObj,selOpt) {
  var tmp;
  var selElem = document.getElementById(selObj);	 // alert(selObj+' : '+selOpt+' = '+selOpt.length);
  for (var i=0; i<selOpt.length; i++) {
    tmp = selOpt[i].split(':');
    if (tmp[1] == '') { selElem.options[selElem.options.length] = new Option(tmp[0]); }
                 else { selElem.options[selElem.options.length] = new Option(tmp[1],tmp[0]); }
  }
}
function Initialize() {
  set_Selections('selYear',YearSelections);
  set_Selections('selQtr',QtrSelections);
  set_Selections('selMon',Qtr0);
  set_Selections('selGenre',genre_style);
  set_Selections('selPlayer',bluesplayers);
}

function set_Options(p,c) {	// p=parent, c=child 
  var select_parent = document.getElementById(p);
  var selected_parent = select_parent.options[select_parent.selectedIndex].value;
  var select_child  = document.getElementById(c);
  select_child.options.length=0;

  var tmp = select_parent.options[select_parent.selectedIndex].value.split(':');

  var Opt = tmp[0];	// alert(Opt);
// following is area of code I would like to change so that array can be specified in function call
// for example, I would like to have array pulled from split as true array and not string of array name
  var OPT;
  switch (Opt) {
    case 'Qtr0' : OPT = Qtr0; break;
    case 'Qtr1' : OPT = Qtr1; break;
    case 'Qtr2' : OPT = Qtr2; break;
    case 'Qtr3' : OPT = Qtr3; break;
    case 'bluesplayers' : OPT = bluesplayers; break;
    case 'rockplayers'  : OPT = rockplayers;  break;
  }
// need to have OPT as the array name, not the string of the array name
  set_Selections(c,OPT);
}

function ShowSelection() {
  var select_Year = document.getElementById('selYear');
  var selected_Year = select_Year.options[select_Year.selectedIndex].value;
  var select_Qtr = document.getElementById('selQtr');
  var selected_Qtr = select_Qtr.options[select_Qtr.selectedIndex].value;
  var select_Month = document.getElementById('selMon');
  var selected_Month= select_Month.options[select_Month.selectedIndex].value;

  var select_genre = document.getElementById('selGenre');
  var selected_genre = select_genre.options[select_genre.selectedIndex].value;
  var select_player = document.getElementById('selPlayer');
  var selected_player = select_player.options[select_player.selectedIndex].value;

  alert('Selection: '+selected_Year+' : '+selected_Qtr+' : '+selected_Month+' : '+selected_genre+ ' : ' + selected_player);
}

</script>
</head>
<body onload="Initialize()">

<form name="myform" method="POST" onsubmit="return false">
  <table>
   <tr>
    <td>Year:<select name="selYear" id='selYear'><option>------</select></td>

    <td>Quarter:<select name="selQtr" id='selQtr'
        onchange="set_Options('selQtr','selMon')"><option>------</select></td>
    <td>Month:<select name="selMon" id='selMon'><option>------</select></td>

    <td>Genre:<select name="selGenre" id="selGenre"
        onchange="set_Options('selGenre','selPlayer')"> <option>-----</select> </td> 
    <td>Guitarist:<select name="selPlayer" id="selPlayer"> <option>------ </select> </td>

    <td><button onclick="ShowSelection()">Show Selection</button></td>
   </tr>
  </table>
</form>
</body>
</html>
