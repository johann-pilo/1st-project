<?php
$req = $_SERVER['REQUEST_URI'];
//echo "req: " . $req;

for($i=strlen($req); $i>=0; $i--){
	if($req[$i] == '/'){
		$req = substr($req, $i+1);
		break;
	}
}
//echo "req: " . strlen($req);

if($req == "upload" || strlen($req) == 0 || substr($req, 0, 5) == "error") $req = "home";
//echo "req: " . $req;
?>


	<div>
		<form id="uploadForm" action="processUpload.php" method="post" enctype="multipart/form-data">
			<p style="font-size: 40px;"> Choose a option </p>
	        <span class="upload-btn-wrapper" id="fileUploadButton" style="margin: 50px;">
	        	<button class="btn">Upload a photo</button>
	            <input id="id_image" type="file" name="image" >
	        </span>
	       <!-- <button>Submit</button> -->
	     

	       	<a  href="loadSamplePicture.php?name=captain.jpg&target=<?php echo $req; ?>" style="margin: 50px;"> 
	       		<!-- <span class="tryMe" style="font-size: 32px;"> Try me </span> -->
	       		<img src="captain.jpg" height="100" alt="sample image not found">
	       	</a>
	       
	    </form>
	    <div id="progress-div" style="display:none;"><div id="progress-bar"></div></div>
	</div>

<?php $isUpload = True; ?>
</div>

<!-- Print instruction -->
<?php 
	if(isset($instruction)){
		echo "<div id='centernav'>";
			include_once $instruction;
		echo "</div>";
	} 
?>


<div id="centernav">
	<p id="videoHeader"> learn how to use imresizer.com in 1 minute </p>
	<link rel="stylesheet" href="<?php echo auto_version("assets/css/youtube.min.css"); ?>" media="none" onload="if(media!='all')media='all'">
	
<?php 
	if(!isset($videoUrl)) $videoUrl = "c-cDtv2FKiM";
?>
	<!-- <link href='assets/css/youtube.min.css' rel="stylesheet"> -->
   <div class="wrapper">
	    <div class="youtube" data-embed="<?php echo $videoUrl;?>">
	        <div class="play-button"></div>
	    </div>
	</div>
	<!-- <script src="assets/js/youtube.js" type="text/javascript"></script> -->
	<?php $jsFile = "assets/js/upload.min.js"; ?>
</div>

<div id="centernav">
	<?php include_once "text/blog/faq"; ?>
