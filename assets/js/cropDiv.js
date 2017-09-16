
	// global variables
	var img = $("#targetImg");
	var rect = {x:0, y:0, h:0, w:0};
	var box = {N:0, W:0, E:0, W:0};
	var imgOffset = img.offset();
	var cropBox = $("#cropBox");
	var nwBar = $("#nwBar");
	var neBar = $("#neBar");
	var swBar = $("#swBar");
	var seBar = $("#seBar");
	var leftOuterRegion = $("#leftOuterRegion");
	var rightOuterRegion = $("#rightOuterRegion");
	var upperOuterRegion = $("#upperOuterRegion");
	var lowerOuterRegion = $("#lowerOuterRegion");

	// image drag prevent add mouse listener
	img.on('dragstart', function(event) { event.preventDefault(); });

	

	// UPDATE rect from box
	function updateRect(){
		if(box.W < 0) box.W = 0;
		if(box.N < 0) box.N = 0;
		if(box.E > img.width()) box.E = img.width();
		if(box.S > img.height()) box.S = img.height();

		rect.x = box.W;
		rect.y = box.N;
		rect.w = box.E - box.W;
		rect.h = box.S - box.N;
		//console.log("X: " + rect.x + " Y: " + rect.y + " W: " + rect.w + " H: " + rect.h );
	}

	// draw cropBox
	function drawCropBox(){
		updateRect();
		// draw box
		cropBox.css('left', rect.x + imgOffset.left);
		cropBox.css('top', rect.y + imgOffset.top);
		cropBox.css('width', rect.w);
		cropBox.css('height', rect.h);

		// draw four moving bar
		neBar.css('left', rect.w-30);
		swBar.css('top', rect.h-30);
		seBar.css('left', rect.w-30);
		seBar.css('top', rect.h-30);

		// draw left outer region
		leftOuterRegion.css('left', imgOffset.left);
		leftOuterRegion.css('top', imgOffset.top);
		leftOuterRegion.css('width', rect.x);
		leftOuterRegion.css('height', img.height());

		// draw right outer region
		rightOuterRegion.css('left', imgOffset.left + rect.x + rect.w);
		rightOuterRegion.css('top', imgOffset.top);
		rightOuterRegion.css('width', img.width() - rect.x - rect.w);
		rightOuterRegion.css('height', img.height());

		// draw upper outer region
		upperOuterRegion.css('left', imgOffset.left + rect.x);
		upperOuterRegion.css('top', imgOffset.top);
		upperOuterRegion.css('width', rect.w);
		upperOuterRegion.css('height', rect.y);

		// draw lower outer region
		lowerOuterRegion.css('left', imgOffset.left + rect.x);
		lowerOuterRegion.css('top', imgOffset.top + rect.y + rect.h);
		lowerOuterRegion.css('width', rect.w);
		lowerOuterRegion.css('height', img.height() - rect.y - rect.h);

	}

	// set Form Parameters
	var cropTop = document.getElementById('cropTop');
	var cropLeft = document.getElementById('cropLeft');
	var cropWidth = document.getElementById('cropWidth');
	var cropHeight = document.getElementById('cropHeight');
	function setFormParameters(){
		// set hidden form parameter
        cropLeft.value = rect.x / img.width();
        cropWidth.value = rect.w / img.width();

        cropTop.value = rect.y / img.height();
        cropHeight.value = rect.h / img.height();
        //alert(cropHeight.value );
	}
	
	var eventName = "mouse";

	// get postion on the image
	function getPosition(event){
		if(eventName == "mouse"){
			return {
			    x: (event.pageX - imgOffset.left), 
			    y: (event.pageY - imgOffset.top)
			}
		}
		else{
			var touch = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
			return {
			    x: (touch.pageX - imgOffset.left), 
			    y: (touch.pageY - imgOffset.top)
			}
		}
		
	}

	// on drag move 
	var isDragging = false;
	var draggerId;
	var offsetX, offsetY;

	// outerRegions mouse functions start
	var outerRegions = leftOuterRegion.add(rightOuterRegion).add(upperOuterRegion).add(lowerOuterRegion);
	outerRegions.on( "mousedown touchstart", function ( event ) {
		if(!isDragging){
			eventName = event.type.substring(0, 5);
			pos = getPosition(event);
		  	box.W = pos.x;
		  	box.N = pos.y;
		  	isDragging = true;
		  	draggerId = "targetImg";
		}
	});
    outerRegions.on( "mouseup touchend", mouseUp);
    outerRegions.on( "mousemove touchmove", function ( event ) {
    	if(isDragging){
    		event.preventDefault();
    		//console.log("image");
    		pos = getPosition(event);
    		if(draggerId == "targetImg"){
    			box.E = pos.x;
	  			box.S = pos.y;
    		}
    		else{
    			updateBoxParameters(pos);
    		}
	  		drawCropBox();
    	}
	});

	// outerRegions mouse functions end

	// cropBoxAndBars mouse functions start
	function updateBoxParameters(pos){
		if(draggerId == "targetImg") return;
		//console.log(draggerId);
		//console.log("posX: " + pos.x);
		//console.log("N: " + box.N + " S: " + box.S + " W: " + box.W + " E: " + box.E );
		if(draggerId == "cropBox"){
			
			box.N = pos.y - offsetY;
			box.W = pos.x - offsetX;

			// check boundary cases
			if(box.N < 0) box.N = 0;
			if(box.W < 0) box.W = 0;
			if(box.N + rect.h > img.height()) box.N = img.height()-rect.h;
			if(box.W + rect.w > img.width()) box.W = img.width()-rect.w;

			box.S = box.N + rect.h;
			box.E = box.W + rect.w;
			return;
		}

		if(draggerId[0] == 'n') box.N = pos.y - offsetY;
		else box.S = pos.y - offsetY;

		if(draggerId[1] == 'w') box.W = pos.x - offsetX;
		else box.E = pos.x - offsetX;
	}

    function mouseDown( event ) {
    	if(!isDragging){
    		eventName = event.type.substring(0, 5);
    		isDragging = true;
	  		draggerId = this.id;
	  		$(this).css("background-color", "rgba(0, 0, 0, 0.6)");
    	}
    	
	  	//alert(draggerId);
    	pos = getPosition(event);
	  	
	  	if(draggerId[0] == 'n' || draggerId == "cropBox") offsetY = pos.y - box.N;
		else offsetY = pos.y - box.S;

		if(draggerId[1] == 'w' || draggerId == "cropBox") offsetX = pos.x - box.W;
		else offsetX = pos.x - box.E;
		//console.log(offsetY);

		updateBoxParameters(pos);
	}

	function mouseUp( event ) {
		isDragging = false;
	  	setFormParameters();
	  	$(this).css("background-color", "");
	}

	function mouseMove( event ) {
    	if(isDragging){
    		event.preventDefault();
    		pos = getPosition(event);
	  		updateBoxParameters(pos);
	  		drawCropBox();
    	}
	}
	
	var cropBoxAndBars = nwBar.add(neBar).add(swBar).add(seBar).add(cropBox);
	cropBoxAndBars.on("mousedown touchstart", mouseDown);
	cropBoxAndBars.on("mouseup touchend", mouseUp);
	cropBoxAndBars.on("mousemove touchmove", mouseMove);



	// draw cropBox after finishing loading
	function resetCropBox() {
		// set initial values of rectangle and draw
		var iw = img.width()/2;
		var ih = img.height()/2;
			

		box = {W:iw/2, N:ih/2, S:ih+ih/2, E:iw+iw/2};
			//alert(rect.x);
		imgOffset = img.offset();
		drawCropBox();
		setFormParameters();


		cropBox.show();
		leftOuterRegion.show();
		rightOuterRegion.show();
		upperOuterRegion.show();
		lowerOuterRegion.show();
	}

	//$(window).bind("load resize", resetCropBox);
	
	//setInterval(resetCropBox, 200);
	var isCropPresent = true;


