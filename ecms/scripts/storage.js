var selectedDirID;

$(function(){
	getDirList();
});

function getDirList(){
	$.ajax({
				type: "POST",
				url: "tp_storage.php",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: "",
				success: function(resultData) {
						generateDirList(resultData);
					}

			});
}

function toggleDir(id){
	$('#' + id).find("ul:first").toggle();
	$('#' + id).find("a:first img").attr("src", ($('#' + id).find("ul:first").is(':hidden') ? 'plus.png' : 'minus.png'));
}

function loadFiles(id){
	selectedDirID = id;
	checkSelectedDir();
	alert("fileload for " + id);
}

function checkSelectedDir(){
	$.each($('#dirlist').find("li a"), function() {
		if(this.parentElement.id == selectedDirID){
			this.id = "selectedDir";
		} else {
			this.removeAttribute('id');
		}
	});
}

function generateDirList(resultData){
	//Dir Ordnung
	while(true){
		var tempArr = [];

		$.each(resultData, function(){
			if(this.parent_id == null){
				$('#dirlist').append('<li id="'+this.dir_id+'"><a href="#">'+this.title+'</a></li>');
			} else if($('#' + this.parent_id).length) {

				if($('#' + this.parent_id + ':has(ul)').length){
					$('#' + this.parent_id).find("ul:first").append('<li id="'+this.dir_id+'"><a href="#">'+this.title+'</a></li>');
				} else {
					$('#' + this.parent_id)
						.append('<ul><li id="'+this.dir_id+'"><a href="#">'+this.title+'</a></li></ul>');
				}

			} else {
				tempArr.push(this);
			}
		});

		resultData = tempArr;
		if(resultData.length<=0)
			break;
	}

	//Toggle
	$('#dirlist').find("li:has(ul)").find("a:first")
		.click(function(event){
			if(this == event.target){
				toggleDir(this.parentElement.id);
				loadFiles(this.parentElement.id);
			}
		})
		.prepend('<img src="plus.png"/> ')
		.parent().find("ul:first").hide();

	//others
	$('#dirlist').find("li:not(:has(ul))").find("a")
		.click(function(event){
			if(this == event.target){
				loadFiles(this.parentElement.id);
			}
		})
		.prepend('<img src="res/dot.png"/> ');
}
