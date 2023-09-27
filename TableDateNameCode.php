<?php	

//$TableDateName = 'TransDate';//or PurchDate for expenses
$TDN = $TableDateName;
//$QueryResult = @mysql_query($SQLstring, $DBConnect);
$cyPLUS1year = $cy+1;
if ($TBLrow == 'JanFeb') {
$s = "$TDN LIKE $cy-01-%' or $TDN LIKE '$cy-02-%'"; //WHERE CLAUSE: where Transdate/PurchDate LIKE 2016-01-% or Transdate/PurchDate LIKE 2016-02-% 
} elseif ($TBLrow == 'MarApr') {
$s = "$TDN LIKE '$cy-03-%' or $TDN LIKE '$cy-04-%'";
} elseif ($TBLrow == 'MayJun') {
$s = "$TDN LIKE '$cy-05-%' or $TDN LIKE '$cy-06-%'";
} elseif ($TBLrow == 'JulAug') {
$s = "$TDN LIKE '$cy-07-%' or $TDN LIKE '$cy-08-%'";
} elseif ($TBLrow == 'SepOct') {
$s = "$TDN LIKE '$cy-09-%' or $TDN LIKE '$cy-10-%'";
} elseif ($TBLrow == 'NovDec') {
$s = "$TDN LIKE '$cy-11-%' or $TDN LIKE '$cy-12-%'";
} elseif ($TBLrow == 'FinYear') {
	echo "<br><br><b>NB Selected Financial year NB Code may not be complete<br>
	Transactions where inputted as from 2011<br>
	And Expenses as from 2014 into the database<br><br></b>";
$s = "$TDN LIKE '$cy-03-%' or $TDN LIKE '$cy-04-%'  or $TDN LIKE '$cy-05-%'  or $TDN LIKE '$cy-06-%'  or $TDN LIKE '$cy-07-%'  or $TDN LIKE '$cy-08-%'  or $TDN LIKE '$cy-09-%'  or $TDN LIKE '$cy-10-%'  or $TDN LIKE '$cy-11-%'  or $TDN LIKE '$cy-12-%'  or $TDN LIKE '$cyPLUS1year-01-%'  or $TDN LIKE '$cyPLUS1year-02-%'";
}
 elseif ($TBLrow == 'FINYEAR') {
	echo "<br><br><b>NB Selected Financial year NB Code may not be complete<br>
	Transactions where inputted as from 2011<br>
	And Expenses as from 2014 into the database<br><br></b>";
$s = "$TDN LIKE '$cy-03-%' or $TDN LIKE '$cy-04-%'  or $TDN LIKE '$cy-05-%'  or $TDN LIKE '$cy-06-%'  or $TDN LIKE '$cy-07-%'  or $TDN LIKE '$cy-08-%'  or $TDN LIKE '$cy-09-%'  or $TDN LIKE '$cy-10-%'  or $TDN LIKE '$cy-11-%'  or $TDN LIKE '$cy-12-%'  or $TDN LIKE '$cyPLUS1year-01-%'  or $TDN LIKE '$cyPLUS1year-02-%'";
}
//SINGLE MONTHS
elseif ($TBLrow == 'Jan') {
$s = "$cy-01-%"; $TDN = "$cy-01-%";// was $t
} elseif ($TBLrow == 'Feb') {
$s = "$cy-02-%"; $TDN = "$cy-02-%";
} elseif ($TBLrow == 'Mar') {
$s = "$cy-03-%"; $TDN = "$cy-03-%";
} elseif ($TBLrow == 'Apr') {
$s = "$cy-04-%"; $TDN = "$cy-04-%";
} elseif ($TBLrow == 'May') {
$s = "$cy-05-%"; $TDN = "$cy-05-%";
} elseif ($TBLrow == 'Jun') {
$s = "$cy-06-%"; $TDN = "$cy-06-%";
} elseif ($TBLrow == 'Jul') {
$s = "$cy-07-%"; $TDN = "$cy-07-%";
} elseif ($TBLrow == 'Aug') {
$s = "$cy-08-%"; $TDN = "$cy-08-%";
} elseif ($TBLrow == 'Sep') {
$s = "$cy-09-%"; $TDN = "$cy-09-%";
} elseif ($TBLrow == 'Oct') {
$s = "$cy-10-%"; $TDN = "$cy-10-%";
} elseif ($TBLrow == 'Nov') {
$s = "$cy-11-%"; $TDN = "$cy-11-%";
} elseif ($TBLrow == 'Dec') {
$s = "$cy-12-%"; $TDN = "$cy-12-%";
}
?>