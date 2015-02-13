$(document).ready(function(){
	if (document.getElementById('splitcontainer') != null)
	    $("#splitcontainer").layout({ applyDemoStyles: true});

	$("#submitsearch").click(function() {
		$("#tt").datagrid({url:"documents/searchDocuments"});
		$("#tt").datagrid('reload');
	});
});

