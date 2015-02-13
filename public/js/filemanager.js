$(document).ready(function(){
	$("#submitsearch").click(function() {
		var searchterm = document.getElementById('searchbox').value;

		var data = array();

		$("#dg_documents").datagrid({url:"documents/searchDocuments",
									 data:"",
									 type:"POST"});
		$("#dg_documents").datagrid('reload');
	});
});

