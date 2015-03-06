$(document).ready(function(){


	$("#submitsearch").click(function() {

		var search = document.getElementById('searchbox').value;

		$("#dg_documents").datagrid({							onClickRow:function(){
																	handleRowClick();
																},

																method:"POST",
																queryParams: {
																	searchTerm: search
																},
																url:"documents/searchDocuments"});

	});

	$("#searchbox").keypress(function(event){
		if(event.keyCode == 10 || event.keyCode == 13) {
			event.preventDefault();
			$("#submitsearch").trigger("click");
			return false;
		}
  });

});

