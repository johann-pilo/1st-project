
<?php 
$title = "imresizer::Crop any picture or image online free";
$description = "Crop any type of picture or image online free";
$keywords = "crop,cut,cutting,cropping,cropper";

include_once "template/header.php"; 
?>

<!-- structured data for search engine -->
<div hidden itemscope itemtype="http://schema.org/Product">
    <img itemprop="image" src="products/crop.jpg" alt="crop"/>
    <span itemprop="name">online image cropper</span>
    <span itemprop="description"> <?php echo $description; ?> </span>
</div>
<!-- structured data for search engine ends -->

<div class="col-sm-8">
    <h1 hidden> crop image or picture </h1>
	<div id= "centernav">

	<?php if(isset($_SESSION["imageView"]) && file_exists($_SESSION["imageView"])) { ?>

    
<!-- options start -->
    <div class="option">
    <form action="processCrop.php" method="post">
        <input type="hidden" name="top" id="cropTop" value="" >
        <input type="hidden" name="left" id="cropLeft" value="" >
        <input type="hidden" name="width" id="cropWidth" value="" >
        <input type="hidden" name="height" id="cropHeight" value="" >

        <button type="submit"  id="cropButton"  class="btn btn-danger">
          <i class="fa fa-crop" aria-hidden="true"></i> Crop
        </button> 
    </form>
    </div>
<!-- options end -->

    <div id="imgDiv">
        <img src="loading.gif" alt="loading..." id="loading" width="100%" />
        <img hidden src="<?php echo auto_version($_SESSION['imageView']); ?>" alt="image not found" id="targetImg" />
    </div>

    <!-- <canvas id="canvas" ></canvas> -->
	<?php $jsFile = "assets/js/crop.min.js"; ?>
	<?php } else { 
        $instruction = "text/crop.html";
        include_once "template/uploadTemplate.php"; 
    } ?>
	</div>
<!-- </div> -->

<?php include_once "template/footer.php"; ?>
    <div hidden id="cropBox" name="cropBox" style="left: 0px; top: 0px; width: 184px; height: 177px;">
        <div class="cropResizeBar" id="nwBar" name="nwBar" style="left: 0px; top: 0px; cursor:nw-resize"> </div>
        <div class="cropResizeBar" id="neBar" name="neBar" style="left: 0px; top: 0px; cursor:ne-resize"> </div>
        <div class="cropResizeBar" id="swBar" name="swBar" style="left: 0px; top: 0px; cursor:sw-resize"> </div>
        <div class="cropResizeBar" id="seBar" name="seBar" style="left: 0px; top: 0px; cursor:se-resize"> </div>
    </div>

    <div hidden class="outerRegion" id="leftOuterRegion" name="outerRegion" style="left: 0px; top: 0px; width: 184px; height: 177px;"> </div>
    <div hidden class="outerRegion" id="rightOuterRegion" name="outerRegion" style="left: 0px; top: 0px; width: 184px; height: 177px;"> </div>
    <div hidden class="outerRegion" id="upperOuterRegion" name="outerRegion" style="left: 0px; top: 0px; width: 184px; height: 177px;"> </div>
    <div hidden class="outerRegion" id="lowerOuterRegion" name="outerRegion" style="left: 0px; top: 0px; width: 184px; height: 177px;"> </div>


