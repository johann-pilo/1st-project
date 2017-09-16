<?php

	$jsFile = "assets/js/fixed_footer.min.js";
	$isBlog = true;

	$name = "text/blog/blogList.php";

	if(isset($_GET["target"])){
		$name = "text/blog/".$_GET["target"].".php";
		//echo $name;
	}

	if(file_exists($name)){
		include_once $name;
	}
	else{
		session_start();
		$_SESSION["error"] = "Plase check URL";
		header("Location: home"); /* Redirect browser */
	   	exit();
	}
			
?>