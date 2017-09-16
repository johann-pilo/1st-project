
<?php 
$title = "imresizer::Convert any picture or image online free";
$description = "Convert any type of picture or image to jpg, jpeg, png, pdf, gif, bmp, tiff online free";
$keywords = "convert,converting,converter,jpg,jpeg,png,png,bmp,tiff,pdf";

include_once "template/header.php"; 
?>

<!-- structured data for search engine -->
<div hidden itemscope itemtype="http://schema.org/Product">
    <img itemprop="image" src="products/convert.jpg" alt="convert"/>
    <span itemprop="name">online image converter</span>
    <span itemprop="description"> <?php echo $description; ?> </span>
</div>
<!-- structured data for search engine ends -->

<div class="col-sm-8">
  <h1 hidden> convert image or picture </h1>
	<div id="centernav">

	<?php if(isset($_SESSION['imageView']) && file_exists($_SESSION['imageView'])) { ?>

    <!-- options start -->
            <div class="option form-inline option" id="option">
              <form action="processConvert.php" method="get">
                <label for="convert">Convert To:
                  <select name="format" class="form-control">
                     <option selected="selected" value="jpg">JPG</option>
                     <option value="jpeg">JPEG</option>
                     <option value="png">PNG</option>
                     <option value="gif">GIF</option>
                     <option value="tiff">TIFF</option>
                     <option value="bmp">BMP</option>
                     <option value="pdf">PDF</option>
                  </select>
                </label>
              
                &emsp;

              <input type="submit" value="Convert"  class="btn btn-danger">
            </form>


            </div>
    <!-- options end -->

   <!-- <img src="image.php" alt="<?php echo $_SESSION["image"] ?> not found" style='height: 100%; width: 100%; object-fit: contain'/> -->
    <div id="imgDiv">
        <img src="loading.gif" alt="loading..." id="loading" width="100%" />
        <img hidden src="<?php echo auto_version($_SESSION['imageView']); ?>" alt="image not found" id="targetImg" />
    </div>
		<?php $jsFile = "assets/js/convert.min.js"; ?>
	<?php } else { 
        $instruction = "text/convert.html";
        include_once "template/uploadTemplate.php"; 
    } ?>
	</div>
<!-- </div> -->

<?php include_once "template/footer.php"; ?>

