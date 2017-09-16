
<?php  
/*
1. change upload file permission to 777
2. get from $_FILES
*/ 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();

include_once "imageProcessing.php";
include_once "db.php";
//echo "OK";


function ErrorHandle($error){
   $_SESSION["error"] = $error;
   //header("Location: home"); /* Redirect browser */
   exit();
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

      if($file_size > 5*2097152) {
         ErrorHandle('File size should be less than 10 MB');
      }

      // test image support by image magic
      $im = new Imagick();
      try {
         $im->readImage($file_tmp);
      } catch (Exception $e) {
         ErrorHandle('Image not supported');
      }

      //create session in DB
      $id_hash = create_session();
      $_SESSION["id"] = $id_hash[0];
      $_SESSION["hash"] = $id_hash[1];

      
      //create upload directory if not exist
      $session_folder = "images/$id_hash[0]/";
      if(!is_dir($session_folder)) {
         $oldmask = umask(0);
         mkdir($session_folder, 0777);
         umask($oldmask);
         // mkdir("images/");
      }

      // move the file
      $file_name = $session_folder . $file_name;
      if (move_uploaded_file($file_tmp, $file_name) === false) {
          ErrorHandle("Error while file uploading in image directory");
      }
      
      // everython ok
      // store in session
      
      $_SESSION["image"] = $_SESSION["tmpImage"] = $file_name;
      $_SESSION["height"] = $im->getImageHeight();
      $_SESSION["width"] = $im->getImageWidth();
      $_SESSION["size"] = $file_size;
      $_SESSION["showadd"] = "true"; // display add only when user wants to work
      

      //writeImg($im, $file_name);
      // destroy image
      $im->clear();
      $im->destroy();
      include_once "image.php";
         
      // redirect
      header("Location: home"); /* Redirect browser */
      exit();
   }
?>