<?php
ob_start();

//$title = "my title";
//$description = "this is a site";
$keywords = $keywords . ",online,free,best,download,digital,images,photo,passport size,camera,facebook,twitter,pinterest,reddit,myspace,xanga,blog,screenshots,printscreen,instagram";


session_start();

/** SERVING UPDATED CONTENT BY MTIME
 *  Given a file, i.e. /css/base.css, replaces it with a string containing the
 *  file's mtime, i.e. /css/base.1221534296.css.
 */
function auto_version($file)
{
  $mtime = filemtime($file);
  //return "OK";
  return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO contribution -->
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <title><?php echo $title; ?></title>

    <link rel="shortcut icon" href="assets/favicon.ico">

    <!-- Bootstrap core CSS -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="none" onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="<?php echo auto_version("assets/css/style.min.css"); ?>" media="none" onload="if(media!='all')media='all'">
    
    <!-- ADSENSE CODE -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-5182024757772507",
        enable_page_level_ads: true
      });
    </script>
  </head>

  <body>

<!-- data for search engine -->
<div hidden id="for-search-engine">
    <h1> <?php echo $title; ?> </h1>
    <h2> <?php echo $description; ?> </h2>
</div>

    <!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      
        <a class="brand navbar-brand" href="home">imresizer<span class="dotcom">.com</span></a>
      <p class="navbar-text">EDIT YOUR IMAGE ONLINE ABSOLUTELY FREE</p>
    </nav>
    <!-- nav ends -->
    
    <div class="container-fluid text-center" id="mainContainer">
      <div class="row content">
        
        <!-- left nav starts -->
        <div class="col-sm-2" id="leftnav">
          <a href="upload" class="btn btn-primary btn-lg active" id="btn1" role="button">Upload</a>
          <a href="rotate" alt="rotate" class="btn btn-primary btn-lg active" id="btn1" role="button">Rotate & Flip</a>
          <a href="crop" alt="crop" class="btn btn-primary btn-lg active" id="btn1" role="button">Crop</a>
          <a href="resize" alt="resize" class="btn btn-primary btn-lg active" id="btn1" role="button">Resize</a>
          <a href="convert" alt="convert" class="btn btn-primary btn-lg active" id="btn1" role="button">Convert</a>
          <a href="combineImage" alt="combineImage" class="btn btn-primary btn-lg active" id="btn1" role="button">Combine Images</a>
          <!-- <a href="sizeChange" alt="sizeChange" class="btn btn-primary btn-lg active" id="btn1" role="button" aria-pressed="true">Size(KB) Changer</a> -->
          <a href="download" class="btn btn-primary btn-lg active" id="btn1" role="button">Download</a>
        </div>
        <!-- leftnav ends -->

        
