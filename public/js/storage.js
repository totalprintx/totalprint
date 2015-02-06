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

function generateDirList(resultData){
	//Dir Ordnung
	while(true){
		var tempArr = [];

		$.each(resultData, function(){
			if(this.title == "abc"){
				alert("ABC!!!!");
			}
			if(this.parent_id == null){
				$('#dirlist').append('<li id="'+this.dir_id+'">'+this.title+'</li>');
			} else if($('#' + this.parent_id).length) {

				if($('#' + this.parent_id + ':has(ul)').length){
					$('#' + this.parent_id).find("ul").append('<li id="'+this.dir_id+'">'+this.title+'</li>');
				} else {
					$('#' + this.parent_id)
						.append('<ul><li id="'+this.dir_id+'">'+this.title+'</li></ul>')
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

				$('li')
			.css('pointer','default')
			.css('list-style-image','none');
		$('li:has(ul)')
			.click(function(event){
				if (this == event.target) {
					$(this).css('list-style-image',
						(!$(this).children().is(':hidden')) ? 'url(closed.png)' : 'url(opened.png)');
					$(this).children().toggle('slow');
				}
				return false;
			})
			.css({cursor:'pointer', 'list-style-image':'url(closed.png)'})
			.children().hide();
		$('li:not(:has(ul))').css({cursor:'default', 'list-style-image':'none'});
}
