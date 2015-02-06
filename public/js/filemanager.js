$(document).ready(function(){
	$("#splitcontainer").layout({ applyDemoStyles: true });
});

function searchRequest(){

	var searchData = $('#searchbar').val();

	$.ajax({
			type: "GET",
			url: "C:/xampp/htdocs/totalprint/ecms/php/search.php",
			dataType: 'json',
			data: searchData,
			success: function(resultData) {
				
			}
		})
};