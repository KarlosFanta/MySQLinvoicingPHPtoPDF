<html>
<head>
<title>ShotDev.Com Tutorial</title>
</head>
<body>
<?php

  $word = new COM("Word.Application") or die ("Could not initialise Object.");
  // set it to 1 to see the MS Word window (the actual opening of the document)
  $word->Visible = 0;
  // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
  $word->DisplayAlerts = 0;
  // open the word 2007-2013 document 
  $word->Documents->Open('C:\1.docx');
  // save it as word 2003
  $word->ActiveDocument->SaveAs('C:\newdocument.doc');
  // convert word 2007-2013 to PDF
  $word->ActiveDocument->ExportAsFixedFormat('C:\1.png', 18, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
  // quit the Word process
  $word->Quit(false);
  // clean up
  unset($word);

/*

    $ppApp = new COM("word.Application");
    $ppApp->Visible = True;

    $strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp

    $ppName = "1.docx";
    $FileName = "12";

    $ppApp->Documents->Open(realpath($ppName));

    $ppApp->ActiveDocument->SaveAs($strPath."/".$FileName,17);  //'*** 18=PNG, 19=BMP **'
    //$ppApp->ActivePresentation->SaveAs(realpath($FileName),17);

    $ppApp->Quit;
    $ppApp = null;*/
?>
word Created to Folder <b><?=$FileName?></b>
</body>
</html>

---------------------------

Or try this :-
<?php
$powerpnt = new COM("word.application") or die("Unable to instantiate word");

$presentation = $powerpnt->Documents->Open(realpath($file), false, false, false) or die("Unable to open presentation");

foreach($presentation->Slides as $slide)

{

    $slideName = "Slide_" . $slide->SlideNumber;

    $exportFolder = realpath($uploadsFolder);

    $slide->Export($exportFolder."\\".$slideName.".jpg", "jpg", "600", "400");

}

$powerpnt->quit();
?>