<?php

session_start(); 
// load image - png
$filename = $_SESSION["image"];
$viewFileName = str_replace(".", "_", $filename) .".jpg";
//echo $viewFileName;
//echo $filename;
$_SESSION["imageView"] = $viewFileName;

$img = new Imagick($filename);

// convert to jpg
$img->setImageFormat( "jpg" );

// reduce size for the image size > 90kb
$maxSizeinKb = 100 * 1000;

if($img->getImageLength() > $maxSizeinKb){
	$width = $img->getImageWidth();
	$height = $img->getImageHeight();

	// resize to reduce size
	$max = max($width, $height);
	$maxPixel = 900;

	if($max > $maxPixel){
		$newwidth = $newheight = 0;
		if($max == $width){
			$newwidth = $maxPixel;
			$newheight = ($height / ($width*1.0)) * $newwidth;
		}
		else{
			$newheight = $maxPixel;
			$newwidth = ($width / ($height*1.0)) * $newheight;
		}
		$img->resizeImage($newwidth, $newheight, Imagick::FILTER_LANCZOS, 1);
	}


	// Set compression level (1 lowest quality, 100 highest quality)
	$img->setCompression(Imagick::COMPRESSION_JPEG);
	$img->setImageCompressionQuality(85);
	// Strip out unneeded meta data
	$img->stripImage();
}

$img->writeImage($viewFileName);
?>