$(function(){
	$.ajax({
				type: "GET",
				url: "tp_storage.php",
				// url: "http://www.carteam.lvps87-230-14-183.dedicated.hosteurope.de/communities.php",
				dataType: 'json',
				data: "",
				success: function(resultData) {
						var tempArr = [];
						$.each(resultData, function(){
							if(this.parent_id == null){
								$('#dirlist').append('<li id="'+this.dir_id+'">'+this.title+'</li>');
							} else {
								tempArr.push(this);
							}
						});

						resultData = tempArr;
						tempArr = [];


						do{
							$.each(resultData, function(){
								if($('#' + this.parent_id).length){
									alert('#' + this.parent_id);
									$('#' + this.parent_id).append('<li id="'+this.dir_id+'">'+this.title+'</li>');
								} else {
									tempArr.push(this);
								}
							});

							resultData = tempArr;
							tempArr = [];
						}while(resultData);

/*						do{
							$.each(resultData, function(){
								if(this.parent_id == null){
									$('#dirlist').append('<li id="'+this.dir_id+'">'+this.title+'</li>');
								}
							});
						}while(resultData);*/
/*						alert(resultData);
								resultData = jQuery.grep(resultData, function(value) {
										alert(value.title + " - " + resultData[1]);
										return value != resultData[1];
									}
								);
						alert(resultData);*/
/*						var temp = [];
						$.each(resultData, function(){
							temp.push(this.title);
						});

						alert(temp);*/
/*						temp = jQuery.grep(temp, function(value) {
								return value != "Oberkat";
							}
						);*/
/*
						alert(temp);*/
						},
			});
});
