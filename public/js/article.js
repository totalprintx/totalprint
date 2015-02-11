////////// MarkItUp //////////////
$(document).ready(function() {
	$("#markItUp").markItUp(mySettings);
	
	$(".chooser").click(function() {
		var chooserArray = document.getElementsByClassName("chooser");
		
		for(var i = 0; i < chooserArray.length; i++)
    {
        chooserArray[i].style.color = "grey";
    }
		
		this.style.color = "#337AB7";
	});
});
