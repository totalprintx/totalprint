function getMA() {
	$.ajax({
		type: "GET",
		url: "localhost/totalprint/ecms/php/dropdown.php",
		dataType: "json",
		success:	function(firstresult) {
			firstresults[] = firstresult;
			
		});
}