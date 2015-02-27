////////// MarkItUp //////////////
$(document).ready(function() {
	$("#markItUp").markItUp(mySettings);
	$("#markItUp2").markItUp(mySettings);

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
		var row = $('#dg_articles').datagrid('getSelected');
		if(row == null)
			alert("Es wurde kein Artikel zum Bearbeiten ausgewählt.");
		var articleId = row.id;
	
		var data = {
			'id' : articleId
		}
		
		$.ajax({
			type: "GET",
			url: "articles/loadArticle",
			data: data,
			success: function(resultDataJson) {
				var resultData = JSON.parse(resultDataJson);
				document.getElementById('titel_edit').value = resultData['titel'];
				document.getElementById('verfasser_edit').value = resultData['verfasser'];
				document.getElementById('rubrik_edit').value = resultData['rubrik'];
				document.getElementById('ort_edit').value = resultData['ort'];
				document.getElementById('markItUp2').value = resultData['text'];
			}

		});
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
	
	$("#searchbox").keypress(function(event){
		if(event.keyCode == 10 || event.keyCode == 13) {
			event.preventDefault();
			$("#btn_search").trigger("click");
			return false;
		}
    });
	
	$("#btn_search").click(function() {
		greyOutChooser();
		
		var column = document.getElementById('select_column').value;
		var search = document.getElementById('searchbox').value;
		
		$("#dg_articles").datagrid({method:"POST",
																queryParams: {
																	searchColumn: column,
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
