////////// MarkItUp //////////////
$(document).ready(function() {
	$("#markItUp").markItUp(mySettings);
	
	$(".chooser").click(function() {
		greyOutChooser();
		
		this.style.color = "#337AB7";
	});
	
	$("#chooser_myArticles").click(function() {
		$("#dg_articles").datagrid({url:"articles/loadMyArticles"});
	});
	
	$("#chooser_newestArticles").click(function() {
		$("#dg_articles").datagrid({url:"articles/loadNewestArticles"});
	});
	
	$("#btn_article_edit").click(function() {
		alert("EDIT");
	});

	/*$("#btn_picture_upload").click(function() {
		alert('js works');
		$.ajax({
				type: "POST",
				url: "articles/uploadPicture",
				dataType: 'json',
				data: "",
				success: function(resultData) {
					alert("Marcel ist fett");
				}

			});
	});
	*/
	
	$("#btn_search").click(function() {
		greyOutChooser();
		
		var search = document.getElementById('searchbox').value;
		
		$("#dg_articles").datagrid({method:"POST",
																queryParams: {
																	searchTerm: search
																},
																url:"articles/searchArticles"});
	});
});

function greyOutChooser() {
	var chooserArray = document.getElementsByClassName("chooser");
	
	for(var i = 0; i < chooserArray.length; i++)
	{
			chooserArray[i].style.color = "grey";
	}
}
