
<?php 
//$title = "imresizer::resize any picture in mm, cm, inch or pixel";
$title = "imresizer::Combine images online free";
$description = "Merge or combine any type of photos online free";
$keywords = "merge photo, Combine photo, join photo, image, merging, joining, combine photo with sign,";

include_once "template/header.php"; 
?>

<!-- structured data for search engine -->
<div hidden itemscope itemtype="http://schema.org/Product">
    <img itemprop="image" src="products/resize.jpg" alt="resize"/>
    <span itemprop="name">photo merging tool</span>
    <span itemprop="description"> <?php echo $description; ?> </span>
</div>
<!-- structured data for search engine ends -->

<style type="text/css">
.form-group{
    float: none;
    display: inline-block;
}
</style>

<div class="col-sm-8">

    <div id= "centernav">

    <?php if(isset($_SESSION['imageView'])&& file_exists($_SESSION["imageView"])) { ?>
    <!-- options start -->
    <div>
        <form id="uploadForm" action="processMergeImage.php" method="post" enctype="multipart/form-data">
            <span class="upload-btn-wrapper" id="fileUploadButton" style="margin: 50px;">
                <button class="btn">Upload to merge</button>
                <input id="id_image" type="file" name="image" accept="image/*">
            </span>
            <a href="blog?target=combineTut" alt="Singed Photo Tutorial" class="btn btn-primary btn-lg active"  role="button">Singed Photo Tutorial</a>

        </form>
        <div id="progress-div" style="display:none;"><div id="progress-bar"></div></div>
    </div>


    <!-- option ends -->
    <div id="imgDiv">
        <img src="loading.gif" alt="loading..." id="loading" width="100%" />
        <img hidden src="<?php echo auto_version($_SESSION['imageView']); ?>" alt="image not found" id="targetImg" />
    </div>
    <?php $jsFile = "assets/js/merge_image.min.js"; ?>
    
    <?php } else { 
        $instruction = "text/combine.html";
        include_once "template/uploadTemplate.php"; 
    } ?>
    </div>
<!-- </div> -->
<?php include_once "template/footer.php"; ?>

