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
	
	$("#chooser_myArticles").click(function() {
		$("#dg_articles").datagrid({url:"articles/loadMyArticles"});
		$("#dg_articles").datagrid('reload');
	});
	
	$("#chooser_newestArticles").click(function() {
		$("#dg_articles").datagrid({url:"articles/loadNewestArticles"});
		$("#dg_articles").datagrid('reload');
	});
});
