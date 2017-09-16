
<?php 
$title = "imresizer::Rotate any picture or image online free";
$description = "Rotate any type of picture or image online free";
$keywords = "rotate,rotator";

include_once "template/header.php"; 
?>

<!-- structured data for search engine -->
<div hidden itemscope itemtype="http://schema.org/Product">
    <img itemprop="image" src="products/rotate.jpg" alt="rotate"/>
    <span itemprop="name">online image rotator</span>
    <span itemprop="description"> <?php echo $description; ?> </span>
</div>
<!-- structured data for search engine ends -->

<div class="col-sm-8">
    <h1 hidden> rotate image or picture </h1>
	<div id= "centernav">

	<?php if(isset($_SESSION["imageView"])&& file_exists($_SESSION["imageView"])) { ?>

    <!-- options start -->
     <div class="option">
        <a href="processRotate.php?rotate=horizontal" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
            <i class="fa fa-arrows-h" aria-hidden="true"></i>
        </a>

        <a href="processRotate.php?rotate=clock" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
            <i class="fa fa-repeat" aria-hidden="true"></i>
        </a>

        <a href="processRotate.php?rotate=antiClock" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">
            <i class="fa fa-undo" aria-hidden="true"></i>
        </a>

        <a href="processRotate.php?rotate=vertical" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">
            <i class="fa fa-arrows-v" aria-hidden="true"></i>
        </a>
     </div>
    <!-- options end -->

    <div id="imgDiv">
        <img src="loading.gif" alt="loading..." id="loading" width="100%" />
        <img hidden src="<?php echo auto_version($_SESSION['imageView']); ?>" alt="image not found" id="targetImg" />
    </div>
    <?php $jsFile = "assets/js/fixed_footer.min.js"; ?>
		
	<?php } else { 
        $instruction = "text/rotate.html";
        include_once "template/uploadTemplate.php"; 
    } ?>
	</div>
<!-- </div> -->
<?php include_once "template/footer.php"; ?>
