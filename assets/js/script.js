var footer = $('#footer');
var Window = $(window);
var imgDiv =  $('#imgDiv');

var image = document.getElementById('targetImg');


var mainContainer = $('#mainContainer');

function fixedBottomFooter() {
	var footerTop = Window.height() - footer.outerHeight(true);
	var imgBottom = mainContainer.offset().top + mainContainer.outerHeight(true);
	//alert("footerTop: " + footerTop);
	//alert("imgBottom: " + imgBottom);
	//alert(rightNav.offset().top);
	//var isUp = footerTop < Window.height()-footer.outerHeight(true);

	if(footerTop < imgBottom){
		//alert("OK");
		footer.attr("style", "position:relative;");
		//alert("remove");
	}
	else{
		footer.attr("style", "position:fixed;");
	}

	// if crop preset reset cropbox
	if(isCropPresent !== undefined){
		resetCropBox();
		//alert("crop preset");
	} 
	//else alert("crop not preset");
}

function calculateImgSize(){
	// get max height and width possible
	var imgMaxHeight = Window.height() - imgDiv.offset().top - 7;
	var imgMaxWidth = imgDiv.outerWidth(true);
	//alert(imgMaxHeight);
	if(imgMaxHeight < Window.height()/2){
		imgMaxHeight = Window.height()-7;
	}

	var divRatio = imgMaxHeight/imgMaxWidth;
	var imgRatio = 0;
	//alert(divRatio);
	// get img height and width possible
	
	var img = new Image();
	img.src = image.src;

	img.onload = function(){
		$("#loading").hide();
		$("#targetImg").show();
		if(!imgRatio) imgRatio = this.height/this.width;
		//alert(imgRatio);

		if(imgRatio > divRatio){
			//alert("height");
			image.height = imgMaxHeight;
			image.width = (1/imgRatio) * imgMaxHeight;
		}
		else{
			//alert("width");
			image.width = imgMaxWidth;
			image.height = imgRatio * imgMaxWidth;
			//image.height = "auto";
		}
		// reset footer
		fixedBottomFooter();
		//alert("done");
		
	  //alert(this.width + 'x' + this.height);
	}
	
	//alert(img.src);
}

var footerLoaded = false;

$( document ).ready(function() {
    if (imgDiv.length)
	{
		//alert("imgdiv");
		calculateImgSize();
	}
	else{
		//alert("noimgDiv");
		fixedBottomFooter();
		//alert("OK");
		//canvasDraw();
	}
	footerLoaded = true;

	$(window).resize(function() {
       	if (imgDiv.length)
		{
			calculateImgSize();
		}
		else{
			fixedBottomFooter();
		}
    });
  });