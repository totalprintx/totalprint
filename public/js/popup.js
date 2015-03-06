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
                        document.getElementById('id').value = resultData['id'];
					}
				});

                $.ajax({
                    type: "GET",
                    url: "articles/loadPictures",
                    data: data,
                    success: function(resultDataJson) {
                        var obj = JSON.parse(resultDataJson);
                        if(obj.length >= 1){
                            document.getElementById('picture1').value = obj[0].name;               
                        }
                        if(obj.length >= 2){
                            document.getElementById('picture2').value = obj[1].name;               
                        }
                        if(obj.length >= 3){
                            document.getElementById('picture3').value = obj[2].name;               
                        }
                        
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