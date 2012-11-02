<?php

include("includes/imageworkshop.php");

$filepath = 'images/norway.jpg';
$outputpath =  'images_with_watermark';
photobooth_add_watermark($filepath,$outputpath);

function photobooth_add_watermark($filepath, $outputpath, $watermark_path = 'images/watermark.png'){
  $layer = new ImageWorkshop(array(
    "imageFromPath" => $filepath,
  ));
  $watermarkLayer = new ImageWorkshop(array(
    "imageFromPath" => "images/watermark.png",
  ));
  $layer->addLayer(1, $watermarkLayer, 12, 12, "LB");
  $image = $layer->getResult();
  $dirPath = $outputpath;
  $filename = _photobooth_detect_filename($filepath);
  $createFolders = true;
  $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
  $imageQuality = 95; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
  $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
}

function _photobooth_detect_filename ($filepath) {
  $filepath_array = explode('/', $filepath);
  $last_key = key( array_slice( $filepath_array, -1, 1, TRUE ) );
  return $filepath_array[$last_key];
}
