<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();
include_once "db.php";
add_service($_SESSION["id"], $_SESSION["hash"]);

   include_once "imageProcessing.php"; 
   
   $filename = $_SESSION["image"];
   $format = $_GET["format"];

   echo $filename;
   $extension = get_extension($_SESSION["tmpImage"]);
   $mainExtension = get_extension($_SESSION["image"]);

   if($extension !== $format){
   	   $tmpName = convertImg($filename, $format);
   	   if($extension !== $mainExtension) unlink($_SESSION["tmpImage"]);
   	   $_SESSION["tmpImage"] = $_SESSION["image"] = $tmpName;
         $_SESSION["size"] = filesize($tmpName);
   }



   //include_once "image.php";
   header("Location: home");
?>