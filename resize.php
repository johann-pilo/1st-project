
<?php 
//$title = "imresizer::resize any picture in mm, cm, inch or pixel";
$title = "imresizer::Resize any photo in mm, cm, inch or pixel with any specific DPI";
$description = "resize any type of picture or image in mm, cm, inch, pixel or percent(%) with any specific DPI(dots per inch) online free";
$keywords = "3.5cm x 3.5cm,35mm x 35mm,2inch x 2inch,DPI,resize,resizing,resizer,reduce,enlarge,increase,without losing quality,mm,cm,inch,pixel";

include_once "template/header.php"; 
?>

<!-- structured data for search engine -->
<div hidden itemscope itemtype="http://schema.org/Product">
    <img itemprop="image" src="products/resize.jpg" alt="resize"/>
    <span itemprop="name">online image resizer</span>
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
        <form action="processResize.php" method="post">
        <span class="checkbox">
            <label for="ratio"> <input type="checkbox" id="ratio"> Keep Aspect Ratio  </label>
        </span>

        &emsp;
        <span class="form-group">
            <label for="unit"> Unit 
                <select name="unit" id="unit" class="form-control">
                    <option selected="selected" value="pixel">pixel</option>
                    <option  value="percent">percent</option>
                    <option  value="cm">cm</option>
                    <option  value="inch">inch</option>
                    <option  value="mm">mm</option>
                </select>
            </label>
        </span>

        &emsp;
        
        <span class="form-group">
            <label for="dpi"> DPI </label>
            <input type="number" style="width: 100px;" name="dpi" class="form-control number" id="dpi" placeholder="dpi" value="300" size="4">
        </span>

        <br/>

        <div>
            <span class="form-group">
                <label for="imgWidth"> <i class="fa fa-arrows-h" aria-hidden="true"></i>
 Width </label>
                <input type="number" step=0.01 style="width: 85px;" name="width" class="float form-control number" id="imgWidth" placeholder="Width" size="7" value="<?php echo $_SESSION["width"] ?>">
            </span>   
            
            &emsp;
            
            <span class="form-group">
                <label for="imgHeight"> <i class="fa fa-arrows-v" aria-hidden="true"></i>
 Height </label>
                <input type="number"  step=0.01 style="width: 85px;"  name="height" class="float form-control number" id="imgHeight" placeholder="Height" size="7" value="<?php echo $_SESSION["height"] ?>" >
            </span>
                
            
            &emsp;
                <button type="submit"  id="resizeButton"  class="btn btn-danger">
                    <i class="fa fa-expand" aria-hidden="true"></i> Resize
                </button>
                
              </form>
            </div>

            </div>
    <!-- options end -->
    <!-- <img src="image.php" alt="<?php echo $_SESSION["image"] ?> not found" style='height: 100%; width: 100%; object-fit: contain'/> -->
    <div id="imgDiv">
        <img src="loading.gif" alt="loading..." id="loading" width="100%" />
        <img hidden src="<?php echo auto_version($_SESSION['imageView']); ?>" alt="image not found" id="targetImg" />
    </div>
    <?php $jsFile = "assets/js/resize.min.js"; ?>
    
    <?php } else { 
        $videoUrl = "Jj0KeeD2Lto";
        $instruction = "text/resize.html";
        include_once "template/uploadTemplate.php"; 
    } ?>
    </div>
<!-- </div> -->
<?php include_once "template/footer.php"; ?>

