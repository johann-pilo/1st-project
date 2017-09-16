
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include_once "db.php";
add_service($_SESSION["id"], $_SESSION["hash"]);

include_once "imageProcessing.php"; 
// File
$filename = $_SESSION["image"];

//print("%s\n", $filename);

// Load
$im = loadImg($filename);

function rotateAntiClock($image) {
    $image->rotateImage(new ImagickPixel(), -90); 
    return $image;
}


function rotateClock($image) {
    $image->rotateImage(new ImagickPixel(), 90); 
    return $image;
}

function flipHorizontal($image){
    $image->flopImage();
    return $image;
}

function flipVertical($image){
    $image->flipImage();
    return $image;
}

if(isset($_GET["rotate"])){
    if($_GET["rotate"] == "clock"){
        $im = rotateClock($im);
    }
    else if($_GET["rotate"] == "antiClock"){
        $im = rotateAntiClock($im);
    }
    else if($_GET["rotate"] == "horizontal"){
        $im = flipHorizontal($im);
    }
    else{
        $im = flipVertical($im);
    }
}

// update info
$_SESSION["height"] = $im->getImageHeight();
$_SESSION["width"] = $im->getImageWidth();
writeImg($im, $filename); // write to file
$_SESSION["size"] = filesize($filename);

include_once "image.php";

header("Location: rotate");
exit();
?>
