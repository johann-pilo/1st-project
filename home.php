
<?php 

	$title = "imresizer::Resize, Crop, Convert, combine or rotate picture online free";
	$description = "Resize(in mm, cm, inch, pixel), crop, convert(to jpg, jpeg, png, gif, pdf, bmp, tiff), combine(multiple images)
	 and rotate any type of picture or image online free";
	 
	$keywords = "resize,crop,convert,rotate,resizing,cropping,converter,rotator,resizer,mm,cm,inch,pixel,jpg,png,gif,pdf,bmp,tiff";

	include_once "template/header.php"; 

	if(isset($_SESSION["error"])){
		header("Location: error"); /* Redirect browser */
	   	exit();
	}
?>

<!-- structured data for search engine -->
<div hidden itemscope itemtype="http://schema.org/WebSite">
    <link itemprop="url" href="http://imresizer.com/"/>
    <span itemprop="description"> <?php echo $description; ?> </span>
</div>
<!-- structured data for search engine ends -->

<div class="col-sm-8">
	<h1 hidden> resize image: home </h1>
	<div id= "centernav">
	<?php if(isset($_SESSION["imageView"]) && file_exists($_SESSION["imageView"])) { ?>
		<span style='font-size: 25px; color: dimgrey; background-color: rgba(210,250,225,0.5);'>
			If you are viewing blurred image, then your image resulation is 
			lower than screen resulation. This is perfectly fine.
		 <span>
		
		<div id="imgDiv">
		    <img src="loading.gif" alt="loading..." id="loading" width="100%" />
		    <img hidden src="<?php echo auto_version($_SESSION['imageView']); ?>" alt="image not found" id="targetImg" />
		</div>
		

	    <?php $jsFile = "assets/js/fixed_footer.min.js"; ?>
		
	<?php } else { 
		$instruction = "text/home.html";
        include_once "template/uploadTemplate.php";
    } ?>
	</div>
<!-- </div> -->
<?php include_once "template/footer.php"; ?>
