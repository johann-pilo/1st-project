
<?php 
$title = "imresizer::Resize, Crop or Convert any image or picture online";
$description = "Resize image, picture or photos in milimeter(mm), centimeter(cm), inch, pixel and percent(%). 
you can also convert any image to jpg, png, gif, bmp, pdf or tiff. Besides you can perform 
rotate and crop anytime you want.";
$keywords = "image resize online, picture resize online, photo resize online, resize in mm, cm,
inch, pixel, format in pdf, png, jpg, tiff, bmp, crop image, rotate image";

include_once "template/header.php"; 

    function ErrorHandle($error){
       $_SESSION["error"] = $error;
       header("Location: error.php"); /* Redirect browser */
       exit();
    }

?>



<div class="col-sm-8">
    <h1 hidden> resize image: download </h1>
    <div id= "centernav">

        <div class="option">
            <h2> Thank you, download is starting... </h2>
            <h2> If you like imresizer.com please share it with your friend </h2>
        </div>
        <div class="option">
        <?php if(isset($_SESSION["image"])&& file_exists($_SESSION["image"])){ ?>
            <a href="<?php echo $_SESSION["tmpImage"]; ?>" download class="btn btn-danger btn-lg active" id="file" role="button" aria-pressed="true">
                Click here if your download not started yet
            </a>
            <script type="text/javascript">
                document.getElementById("file").click();
            </script>
        <?php }else{ 
            ErrorHandle("Please Choose A Option First");
        } ?>
    </div>

    
    
    <!-- Begin BidVertiser code -->
    <div id= "centernav">
        <div class="col-sm-4">
            <SCRIPT data-cfasync="false" SRC="//bdv.bidvertiser.com/BidVertiser.dbm?pid=782944&bid=1903769" TYPE="text/javascript"></SCRIPT>
        </div>
        <div class="col-sm-4">
            <SCRIPT data-cfasync="false" SRC="//bdv.bidvertiser.com/BidVertiser.dbm?pid=782944&bid=1903977" TYPE="text/javascript"></SCRIPT>
        </div>
        <div class="col-sm-4">
            <SCRIPT data-cfasync="false" SRC="//bdv.bidvertiser.com/BidVertiser.dbm?pid=782944&bid=1903978" TYPE="text/javascript"></SCRIPT>
        </div>
    </div>
    <!-- End BidVertiser code -->

    <?php if(!$isUpload){?>
        <!-- fb -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <!-- g+ -->
          <script src="https://apis.google.com/js/platform.js" async defer></script>

        <div id="centernav" style="text-align: center; margin:5px; border:none;">
            <div class="fb-like" data-href="http://imresizer.com" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-annotation="inline" data-width="300"></div>

            <a href="https://twitter.com/intent/tweet?button_hashtag=imresizer" class="twitter-hashtag-button" data-size="large" data-text="Resize, Crop, Rotate and Convert any type of photo." data-url="http://imresizer.com" data-related="johann_pilo" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    <?php } ?>

    

    </div>
<!-- </div> -->
<?php $jsFile = "assets/js/fixed_footer.min.js"; ?>
<?php include_once "template/footer.php"; ?>

    

<?php /*
        // Fetch the file info.
        session_start();
        $filePath = $_SESSION["tmpImage"];
        function ErrorHandle($error){
           $_SESSION["error"] = $error;
           header("Location: error.php");
           exit();
        }

        if(file_exists($filePath)) {
            $fileName = basename($filePath);
            $fileSize = filesize($filePath);

            // Output headers.
            header("Cache-Control: private");
            header("Content-Type: application/stream");
            header("Content-Length: ".$fileSize);
            header("Content-Disposition: attachment; filename=".$fileName);

            // Output file.
            readfile ($filePath);                   
            exit();
        }

        else {
            ErrorHandle("Please Upload A Image First");
        } */
    ?>