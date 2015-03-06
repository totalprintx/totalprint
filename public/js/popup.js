jQuery(function($) {
 
    var popup_zustand = false;
 
    $(".article_create").click(function() {
        if(popup_zustand == false) {
            $("#popup").fadeIn("normal");
            $("#hintergrund").css("opacity", "0.7");
            $("#hintergrund").fadeIn("normal");
            popup_zustand = true;
        }
    });

    $(".article_edit").click(function() {
			var row = $('#dg_articles').datagrid('getSelected');
			if(row == null) {
				alert("Es wurde kein Artikel zum Bearbeiten ausgewählt.");
			} else {
				var articleId = row.id;
			
				var data = {
					'id' : articleId
				}
				
				if(popup_zustand == false) {
					$("#popup_edit").fadeIn("normal");
					$("#hintergrund_edit").css("opacity", "0.7");
					$("#hintergrund_edit").fadeIn("normal");
					popup_zustand = true;
				}
			
				$.ajax({
					type: "GET",
					url: "articles/loadArticle",
					data: data,
					success: function(resultDataJson) {
						var resultData = JSON.parse(resultDataJson);
						document.getElementById('titel_edit').value = resultData['titel'];
						document.getElementById('verfasser_edit').value = row.verfasser;
						document.getElementById('rubrik_edit').value = resultData['rubrik'];
						document.getElementById('ort_edit').value = resultData['ort'];
						document.getElementById('markItUp2').value = resultData['text'];
					}
				});
			}
    });
 
    $(".schliessen").click(function() {
 
        if(popup_zustand == true) {
            $("#popup").fadeOut("normal");
            $("#hintergrund").fadeOut("normal");
            popup_zustand = false;
        }
 
    });

    $(".schliessen_edit").click(function() {
 
        if(popup_zustand == true) {
            $("#popup_edit").fadeOut("normal");
            $("#hintergrund_edit").fadeOut("normal");
            popup_zustand = false;
        }
 
    });
 
});