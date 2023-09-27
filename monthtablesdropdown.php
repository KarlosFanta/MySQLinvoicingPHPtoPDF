<?php
echo "<font size =1>This is monthtablesdropdown.php ";
$dubi2 ='';
$mont = '';
$TT = '';
$new  = 'newMonth2019';
// Let's get last invoice:
$SQLstring = "select * from invoice where CustNo = $CustInt order by InvNo desc limit 1";
//echo $SQLstring."<br><br>"; 
if ($result = mysqli_query($DBConnect, $SQLstring)) {
  while ($row = mysqli_fetch_assoc($result)) {
	  $x = $row["InvNo"];
	  echo "<FONT color = 'purple'>".$x." ";
	  echo "</FONT>";
	$subi = substr($row["InvNo"], 0, 3);
	echo substr($row["InvNo"], 0, 3)." ";
//	$dubi2 = substr($row["D1"], 0, 10); // eg JanFeb2018
//		echo 'NB dubi2 is D1 description and preferably detects months dubi2:'.$dubi2."<< <br>";
	$dubi2 = substr($row["Summary"], 0, 10); // eg JanFeb2018
	$dubi3 = substr($row["Summary"], 0, 14); // eg JanFeb2018
$dubi2 = str_replace('Prepaid', '', $dubi2);
		echo 'NB dubi2 is summary and preferably detects months dubi2:'.$dubi2."<<   ";
	}
    $result->close();
}
$pos = strpos($dubi2, '2'); //first position is 0
echo "position: $pos ";
echo " dubi2__:] ".$dubi2." ]";
echo substr($dubi2, 0, 3);
if ($pos == '3')
{
	$ytr = '';	
	$mont = substr($dubi2, 0, 3);
	$mont = str_replace('prepaid', '', $mont);
	$mont = str_replace('PREPAID', '', $mont);
	$ytr = substr($dubi2, 3, 4);
//echo "ytr:$ytr<<<<br>";
if ( $mont == "Dec")
{
	$ytr = intval($ytr)+1;
	 $new = "Jan".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Jan")
{
	 $new = "Feb".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Feb")
{
	 $new = "Mar".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Mar")
{
	 $new = "Apr".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Apr")
{
	 $new = "May".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "May")
{
	 $new = "Jun".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Jun")
{
	 $new = "Jul".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Jul")
{
	 $new = "Aug".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Aug")
{
	 $new = "Sep".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Sep")
{
	 $new = "Oct".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Oct")
{
	 $new = "Nov".$ytr;
	 //echo "NNN:".$new."MM<br>";
}
if ( $mont == "Nov")
{
	 $new = "Dec".$ytr;
	 //echo "NNN:".$new."MM<br>";
}

}
 else if ($pos == '6') 
	{
		echo "yo6yo ";
	$ytr = '';	
	$mont = substr($dubi2, 0, 6);
	$ytr = substr($dubi2, 6, 4);
echo "ytr:$ytr<<< ";
echo "mont:$mont<<< ";

    if ($mont == "NovDec")
	{
			$ytr = intval($ytr)+1;
	 $new = "JanFeb".$ytr;
	}

    if ($mont == "NovDev")
	{
			$ytr = intval($ytr)+1;
	 $new = "JanFeb".$ytr;
	}

    if ($mont == "JanFeb")
	{
	 $new = "MarApr".$ytr;
	}
    if ($mont == "FebMar")
	{
	 $new = "AprMay".$ytr;
	}
    if ($mont == "JanAndFeb")
	{
	 $new = "MarApr".$ytr;
	}
    if ($mont == "MarApr")
	{
	 $new = "MayJun".$ytr;
	}
    if ($mont == "AprMay")
	{
	 $new = "JunJul".$ytr;
	}
    if ($mont == "AprMay")
	{
	 $new = "JunJul".$ytr;
	}
    if ($mont == "MayJun")
	{
	 $new = "JulAug".$ytr;
	}
    if ($mont == "MayJun")
	{
	 $new = "JulAug".$ytr;
	}
    if ($mont == "JunJul")
	{
	 $new = "AugSep".$ytr;
	}
    if ($mont == "JulAug")
	{
	 $new = "SepOct".$ytr;
	}
    if ($mont == "JulAug")
	{
	 $new = "SepOct".$ytr;
	}
    if ($mont == "AugSep")
	{
	 $new = "OctNov".$ytr;
	}
     if ($mont == "SepOct")
	{
	 $new = "NovDec".$ytr;
	}
    if ($mont == "OctNov")
	{
	 $new = "DecJan".$ytr;
	}
    if ($mont == "DecJan")
	{
	 $new = "FebMar".$ytr;
	}
    if ($mont == "JanFeb")
	{
	 $new = "MarApr".$ytr;
	}
	
    if ($mont == "JanAndFeb")
	{
	 $new = "MarApr".$ytr;
	}
}

 else if ($pos == '9') 
	{
		echo "yo77yo ";
	$ytr = '';	
	$mont = substr($dubi3, 0, 9);
	$ytr = substr($dubi3, 9, 4);
echo "mo9nt:$mont<<< ";
//echo "dubi3:$dubi3<<<  ";
echo "yyyyt9r:$ytr<<<  ";



   if ($mont == "JanFebMar")
	{
	 $new = "AprMayJun".$ytr;
	}

   if ($mont == "AprMayJun")
	{
	 $new = "JulAugSep".$ytr;
	}

   if ($mont == "JulAugSep")
	{
	 $new = "OctNovDec".$ytr;
	}

   if ($mont == "OctNovDec")
	{
	$ytr = intval($ytr)+1;
	 $new = "JanFebMar".$ytr;
	}

 

}









 	 echo "new: $new";
echo "mont: $mont";


//echo '>>'.$dubi.'<<';
//echo '>>'.$dubi2.'<<';
date_default_timezone_set('Africa/Johannesburg');
function incrementDate($startDate, $monthIncrement = 0) {

    $startingTimeStamp = $startDate->getTimestamp();
    // Get the month value of the given date:
    $monthString = date('Y-m', $startingTimeStamp);
    // Create a date string corresponding to the 1st of the give month,
    // making it safe for monthly calculations:
    $safeDateString = "first day of $monthString";
    // Increment date by given month increments:
    $incrementedDateString = "$safeDateString $monthIncrement month";
    $newTimeStamp = strtotime($incrementedDateString);
    $newDate = DateTime::createFromFormat('U', $newTimeStamp);
    return $newDate;
}

$currentDate = new DateTime();
$threeMonthsAgo = incrementDate($currentDate, -2);
$twoMonthsAgo = incrementDate($currentDate, -1);
$tma =  $twoMonthsAgo->format('MY');
$oneMonthAgo = incrementDate($currentDate, -0);
$oma = $oneMonthAgo->format('MY');
$thisMonth = date("MY");//$currentDate;

$nextMonth =  date('MY',strtotime('first day of +1 month'));
$twoMonthsTime =  date('MY',strtotime('first day of +2 month'));
$threeMonthsTime =  date('MY',strtotime('first day of +3 month'));


$thrma = $threeMonthsAgo->format('MY');
//$thism = $thisMonth->format('MY');
//$nextm =  $nextMonth->format('MY');



//echo "First:  $First";	

//THIS MONTH AS A NUMBER: echo date("n");
//THIS YEAR AS A NUMBER: echo date("Y");
//jan2018 is 116..
//jan2019 is 128..

if (date("Yn") >= 20181 )
	$TT = 116;
if (date("Yn") >= 20191 )
	$TT = 128;
if (date("Yn") >= 20201 )
	$TT = 140;
if (date("Yn")  >= 20211 )
	$TT = 152;
if (date("Yn")  >= 20221 )
	$TT = 164;
if (date("Yn") >= 20231 )
	$TT = 176;
if (date("Yn") >= 20241 )
	$TT = 188;


echo "dateYn".date("Yn")." "; //Warning: A non-numeric value encountered 

echo "TT".$TT." ";
echo "daten".date("n")." ";

	$TTnow = $TT+date("n")-1;  //Warning: A non-numeric value encountered 



//echo " $thisMonth ".date("Yn")."  TT:  $TT<br>  TTnow:  $TTnow<br>";

echo "<select name='mydrop' onload='this.size=70;'  style='width: 220px;  >";
//echo "<option  value='select'>select.. </option>"; 
$aa = "";
$b = "Month2019";

//NB  NB THE OPTION SELCTION IS MUCH LATER IN THE CODE:

//IF IT'S THE NEW YEAR add 12 to $T
//IF IT'S THE NEW YEAR add 12 to $T
//IF IT'S THE NEW YEAR add 12 to $T
	
$y = "2017";//do not change this amount
	
if ($First > '114') 
{
$y= "2018";
//echo "<option  value=''>yoo </option>"; 

}
if ($First >= '127') 
{
$y= "2019";
echo "201999"; 
}



//$T = "116";
$T = "128";

/*	

if ($T > $First) 
{
$j = "Jan";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+1) > $First) 
{
$j = "Feb";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+2) > $First) 
{
$j = "Mar";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+3)  > $First) 
{
//$T = "107";
$j = "Apr";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+4) > $First) 
{
//$T = "108";
$j = "May";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+5)> $First) 
{
//$T = "109";
$j = "Jun";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}

else
if (($T+6) > $First) 
{
//$T = "110";
$j = "Jul";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+7) > $First) 
{
//$T = "111";
$j = "Aug";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+8)  > $First) 
{
//$T = "112";
$j = "Sep";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+9)  > $First) 
{
//$T = "113";
$j = "Oct";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+10)  > $First) 
{
//$T = "114";
$j = "Nov";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+11)  > $First) 
{
//$T = "115";
$j = "Dec";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}


//$y = $y+1;

if (($T+12) > $First) 
{
$j = "Jan";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+13) > $First) 
{
$j = "Feb";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+14) > $First) 
{
$j = "Mar";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+15)  > $First) 
{
//$T = "107";
$j = "Apr";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+16) > $First) 
{
//$T = "108";
$j = "May";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+17)> $First) 
{
//$T = "109";
$j = "Jun";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}

else
if (($T+18) > $First) 
{
//$T = "110";
$j = "Jul";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+19) > $First) 
{
//$T = "111";
$j = "Aug";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+20)  > $First) 
{
//$T = "112";
$j = "Sep";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+21)  > $First) 
{
//$T = "113";
$j = "Oct";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+22)  > $First) 
{
//$T = "114";
$j = "Nov";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}
else
if (($T+23)  > $First) 
{
//$T = "115";
$j = "Dec";
$b = $j.$y;
echo "<option  value='$T $b'>$b $T.. </option>"; 
}

*/









/*echo "<option  value=''>Oct2018 125.. </option>"; //change these
echo "<option  value=''>Nov2018 126.. </option>"; 
echo "<option  value=''>Dec2018 127.. </option>"; 
echo "<option  value=''>Jan2019 128.. </option>"; //change these
echo "<option  value=''>Feb2019 129.. </option>"; 
echo "<option  value=''>Mar2019 130.. </option>"; 
echo "<option  value=''>Apr2019 131.. </option>"; 
echo "<option  value=''>May2019 132.. </option>"; 
echo "<option  value=''>Jun2019 133.. </option>"; 
echo "<option  value=''> </option>"; 
*/
//$m = 116;
$m = $T;
$n = 'Jan';
$k = date("Y"); // THIS YEAR 
$mmm = date("m"); // THIS 
$mmm = $mmm - 3; 
$m = $T-12;
 
echo "<option value=''>thiss month: $thisMonth $TTnow.. </option>"; 
echo "<option value=''>monthtablesdropdown.php not working Nov2019 138.. </option>"; 
echo "<option value=''>next month: $nextMonth ".($TTnow+1).".. </option>"; 


echo "<option value=''>$thrma ".($TTnow-3).".. </option>"; 
++$m;
++$n;
echo "<option value=''>$tma ".($TTnow-2).".. </option>"; 
++$m;
++$n;
echo "<option value=''>$oma ".($TTnow-1).".. </option>"; 
++$m;
++$n;
echo "<option value=''>this month: $thisMonth $TTnow.. </option>"; 
++$m;
++$n;
echo "<option value=''>next month: $nextMonth ".($TTnow+1).".. </option>"; 
++$m;
++$n;
echo "<option value=''>$twoMonthsTime ".($TTnow+2).".. </option>"; 
++$m;
++$n;
echo "<option value=''>$threeMonthsTime ".($TTnow+3).".. </option>"; 


/*echo "<option  value=''> </option>"; 




echo "<option  value=''>Jan$k $m.. $mmm</option>"; 
++$m;
++$n;
echo "<option  value=''>Feb$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Mar$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Apr$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>May$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Jun$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Jul$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Aug$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Sep$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Oct$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Nov$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Dec$k $m.. </option>"; 
++$m;
++$n;
++$k;



echo "<option  value=''>Jan$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Feb$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Mar$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Apr$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>May$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Jun$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Jul$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Aug$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Sep$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Oct$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Nov$k $m.. </option>"; 
++$m;
++$n;
echo "<option  value=''>Dec$k $m.. </option>"; 
++$m;
++$n;
++$k;
echo "<option  value=''>Jan$k $m.. </option>"; 


*/
/*echo "<option  value=''>May2017 108.. </option>"; 
echo "<option  value=''>Jun2017 109.. </option>"; 
echo "<option  value=''>Jul2017 110.. </option>"; 
echo "<option  value=''>Aug2017 111.. </option>"; 
echo "<option  value=''>Sep2017 112.. </option>"; 
echo "<option  value=''>Oct2017 113.. </option>"; 
echo "<option  value=''>Nov2017 114.. </option>"; 
echo "<option  value=''>Dec2017 115.. </option>"; 


echo "<option  value=''>Mar2016 94.. </option>"; 
echo "<option  value=''>Apr2016 95.. </option>"; 
echo "<option  value=''>May2016 96.. </option>"; 
echo "<option  value=''>Jun2016 97.. </option>"; 
echo "<option  value=''>Jul2016 98.. </option>"; 
echo "<option  value=''>Aug2016 99.. </option>"; 
echo "<option  value=''>Sep2016 100.. </option>"; 
*/





				echo "</select>";
$b = $new;
if ($CustInt == '155')
	$aa = $b."web";
else 
if ($CustInt == '18')
	$aa = $b."email";
else 
if ($CustInt == '420')
	$aa = $b."web";
else 
if ($CustInt == '206')
	$aa = $b."web";
else 
if ($CustInt == '380')
	$aa = $b."web";
else
	$aa = $b."adsl";

				?>