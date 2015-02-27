$(document).ready(function(){

	$("#submitsearch").click(function() {

		var search = document.getElementById('searchbox').value;

		$("#dg_documents").datagrid({method:"POST",
																queryParams: {
																	searchTerm: search
																},
																url:"documents/searchDocuments"});

	});
});

