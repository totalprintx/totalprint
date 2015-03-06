////////// MarkItUp //////////////
$(document).ready(function() {
	$("#markItUp").markItUp(mySettings);
	$("#markItUp2").markItUp(mySettings);

	$(".chooser").click(function() {
		greyOutChooser();
		
		this.style.color = "#337AB7";
	});
	
	$("#chooser_myArticles").click(function() {
		$("#dg_articles").datagrid({method:"GET",
																queryParams: {
																	verfasser_id: 0,
																	searchColumn: "",
																	searchTerm: ""
																}});
	});
	
	$("#chooser_newestArticles").click(function() {
		$("#dg_articles").datagrid({method:"GET",
																queryParams: {
																	verfasser_id: -1,
																	searchColumn: "",
																	searchTerm: ""
																}});
	});
	
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
		
		$("#dg_articles").datagrid({method:"GET",
																queryParams: {
																	verfasser_id: -1,
																	searchColumn: column,
																	searchTerm: search
																},
																url:"articles/loadArticles"});
	});
});

function greyOutChooser() {
	var chooserArray = document.getElementsByClassName("chooser");
	
	for(var i = 0; i < chooserArray.length; i++)
	{
			chooserArray[i].style.color = "grey";
	}
}
