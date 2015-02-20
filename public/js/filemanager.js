$(document).ready(function(){

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};

	$("#submitsearch").click(function() {

		var search = document.getElementById('searchbox').value;

		$("#dg_documents").datagrid({method:"POST",
																queryParams: {
																	searchTerm: search
																},
																url:"documents/searchDocuments"});

	});
});

