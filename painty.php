<?
//$html=@$_GET['html'];
$html="yo";

if(get_magic_quotes_gpc())
	$html = stripslashes($html);
if(!$html)
	$html='<h1>No Text</h1><hr/><p>You did not give a html parameter to show:<br /><b>...painty.php?html=...</b></p><p><img src="http://static.php.net/www.php.net/images/php.gif" /></p>';
$config = array
(
	'input' => $html,
	'output' => "png",
	'width' => 350,
	'height' => 250,
	'font_path' => $__SERVER["DOCUMENT_ROOT"],
	'font' => "arial.ttf",
	'font_bold' => "arial_bold.ttf",
);
$im=painty($html);
header("Content-Type: image/".str_replace("\r\n", "", $config['output']));
imagepng($im);
function painty($str) //html2img
{
/*
	Script Name: Painty
	Programming Language: PHP (gdlib)
	Licensed under: BSD-License
	Copyright: Andreas Rabuser
	URL: http://www.rabuser.info/
	Description: html to image conversion; p,b,strong,br,hr,img tags support
	Usage:
		$config = array(
			'input' => $_GET['html'],
			'output' => "png",
			'width' => 400,
			'height' => 300,
			'font_path' => "./",
			'font' => "tahoma.ttf",
			'font_bold' => "tahoma.ttf",
			'' => ''
		);
		$str = $config['input'];
		if(get_magic_quotes_gpc()) 
		{
			$str = stripslashes($str);
		}
		$im = painty($str);
		//Set header. secured from header injection.
		header("Content-Type: image/".str_replace("\r\n", "", $config['output']));
		imagepng($im);
*/
	global $config;
	//Get the original HTML string
	//Declare <h1> and </h1> arrays
	$h1_start = array();
	$h1_end = array();
	//Clear <h1> and </h1> attributes
	$str = preg_replace("/<h1[^>]*>/", "<h1>", $str);
	$str = preg_replace("/<\/h1[^>]*>/", "</h1>", $str);
	$str = preg_replace("/<h1>\s*<\/h1>/", "", $str);
	//Declare <img> arrays
	$img_pos = array();
	$imgs = array();
	//If we have images in the HTML
	if(preg_match_all("/<img[^>]*src=\"([^\"]*)\"[^>]*>/", $str, $m)) {
		//Delete the <img> tag from the text
		//since this is not plain text
		//and save the position of the image
		$nstr = $str;
		$nstr = str_replace("\r\n", "", $nstr);
		$nstr = str_replace("<h1>", "", $nstr);
		$nstr = str_replace("</h1>", "", $nstr);
		$nstr = preg_replace("/<br[^>]*>/", str_repeat(chr(1), 2), $nstr);
		$nstr = preg_replace("/<div[^>]*>/", str_repeat(chr(1), 2), $nstr);
		$nstr = preg_replace("/<\/div[^>]*>/", str_repeat(chr(1), 2), $nstr);
		$nstr = preg_replace("/<p[^>]*>/", str_repeat(chr(1), 4), $nstr);
		$nstr = preg_replace("/<\/p[^>]*>/", str_repeat(chr(1), 4), $nstr);
		$nstr = preg_replace("/<hr[^>]*>/", str_repeat(chr(1), 8), $nstr);
	
		foreach($m[0] as $i=>$full) {
			$img_pos[] = strpos($nstr, $full);
			$str = str_replace($full, chr(1), $str);
		}
		//Save the sources of the images
		foreach($m[1] as $i=>$src) {
			$imgs[] = $src;
		}
		//Get image resource of the source
		//according to its extension and save it in array
		foreach($imgs as $i=>$image) {
			$ext = end(explode(".", $image));
			$im = null;
			switch($ext) {
			case "gif":
				$im = imagecreatefromgif($image);
				break;
			case "png":
				$im = imagecreatefrompng($image);
				break;
			case "jpeg":
				$im = imagecreatefromjpeg($image);
				break;
			}
			$imgs[$i] = $im;
		}
	}
	//If there is <h1> or </h1>s
	while(strpos($str, "<h1>") != false || strpos($str, "</h1>") != false) {
		while(strpos($str, "<h1>") !== false) {
			$p = strpos($str, "<h1>");
			$h1_start[] = $p;
			$str = substr($str, 0, $p).substr($str, $p + strlen("<h1>"));	
		}
		while(strpos($str, "</h1>") !== false) {
			$p = strpos($str, "</h1>");
			$h1_end[] = $p;
			$str = substr($str, 0, $p).substr($str, $p + strlen("</h1>"));	
		}
	}
	//Remove plain line breaks
	$str = str_replace("\r\n", "", $str);
	//Replace <br>s to line breaks
	$str = preg_replace("/<br[^>]*>/", "\r\n", $str);
	//Take care of <div>s
	$str = preg_replace("/<div[^>]*>/", "\r\n", $str);
	$str = preg_replace("/<\/div[^>]*>/", "\r\n", $str);
	//Take care of <p>s
	$str = preg_replace("/<p[^>]*>/", "  \r\n", $str);
	$str = preg_replace("/<\/p[^>]*>/", "\r\n ", $str);
	//Take care of <hr>s
	$str = preg_replace("/<hr[^>]*>/", "\r\n<hr> \r\n", $str);
	$i = 0;
	$h = 0;
	$width = $config['width'];
	$height = $config['height'];
	$rows = explode("\r\n", $str);
	$im = imagecreatetruecolor($width, $height);
	$black = imagecolorallocate($im, 0, 0, 0);
	$white = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0, 0, $white);
	//Location vars
	$x = 0;
	$y = 18;
	//<b>,<strong> vars
	$bold = false;
	$bolds = 0;
	$strong = false;
	$strongs = 0;
	//<h1> vars
	$h = false;
	$hs = 0;
	//Size
	$size = 11;
	//Add vertical offset after row with image
	$add_at_end = 0;
	//Runs over all the characters in the string
	if($str == "") $str .= chr(1);
	//echo $str;
	for($i = 0; $i < strlen($str); $i++) {
		$jump = false;
		$add_to_i = 0;
		//Saves the current character
		$char = substr($str, $i, 1);
		//If this is line break
		if(substr($str, $i, 2) == "\r\n") {
			//Vertical offset is font size plus some padding and
			//the height of the image (if there was one or more in the past row)
			$y += 12 + 4 + $add_at_end;
			//Nothing to add to the next row
			$add_at_end = 0;
			//Horizonal offset in 0
			$x = 0;
			//Ignore \n
			$add_to_i += 1;
			//Dont print \r
			$jump = true;
			//If this is <b>
		} else if(substr($str, $i, 4) == "<hr>") {
			imageline($im, $x, $y, $width, $y, $black);
			$add_to_i += 3;
			$jump = true;
		} else if(substr($str, $i, 3) == "<b>") {
			//<b> and <strong> counter incremented
			$bolds++;
			//If it more than 0
			if($bolds > 0) {
				//We are in bold text
				$bold = true;
			}
			//Ignore b>
			$add_to_i += 2;
			//Dont print <
			$jump = true;
			//If this is </b>
		} else if(substr($str, $i, 4) == "</b>") {
			//<b> and <strong> counter decremented
			$bolds--;
			//If the counter is 0
			if($bolds == 0) {
				//We are not in bold text
				$bold = false;
			}
			//If there is open tag to close
			if($bolds >= 0) {
				//Ignore /b>
				$add_to_i += 3;
				//Dont print <
			$jump = true;
			}
			//<strong> handling similar to <b> handling
		} else if(substr($str, $i, 8) == "<strong>") {
			$strongs++;
			if($strongs > 0) {
				$strong = true;
			}
			$add_to_i += 7;
			$jump = true;
		} else if(substr($str, $i, 9) == "</strong>") {
			$strongs--;
			if($strongs == 0) {
				$strong = false;
			}
			if($strongs >= 0) {
				$add_to_i += 8;
			$jump = true;
			}
		}
		//We started <h1>
		if(in_array($i, $h1_start)) {
			//Increment <h1>s counter
			$hs++;
			//We are in <h1>
			if($hs > 0)
				$h = true;
			//We ended <h1>
		}	else if(in_array($i, $h1_end)) {
			//Decrement it
			$hs--;
			//And we are not in <h1> tag anymore
			if($hs == 0)
				$h = false;
		}
		//We have to insert image
		/*
		foreach($img_pos as $k=>$pos) {
			$img_pos[$k] -= $add_to_i + ($jump ? +1 : 0);
		}*/
		if(in_array($i, $img_pos)) {
			//Get the first image from the images array
			//AND remove it
			$nim = array_shift($imgs);
			//Save the image dimensions
			$nwidth = imagesx($nim);
			$nheight = imagesy($nim);
			//Copy the image to our output image
			imagecopymerge($im, $nim, $x, $y, 0, 0, $nwidth, $nheight , 100);
			//The next character will be after the image
			$x += $nwidth;
			//And the next row will start below out row
			//If this is the only image
			if($add_at_end == 0)
				//After the image's height
				$add_at_end = $nheight;
			//If there are more than 1 images
			else
				//After the height of the highest image
				$add_at_end = max($add_at_end, $nheight);
		}
		if($add_to_i > 0)
			$i += $add_to_i;
		if($jump)
			continue;
		//Change font according to $bold
		if($bold || $strong) {
			$font = $config['font_path'].$config['font_bold'];
		} else {
			$kill_bold = $prev_bold;
			$kill_strong = $prev_strong;
			$font = $config['font_path'].$config['font'];
		}
		//Change font size if we are in <h1>
		if($h)
			$size = 18;
		else
			$size = 11;
		if($x + (($prev_strong && $prev_bold) ? 1 : 0) + $size > 400) {
			$x = 0;
			$y += 12 + 4 + $add_at_end;
		}
		//Add the character
		$pos = imagettftext($im , $size, 0, $x + (($prev_strong && $prev_bold) ? 1 : 0), $y, $black, $font, $char);
		//Save the x-position of the character end
		$x = $pos[2];
		//Stuff to add padding to bolded area
		if($bold) {
			$prev_bold = true;
		}
		if($strong) {
			$prev_strong = true;
		}
		if($kill_bold)
			$prev_bold = false;
		if($kill_strong)
			$prev_strong = false;
	}
	return $im;
}
?>
