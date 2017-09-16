<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include_once "db.php";
add_service($_SESSION["id"], $_SESSION["hash"]);

include_once "imageProcessing.php"; 

// get new dimention
$newwidth = $_POST["width"];
$newheight = $_POST["height"];
//echo $newheight;

if($newwidth > 10 && $newheight > 10){
	// update height and width in session

	$_SESSION["unit"] = $_POST["unit"];
	$_SESSION["dpi"] = $_POST["dpi"]/100.0;

	//echo $width + " " + $height;


	// load-resize-rewrite
	$filename = $_SESSION["image"];
	$im = loadImg($filename); // Load
	$im->resizeImage($newwidth, $newheight, Imagick::FILTER_LANCZOS, 1); // resize

	// update info
	$_SESSION["height"] = $im->getImageHeight();
	$_SESSION["width"] = $im->getImageWidth();
	writeImg($im, $filename); // write to file
	$_SESSION["size"] = filesize($filename);

	include_once "image.php";
}



header("Location: home");
exit();
?>