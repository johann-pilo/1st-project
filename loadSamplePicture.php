<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   // loadSamplePicture.php?name=bg.jpg&target=home
	function ErrorHandle($error){
	   $_SESSION["error"] = $error;
      echo $error;
	   header("Location: error?error=$error"); /* Redirect browser */
	   exit();
	}

	$file_name = $_GET["name"];
   $target = $_GET["target"];

	if(!file_exists($file_name)){
		ErrorHandle("Please choose a valid sample image");
	}
   

	session_start();

	include_once "imageProcessing.php";
	include_once "db.php";

	//create session in db
	   $id_hash = create_session();
      $_SESSION["id"] = $id_hash[0];
      $_SESSION["hash"] = $id_hash[1];

      $session_folder = "images/$id_hash[0]/";

    //create upload directory if not exist
      if(!is_dir($session_folder)) {
         $oldmask = umask(0);
         mkdir($session_folder, 0777);
         umask($oldmask);
         // mkdir("images/");
      }

      // directory + filename
      $copy_file_name = $session_folder . $file_name;
      
      // everython ok
      if(empty($errors) === true) {
      	echo "total Success";
         
         $im = loadImg($file_name);
         
         // store in session
         $_SESSION["image"] = $_SESSION["tmpImage"] = $copy_file_name;
         $_SESSION["height"] = $im->getImageHeight();
         $_SESSION["width"] = $im->getImageWidth();
         $_SESSION["size"] = filesize($file_name);;

         writeImg($im, $copy_file_name);
         include_once "image.php";
         
         // redirect
      	header("Location: $target"); /* Redirect browser */
		   exit();

      }

?>