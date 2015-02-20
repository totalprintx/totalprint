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
	
	$("#searchbox").keypress(function(event){
    if(event.keyCode == 10 || event.keyCode == 13) {
      event.preventDefault();
			$("#btn_search").trigger("click");
      return false;
    }
  });
	
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
