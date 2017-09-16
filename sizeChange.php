
<?php 
//$title = "imresizer::resize any picture in mm, cm, inch or pixel";
$title = "imresizer::Reduce image size in kb";
$description = "Reduce any type of picture or image size in kb online free";
$keywords = "resize image size in kb,resize,resizing,resizer,reduce,enlarge,increase,without losing quality,";

include_once "template/header.php"; 
?>

<!-- structured data for search engine -->
<div hidden itemscope itemtype="http://schema.org/Product">
    <img itemprop="image" src="products/resize.jpg" alt="resize"/>
    <span itemprop="name">online image size changer</span>
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
    <div class="form-inline option">
        <form action="processSizeChange.php" method="post">
            <b>jpg/jpeg format is preferred</b>

            &emsp;
            <span class="form-group">
                <input type="text" style="width: 100px;" name="val" class="float form-control number" id="val" placeholder="val" size="7" value="<?php echo $_SESSION["size"]/1000.0; ?>">
                <label for="val"> KB </label>
            </span>  
                    
                
            &emsp;
            <button type="submit"  id="sizeChanger"  class="btn btn-danger">
                <i class="fa fa-expand" aria-hidden="true"></i> Resize
            </button>
        </form>
    </div>
    <div id="imgDiv">
        <img src="loading.gif" alt="loading..." id="loading" width="100%" />
        <img hidden src="<?php echo auto_version($_SESSION['imageView']); ?>" alt="image not found" id="targetImg" />
    </div>
    <?php $jsFile = "assets/js/fixed_footer.min.js"; ?>
    
    <?php } else { 
        $videoUrl = "Jj0KeeD2Lto";
        include_once "template/uploadTemplate.php"; 
    } ?>
    </div>
<!-- </div> -->
<?php include_once "template/footer.php"; ?>

