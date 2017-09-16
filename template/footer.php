</div>
<!-- centernav ends -->


<!-- right nav -->


<div class="col-sm-2" id="rightnav">
<?php if(!$isUpload && !$isBlog){?>
	<div id="imageInfo">
		<table class="table table-bordered">
	    <tbody>
	      <tr>
	        <td> <strong>Type</strong> </td>
	        <td> <b> <?php echo strtolower(end(explode('.',$_SESSION["tmpImage"])));?> </b> </td>
	      </tr>

	      <tr>
	        <td> <strong>Size</strong> </td>
	        <td> 
	        	<b>
	        	<?php 
	        		$size = $_SESSION["size"]/1000.0;
	        		if($size < 1000.0){
	        			printf("%0.2lf <i>KB</i>", $size);
	        		}
	        		else{
	        			$size /= 1000.0;
	        			printf("%0.2lf <i>MB</i>", $size);
	        		}
	        	?> 
	        	</b>
	    	</td>
	      </tr>
<?php 
$unit = ["pixel", "cm", "inch", "mm"];
$unitMultiplier = [1.0, 0.0254, 0.010, 0.254];
//print_r($unitMultiplier);
$key = 0;
if(isset($_SESSION["unit"]) && $_SESSION["unit"] != "percent") $key = array_search($_SESSION["unit"], $unit);
else $_SESSION["unit"] = "pixel";

$dpi = 1.0;

if($_SESSION["unit"] != "pixel"){
	$dpi = $_SESSION["dpi"];
}
else{
	$dpi = 1.0;
}


function convertVal($val){
	global $unitMultiplier, $key, $dpi;
	//echo $unitMultiplier[$key];
	return round($val * $unitMultiplier[$key] / $dpi, 2);
}
//echo convertVal(1.2678);

?>


		  <tr>
	        <td> <strong>Width</strong> </td>
	        <td><b><?php echo convertVal($_SESSION["width"]); ?> <i><?php echo $_SESSION["unit"]; ?></i> </b></td>
	      </tr>

	      <tr>
	        <td> <strong>Height</strong> </td>
	        <td> <b> <?php echo convertVal($_SESSION["height"]); ?> <i><?php echo $_SESSION["unit"]; ?></i></b></td>
	      </tr>

	      

	    </tbody>
	  </table>
	</div>
	<?php } ?>

	<?php if(isset($_SESSION["showadd"]) && $_SESSION["showadd"] == "true"){ ?>
	<!-- Begin BidVertiser code 
		<div style="padding-left: 20%;">  
			<SCRIPT async SRC="//bdv.bidvertiser.com/BidVertiser.dbm?pid=782944&bid=1904568" TYPE="text/javascript"></SCRIPT>
		</div>
	 End BidVertiser code --> 
	<?php } ?>

</div>

<!-- right nav end -->

	</div> 
	<!-- content end -->
</div>
<!-- container end -->


<div id="footer" class="text-center">
	<a href="blog?target=faq"> FAQ </a>
	© 2017 imresizer.com All Rights Reserved 
	<a href="blog"> Blogs </a>
</div>

<script async type="text/javascript" src="<?php echo auto_version($jsFile); ?>"></script>
<!-- google analytics code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-104416821-1', 'auto');
  ga('send', 'pageview');

</script>


</body>
</html>

<?php
ob_flush();
?>
