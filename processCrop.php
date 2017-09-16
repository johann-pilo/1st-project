<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();
include_once "db.php";
add_service($_SESSION["id"], $_SESSION["hash"]);

include_once "imageProcessing.php"; 

//print_r($_POST);

// Load name from session
$filename = $_SESSION["image"];
// Load image
$im = loadImg($filename);



// update post height width left and top

$left = $_POST["left"] * $im->getImageWidth();
$width = $_POST["width"] * $im->getImageWidth();

$top = $_POST["top"] * $im->getImageHeight();
$height = $_POST["height"] * $im->getImageHeight();

printf("top: %d left: %d width: %d height: %d", $top, $left, $width, $height);


// crop image
$im->cropImage($width, $height, $left, $top);
$im->setImagePage(0, 0, 0, 0);
//$im = imagecrop($im, ['x' => $_POST["left"], 'y' =>  $_POST["top"], 'width' =>  $_POST["width"], 'height' =>  $_POST["height"]]);
// update height and width in session
$_SESSION["width"] = $_POST["width"];
$_SESSION["height"] = $_POST["height"];
// overwrite the file

// update info
$_SESSION["height"] = $im->getImageHeight();
$_SESSION["width"] = $im->getImageWidth();
writeImg($im, $filename); // write to file
$_SESSION["size"] = filesize($filename);
include_once "image.php";

header("Location: home");


?>