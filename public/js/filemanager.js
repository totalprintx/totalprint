$(document).ready(function(){

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadBtn").value = this.value;
};

	$("#submitsearch").click(function() {

		var search = document.getElementById('searchbox').value;

		$("#dg_documents").datagrid({method:"POST",
																queryParams: {
																	searchTerm: search
																},
																url:"documents/searchDocuments"});

	});

	$("#searchbox").keypress(function(event){
		if(event.keyCode == 10 || event.keyCode == 13) {
			event.preventDefault();
			$("#btn_search").trigger("click");
			return false;
		}
  });

});

