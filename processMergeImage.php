
<?php  
/*
1. change upload file permission to 777
2. get from $_FILES
*/ 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include_once "imageProcessing.php";
include_once "db.php";
//echo "OK";


function ErrorHandle($error){
   $_SESSION["error"] = $error;
   //header("Location: home"); /* Redirect browser */
   exit();
}

if(filesize($_SESSION["image"]) > 5 * 2097152){
   ErrorHandle("Your file size is already 10MB");
}


   // get user specific Name
   function getUserSpecificName($name){
      $extention = get_extension($name);
      $specificName = "images/" . $_SERVER['REMOTE_ADDR']. "." .$extention;
      return $specificName;
   }
    
   if(isset($_FILES['image'])){
      // get data from uploads
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
      
      // supported extensions
      $expensions= array("jpeg", "jpg", "png", "gif", "tiff", "tif", "bmp");
      
      // check extension, size
      if(in_array($file_ext, $expensions) === false){
         ErrorHandle("Image Extension " .$file_ext ." not Supported");
      }
      
      if($file_size > 5*2097152) {
         ErrorHandle('File size should be less than 10 MB');
      }

      $session_folder = "images/". $_SESSION["id"] ."/";


      //create upload directory if not exist
      if(!is_dir($session_folder)) {
         $oldmask = umask(0);
         mkdir($session_folder, 0777);
         umask($oldmask);
         // mkdir("images/");
      }

      

      // get name as ip.jpg and rename
      $file_name = $session_folder . $file_name;

      if (move_uploaded_file($file_tmp, $file_name) === false) {
	       ErrorHandle("Error while file uploading in image directory");
	   }
      
      // everython ok
      if(empty($errors) === true) {
      	echo "Success";


         /* Create new imagick object */
         $im = new Imagick();

         /* load 2 consicutive images */
         $handle = fopen($_SESSION["image"], 'rb');
         $im->readImageFile($handle);

         $handle = fopen($file_name, 'rb');
         $im->readImageFile($handle);

         /* Append the images into one */
         $im->resetIterator();
         $combined = $im->appendImages(true);

         

         //update session data
         $_SESSION["tmpImage"] = $_SESSION["image"];
         $_SESSION["height"] = $combined->getImageHeight();
         $_SESSION["width"] = $combined->getImageWidth();

         // write image
         writeImg($combined, $_SESSION["image"]);

         $_SESSION["size"] = filesize($_SESSION["image"]);

         

         include_once "image.php";
         
         // redirect
      	header("Location: home"); /* Redirect browser */
		   exit();

      }
   }
?>