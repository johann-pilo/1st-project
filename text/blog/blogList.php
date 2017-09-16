<?php
	$title = "imresizer::Blog List";
	$description = "List of all the blogs of imresizer.com";
	 
	//$keywords = "resize,crop,convert,rotate,resizing,cropping,converter,rotator,resizer,mm,cm,inch,pixel,jpg,png,gif,pdf,bmp,tiff";

	include_once "template/header.php"; 
?>


<div class="col-sm-8">
	<div id= "centernav" style="text-align: left; font-size: x-large; background-color: rgba(0,0,0,0.3); color: whitesmoke;">
	<!-- content start -->
		<style type="text/css">
            h1{
                background-color: rgba(255,255,255,1);
                text-align: center;
                color: black;
            }
            h2{
                background-color: rgba(255,255,255,0.7);
                color: black;
            }
            li{
                margin-bottom: 20px;
            }
            li>a{
            	color: whitesmoke;
            }
        </style>

		<h1> List of all blogs </h1>
		<ol >
			<li> <a href="blog?target=faq"> FAQ </a> </li>
			<li> <a href="blog?target=combineTut"> Make Signed Photo </a> </li>
		</ol>

	<!-- content start -->
	</div>
<!-- </div> -->
<?php include_once "template/footer.php"; ?>



