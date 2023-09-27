<?php
	require_once("inc_OnlineStoreDB.php");
$CNN = 1;
@session_start();

//	$_SESSION['sel'] = "select_C";
//	$_SESSION['CustNo'] = "NotYet";

	$CNN = @$_SESSION['CustNo'];
$querySheader = "select CustNo, CustFN, CustLN, u1 from customer where CustNo = $CNN";
echo $querySheader."<br>";


if ($result2header = mysqli_query($DBConnect, $querySheader)) {
  while ($row2header = mysqli_fetch_assoc($result2header)) {
 
$item1b = $row2header["CustNo"];
$item2b =  $row2header["CustLN"];
$item3b = $row2header["CustFN"];
/*print $item2b;
 echo "____".$CNN;
 print "_".$item1b;
print "_".$item3b;
*/
//print "<option value='$item2'>$item2";
//print "<option value='$item3'>$item3";




	}
$result2header->free();
	}







$text = $item3b. " ".$item2b;

//$im = imagecreate( 400, 180 );
/*$im = imagecreatetruecolor(400, 130);
//$background = imagecolorallocate( $im, 255, 255, 255 );
//$text_colour = imagecolorallocate( $im, 170, 172, 172 );
//$line_colour = imagecolorallocate( $im, 128, 255, 0 );

$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 224, 224, 224);
$black = imagecolorallocate($im, 240, 240, 240);
//imagefilledrectangle($im, 0, 0, 399, 29, $white);
imagefilledrectangle($im, 0, 0, 399, 129, $white);

$font = 'arial.ttf';

// Add some shadow to the text
//imagettftext($im, 30, 0, 111, 121, $grey, $font, $text);

// Add the text
echo "Line 62 gives error: image cannot be displayed becasue it contains errors";
//imagettftext($im, 30, 0, 110, 120, $black, $font, $text);


//imagestring( $im, 4, 30, 25, $text,  $text_colour );
//imagesetthickness ( $im, 15 );
//imageline( $im, 30, 45, 165, 45, $line_colour );

header( "Content-type: image/png" );
imagepng( $im );
//imagecolordeallocate( $line_color );
//imagecolordeallocate( $text_color );
//imagecolordeallocate( $background );
imagedestroy( $im );
*/
?>