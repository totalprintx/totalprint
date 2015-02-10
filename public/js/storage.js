$(function(){
	$.ajax({
				type: "GET",
				url: "tp_storage.php",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: "",
				success: function(resultData) {
						generateDirList(resultData);
					}

			});

});

function loadFiles(){
	alert("fileload for ");
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
						.append('<ul><li id="'+this.dir_id+'"><a href="#">'+this.title+'</a></li></ul>')
	/*					.click(function(event){
							if (this == event.target) {
								$(this).css('list-style-image',
									(!$(this).children().is(':hidden')) ? 'url(closed.png)' : 'url(opened.png)');
								$(this).children().toggle();
							}
							return false;
						})
						.css({cursor:'pointer', 'list-style-image':'url(closed.png)'})
						.children().hide()*/;
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
/*	$('#dirlist').find("li:has(ul)").find("a:first")
		.click(function(event){
			if(this == event.target){
				alert(this.parentElement.id);
			}
		})
		.css({background:'red'})
		;*/

	//others
	$('#dirlist').find("li:not(:has(ul))").find("a")
		.click(function(event){
			if(this == event.target){
				alert(this.parentElement.id);
			}
		})
		.prepend('<img src="dot.png"/>')
		.css({background:'red'})
		;



/*	$('#dirlist').find("li:has(ul)")
		.click(function(event){
			if (this == event.target) {
				$(this).css('list-style-image',
					(!$(this).children().is(':hidden')) ? 'url(closed.png)' : 'url(opened.png)');
				$(this).children().toggle();
			}
			return false;
		})
		.css({cursor:'pointer', 'list-style-image':'url(closed.png)'})
		.children().hide();*/


		// cp
/*
				$('li')
			.css('pointer','default')
			.css('list-style-image','none');
		$('li:has(ul)')
			.click(function(event){
				if (this == event.target) {
					$(this).css('list-style-image',
						(!$(this).children().is(':hidden')) ? 'url(closed.png)' : 'url(opened.png)');
					$(this).children().toggle();
				}
				return false;
			})
			.css({cursor:'pointer', 'list-style-image':'url(closed.png)'})
			.children().hide();
		$('li:not(:has(ul))').css({cursor:'default', 'list-style-image':'none'});*/
}
