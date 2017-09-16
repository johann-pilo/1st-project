/*function getPageName(name){
	for(i=name.length; i>=0; i--){
		if(name[i] == '/'){
			return name.substring(i+1);
		}
	}
}
pageName = getPageName(window.location.href);
if(pageName == "upload" || pageName.startsWith("error")) pageName = "home";*/


$(document).ready(function() {

	 $('#id_image').change(function() {

		if($('#id_image').val()) {
			// get file size
			var fileInput =  document.getElementById("id_image");
			var fileSize = 2097152;

			try{
				fileSize = fileInput.files[0].size;
		        //alert(fileInput.files[0].size); // Size returned in bytes.
		    }catch(e){
		        var objFSO = new ActiveXObject("Scripting.FileSystemObject");
		        var e = objFSO.getFile( fileInput.value);
		        fileSize = e.size;
		        //alert("2nd" + fileSize);    
		    }

			//Ajax submit form
			$('#uploadForm').ajaxSubmit({ 
				//target:   '#targetLayer', 
				//url:       'index.php', 
				beforeSubmit: function() {
				  $("#uploadForm").hide();
				  $("#progress-div").show();
				  $("#progress-bar").width('0%');

				},
				uploadProgress: function (event, position, total, percentComplete){	
					percentComplete = Math.floor( percentComplete * 0.85 );
					$("#progress-bar").width(percentComplete + '%');
					$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
				},
				success:function (){
					//$(".centernav").empty();

					//if(fileSize > 5*2097152) pageName = 'error?error=File size should be less than 10 MB';
					$(location).attr('href', "home");
				},
				resetForm: false 
			}); 
			return false; 
		}

		
	});
}); 
